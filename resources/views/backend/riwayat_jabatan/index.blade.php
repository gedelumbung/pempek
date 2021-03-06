@extends("backend.layout.backend")

@section("title","Riwayat Jabatan")

@section("content")

@include('backend.partial.pegawai_menu', ['id' => $id])

<div class="panel panel-featured panel-featured-primary">
	<div class="panel-heading">
		<h3 class="panel-title">@yield("title")</h3>
	</div>
	
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-striped">
				<tr>
					<th rowspan="2">No</th>
					<th rowspan="2">Jabatan</th>
					<th rowspan="2">Unit Kerja</th>
					<th rowspan="2">Instansi</th>
					<th rowspan="2">Nomor SK</th>
					<th rowspan="2">Tanggal</th>
					<th rowspan="2">TMT</th>
					<th rowspan="2">Eselon</th>
					<th><a href="{{route('dashboard.pegawai.riwayat_jabatan.create', ['pegawai' => $id])}}" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Add New</a></th>
				</tr>
				<tbody>
					@foreach($riwayat as $key => $data)
						<form method="POST" action="{{route('dashboard.pegawai.riwayat_jabatan.store', ['id' => $id])}}">
						{!! csrf_field() !!}
						<input type="hidden" name="status" value="edit">
						<input type="hidden" name="pegawai_id" value="{{$data->pegawai_id}}">
						<input type="hidden" name="id" value="{{$data->id}}">
						<tr>
							<td>{{$key+1}}</td>
							<td><input type="text" name="jabatan_struktural" class="form-control" value="{{$data->jabatan_struktural}}" required></td>
							<td><input type="text" name="unit_kerja" class="form-control" value="{{$data->unit_kerja}}" required></td>
							<td><input type="text" name="instansi" class="form-control" value="{{$data->instansi}}" required></td>
							<td><input type="text" name="nomor_sk" class="form-control" value="{{$data->nomor_sk}}" required></td>
							<td><input type="text" data-toggle="datepicker" class="form-control" name="tanggal" value="{{$data->tanggal}}" required /></td>
							<td><input type="text" data-toggle="datepicker" class="form-control" name="tmt" value="{{$data->tmt}}" required></td>
							<td><input type="text" class="form-control" name="eselon" value="{{$data->eselon}}" required></td>
							<td width="200">
								<input type="submit" value="Save" class="btn btn-sm btn-success">
								<input type="reset" value="Cancel" class="btn btn-sm btn-warning">
								<a href="{{route('dashboard.pegawai.riwayat_jabatan.delete', ['pegawai' => $id, 'id' => $data->id])}}" class="btn btn-sm btn-danger">Delete</a>
							</td>
						</tr>
						</form>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection
