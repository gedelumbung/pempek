@extends("backend.layout.backend")

@section("title","Laporan Alert Pensiun")

@section("content")
<div class="panel panel-featured panel-featured-primary">
	<div class="panel-heading">
		<h3 class="panel-title">@yield("title")</h3>
	</div>
	
	<div class="panel-body">
		<table class="table table-bordered" style="zoom:80%" id="table_id">
			<thead style="background:#eaeaea">
				<tr>
					<th width="40">Nomor</th>
					<th width="180">NIP</th>
					<th width="180">Nama</th>
					<th>Jenis Jabatan</th>
					<th>Kedudukan PNS</th>
					<th>Umur</th>
					<th>Tanggal Pensiun</th>
				</tr>
			</thead>
			<tbody>
				@foreach($pegawai as $key=>$data)
				<tr>
					<td>{{$key+1}}</td>
					<td>{{$data->nip}}</td>
					<td>{{($data->gelar_depan != '-' ? $data->gelar_depan : '')}} {{$data->nama_lengkap}}{{($data->gelar_belakang != '' ? ',' : '')}} {{($data->gelar_belakang != '' ? $data->gelar_belakang : '')}}</td>
					<td>{{$data->jenis_jabatan}}</td>
					<td>
						{{$data->kedudukan_pns}}
					</td>
					<td>
						{{$data->tahun}} tahun, {{$data->bulan}} bulan
					</td>
					<td>
						{{indonesian_date($data->pensiun)}}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection

@push("script")

<script type="text/javascript">
	$(document).ready( function () {
		$('#table_id').DataTable();
	} );
</script>

@endpush