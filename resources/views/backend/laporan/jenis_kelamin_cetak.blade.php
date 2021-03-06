<?php
if ($type == 'excel') {
	$nama_file = "laporan-konfirgurasi-jenis-kelamin-".date('d-M-Y').".xls";
	header("Pragma: public");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
	header("Content-Type: application/force-download");
	header("Content-Type: application/octet-stream");
	header("Content-Type: application/download");
	header("Content-Disposition: attachment;filename=".$nama_file."");  header("Content-Transfer-Encoding: binary "); 
} else {
	?>
		<script>
			window.print();
		</script>
	<?php
}
?>
<style type="text/css">
	html, table{
		font-size: 12px;
		border-collapse: collapse;
		font-family: Arial;
	}
	td{
		vertical-align: top;
		padding: 5px 10px;
	}
</style>
<table class="table table-bordered" style="background-color: #fff;" border="1">
		<tr>
			<th rowspan="2" style="vertical-align: middle;text-align: center">No</th>
			<th rowspan="2" style="vertical-align: middle;text-align: center">Nama Struktural</th>
			<th colspan="2" style="vertical-align: middle;text-align: center">Golongan I</th>
			<th rowspan="2" style="vertical-align: middle;text-align: center">Jumlah</th>
			<th colspan="2" style="vertical-align: middle;text-align: center">Golongan II</th>
			<th rowspan="2" style="vertical-align: middle;text-align: center">Jumlah</th>
			<th colspan="2" style="vertical-align: middle;text-align: center">Golongan III</th>
			<th rowspan="2" style="vertical-align: middle;text-align: center">Jumlah</th>
			<th colspan="2" style="vertical-align: middle;text-align: center">Golongan IV</th>
			<th rowspan="2" style="vertical-align: middle;text-align: center">Jumlah</th>
			<th colspan="3" style="vertical-align: middle;text-align: center">Jumlah Total</th>
		</tr>
		<tr>
			<th style="vertical-align: middle;text-align: center">Laki-Laki</th>
			<th style="vertical-align: middle;text-align: center">Perempuan</th>
			<th style="vertical-align: middle;text-align: center">Laki-Laki</th>
			<th style="vertical-align: middle;text-align: center">Perempuan</th>
			<th style="vertical-align: middle;text-align: center">Laki-Laki</th>
			<th style="vertical-align: middle;text-align: center">Perempuan</th>
			<th style="vertical-align: middle;text-align: center">Laki-Laki</th>
			<th style="vertical-align: middle;text-align: center">Perempuan</th>
			<th style="vertical-align: middle;text-align: center">Laki-Laki</th>
			<th style="vertical-align: middle;text-align: center">Perempuan</th>
			<th style="vertical-align: middle;text-align: center">Pegawai</th>
		</tr>
		@foreach($unit_kerja as $key=>$unit)
			@php
				$parent_level = ($key > 0) ? 1 : 0;
				$list_jabatan_sub = $unit->list_jabatan_level($unit->id, $parent_level);

				$count_1 = $unit->countParentPegawaiByJenisKelamin($unit->id, [1,2,3,4], 'Laki-Laki')+$unit->countParentPegawaiByJenisKelamin($unit->id, [1,2,3,4], 'Perempuan');
				$count_2 = $unit->countParentPegawaiByJenisKelamin($unit->id, [5,6,7,8], 'Laki-Laki')+$unit->countParentPegawaiByJenisKelamin($unit->id, [5,6,7,8], 'Perempuan');
				$count_3 = $unit->countParentPegawaiByJenisKelamin($unit->id, [9,10,11,12], 'Laki-Laki')+$unit->countParentPegawaiByJenisKelamin($unit->id, [9,10,11,12], 'Perempuan');
				$count_4 = $unit->countParentPegawaiByJenisKelamin($unit->id, [13,14,15,16,17], 'Laki-Laki')+$unit->countParentPegawaiByJenisKelamin($unit->id, [13,14,15,16,17], 'Perempuan');

				$count_pria = $unit->countParentPegawaiByJenisKelamin($unit->id, [1,2,3,4], 'Laki-Laki')+$unit->countParentPegawaiByJenisKelamin($unit->id, [5,6,7,8], 'Laki-Laki')+$unit->countParentPegawaiByJenisKelamin($unit->id, [9,10,11,12], 'Laki-Laki')+$unit->countParentPegawaiByJenisKelamin($unit->id, [13,14,15,16,17], 'Laki-Laki');

				$count_wanita = $unit->countParentPegawaiByJenisKelamin($unit->id, [1,2,3,4], 'Perempuan')+$unit->countParentPegawaiByJenisKelamin($unit->id, [5,6,7,8], 'Perempuan')+$unit->countParentPegawaiByJenisKelamin($unit->id, [9,10,11,12], 'Perempuan')+$unit->countParentPegawaiByJenisKelamin($unit->id, [13,14,15,16,17], 'Perempuan');
			@endphp
			<tr style="background-color: #efefef; font-weight: bold;">
				<td style="vertical-align: middle;text-align: center">{{$key+1}}</td>
				<td style="vertical-align: middle;">{{$unit->title}}</td>
				<td style="vertical-align: middle;">{{$unit->countParentPegawaiByJenisKelamin($unit->id, [1,2,3,4], 'Laki-Laki')}}</td>
				<td style="vertical-align: middle;">{{$unit->countParentPegawaiByJenisKelamin($unit->id, [1,2,3,4], 'Perempuan')}}</td>
				<td style="vertical-align: middle;">{{$count_1}}</td>
				<td style="vertical-align: middle;">{{$unit->countParentPegawaiByJenisKelamin($unit->id, [5,6,7,8], 'Laki-Laki')}}</td>
				<td style="vertical-align: middle;">{{$unit->countParentPegawaiByJenisKelamin($unit->id, [5,6,7,8], 'Perempuan')}}</td>
				<td style="vertical-align: middle;">{{$count_2}}</td>
				<td style="vertical-align: middle;">{{$unit->countParentPegawaiByJenisKelamin($unit->id, [9,10,11,12], 'Laki-Laki')}}</td>
				<td style="vertical-align: middle;">{{$unit->countParentPegawaiByJenisKelamin($unit->id, [9,10,11,12], 'Perempuan')}}</td>
				<td style="vertical-align: middle;">{{$count_3}}</td>
				<td style="vertical-align: middle;">{{$unit->countParentPegawaiByJenisKelamin($unit->id, [13,14,15,16,17], 'Laki-Laki')}}</td>
				<td style="vertical-align: middle;">{{$unit->countParentPegawaiByJenisKelamin($unit->id, [13,14,15,16,17], 'Perempuan')}}</td>
				<td style="vertical-align: middle;">{{$count_4}}</td>
				<td style="vertical-align: middle;">{{$count_pria}}</td>
				<td style="vertical-align: middle;">{{$count_wanita}}</td>
				<td style="vertical-align: middle;">{{$count_pria+$count_wanita}}</td>
			</tr>
			@foreach($unit->sub_unit_kerja as $key_sub=>$sub_unit)
				@if($key > 0)
				@php
					$jabatan_sub_id = ($key > 0) ? $list_jabatan_sub[$key_sub] : $list_jabatan_sub[0];

					$count_1 = $unit->countSubPegawaiByJenisKelamin($jabatan_sub_id, [1,2,3,4], 'Laki-Laki')+$unit->countSubPegawaiByJenisKelamin($jabatan_sub_id, [1,2,3,4], 'Perempuan');
					$count_2 = $unit->countSubPegawaiByJenisKelamin($jabatan_sub_id, [5,6,7,8], 'Laki-Laki')+$unit->countSubPegawaiByJenisKelamin($jabatan_sub_id, [5,6,7,8], 'Perempuan');
					$count_3 = $unit->countSubPegawaiByJenisKelamin($jabatan_sub_id, [9,10,11,12], 'Laki-Laki')+$unit->countSubPegawaiByJenisKelamin($jabatan_sub_id, [9,10,11,12], 'Perempuan');
					$count_4 = $unit->countSubPegawaiByJenisKelamin($jabatan_sub_id, [13,14,15,16,17], 'Laki-Laki')+$unit->countSubPegawaiByJenisKelamin($jabatan_sub_id, [13,14,15,16,17], 'Perempuan');

					$count_pria = $unit->countSubPegawaiByJenisKelamin($jabatan_sub_id, [1,2,3,4], 'Laki-Laki')+$unit->countSubPegawaiByJenisKelamin($jabatan_sub_id, [5,6,7,8], 'Laki-Laki')+$unit->countSubPegawaiByJenisKelamin($jabatan_sub_id, [9,10,11,12], 'Laki-Laki')+$unit->countSubPegawaiByJenisKelamin($jabatan_sub_id, [13,14,15,16,17], 'Laki-Laki');

					$count_wanita = $unit->countSubPegawaiByJenisKelamin($jabatan_sub_id, [1,2,3,4], 'Perempuan')+$unit->countSubPegawaiByJenisKelamin($jabatan_sub_id, [5,6,7,8], 'Perempuan')+$unit->countSubPegawaiByJenisKelamin($jabatan_sub_id, [9,10,11,12], 'Perempuan')+$unit->countSubPegawaiByJenisKelamin($jabatan_sub_id, [13,14,15,16,17], 'Perempuan');
				@endphp
				<tr>
					<td style="vertical-align: middle;text-align: center">{{$key_sub+1}}</td>
					<td style="vertical-align: middle;">{{$sub_unit->title}}</td>
					<td style="vertical-align: middle;">{{$unit->countSubPegawaiByJenisKelamin($jabatan_sub_id, [1,2,3,4], 'Laki-Laki')}}</td>
					<td style="vertical-align: middle;">{{$unit->countSubPegawaiByJenisKelamin($jabatan_sub_id, [1,2,3,4], 'Perempuan')}}</td>
					<td style="vertical-align: middle;">{{$count_1}}</td>
					<td style="vertical-align: middle;">{{$unit->countSubPegawaiByJenisKelamin($jabatan_sub_id, [5,6,7,8], 'Laki-Laki')}}</td>
					<td style="vertical-align: middle;">{{$unit->countSubPegawaiByJenisKelamin($jabatan_sub_id, [5,6,7,8], 'Perempuan')}}</td>
					<td style="vertical-align: middle;">{{$count_2}}</td>
					<td style="vertical-align: middle;">{{$unit->countSubPegawaiByJenisKelamin($jabatan_sub_id, [9,10,11,12], 'Laki-Laki')}}</td>
					<td style="vertical-align: middle;">{{$unit->countSubPegawaiByJenisKelamin($jabatan_sub_id, [9,10,11,12], 'Perempuan')}}</td>
					<td style="vertical-align: middle;">{{$count_3}}</td>
					<td style="vertical-align: middle;">{{$unit->countSubPegawaiByJenisKelamin($jabatan_sub_id, [13,14,15,16,17], 'Laki-Laki')}}</td>
					<td style="vertical-align: middle;">{{$unit->countSubPegawaiByJenisKelamin($jabatan_sub_id, [13,14,15,16,17], 'Perempuan')}}</td>
					<td style="vertical-align: middle;">{{$count_4}}</td>
					<td style="vertical-align: middle;">{{$count_pria}}</td>
					<td style="vertical-align: middle;">{{$count_wanita}}</td>
					<td style="vertical-align: middle;">{{$count_pria+$count_wanita}}</td>
				</tr>
				@endif
			@endforeach
		@endforeach
</table>