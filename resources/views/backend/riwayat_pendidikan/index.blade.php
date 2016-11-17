@extends("backend.layout.backend")

@section("title","Riwayat Pendidikan")

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
					<th>Tingkat Pendidikan</th>
					<th>Nama Sekolah</th>
					<th>Fakultas</th>
					<th>Ijazah Pendidikan</th>
					<th>Tanggal Lulus</th>
					<th>Nama Pimpinan</th>
					<th><a href="{{route('dashboard.pegawai.riwayat_pendidikan.create', ['pegawai' => $id])}}" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Add New</a></th>
				</tr>
				<tbody>
					@foreach($riwayat as $key => $data)
						<form method="POST" action="{{route('dashboard.pegawai.riwayat_pendidikan.store', ['id' => $id])}}">
						{!! csrf_field() !!}
						<input type="hidden" name="status" value="edit">
						<input type="hidden" name="pegawai_id" value="{{$data->pegawai_id}}">
						<tr>
							<td>{{$key+1}}</td>
							<td>
								<input type="hidden" name="id" value="{{$data->id}}">
								<select name='tingkat_pendidikan' class="form-control" required>
								    @foreach(config('simpeg.pendidikan') as $pendidikan)
								    	@if($pendidikan == $data->tingkat_pendidikan)
								    	<option value="{{$pendidikan}}" selected>{{$pendidikan}}</option>
								    	@else
								    	<option value="{{$pendidikan}}">{{$pendidikan}}</option>
								    	@endif
								    @endforeach
								</select>
							</td>
							<td><input type="text" name="nama_sekolah" class="form-control" value="{{$data->nama_sekolah}}" required></td>
							<td><input type="text" name="fakultas" class="form-control" value="{{$data->fakultas}}" required></td>
							<td><input type="text" name="ijazah_pendidikan" class="form-control" value="{{$data->ijazah_pendidikan}}" required></td>
							<td><input type="date" class="form-control" name="tanggal_lulus" value="{{$data->tanggal_lulus}}" required></td>
							<td><input type="text" class="form-control" name="nama_pimpinan" value="{{$data->nama_pimpinan}}" required></td>
							<td width="200">
								<input type="submit" value="Save" class="btn btn-sm btn-success">
								<input type="reset" value="Cancel" class="btn btn-sm btn-warning">
								<a href="{{route('dashboard.pegawai.riwayat_pendidikan.delete', ['pegawai' => $id, 'id' => $data->id])}}" class="btn btn-sm btn-danger">Delete</a>
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
@push("script")
<script src="{{ asset("js/jquery.bootstrap.wizard.js") }}"></script>
<script src="{{ asset("js/jquery.validate.js") }}"></script>
<script src="{{ asset("js/examples.wizard.js") }}"></script>
@endpush
