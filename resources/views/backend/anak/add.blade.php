@extends("backend.layout.backend")

@section("title","Anak")

@section("content")

@include('backend.partial.pegawai_menu', ['id' => $id])

<section class="panel">
	<section class="panel form-wizard" id="w2">
			<form class="form-horizontal panel-body" action="{{route('dashboard.pegawai.anak.store', ['pegawai' => $id])}}" id="submit_pegawai" method="POST" enctype="multipart/form-data" novalidate="novalidate">
				<input type="hidden" name="_token" value="{{csrf_token()}}" />
				<div class="tab-content">
					<div>
						<div class="panel-body">
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Nama</label>
								<div class="col-md-9">
									<input type="text" name="nama" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Tempat Lahir</label>
								<div class="col-md-9">
									<input type="text" name="tempat_lahir" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Tanggal Lahir</label>
								<div class="col-md-9">
									<input type="date" name="tanggal_lahir" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Jenis Kelamin</label>
								<div class="col-md-9">
									<select select2 name="jenis_kelamin" class="form-control" required>
										@foreach(config('simpeg.jenis_kelamin') as $jenis_kelamin)
											<option value="{{$jenis_kelamin}}">{{$jenis_kelamin}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Pendidikan</label>
								<div class="col-md-9">
									<select select2 name="pendidikan" class="form-control" required>
										@foreach(config('simpeg.pendidikan') as $pendidikan)
											<option value="{{$pendidikan}}">{{$pendidikan}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Pekerjaan</label>
								<div class="col-md-9">
									<input type="text" name="pekerjaan" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Agama</label>
								<div class="col-md-9">
									<select select2 name="agama" class="form-control" required>
										@foreach(config('simpeg.agama') as $agama)
											<option value="{{$agama}}">{{$agama}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Status Perkawinan</label>
								<div class="col-md-9">
									<select select2 name="status_perkawinan" class="form-control" id="status_perkawinan" required>
										@foreach(config('simpeg.status_pernikahan') as $status_pernikahan)
											<option value="{{$status_pernikahan}}">{{$status_pernikahan}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Status Hidup</label>
								<div class="col-md-9">
									<select select2 name="status_hidup" class="form-control" id="status_hidup" required>
										@foreach(config('simpeg.status_hidup') as $status_hidup)
											<option value="{{$status_hidup}}">{{$status_hidup}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Status Anak</label>
								<div class="col-md-9">
									<select select2 name="status_anak" class="form-control" id="status_anak" required>
										@foreach(config('simpeg.status_anak') as $status_anak)
											<option value="{{$status_anak}}">{{$status_anak}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Alamat</label>
								<div class="col-md-9">
									<input type="text" name="Alamat" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Telepon</label>
								<div class="col-md-9">
									<input type="text" name="telepon" class="form-control" required>
								</div>
							</div>
							{!! csrf_field() !!}
							<input type="hidden" name="status" value="add">
							<input type="hidden" name="pegawai_id" value="{{$id}}">
							<input type="submit" value="Save" class="btn btn-sm btn-success">
						</div>
					</div>
				</div>
			</form>
	</section>
</section>

@endsection
