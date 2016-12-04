
@extends("backend.layout.backend")

@section("title","Laporan Konfirgurasi - Jabatan")

@section("content")
	<div class="table-responsive">
		<table class="table table-bordered" style="background-color: #fff;">
			<thead>
				<tr>
					<th rowspan="2" style="vertical-align: middle;text-align: center">No</th>
					<th rowspan="2" style="vertical-align: middle;text-align: center">Nama Struktural</th>
					<th colspan="4" style="vertical-align: middle;text-align: center">Pejabat Struktural</th>
					<th rowspan="2" style="vertical-align: middle;text-align: center">Jumlah</th>
					<th colspan="4" style="vertical-align: middle;text-align: center">Pejabat Fungsional</th>
					<th rowspan="2" style="vertical-align: middle;text-align: center">Jumlah</th>
					<th colspan="4" style="vertical-align: middle;text-align: center">Jumlah</th>
					<th rowspan="2" style="vertical-align: middle;text-align: center">Jumlah Total</th>
				</tr>
				<tr>
					<th style="vertical-align: middle;text-align: center">GOL. I</th>
					<th style="vertical-align: middle;text-align: center">GOL. II</th>
					<th style="vertical-align: middle;text-align: center">GOL. III</th>
					<th style="vertical-align: middle;text-align: center">GOL. IV</th>
					<th style="vertical-align: middle;text-align: center">GOL. I</th>
					<th style="vertical-align: middle;text-align: center">GOL. II</th>
					<th style="vertical-align: middle;text-align: center">GOL. III</th>
					<th style="vertical-align: middle;text-align: center">GOL. IV</th>
					<th style="vertical-align: middle;text-align: center">GOL. I</th>
					<th style="vertical-align: middle;text-align: center">GOL. II</th>
					<th style="vertical-align: middle;text-align: center">GOL. III</th>
					<th style="vertical-align: middle;text-align: center">GOL. IV</th>
				</tr>
			</thead>
			<tbody>
				@foreach($unit_kerja as $key=>$unit)
					@php
						$count_1 = $unit->countParentPegawaiByJabatan('struktural', $unit->id, [1,2,3,4])+$unit->countParentPegawaiByJabatan('struktural', $unit->id, [5,6,7,8])+$unit->countParentPegawaiByJabatan('struktural', $unit->id, [9,10,11,12])+$unit->countParentPegawaiByJabatan('struktural', $unit->id, [13,14,15,16,17]);
						$count_2 = $unit->countParentPegawaiByJabatan('', $unit->id, [1,2,3,4])+$unit->countParentPegawaiByJabatan('', $unit->id, [5,6,7,8])+$unit->countParentPegawaiByJabatan('', $unit->id, [9,10,11,12])+$unit->countParentPegawaiByJabatan('', $unit->id, [13,14,15,16,17]);

						$count_gol_1 = $unit->countParentPegawaiByJabatan('struktural', $unit->id, [1,2,3,4])+$unit->countParentPegawaiByJabatan('', $unit->id, [1,2,3,4]);
						$count_gol_2 = $unit->countParentPegawaiByJabatan('struktural', $unit->id, [5,6,7,8])+$unit->countParentPegawaiByJabatan('', $unit->id, [5,6,7,8]);
						$count_gol_3 = $unit->countParentPegawaiByJabatan('struktural', $unit->id, [9,10,11,12])+$unit->countParentPegawaiByJabatan('', $unit->id, [9,10,11,12]);
						$count_gol_4 = $unit->countParentPegawaiByJabatan('struktural', $unit->id, [13,14,15,16,17])+$unit->countParentPegawaiByJabatan('', $unit->id, [13,14,15,16,17]);

						$parent_level = ($key > 0) ? 1 : 0;
						$list_jabatan_parent = $unit->list_jabatan_level($unit->id, 0);
						$list_jabatan_sub = $unit->list_jabatan_level($unit->id, $parent_level);
					@endphp
					<tr style="background-color: #efefef; font-weight: bold;">
						<td style="vertical-align: middle;text-align: center">{{$key+1}}</td>
						<td style="vertical-align: middle;">{{$unit->title}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByJabatan('struktural', $unit->id, [1,2,3,4])}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByJabatan('struktural', $unit->id, [5,6,7,8])}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByJabatan('struktural', $unit->id, [9,10,11,12])}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByJabatan('struktural', $unit->id, [13,14,15,16,17])}}</td>
						<td style="vertical-align: middle;">{{$count_1}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByJabatan('', $unit->id, [1,2,3,4])}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByJabatan('', $unit->id, [5,6,7,8])}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByJabatan('', $unit->id, [9,10,11,12])}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByJabatan('', $unit->id, [13,14,15,16,17])}}</td>
						<td style="vertical-align: middle;">{{$count_2}}</td>
						<td style="vertical-align: middle;">{{$count_gol_1}}</td>
						<td style="vertical-align: middle;">{{$count_gol_2}}</td>
						<td style="vertical-align: middle;">{{$count_gol_3}}</td>
						<td style="vertical-align: middle;">{{$count_gol_4}}</td>
						<td style="vertical-align: middle;">{{$count_gol_1+$count_gol_2+$count_gol_3+$count_gol_4}}</td>
					</tr>
					@foreach($unit->sub_unit_kerja as $key_sub=>$sub_unit)
						@if($key > 0)
						@php
							$jabatan_sub_id = ($key > 0) ? $list_jabatan_sub[$key_sub] : $list_jabatan_sub[0];

							$count_1 = $unit->countSubPegawaiByJabatan('struktural', $jabatan_sub_id, [1,2,3,4])+$unit->countSubPegawaiByJabatan('struktural', $jabatan_sub_id, [5,6,7,8])+$unit->countSubPegawaiByJabatan('struktural', $jabatan_sub_id, [9,10,11,12])+$unit->countSubPegawaiByJabatan('struktural', $jabatan_sub_id, [13,14,15,16,17]);
							$count_2 = $unit->countSubPegawaiByJabatan('', $jabatan_sub_id, [1,2,3,4])+$unit->countSubPegawaiByJabatan('', $jabatan_sub_id, [5,6,7,8])+$unit->countSubPegawaiByJabatan('', $jabatan_sub_id, [9,10,11,12])+$unit->countSubPegawaiByJabatan('', $jabatan_sub_id, [13,14,15,16,17]);

							$count_gol_1 = $unit->countSubPegawaiByJabatan('struktural', $jabatan_sub_id, [1,2,3,4])+$unit->countSubPegawaiByJabatan('', $jabatan_sub_id, [1,2,3,4]);
							$count_gol_2 = $unit->countSubPegawaiByJabatan('struktural', $jabatan_sub_id, [5,6,7,8])+$unit->countSubPegawaiByJabatan('', $jabatan_sub_id, [5,6,7,8]);
							$count_gol_3 = $unit->countSubPegawaiByJabatan('struktural', $jabatan_sub_id, [9,10,11,12])+$unit->countSubPegawaiByJabatan('', $jabatan_sub_id, [9,10,11,12]);
							$count_gol_4 = $unit->countSubPegawaiByJabatan('struktural', $jabatan_sub_id, [13,14,15,16,17])+$unit->countSubPegawaiByJabatan('', $jabatan_sub_id, [13,14,15,16,17]);
						@endphp
						<tr>
							<td style="vertical-align: middle;text-align: center">{{$key_sub+1}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->title}}</td>
							<td style="vertical-align: middle;">{{$unit->countSubPegawaiByJabatan('struktural', $jabatan_sub_id, [1,2,3,4])}}</td>
							<td style="vertical-align: middle;">{{$unit->countSubPegawaiByJabatan('struktural', $jabatan_sub_id, [5,6,7,8])}}</td>
							<td style="vertical-align: middle;">{{$unit->countSubPegawaiByJabatan('struktural', $jabatan_sub_id, [9,10,11,12])}}</td>
							<td style="vertical-align: middle;">{{$unit->countSubPegawaiByJabatan('struktural', $jabatan_sub_id, [13,14,15,16,17])}}</td>
							<td style="vertical-align: middle;">{{$count_1}}</td>
							<td style="vertical-align: middle;">{{$unit->countSubPegawaiByJabatan('', $jabatan_sub_id, [1,2,3,4])}}</td>
							<td style="vertical-align: middle;">{{$unit->countSubPegawaiByJabatan('', $jabatan_sub_id, [5,6,7,8])}}</td>
							<td style="vertical-align: middle;">{{$unit->countSubPegawaiByJabatan('', $jabatan_sub_id, [9,10,11,12])}}</td>
							<td style="vertical-align: middle;">{{$unit->countSubPegawaiByJabatan('', $jabatan_sub_id, [13,14,15,16,17])}}</td>
							<td style="vertical-align: middle;">{{$count_2}}</td>
							<td style="vertical-align: middle;">{{$count_gol_1}}</td>
							<td style="vertical-align: middle;">{{$count_gol_2}}</td>
							<td style="vertical-align: middle;">{{$count_gol_3}}</td>
							<td style="vertical-align: middle;">{{$count_gol_4}}</td>
							<td style="vertical-align: middle;">{{$count_gol_1+$count_gol_2+$count_gol_3+$count_gol_4}}</td>
						</tr>
						@endif
					@endforeach
				@endforeach
			</tbody>
		</table>
	</div>

@endsection