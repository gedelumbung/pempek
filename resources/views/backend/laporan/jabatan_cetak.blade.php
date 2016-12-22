<?php
$nama_file = "laporan-konfirgurasi-jabatan-".date('d-M-Y').".xls";
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Disposition: attachment;filename=".$nama_file."");  header("Content-Transfer-Encoding: binary "); 
?>
		<table class="table table-bordered" style="background-color: #fff;">
			<thead>
				<tr>
					<th rowspan="2" style="vertical-align: middle;text-align: center">No</th>
					<th rowspan="2" style="vertical-align: middle;text-align: center">Nama Struktural</th>
					<th colspan="3" style="vertical-align: middle;text-align: center">Eselon I</th>
					<th colspan="3" style="vertical-align: middle;text-align: center">Eselon II</th>
					<th colspan="3" style="vertical-align: middle;text-align: center">Eselon III</th>
					<th colspan="3" style="vertical-align: middle;text-align: center">Eselon IV</th>
				</tr>
				<tr>
					<th style="vertical-align: middle;text-align: center">FORMASI</th>
					<th style="vertical-align: middle;text-align: center">TERISI</th>
					<th style="vertical-align: middle;text-align: center">SISA</th>
					<th style="vertical-align: middle;text-align: center">FORMASI</th>
					<th style="vertical-align: middle;text-align: center">TERISI</th>
					<th style="vertical-align: middle;text-align: center">SISA</th>
					<th style="vertical-align: middle;text-align: center">FORMASI</th>
					<th style="vertical-align: middle;text-align: center">TERISI</th>
					<th style="vertical-align: middle;text-align: center">SISA</th>
					<th style="vertical-align: middle;text-align: center">FORMASI</th>
					<th style="vertical-align: middle;text-align: center">TERISI</th>
					<th style="vertical-align: middle;text-align: center">SISA</th>
				</tr>
			</thead>
			<tbody>
				@foreach($unit_kerja as $key=>$unit)
					@php
						$parent_level = ($key > 0) ? 1 : 0;
						$list_jabatan_sub = $unit->list_jabatan_level($unit->id, $parent_level);
					@endphp
					<tr style="background-color: #efefef; font-weight: bold;">
						<td style="vertical-align: middle;text-align: center">{{$key+1}}</td>
						<td style="vertical-align: middle;">{{$unit->title}}</td>
						<td style="vertical-align: middle;">{{$unit->countSubPegawaiByFormasi(true, $unit->id, 'I')}}</td>
						<td style="vertical-align: middle;">{{$unit->countSubPegawaiByTerisi(true, $unit->id, 'I')}}</td>
						<td style="vertical-align: middle;">{{$unit->countSubPegawaiByFormasi(true, $unit->id, 'I')-$unit->countSubPegawaiByTerisi(true, $unit->id, 'I')}}</td>
						<td style="vertical-align: middle;">{{$unit->countSubPegawaiByFormasi(true, $unit->id, 'II')}}</td>
						<td style="vertical-align: middle;">{{$unit->countSubPegawaiByTerisi(true, $unit->id, 'II')}}</td>
						<td style="vertical-align: middle;">{{$unit->countSubPegawaiByFormasi(true, $unit->id, 'II')-$unit->countSubPegawaiByTerisi(true, $unit->id, 'II')}}</td>
						<td style="vertical-align: middle;">{{$unit->countSubPegawaiByFormasi(true, $unit->id, 'III')}}</td>
						<td style="vertical-align: middle;">{{$unit->countSubPegawaiByTerisi(true, $unit->id, 'III')}}</td>
						<td style="vertical-align: middle;">{{$unit->countSubPegawaiByFormasi(true, $unit->id, 'III')-$unit->countSubPegawaiByTerisi(true, $unit->id, 'III')}}</td>
						<td style="vertical-align: middle;">{{$unit->countSubPegawaiByFormasi(true, $unit->id, 'IV')}}</td>
						<td style="vertical-align: middle;">{{$unit->countSubPegawaiByTerisi(true, $unit->id, 'IV')}}</td>
						<td style="vertical-align: middle;">{{$unit->countSubPegawaiByFormasi(true, $unit->id, 'IV')-$unit->countSubPegawaiByTerisi(true, $unit->id, 'IV')}}</td>
					</tr>
					@foreach($unit->sub_unit_kerja as $key_sub=>$sub_unit)
						@if($key > 0)
						@php
							$jabatan_sub_id = ($key > 0) ? $list_jabatan_sub[$key_sub] : $list_jabatan_sub[0];
						@endphp
						<tr>
							<td style="vertical-align: middle;text-align: center">{{$key_sub+1}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->title}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByFormasi(false, $jabatan_sub_id, 'I')}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByTerisi(false, $jabatan_sub_id, 'I')}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByFormasi(false, $jabatan_sub_id, 'I')-$sub_unit->countSubPegawaiByTerisi(false, $jabatan_sub_id, 'I')}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByFormasi(false, $jabatan_sub_id, 'II')}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByTerisi(false, $jabatan_sub_id, 'II')}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByFormasi(false, $jabatan_sub_id, 'II')-$sub_unit->countSubPegawaiByTerisi(false, $jabatan_sub_id, 'II')}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByFormasi(false, $jabatan_sub_id, 'III')}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByTerisi(false, $jabatan_sub_id, 'III')}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByFormasi(false, $jabatan_sub_id, 'III')-$sub_unit->countSubPegawaiByTerisi(false, $jabatan_sub_id, 'III')}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByFormasi(false, $jabatan_sub_id, 'IV')}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByTerisi(false, $jabatan_sub_id, 'IV')}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByFormasi(false, $jabatan_sub_id, 'IV')-$sub_unit->countSubPegawaiByTerisi(false, $jabatan_sub_id, 'IV')}}</td>
						</tr>
						@endif
					@endforeach
				@endforeach
			</tbody>
		</table>