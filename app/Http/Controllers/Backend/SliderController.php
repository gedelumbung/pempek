<?php

namespace Simpeg\Http\Controllers\Backend;

use Simpeg\Http\Controllers\Controller;
use Simpeg\Model\Slider;
use Image;
use Illuminate\Http\Request;

/**
* Slider Controller
* @author Gede Lumbung <gedesumawijaya@gmail.com>
*/
class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:frontend');
    }
	
	public function index(Slider $slider)
	{
		$slider = $slider->paginate(15);
		return view('backend.slider.index', compact('slider'));
	}

	public function create()
	{
		$action = 'add';
		return view('backend.slider.form', compact('action'));
	}

	public function edit($id, Slider $slider)
	{
		$action = 'edit';
		$slider = $slider->findOrFail($id);
		return view('backend.slider.form', compact('action', 'slider'));
	}

	public function store(Request $request, Slider $slider)
	{
        $this->validate($request, [
            'title' => 'required',
        ]);
        extract($request->only('title', 'image', 'action', 'id'));

        if (!empty($image)) {
	        $base64_str = substr($image, strpos($image, ",") + 1);
	        $image = base64_decode($base64_str);
	        $imageName = "slider-".time().".jpg";
	        $path = '/slider/'.$imageName;
	        $publichPath = public_path() . $path;

	        Image::make($image)->save($publichPath);
	        $image = $imageName;
        }

        if ($action === 'add') {
        	if (empty($image)) {
        		$image = '-';
        	}
        	$slider->create([
        		'title' => $title,
        		'image' => $image,
        	]);
        } elseif ($action === 'edit') {
        	$slider = $slider->findOrFail($id);
        	$slider->title = $title;
        	if (!empty($image)) {
        		$slider->image = $image;
        	}
        	$slider->save();
        }
        flashy()->success('Berhasil menyimpan data.');
		return redirect(route('dashboard.sliders'));
	}

	public function delete($id, Slider $slider)
	{
		$slider->findOrFail($id)->delete();
		flashy()->success('Berhasil menghapus data.');
		return redirect(route('dashboard.sliders'));
	}
}