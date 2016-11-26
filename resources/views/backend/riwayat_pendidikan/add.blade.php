@extends("backend.layout.backend")

@section("title","Riwayat Golongan")

@section("content")

@include('backend.partial.pegawai_menu', ['id' => $id])

<section class="panel">
	<section class="panel form-wizard" id="w2">
			<form class="form-horizontal panel-body" action="{{route('dashboard.pegawai.riwayat_pendidikan.store', ['pegawai' => $id])}}" id="submit_pegawai" method="POST" enctype="multipart/form-data" novalidate="novalidate">
				<input type="hidden" name="_token" value="{{csrf_token()}}" />
				<div class="tab-content">
					<div>
						<div class="panel-body">
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Tingkat Pendidikan</label>
								<div class="col-md-9">
									<select name='tingkat_pendidikan' class="form-control" required>
									    @foreach(config('simpeg.pendidikan') as $data)
									    	<option value="{{$data}}">{{$data}}</option>
									    @endforeach
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Nama Sekolah</label>
								<div class="col-md-9">
									<input type="text" name="nama_sekolah" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Fakultas/Program Studi</label>
								<div class="col-md-9">
									<input type="text" name="fakultas" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Ijazah Pendidikan</label>
								<div class="col-md-9">
									<input type="text" name="ijazah_pendidikan" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Tanggal Lulus</label>
								<div class="col-md-9">
									<input type="text" datepicker name="tanggal_lulus" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Nama Pimpinan</label>
								<div class="col-md-9">
									<input type="text" name="nama_pimpinan" class="form-control" required>
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
