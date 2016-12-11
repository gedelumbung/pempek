@extends("backend.layout.backend")

@section("title","Riwayat Golongan")

@section("content")

@include('backend.partial.pegawai_menu', ['id' => $id])

<section class="panel">
	<section class="panel form-wizard" id="w2">
			<form class="form-horizontal panel-body" action="{{route('dashboard.pegawai.riwayat_golongan.store', ['pegawai' => $id])}}" id="submit_pegawai" method="POST" enctype="multipart/form-data" novalidate="novalidate">
				<input type="hidden" name="_token" value="{{csrf_token()}}" />
				<div class="tab-content">
					<div>
						<div class="panel-body">
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Golongan</label>
								<div class="col-md-9">
									<select name='golongan_id' class="form-control" required>
									    @foreach($golongan as $data_golongan)
									    	<option value="{{$data_golongan->id}}">{{$data_golongan->title}} - {{$data_golongan->description}}</option>
									    @endforeach
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">TMT</label>
								<div class="col-md-9">
									<input type="text" data-toggle="datepicker" name="tmt" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Masa Kerja : Tahun</label>
								<div class="col-md-9">
									<input type="int" maxlength="4" name="masa_kerja_tahun" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Masa Kerja : Bulan</label>
								<div class="col-md-9">
									<input type="text" maxlength="2" name="masa_kerja_bulan" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Nomor SK</label>
								<div class="col-md-9">
									<input type="text" name="nomor_sk" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Tanggal SK</label>
								<div class="col-md-9">
									<input type="text" data-toggle="datepicker" name="tanggal_sk" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Nomor Persetujuan BKN</label>
								<div class="col-md-9">
									<input type="text" name="nomor_persetujuan_bkn" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Tahun Persetujuan BKN</label>
								<div class="col-md-9">
									<input type="text" maxlength="4" name="tahun_persetujuan_bkn" class="form-control" required>
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
