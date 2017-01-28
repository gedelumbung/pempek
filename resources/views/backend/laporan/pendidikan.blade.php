@extends("backend.layout.backend")

@section("title","Laporan Konfirgurasi - Pendidikan")

@section("content")
<a href="{{route('dashboard.laporan.pendidikan.cetak', ['type' => 'excel'])}}" class="btn btn-danger">Export to Excel</a>
<a href="{{route('dashboard.laporan.pendidikan.cetak', ['type' => 'print'])}}" class="btn btn-danger">Print</a>
	<div class="table-responsive">
		<table class="table table-bordered" style="background-color: #fff;">
			<thead>
				<tr>
					<th rowspan="2" style="vertical-align: middle;text-align: center">No</th>
					<th rowspan="2" style="vertical-align: middle;text-align: center">Nama Struktural</th>
					<th colspan="3" style="vertical-align: middle;text-align: center">Pendidikan</th>
					<th rowspan="2" style="vertical-align: middle;text-align: center">Jumlah</th>
					<th colspan="2" style="vertical-align: middle;text-align: center">Pendidikan</th>
					<th rowspan="2" style="vertical-align: middle;text-align: center">Jumlah</th>
					<th colspan="3" style="vertical-align: middle;text-align: center">Pendidikan</th>
					<th rowspan="2" style="vertical-align: middle;text-align: center">Jumlah</th>
					<th rowspan="2" style="vertical-align: middle;text-align: center">Total Jumlah</th>
				</tr>
				<tr>
					<th style="vertical-align: middle;text-align: center">SD</th>
					<th style="vertical-align: middle;text-align: center">SLTP</th>
					<th style="vertical-align: middle;text-align: center">SLTA</th>
					<th style="vertical-align: middle;text-align: center">D3</th>
					<th style="vertical-align: middle;text-align: center">D4</th>
					<th style="vertical-align: middle;text-align: center">S.1</th>
					<th style="vertical-align: middle;text-align: center">S.2</th>
					<th style="vertical-align: middle;text-align: center">S.3</th>
				</tr>
			</thead>
			<tbody>
				@foreach($unit_kerja as $key=>$unit)
					@php
						$count_1 = $unit->countParentPegawaiByPendidikan($unit->id,'SD')+$unit->countParentPegawaiByPendidikan($unit->id,'SLTP')+$unit->countParentPegawaiByPendidikan($unit->id,'SLTA');
						$count_2 = $unit->countParentPegawaiByPendidikan($unit->id,'D.III/Sarmud/Akademi')+$unit->countParentPegawaiByPendidikan($unit->id,'D.IV');
						$count_3 = $unit->countParentPegawaiByPendidikan($unit->id,'S.1')+$unit->countParentPegawaiByPendidikan($unit->id,'S.2')+$unit->countParentPegawaiByPendidikan($unit->id,'S.3');

						$parent_level = ($key > 0) ? 1 : 0;
						$list_jabatan_sub = $unit->list_jabatan_level($unit->id, $parent_level);
					@endphp
					<tr style="background-color: #efefef; font-weight: bold;">
						<td style="vertical-align: middle;text-align: center">{{$key+1}}</td>
						<td style="vertical-align: middle;">{{$unit->title}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByPendidikan($unit->id,'SD')}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByPendidikan($unit->id,'SLTP')}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByPendidikan($unit->id,'SLTA')}}</td>
						<td style="vertical-align: middle;">{{$count_1}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByPendidikan($unit->id,'D.III/Sarmud/Akademi')}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByPendidikan($unit->id,'D.IV')}}</td>
						<td style="vertical-align: middle;">{{$count_2}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByPendidikan($unit->id,'S.1')}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByPendidikan($unit->id,'S.2')}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByPendidikan($unit->id,'S.3')}}</td>
						<td style="vertical-align: middle;">{{$count_3}}</td>
						<td style="vertical-align: middle;">{{$count_1+$count_2+$count_3}}</td>
					</tr>
					@foreach($unit->sub_unit_kerja as $key_sub=>$sub_unit)
						@if($key > 0)
						@php
							$jabatan_sub_id = ($key > 0) ? $list_jabatan_sub[$key_sub] : $list_jabatan_sub[0];

							$count_1 = $sub_unit->countSubPegawaiByPendidikan($jabatan_sub_id,'SD')+$sub_unit->countSubPegawaiByPendidikan($jabatan_sub_id,'SLTP')+$sub_unit->countSubPegawaiByPendidikan($jabatan_sub_id,'SLTA');
							$count_2 = $sub_unit->countSubPegawaiByPendidikan($jabatan_sub_id,'D.III/Sarmud/Akademi')+$sub_unit->countSubPegawaiByPendidikan($jabatan_sub_id,'D.IV');
							$count_3 = $sub_unit->countSubPegawaiByPendidikan($jabatan_sub_id,'S.1')+$sub_unit->countSubPegawaiByPendidikan($jabatan_sub_id,'S.2')+$sub_unit->countSubPegawaiByPendidikan($jabatan_sub_id,'S.3');
						@endphp
						<tr>
							<td style="vertical-align: middle;text-align: center">{{$key_sub+1}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->title}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByPendidikan($jabatan_sub_id,'SD')}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByPendidikan($jabatan_sub_id,'SLTP')}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByPendidikan($jabatan_sub_id,'SLTA')}}</td>
							<td style="vertical-align: middle;">{{$count_1}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByPendidikan($jabatan_sub_id,'D.III/Sarmud/Akademi')}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByPendidikan($jabatan_sub_id,'D.IV')}}</td>
							<td style="vertical-align: middle;">{{$count_2}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByPendidikan($jabatan_sub_id,'S.1')}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByPendidikan($jabatan_sub_id,'S.2')}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByPendidikan($jabatan_sub_id,'S.3')}}</td>
							<td style="vertical-align: middle;">{{$count_3}}</td>
							<td style="vertical-align: middle;">{{$count_1+$count_2+$count_3}}</td>
						</tr>
						@endif
					@endforeach
				@endforeach
			</tbody>
		</table>
	</div>

@endsection