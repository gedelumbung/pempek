<?php

namespace Simpeg\Http\Controllers\Frontend;

use Simpeg\Http\Controllers\Controller;

/**
* Home Controller
* @author Gede Lumbung <gedesumawijaya@gmail.com>
*/
class HomeController extends Controller
{
	
	public function index()
	{
		return view('frontend.home.index');
	}
}