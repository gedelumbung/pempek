@extends("backend.layout.backend")

@section("title","Validasi Data")

@section("content")

<div class="panel panel-featured panel-featured-primary">
	<div class="panel-heading">
		<h3 class="panel-title">@yield("title")</h3>
	</div>
	
	<div class="panel-body">
		<table class="table table-striped" id="table_id">
			<thead>
				<tr>
					<th>NIP</th>
					<th>Nama</th>
					<th>Updated At</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($pegawai as $key => $data)
				<tr>
					<td>{{$data->nip}}</td>
					<td>{{($data->gelar_depan != '-' ? $data->gelar_depan : '')}} {{$data->nama_lengkap}}{{($data->gelar_belakang != '' ? ',' : '')}} {{($data->gelar_belakang != '' ? $data->gelar_belakang : '')}}</td>
					<td>{{$data->updated_at}}</td>
					<td>Pending</td>
					<td>
	        			<a href="{{ route('dashboard.validasi_data.show', ['pegawai' => $data->pegawai_id]) }}" class="btn btn-primary btn-sm" title="Detail Pegawai">
	        				<i class="glyphicon glyphicon-eye-open"></i> Lihat Data
	        			</a>
	        			@if($data->enableApprove($data->pegawai_id))
	        			<a href="{{ route('dashboard.validasi_data.approve_all', ['pegawai' => $data->pegawai_id]) }}" class="btn btn-success btn-sm" title="Detail Pegawai">
	        				<i class="glyphicon glyphicon-check"></i> Approve Data
	        			</a>
	        			@endif
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