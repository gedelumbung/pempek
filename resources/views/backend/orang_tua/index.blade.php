@extends("backend.layout.backend")

@section("title","Orang Tua")

@section("content")

@include('backend.partial.pegawai_menu', ['id' => $id])

<section class="panel">
	<section class="panel form-wizard" id="w2">
			<form class="form-horizontal panel-body" action="{{route('dashboard.pegawai.orang_tua.store', ['pegawai' => $id])}}" method="POST">
				<input type="hidden" name="_token" value="{{csrf_token()}}" />
				<div class="tab-content">
					<div>
						<div class="panel-body">
							<h3>Ayah Kandung</h3>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Nama</label>
								<div class="col-md-9">
									<input type="text" name="nama" class="form-control" value="{!! ($ayah) ? $ayah->nama : '' !!}" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Gelar Depan</label>
								<div class="col-md-9">
									<input type="text" name="gelar_depan" class="form-control" value="{!! ($ayah) ? $ayah->gelar_depan : '' !!}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Gelar Belakang</label>
								<div class="col-md-9">
									<input type="text" name="gelar_belakang" class="form-control" value="{!! ($ayah) ? $ayah->gelar_belakang : '' !!}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Tempat Lahir</label>
								<div class="col-md-9">
									<input type="text" name="tempat_lahir" class="form-control" value="{!! ($ayah) ? $ayah->tempat_lahir : '' !!}" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Tanggal Lahir</label>
								<div class="col-md-9">
									<input type="date" name="tanggal_lahir" class="form-control" value="{!! ($ayah) ? $ayah->tanggal_lahir : '' !!}" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Agama</label>
								<div class="col-md-9">
									<select select2 name="agama" class="form-control" required>
										@foreach(config('simpeg.agama') as $agama)
											@if($ayah)
												@if($ayah->agama == $agama)
												<option value="{{$agama}}" selected>{{$agama}}</option>
												@else
												<option value="{{$agama}}">{{$agama}}</option>
												@endif
											@else
												<option value="{{$agama}}">{{$agama}}</option>
											@endif
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Email</label>
								<div class="col-md-9">
									<input type="email" name="email" class="form-control" value="{!! ($ayah) ? $ayah->email : '' !!}" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Telepon</label>
								<div class="col-md-9">
									<input type="text" name="telepon" class="form-control" value="{!! ($ayah) ? $ayah->telepon : '' !!}" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Status Perkawinan</label>
								<div class="col-md-9">
									<select select2 name="status_perkawinan" class="form-control" id="status_perkawinan" required>
										@foreach(config('simpeg.status_pernikahan') as $status_perkawinan)
											@if($ayah)
												@if($ayah->status_perkawinan == $status_perkawinan)
												<option value="{{$status_perkawinan}}" selected>{{$status_perkawinan}}</option>
												@else
												<option value="{{$status_perkawinan}}">{{$status_perkawinan}}</option>
												@endif
											@else
												<option value="{{$status_perkawinan}}">{{$status_perkawinan}}</option>
											@endif
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Status Hidup</label>
								<div class="col-md-9">
									<select select2 name="status_hidup" class="form-control" id="status_hidup" required>
										@foreach(config('simpeg.status_hidup') as $status_hidup)
											@if($ayah)
												@if($ayah->status_hidup == $status_hidup)
												<option value="{{$status_hidup}}" selected>{{$status_hidup}}</option>
												@else
												<option value="{{$status_hidup}}">{{$status_hidup}}</option>
												@endif
											@else
												<option value="{{$status_hidup}}">{{$status_hidup}}</option>
											@endif
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Alamat</label>
								<div class="col-md-9">
									<input type="text" name="alamat" class="form-control" value="{!! ($ayah) ? $ayah->alamat : '' !!}" required>
								</div>
							</div>
							{!! csrf_field() !!}
							<input type="hidden" name="gender" value="male">
							@if($ayah)
								<input type="hidden" name="status" value="edit">
							@else
								<input type="hidden" name="status" value="add">
							@endif
							<input type="hidden" name="pegawai_id" value="{{$id}}">
							<input type="hidden" name="id" value="{!! ($ayah) ? $ayah->id : '' !!}">
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault"></label>
								<div class="col-md-9">
									<input type="submit" value="Save" class="btn btn-md btn-success">
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
	</section>
</section>
<section class="panel">
	<section class="panel form-wizard" id="w3">
			<form class="form-horizontal panel-body" action="{{route('dashboard.pegawai.orang_tua.store', ['pegawai' => $id])}}" method="POST">
				<input type="hidden" name="_token" value="{{csrf_token()}}" />
				<div class="tab-content">
					<div>
						<div class="panel-body">
							<h3>Ibu Kandung</h3>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Nama</label>
								<div class="col-md-9">
									<input type="text" name="nama" class="form-control" value="{!! ($ibu) ? $ibu->nama : '' !!}" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Gelar Depan</label>
								<div class="col-md-9">
									<input type="text" name="gelar_depan" class="form-control" value="{!! ($ibu) ? $ibu->gelar_depan : '' !!}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Gelar Belakang</label>
								<div class="col-md-9">
									<input type="text" name="gelar_belakang" class="form-control" value="{!! ($ibu) ? $ibu->gelar_belakang : '' !!}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Tempat Lahir</label>
								<div class="col-md-9">
									<input type="text" name="tempat_lahir" class="form-control" value="{!! ($ibu) ? $ibu->tempat_lahir : '' !!}" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Tanggal Lahir</label>
								<div class="col-md-9">
									<input type="date" name="tanggal_lahir" class="form-control" value="{!! ($ibu) ? $ibu->tanggal_lahir : '' !!}" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Agama</label>
								<div class="col-md-9">
									<select select2 name="agama" class="form-control" required>
										@foreach(config('simpeg.agama') as $agama)
											@if($ibu)
												@if($ibu->agama == $agama)
												<option value="{{$agama}}" selected>{{$agama}}</option>
												@else
												<option value="{{$agama}}">{{$agama}}</option>
												@endif
											@else
												<option value="{{$agama}}">{{$agama}}</option>
											@endif
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Email</label>
								<div class="col-md-9">
									<input type="email" name="email" class="form-control" value="{!! ($ibu) ? $ibu->email : '' !!}" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Telepon</label>
								<div class="col-md-9">
									<input type="text" name="telepon" class="form-control" value="{!! ($ibu) ? $ibu->telepon : '' !!}" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Status Perkawinan</label>
								<div class="col-md-9">
									<select select2 name="status_perkawinan" class="form-control" id="status_perkawinan" required>
										@foreach(config('simpeg.status_pernikahan') as $status_perkawinan)
											@if($ibu)
												@if($ibu->status_perkawinan == $status_perkawinan)
												<option value="{{$status_perkawinan}}" selected>{{$status_perkawinan}}</option>
												@else
												<option value="{{$status_perkawinan}}">{{$status_perkawinan}}</option>
												@endif
											@else
												<option value="{{$status_perkawinan}}">{{$status_perkawinan}}</option>
											@endif
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Status Hidup</label>
								<div class="col-md-9">
									<select select2 name="status_hidup" class="form-control" id="status_hidup" required>
										@foreach(config('simpeg.status_hidup') as $status_hidup)
											@if($ibu)
												@if($ibu->status_hidup == $status_hidup)
												<option value="{{$status_hidup}}" selected>{{$status_hidup}}</option>
												@else
												<option value="{{$status_hidup}}">{{$status_hidup}}</option>
												@endif
											@else
												<option value="{{$status_hidup}}">{{$status_hidup}}</option>
											@endif
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Alamat</label>
								<div class="col-md-9">
									<input type="text" name="alamat" class="form-control" value="{!! ($ibu) ? $ibu->alamat : '' !!}" required>
								</div>
							</div>
							{!! csrf_field() !!}
							<input type="hidden" name="gender" value="female">
							@if($ibu)
								<input type="hidden" name="status" value="edit">
							@else
								<input type="hidden" name="status" value="add">
							@endif
							<input type="hidden" name="pegawai_id" value="{{$id}}">
							<input type="hidden" name="id" value="{!! ($ibu) ? $ibu->id : '' !!}">
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault"></label>
								<div class="col-md-9">
									<input type="submit" value="Save" class="btn btn-md btn-success">
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
	</section>
</section>

@endsection
