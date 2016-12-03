<?php

namespace Simpeg\Http\Controllers\Frontend;

use Simpeg\Http\Controllers\Controller;
use Simpeg\Model\Pengumuman;

/**
* Home Controller
* @author Gede Lumbung <gedesumawijaya@gmail.com>
*/
class HomeController extends Controller
{
	
	public function index(Pengumuman $pengumuman)
	{
		$pengumuman = $pengumuman->orderBy('created_at', 'DESC')->paginate(51);
		return view('frontend.home.index', compact('pengumuman'));
	}
}