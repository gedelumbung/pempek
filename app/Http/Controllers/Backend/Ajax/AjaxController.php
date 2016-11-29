<?php

namespace Simpeg\Http\Controllers\Backend\Ajax;

use Simpeg\Http\Controllers\Controller;
use Simpeg\Model\UnitKerja;
use Simpeg\Model\SatuanKerja;
use Simpeg\Model\JabatanStruktural;
use Illuminate\Http\Request;

/**
* Ajax Controller
* @author Gede Lumbung <gedesumawijaya@gmail.com>
*/
class AjaxController extends Controller
{
	
	public function postSubUnitKerja(Request $request)
	{
		extract($request->only('unit_kerja_id'));

		if ($unit_kerja_id === '1') {
			return response([], 200);
		}

		$sub_unit_kerja = UnitKerja::where('parent_id', $unit_kerja_id)->get();
		return response($sub_unit_kerja, 200);
	}

	public function postSatuanKerja(Request $request)
	{
		extract($request->only('sub_unit_kerja_id'));

		$satuan_kerja = SatuanKerja::where('unit_kerja_id', $sub_unit_kerja_id)->get();
		return response($satuan_kerja, 200);
	}

	public function postJabatanStruktural(Request $request)
	{
		extract($request->only('satuan_kerja_id'));
		
		$jabatan_struktural = JabatanStruktural::where('satuan_kerja_id', $satuan_kerja_id)->get();
		return response($jabatan_struktural, 200);
	}

	public function postJabatanStrukturalDetail(Request $request)
	{
		extract($request->only('jabatan_struktural_id'));
		
		$jabatan_struktural = JabatanStruktural::where('id', $jabatan_struktural_id)->firstOrFail();
		return response($jabatan_struktural, 200);
	}
}