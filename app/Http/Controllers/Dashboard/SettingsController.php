<?php
namespace App\Http\Controllers\Dashboard;

use App\Model\Setting;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Dashboard\SettingsRequest;
use Illuminate\Support\Facades\Hash;
use Libraries\Services\Complement;
use App\Traits\ImageUpload;

class SettingsController extends Controller
{
    
    use ImageUpload;

    public function __construct()
    {

    }

    public function index()
    {
        if (! Gate::allows('config')) {
            return abort(401);
        }
        $setting = Setting::find(1);
        return view('dashboard.settings.add')->with('setting',$setting);
    }

    public function update(SettingsRequest $request, $id)
    {
        if (! Gate::allows('config')) {
            return abort(401);
        }
    	$Setting = Setting::find(1);

        $Setting->title = $request->input('title');
        if( $request->hasFile('image') )
        {
            $this->delete_image($request->image,'setting','thumbnails');
            $this->delete_image($request->image,'setting','originals');
            $url = $this->upload($request->image,50,50,50,'setting') ;
            $Setting->favicon = $url['original'];
        }
        $Setting->save();
        return redirect()->route('settings')->with('success','Se actualizo correctamente')->withInput($request->input());
    }

}
