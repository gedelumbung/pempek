@extends("backend.layout.backend")

@section("title","Riwayat Penghargaan")

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
					<th>Nama Penghargaan</th>
					<th>Nomor Sertifikat</th>
					<th>Tanggal</th>
					<th>Penyelenggara</th>
					<th><a href="{{route('dashboard.pegawai.riwayat_penghargaan.create', ['pegawai' => $id])}}" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Add New</a></th>
				</tr>
				<tbody>
					@foreach($riwayat as $key => $data)
						<form method="POST" action="{{route('dashboard.pegawai.riwayat_penghargaan.store', ['id' => $id])}}">
						{!! csrf_field() !!}
						<input type="hidden" name="status" value="edit">
						<input type="hidden" name="pegawai_id" value="{{$data->pegawai_id}}">
						<input type="hidden" name="id" value="{{$data->id}}">
						<tr>
							<td>{{$key+1}}</td>
							<td><input type="text" name="nama_penghargaan" class="form-control" value="{{$data->nama_penghargaan}}" required></td>
							<td><input type="text" name="nomor_surat_keputusan" class="form-control" value="{{$data->nomor_surat_keputusan}}" required></td>
							<td><input type="text" data-toggle="datepicker" name="tanggal" class="form-control" value="{{$data->tanggal}}" required></td>
							<td><input type="text" class="form-control" name="nama_pemberi_penghargaan" value="{{$data->nama_pemberi_penghargaan}}" required></td>
							<td width="200">
								<input type="submit" value="Save" class="btn btn-sm btn-success">
								<input type="reset" value="Cancel" class="btn btn-sm btn-warning">
								<a href="{{route('dashboard.pegawai.riwayat_penghargaan.delete', ['pegawai' => $id, 'id' => $data->id])}}" class="btn btn-sm btn-danger">Delete</a>
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
