<?php
 
namespace App\Traits;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Str;

trait ImageUpload 
{

    public function upload($file,$width,$high,$widthEnd,$folder)
    {
        if ($file === "" || $file === null) {
            return ['original' => null, 'thumbnail' => null];
        }
        switch (gettype($file)) {
            case 'string':
                    return $this->uploadFromUrl($file,$width,$high,$widthEnd,$folder);
                break;
            case 'object':
                    return $this->uploadFromFile($file,$width,$high,$widthEnd,$folder);
                break;
        }
    }
 
    public function uploadFromFile($file,$width,$high,$widthEnd,$folder)
    {
        $name = time() . Str::random(7) . '.' . $file->getClientOriginalExtension();
        try
        {
            $ratio = $this->ratio($width, $high, $widthEnd);
            \Storage::disk('originals')->put($folder.'/'.$name, \File::get($file));
            $img = \Image::make($file->getRealPath());
            $img->resize($ratio['width'], $ratio['high'], function ($constraint){
            	$constraint->aspectRatio();
            });
            $img->stream(); 
            \Storage::disk('thumbnails')->put($folder.'/'.$name, $img);
        } catch (\Intervention\Image\Exception\NotWritableException $e) {
            throw new HttpResponseException(response()->error('error_saving_image_from_file', 422));
        }
        return [
        	'original'  => $name,
            'thumbnail' => $name,
            'path_original'  => "/" . "images/" . $name,
            'path_thumbnail' => "/" . "thumbnails/" . $name,
        ];
 
    }
 
    public function uploadFromUrl($file,$width,$high,$widthEnd,$folder)
    {
        $elems = explode("/", $file);
        $name = time() . Str::random(10) ;
 
        if (sizeof($elems) > 1) {
            $name = $name . array_pop($elems);
        }
        try
        {
            $ratio = $this->ratio($width, $high, $widthEnd);
            \Storage::disk('originals')->put($folder.'/'.$name, \File::get($file));
            $img = \Image::make($file->getRealPath());
            $img->resize($ratio['width'], $ratio['high'], function ($constraint){
            	$constraint->aspectRatio();
            });
            $img->stream(); 
            \Storage::disk('thumbnails')->put($folder.'/'.$name, $img);
        } catch (\Intervention\Image\Exception\NotWritableException $e) {
            throw new HttpResponseException(response()->error('error_saving_image_from_url', 422));
        }
        return [
            'original'  => $name,
            'thumbnail' => $name,
            'path_original'  => "public/images/" . $name,
            'path_thumbnail' => "/thumbnails/" . $name,
        ];
    }

    public function ratio($ratioWidth, $ratioHigh, $width){
        $getWidth = $width;
        $percentWidth = (double) round((($width*100)/$ratioWidth), 2);
        $getHigh = (int) round((($ratioHigh*$percentWidth)/100));
        $data = array(
            'width' => $getWidth, 
            'high' => $getHigh
        );
        return $data;
    }

    public function delete_image($file = '', $folder = 'images' ,$disk = 'local'){
        return \Storage::disk($disk)->delete($folder.'/'.$file);
    }
}
 
