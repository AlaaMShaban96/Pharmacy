<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\DataTables\UserDataTable;
use Illuminate\Support\Facades\DB;
use App\Repositories\RoleRepository;
use App\Repositories\ToolRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\TrainingRepository;
use App\Repositories\DepartmentRepository;
use App\Http\Controllers\AppBaseController;

class UserController extends AppBaseController
{
    /** @var UserRepository $userRepository*/
    private $userRepository;
    /** @var DepartmentRepository $departmentRepository*/
    private $departmentRepository;
    /** @var RoleRepository $roleRepository*/
    private $roleRepository;
    /** @var ToolRepository $toolRepository*/
    private $toolRepository;
    /** @var TrainingRepository $trainingRepository*/
    private $trainingRepository;
    public function __construct(TrainingRepository $trainingRepo,ToolRepository $toolRepo,RoleRepository $roleRepo,DepartmentRepository $departmentRepo,UserRepository $userRepo)
    {
        $this->trainingRepository = $trainingRepo;
        $this->toolRepository = $toolRepo;
        $this->roleRepository = $roleRepo;
        $this->departmentRepository = $departmentRepo;
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the User.
     *
     * @param UserDataTable $userDataTable
     *
     * @return Response
     */
    public function index(UserDataTable $userDataTable)
    {
        return $userDataTable->render('users.index');
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        $departments=$this->departmentRepository->pluck('name','id');
        $roles=$this->roleRepository->pluck('name','id');
        return view('users.create',compact('departments','roles'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();
        $input['password'] = bcrypt($request->password);
        // dd( $input );
        if (isset($input['files'])) {
            $input['photo']=Storage::disk('public')->putFile('post_image', $input['files']);
        }
        $user = $this->userRepository->create($input);
        $role = $this->roleRepository->find($request->role_id);
        $user->assignRole($role);
        Flash::success('User saved successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);
        $tools=$this->toolRepository->pluck('name','id');
        $trainings=$this->trainingRepository->pluck('name','id');
        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.show',compact('tools','trainings'))->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->find($id);
        $departments=$this->departmentRepository->pluck('name','id');
        $roles=$this->roleRepository->pluck('name','id');
        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.edit',compact('departments','roles'))->with('user', $user);
    }

    /**
     * Update the specified User in storage.
     *
     * @param int $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }
        $input = $request->all();
        if (isset($input['password'])) {
            $input['password'] = bcrypt($request->password);
        }else {
            $input['password']=$user->password;
        }
        if (isset($input['files'])) {
            $input['photo']=Storage::disk('public')->putFile('post_image', $input['files']);
        }

        $user = $this->userRepository->update($input, $id);
        if (isset($input['role_id'])) {
            $role = $this->roleRepository->find($request->role_id);
            $user->syncRoles($role);
        }
        Flash::success('User updated successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('User deleted successfully.');

        return redirect(route('users.index'));
    }
    public function addTools(Request $request)
    {
        try {
            DB::beginTransaction();
                $user = $this->userRepository->find($request->user_id);
                if (!$user->tools()->where('tool_id',$request->tool_id)->exists()) {
                    $user->tools()->attach($request->tool_id);
                }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }

       return response()->json($user->tools->toArray(), 200);
    }
    public function removeTools(Request $request)
    {
        try {
            DB::beginTransaction();
            $user = $this->userRepository->find($request->user_id);
            $user->tools()->detach($request->tool_id);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }


        return response()->json($user->tools->toArray(), 200);
    }

    public function addTraining(Request $request)
    {
        try {
            DB::beginTransaction();
                $user = $this->userRepository->find($request->user_id);
                if (!$user->trainings()->where('training_id',$request->training_id)->exists()) {
                    $user->trainings()->attach($request->training_id);
                }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }

       return response()->json($user->trainings->toArray(), 200);
    }
    public function removeTraining(Request $request)
    {
        try {
            DB::beginTransaction();
            $user = $this->userRepository->find($request->user_id);
            $user->trainings()->detach($request->training_id);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }


        return response()->json($user->trainings->toArray(), 200);
    }

    public function addGools(Request $request)
    {
        // try {
        //     DB::beginTransaction();
        // dd($request->all());
                $user = $this->userRepository->find($request->user_id);
                // if (!$user->tools()->where('tool_id',$request->tool_id)->exists()) {
                    $user->gools()->create([
                        'name'=>$request->name,
                        'cost'=>$request->cost,
                        'from'=>$request->from,
                        'to'=>$request->to,
                    ]);
                // }

        //     DB::commit();
        // } catch (\Throwable $th) {
        //     DB::rollback();
        // }

       return response()->json($user->gools->toArray(), 200);
    }
    public function removeGools(Request $request)
    {
        try {
            DB::beginTransaction();
            $user = $this->userRepository->find($request->user_id);
            $user->gools()->find($request->gool_id)->delete();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }


        return response()->json($user->gools->toArray(), 200);
    }
}
