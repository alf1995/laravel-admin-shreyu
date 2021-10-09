<?php
namespace App\Http\Controllers\Dashboard;

use App\Model\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\UserRequest;
use Illuminate\Support\Facades\Hash;
use Libraries\Services\Complement;
use App\Traits\ImageUpload;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    use ImageUpload;

    public function __construct()
    {

    }

    public function index(Request $request)
    {
        if (! Gate::allows('usuario')) {
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

        $users = User::all();
	    return view('dashboard.user.list',compact(['users','jqueryDataTable','clasesDataTable']));
    }


    public function create()
    {
        if (! Gate::allows('usuario')) {
            return abort(401);
        }
        $roles = Role::get()->pluck('name', 'name');
        return view('dashboard.user.add',compact(['roles']));
    }


    public function store(UserRequest $request)
    {
        if (! Gate::allows('usuario')) {
            return abort(401);
        }
        $User = new User;
        if($request->hasFile('image'))
        {
            $url = $this->upload($request->image,400,400,550,'user');
            $filename = $url['original'];
        } else {
        	$filename = '';
        }
        $is_actived = ($request->input('is_actived')== "on") ? 1 : 0;
        $hashed_password = Hash::make($request->input('password'));

        $User->name = $request->input('name');
        $User->last_name = $request->input('last_name');
        $User->email = $request->input('email');
        $User->phone = $request->input('phone');
        $User->image = $filename;
        $User->password = $hashed_password;
        $User->is_actived = $is_actived;
        $User->save();
        $roles = $request->input('roles') ? $request->input('roles') : [];
        $User->assignRole($roles);
        return redirect()->route('user')->with('success','Se registro correctamente')->withInput($request->input());
    }


    public function show(Request $request ,$id)
    {
        if (! Gate::allows('usuario')) {
            return abort(401);
        }
        $user = User::find($id);
	    return view('dashboard.user.view')->with('user',$user);
    }


    public function edit($id)
    {
        if (! Gate::allows('usuario')) {
            return abort(401);
        }
        $roles = Role::get()->pluck('name', 'name');
    	$user = User::find($id);
	    return view('dashboard.user.edit', compact(['user','roles']));
    }


    public function update(UserRequest $request, User $user)
    {
        if (! Gate::allows('usuario')) {
            return abort(401);
        }
        $User = User::where('id', '=', $user->id)->first();
        $User->name = $request->input('name');
        $User->last_name = $request->input('last_name');
        $User->email = $request->input('email');
        $User->phone = $request->input('phone');
        if( $request->hasFile('image') )
        {
            $this->delete_image($User->image,'user','thumbnails');
            $this->delete_image($User->image,'user','originals');
            $url = $this->upload($request->image,400,400,550,'user') ;
            $User->image = $url['original'];
        }
        if( !$request->input('password') == '')
        {
            $hashed_password = Hash::make($request->input('password'));
            $User->password = $hashed_password;
        }
        $is_actived = ($request->input('is_actived')== "on") ? 1 : 0;
        $User->is_actived = $is_actived;
        $User->save();
        $roles = $request->input('roles') ? $request->input('roles') : [];
        $User->syncRoles($roles);
        return redirect()->route('user.edit',$user->id)->with('success','Se actualizo correctamente')->withInput($request->input());
    }


    public function destroy($id)
    {
        if (! Gate::allows('usuario')) {
            return abort(401);
        }
        $result_user = User::where('id', '=', $id)->where('is_actived', '=', 0)->first();
        if(!empty($result_user)){
            $roles = $result_user->roles()->pluck('id');
            $var = FALSE;
            foreach ($roles as $id => $items) {
                if($items == 1){
                    $var = TRUE;
                }
            }
            if($var){
                $title = 'Proceso inválido';
                $status = 'error';
                $time = '';
                $message = "No se puede eliminar a un <b>administrador</b>"; 
            }else{
                $this->delete_image($result_user->image,'user','thumbnails');
                $this->delete_image($result_user->image,'user','originals');
                $delete = $result_user->delete();
                if ($delete == 1) {
                    $title = 'Proceso exitoso!';
                    $status = 'success';
                    $time = 1500;
                    $message = "Se realizo la eliminación del registro";
                }
            }
        } else {
            $title = 'Proceso inválido';
            $status = 'error';
            $time = '';
            $message = "No se pudo eliminar el registro activo";
        }
        return response()->json([
            'title' => $title, 'time' => $time, 'status' => $status, 'message' => $message
        ]);
    }
}
