<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\Http\Requests;
use App\DataTables\RoleDataTable;
use Spatie\Permission\Models\Role;
use App\Repositories\RoleRepository;
use App\DataTables\PermissionDataTable;
use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Spatie\Permission\Models\Permission;
use App\Repositories\PermissionRepository;
use App\Http\Controllers\AppBaseController;

class RoleController extends AppBaseController
{
    /** @var RoleRepository $roleRepository*/
    private $roleRepository;
        /** @var PermissionRepository $permissionRepository*/
    private $permissionRepository;
    public function __construct(PermissionRepository $permissionRepo,RoleRepository $roleRepo)
    {
        $this->permissionRepository = $permissionRepo;
        $this->roleRepository = $roleRepo;
    }

    /**
     * Display a listing of the Role.
     *
     * @param RoleDataTable $roleDataTable
     *
     * @return Response
     */
    public function index(RoleDataTable $roleDataTable)
    {
        return $roleDataTable->render('roles.index');
    }

    /**
     * Show the form for creating a new Role.
     *
     * @return Response
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param CreateRoleRequest $request
     *
     * @return Response
     */
    public function store(CreateRoleRequest $request)
    {
        $input = $request->all();

        $role = $this->roleRepository->create($input);

        Flash::success('Role saved successfully.');

        return redirect(route('roles.index'));
    }

    /**
     * Display the specified Role.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show(PermissionDataTable $permissionDataTable,$id)
    {

        $role = $this->roleRepository->find($id);
        $permissions = $this->permissionRepository->all();
        $rolePermissions=$role->permissions->pluck('id')->toArray();
        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('roles.index'));
        }
        return $permissionDataTable->with(['rolePermissions'=>$rolePermissions,'role'=>$role])->render('roles.show',compact('permissions','rolePermissions','role'));
        // return view('roles.show',compact('permissions','rolePermissions'))->with('role', $role);
    }

    /**
     * Show the form for editing the specified Role.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $role = $this->roleRepository->find($id);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('roles.index'));
        }

        return view('roles.edit')->with('role', $role);
    }

    /**
     * Update the specified Role in storage.
     *
     * @param int $id
     * @param UpdateRoleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoleRequest $request)
    {
        $role = $this->roleRepository->find($id);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('roles.index'));
        }

        $role = $this->roleRepository->update($request->all(), $id);

        Flash::success('Role updated successfully.');

        return redirect(route('roles.index'));
    }

    /**
     * Remove the specified Role from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $role = $this->roleRepository->find($id);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('roles.index'));
        }

        $this->roleRepository->delete($id);

        Flash::success('Role deleted successfully.');

        return redirect(route('roles.index'));
    }
        /**
     * Remove the specified Role from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function addPermission(Role $role ,Permission $permission)
    {
        $rolePermissions=$role->permissions->pluck('id')->toArray();

        if (in_array($permission->id,$rolePermissions)) {
            $role->revokePermissionTo( $permission);
        }else {
            $role->givePermissionTo( $permission);
        }
        // dd($x,in_array($permission->id,$x));
                // $role->hasPermissionTo( $permission);
        return true;
    }
}
