<?php

namespace Simpeg\Http\Controllers\Backend;

use Simpeg\Http\Controllers\Controller;
use Simpeg\Model\Pegawai;
use Simpeg\Model\UnitKerja;
use Simpeg\Model\Golongan;
use Illuminate\Http\Request;

/**
* Pegawai Controller
* @author Gede Lumbung <gedesumawijaya@gmail.com>
*/
class PegawaiController extends Controller
{
	
	public function index(Pegawai $pegawai)
	{
		$pegawai = $pegawai->paginate(15);
		return view('backend.pegawai.index', compact('pegawai'));
	}

	public function show($id, Pegawai $pegawai)
	{
		$pegawai = $pegawai->findOrFail($id);
		return view('backend.pegawai.show', compact('pegawai'));
	}

	public function add(UnitKerja $unitKerja, Golongan $golongan)
	{
		$unit_kerja = $unitKerja->where('parent_id',0)->get();
		$golongan = $golongan->get();
		return view('backend.pegawai.add', compact('unit_kerja', 'golongan'));
	}

	public function store(Request $request, Pegawai $pegawai)
	{
		$arr = $request->except('_token');
		$pegawai->insert($arr);

		return redirect(route('dashboard.pegawai'));
	}

	public function edit(UnitKerja $unitKerja, Golongan $golongan)
	{
		$unit_kerja = $unitKerja->where('parent_id',0)->get();
		$golongan = $golongan->get();
		return view('backend.pegawai.add', compact('unit_kerja', 'golongan'));
	}

	public function delete($id, Pegawai $pegawai)
	{
		$pegawai->findOrFail($id)->delete();
		return redirect(route('dashboard.pegawai'));
	}
}