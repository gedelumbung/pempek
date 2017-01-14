@extends("backend.layout.backend")

@section("title","Laporan Alert Pensiun")

@section("content")
<div class="table-responsive">
	<table class="table table-bordered" style="zoom:80%">
		<thead style="background:#eaeaea">
			<tr>
				<th width="180">NIP</th>
				<th width="180">Nama</th>
				<th>Unit Kerja</th>
				<th>Jenis Jabatan</th>
				<th>Nama Jabatan</th>
				<th>Kedudukan PNS</th>
				<th>Tanggal Pensiun</th>
			</tr>
		</thead>
		<tbody>
			@foreach($pegawai as $key=>$data)
				<tr>
					<td>{{$data->nip}}</td>
					<td>{{($data->gelar_depan != '-' ? $data->gelar_depan : '')}} {{$data->nama_lengkap}}{{($data->gelar_belakang != '' ? ',' : '')}} {{($data->gelar_belakang != '' ? $data->gelar_belakang : '')}}</td>
					<td>
						@if(!empty($data->unit_kerja_id))
							{{$data->unit_kerja->title}}
						@endif
					</td>
					<td>{{$data->jenis_jabatan}}</td>
					<td>
						@if(!empty($data->jabatan_fungsional_tertentu))
							{{$data->jabatan_fungsional_tertentu}}
						@elseif(!empty($data->jabatan_fungsional_umum))
							{{$data->jabatan_fungsional_umum}}
						@elseif(!empty($data->jabatan_struktural_id))
							{{$data->jabatan_struktural->title}}
						@endif
					</td>
					<td>
						{{$data->kedudukan_pns}}
					</td>
					<td>
						{{indonesian_date($data->pensiun())}}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

@endsection