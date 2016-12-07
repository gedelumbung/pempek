<?php

namespace Simpeg\Http\Controllers\Backend;

use Simpeg\Http\Controllers\Controller;
use Simpeg\Model\Setting;
use Image;
use Illuminate\Http\Request;

/**
* Setting Controller
* @author Gede Lumbung <gedesumawijaya@gmail.com>
*/
class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:frontend');
    }
	
	public function index(Setting $setting)
	{
		$setting = $setting->paginate(15);
		return view('backend.setting.index', compact('setting'));
	}

	public function create()
	{
		$action = 'add';
		return view('backend.setting.form', compact('action'));
	}

	public function edit($id, Setting $setting)
	{
		$action = 'edit';
		$setting = $setting->findOrFail($id);
		return view('backend.setting.form', compact('action', 'setting'));
	}

	public function store(Request $request, Setting $setting)
	{
        $this->validate($request, [
            'title' => 'required',
        ]);
        extract($request->only('title', 'content', 'action', 'id'));

        if ($action === 'add') {
        	$setting->create([
        		'title' => $title,
        		'content' => $content,
        	]);
        } elseif ($action === 'edit') {
        	$setting = $setting->findOrFail($id);
        	$setting->title = $title;
        	$setting->content = $content;
        	$setting->save();
        }
        flashy()->success('Berhasil menyimpan data.');
		return redirect(route('dashboard.settings'));
	}

	public function delete($id, Setting $setting)
	{
		$setting->findOrFail($id)->delete();
		flashy()->success('Berhasil menghapus data.');
		return redirect(route('dashboard.settings'));
	}
}