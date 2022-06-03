<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\Http\Requests;
use App\DataTables\UserDataTable;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
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
    public function __construct(RoleRepository $roleRepo,DepartmentRepository $departmentRepo,UserRepository $userRepo)
    {
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

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('user', $user);
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
}
