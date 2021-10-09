<?php
namespace App\Http\Controllers\Dashboard;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Rol\StoreRolesRequest;
use App\Http\Requests\Rol\UpdateRolesRequest;
use Libraries\Services\Complement;

class RolesController extends Controller
{

    public function index()
    {
        if (! Gate::allows('roles')) {
            return abort(401);
        }

        $complement = new Complement;
        $options = array(
            'iDisplayLength' => 10,
            'bSort' => FALSE,
            'bPaginate' => TRUE,
            'bFilter' => TRUE,
            'bLengthChange' => FALSE,
            'bInfo' => FALSE
        );
        $dataTable = $complement->datatable($options, '.dataTable');
        $jqueryDataTable = $dataTable['jquery'];
        $clasesDataTable = $dataTable['clases'];

        $roles = Role::all();
        return view('dashboard.roles.list', compact(['roles','jqueryDataTable','clasesDataTable']));
    }


    public function create()
    {
        if (! Gate::allows('roles')) {
            return abort(401);
        }
        $permissions = Permission::get()->pluck('name', 'name');

        return view('dashboard.roles.add', compact('permissions'));
    }


    public function store(StoreRolesRequest $request)
    {
        if (! Gate::allows('roles')) {
            return abort(401);
        }
        $role = Role::create($request->except('permission'));
        $permissions = $request->input('permission') ? $request->input('permission') : [];
        $role->givePermissionTo($permissions);

        return redirect()->route('roles')->with('success','Se registro correctamente')->withInput($request->input());
    }


    public function edit(Role $role)
    {
        if (! Gate::allows('roles')) {
            return abort(401);
        }
        $permissions = Permission::get()->pluck('name', 'name');

        return view('dashboard.roles.edit', compact('role', 'permissions'));
    }


    public function update(UpdateRolesRequest $request, Role $role)
    {
        if (! Gate::allows('roles')) {
            return abort(401);
        }

        $role->update($request->except('permission'));
        $permissions = $request->input('permission') ? $request->input('permission') : [];
        $role->syncPermissions($permissions);

        return redirect()->route('roles')->with('success','Se actualizo correctamente')->withInput($request->input());
    }


    public function show(Role $role)
    {
        if (! Gate::allows('roles')) {
            return abort(401);
        }
        $role->load('permissions');
        return view('dashboard.roles.view', compact('role'));
    }


    public function destroy(Role $role)
    {
        if (! Gate::allows('roles')) {
            $title = 'Proceso inválido';
            $status = 'error';
            $time = '';
            $message = "No se pudo eliminar el registro";
            return response()->json(['title' => $title,'time' => $time,'status' => $status,'message' => $message]);
        }
        
        $roles = Role::find($role->id);
        if($roles->id == 1){
            $title = 'Proceso inválido';
            $status = 'error';
            $time = '';
            $message = "No se pudo eliminar registro";
        } else {
            $delete = $roles->delete();
            if ($delete == 1) {
                $title = 'Proceso exitoso!';
                $status = 'success';
                $time = 1500;
                $message = "Se realizo la eliminación del registro";
            }
        }
        

        return response()->json(['title' => $title,'time' => $time,'status' => $status,'message' => $message]);
    }

}
