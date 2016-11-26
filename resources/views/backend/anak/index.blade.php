@extends("backend.layout.backend")

@section("title","Anak")

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
					<th>Nama</th>
					<th>Tempat Lahir</th>
					<th>Tanggal Lahir</th>
					<th>Jenis Kelamin</th>
					<th>Pendidikan</th>
					<th>Pekerjaan</th>
					<th>Agama</th>
					<th>Status</th>
					<th>Alamat</th>
					<th>Telepon</th>
					<th><a href="{{route('dashboard.pegawai.anak.create', ['pegawai' => $id])}}" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Add New</a></th>
				</tr>
				<tbody>
					@foreach($anak as $key => $data)
						<form method="POST" action="{{route('dashboard.pegawai.anak.store', ['id' => $id])}}">
						{!! csrf_field() !!}
						<input type="hidden" name="status" value="edit">
						<input type="hidden" name="pegawai_id" value="{{$data->pegawai_id}}">
						<input type="hidden" name="id" value="{{$data->id}}">
						<tr>
							<td>{{$key+1}}</td>
							<td><input type="text" name="nama" class="form-control" value="{{$data->nama}}" required></td>
							<td><input type="text" name="tempat_lahir" class="form-control" value="{{$data->tempat_lahir}}" required></td>
							<td><input type="text" datepicker name="tanggal_lahir" class="form-control" value="{{$data->tanggal_lahir}}" required></td>
							<td>
								<select select2 name="jenis_kelamin" class="form-control" required>
									@foreach(config('simpeg.jenis_kelamin') as $jenis_kelamin)
										@if($data->jenis_kelamin == $jenis_kelamin)
										<option value="{{$jenis_kelamin}}" selected>{{$jenis_kelamin}}</option>
										@else
										<option value="{{$jenis_kelamin}}">{{$jenis_kelamin}}</option>
										@endif
									@endforeach
								</select>
							</td>
							<td>
								<select select2 name="pendidikan" class="form-control" required>
									@foreach(config('simpeg.pendidikan') as $pendidikan)
										@if($data->pendidikan == $pendidikan)
										<option value="{{$pendidikan}}" selected>{{$pendidikan}}</option>
										@else
										<option value="{{$pendidikan}}">{{$pendidikan}}</option>
										@endif
									@endforeach
								</select>
							</td>
							<td><input type="text" name="pekerjaan" class="form-control" value="{{$data->pekerjaan}}" required></td>
							<td>
								<select select2 name="agama" class="form-control" required>
									@foreach(config('simpeg.agama') as $agama)
										@if($data->agama == $agama)
										<option value="{{$agama}}" selected>{{$agama}}</option>
										@else
										<option value="{{$agama}}">{{$agama}}</option>
										@endif
									@endforeach
								</select>
							</td>
							<td>
								<label for="status_perkawinan">Status Perkawinan</label>
								<select select2 name="status_perkawinan" class="form-control" id="status_perkawinan" required>
									@foreach(config('simpeg.status_pernikahan') as $status_perkawinan)
										@if($data->status_perkawinan == $status_perkawinan)
										<option value="{{$status_perkawinan}}" selected>{{$status_perkawinan}}</option>
										@else
										<option value="{{$status_perkawinan}}">{{$status_perkawinan}}</option>
										@endif
									@endforeach
								</select>
								<label for="status_perkawinan">Status Hidup</label>
								<select select2 name="status_hidup" class="form-control" id="status_perkawinan" required>
									@foreach(config('simpeg.status_hidup') as $status_hidup)
										@if($data->status_hidup == $status_hidup)
										<option value="{{$status_hidup}}" selected>{{$status_hidup}}</option>
										@else
										<option value="{{$status_hidup}}">{{$status_hidup}}</option>
										@endif
									@endforeach
								</select>
								<label for="status_anak">Status Anak</label>
								<select select2 name="status_anak" class="form-control" id="status_anak" required>
									@foreach(config('simpeg.status_anak') as $status_anak)
										@if($data->status_anak == $status_anak)
										<option value="{{$status_anak}}" selected>{{$status_anak}}</option>
										@else
										<option value="{{$status_anak}}">{{$status_anak}}</option>
										@endif
									@endforeach
								</select>
							</td>
							<td><input type="text" name="alamat" class="form-control" value="{{$data->alamat}}" required></td>
							<td><input type="text" name="telepon" class="form-control" value="{{$data->telepon}}" required></td>
							<td width="200">
								<input type="submit" value="Save" class="btn btn-sm btn-success">
								<input type="reset" value="Cancel" class="btn btn-sm btn-warning">
								<a href="{{route('dashboard.pegawai.anak.delete', ['pegawai' => $id, 'id' => $data->id])}}" class="btn btn-sm btn-danger">Delete</a>
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
