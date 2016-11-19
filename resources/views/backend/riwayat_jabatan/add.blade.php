@extends("backend.layout.backend")

@section("title","Riwayat Jabatan")

@section("content")

@include('backend.partial.pegawai_menu', ['id' => $id])

<section class="panel">
	<section class="panel form-wizard" id="w2">
			<form class="form-horizontal panel-body" action="{{route('dashboard.pegawai.riwayat_jabatan.store', ['pegawai' => $id])}}" id="submit_pegawai" method="POST" enctype="multipart/form-data" novalidate="novalidate">
				<input type="hidden" name="_token" value="{{csrf_token()}}" />
				<div class="tab-content">
					<div>
						<div class="panel-body">
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Jabatan</label>
								<div class="col-md-9">
									<select name='jabatan_struktural_id' class="form-control" required>
									    @foreach($jabatan as $data_jabatan)
									    	<option value="{{$data_jabatan->id}}">{{$data_jabatan->title}}</option>
									    @endforeach
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Unit Kerja</label>
								<div class="col-md-9">
									<select name='unit_kerja_id' class="form-control" required>
									    @foreach($unit_kerja as $data_unit_kerja)
									    	<option value="{{$data_unit_kerja->id}}">{{$data_unit_kerja->title}}</option>
									    @endforeach
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Instansi</label>
								<div class="col-md-9">
									<input type="text" name="instansi" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Nomor SK</label>
								<div class="col-md-9">
									<input type="text" name="nomor_sk" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Tanggal</label>
								<div class="col-md-9">
									<input type="date" name="tanggal" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">TMT</label>
								<div class="col-md-9">
									<input type="date" name="tmt" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Eselon</label>
								<div class="col-md-9">
									<input type="text" name="eselon" class="form-control" required>
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
