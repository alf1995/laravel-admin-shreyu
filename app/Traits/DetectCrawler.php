<?php
 
namespace App\Traits;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Str;
use Jaybizzle\CrawlerDetect\CrawlerDetect;

trait DetectCrawler 
{
	public function detect_bot($bot = ''){
        $detect = new CrawlerDetect;
        if($detect->isCrawler($bot)) {
            return TRUE;  
        }else{
            return FALSE; 
        }
    }

    /*
    public function create(Request $request)
	{
	    $agent = $request->header('user-agent');
	    dd($agent);
	}
	*/
}
