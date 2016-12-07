<?php

namespace Simpeg\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Simpeg\Model\Setting;
use Cache;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function callAction($method=null, $param=null) {
    	Cache::flush();
    	$settings = Setting::get();
    	foreach ($settings as $key => $value) {
    		Cache::put(str_replace(" ", "", $value->title), $value->content, 1400);
    	}

        return call_user_func_array([$this, $method], $param);
    }
}
