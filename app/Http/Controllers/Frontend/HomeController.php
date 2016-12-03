<?php

namespace Simpeg\Http\Controllers\Frontend;

use Simpeg\Http\Controllers\Controller;
use Simpeg\Model\Pengumuman;
use Simpeg\Model\Slider;

/**
* Home Controller
* @author Gede Lumbung <gedesumawijaya@gmail.com>
*/
class HomeController extends Controller
{
	
	public function index(Pengumuman $pengumuman, Slider $slider)
	{
		$pengumuman = $pengumuman->orderBy('created_at', 'DESC')->paginate(51);
		$sliders = $slider->get();
		return view('frontend.home.index', compact('pengumuman','sliders'));
	}
}