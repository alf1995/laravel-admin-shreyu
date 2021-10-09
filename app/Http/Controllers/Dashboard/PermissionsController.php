<?php
namespace App\Http\Controllers\Dashboard;

use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Rol\StorePermissionsRequest;
use App\Http\Requests\Rol\UpdatePermissionsRequest;
use Libraries\Services\Complement;

class PermissionsController extends Controller
{

    public function index()
    {
        if (! Gate::allows('permisos')) {
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

        $permissions = Permission::all();
        return view('dashboard.permissions.list', compact(['permissions','jqueryDataTable','clasesDataTable']));
    }

    public function create()
    {
        if (! Gate::allows('permisos')) {
            return abort(401);
        }
        return view('dashboard.permissions.add');
    }


    public function store(StorePermissionsRequest $request)
    {
        if (! Gate::allows('permisos')) {
            return abort(401);
        }
        Permission::create($request->all());

        return redirect()->route('permissions')->with('success','Se registro correctamente')->withInput($request->input());
    }


    public function edit(Permission $permission)
    {
        if (! Gate::allows('permisos')) {
            return abort(401);
        }
        return view('dashboard.permissions.edit', compact('permission'));
    }


    public function update(UpdatePermissionsRequest $request, Permission $permission)
    {
        if (! Gate::allows('permisos')) {
            return abort(401);
        }
        $permission->update($request->all());
        return redirect()->route('permissions')->with('success','Se actualizo correctamente')->withInput($request->input());
    }


    public function show(Permission $permission)
    {
        if (! Gate::allows('permisos')) {
            return abort(401);
        }
        return view('dashboard.permissions.view', compact('permission'));
    }

    public function destroy(Permission $permission)
    {
        if (! Gate::allows('permisos')) {
            $title = 'Proceso inválido';
            $status = 'error';
            $time = '';
            $message = "No se pudo eliminar registro";
            return response()->json(['title' => $title,'time' => $time,'status' => $status,'message' => $message]);
        }

        $delete = $permission->delete();
        if ($delete == 1) {
            $title = 'Proceso exitoso!';
            $status = 'success';
            $time = 1500;
            $message = "Se realizo la eliminación del registro";
        }

        return response()->json(['title' => $title,'time' => $time,'status' => $status,'message' => $message]);
    }


}
