@extends("backend.layout.backend")

@section("title","Riwayat Diklat")

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
					<th>No</th>
					<th>Nama Diklat</th>
					<th>Nomor Sertifikat</th>
					<th>Tahun</th>
					<th>Jumlah Jam</th>
					<th><a href="{{route('dashboard.pegawai.riwayat_diklat.create', ['pegawai' => $id])}}" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Add New</a></th>
				</tr>
				<tbody>
					@foreach($riwayat as $key => $data)
						<form method="POST" action="{{route('dashboard.pegawai.riwayat_diklat.store', ['id' => $id])}}">
						{!! csrf_field() !!}
						<input type="hidden" name="status" value="edit">
						<input type="hidden" name="pegawai_id" value="{{$data->pegawai_id}}">
						<input type="hidden" name="id" value="{{$data->id}}">
						<tr>
							<td>{{$key+1}}</td>
							<td><input type="text" name="nama_diklat" class="form-control" value="{{$data->nama_diklat}}" required></td>
							<td><input type="text" name="nomor_sertifikat" class="form-control" value="{{$data->nomor_sertifikat}}" required></td>
							<td><input type="number" name="tahun" class="form-control" value="{{$data->tahun}}" required></td>
							<td><input type="text" class="form-control" name="jumlah_jam" value="{{$data->jumlah_jam}}" required></td>
							<td width="200">
								<input type="submit" value="Save" class="btn btn-sm btn-success">
								<input type="reset" value="Cancel" class="btn btn-sm btn-warning">
								<a href="{{route('dashboard.pegawai.riwayat_diklat.delete', ['pegawai' => $id, 'id' => $data->id])}}" class="btn btn-sm btn-danger">Delete</a>
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
