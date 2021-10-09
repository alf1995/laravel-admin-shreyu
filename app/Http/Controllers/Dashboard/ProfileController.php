<?php
namespace App\Http\Controllers\Dashboard;

use Auth;
use App\Model\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Dashboard\ProfileRequest;
use Illuminate\Support\Facades\Hash;
use Libraries\Services\Complement;
use App\Traits\ImageUpload;

class ProfileController extends Controller
{
    use ImageUpload;

    public function __construct()
    {

    }

    public function index(Request $request)
    {
        if (! Gate::allows('perfil')) {
            return abort(401);
        }
    	$user = User::find(Auth::user()->id);
	    return view('dashboard.user.profile', compact(['user']));
    }

    public function edit(ProfileRequest $request, $id)
    {
        if (! Gate::allows('perfil')) {
            return abort(401);
        }
    	$User = User::where('id', '=', Auth::user()->id)->first();
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
        $User->save();
        return redirect()->route('profile')->with('success','Se actualizo correctamente')->withInput($request->input());

    }

}
