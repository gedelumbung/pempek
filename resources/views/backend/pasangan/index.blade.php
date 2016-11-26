@extends("backend.layout.backend")

@section("title","Suami/Istri")

@section("content")

@include('backend.partial.pegawai_menu', ['id' => $id])

<section class="panel">
	<section class="panel form-wizard" id="w2">
			<form class="form-horizontal panel-body" action="{{route('dashboard.pegawai.pasangan.store', ['pegawai' => $id])}}" method="POST">
				<input type="hidden" name="_token" value="{{csrf_token()}}" />
				<div class="tab-content">
					<div>
						<div class="panel-body">
							<h3>Suami/Istri</h3>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Nama</label>
								<div class="col-md-9">
									<input type="text" name="nama" class="form-control" value="{!! ($pasangan) ? $pasangan->nama : '' !!}" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Gelar Depan</label>
								<div class="col-md-9">
									<input type="text" name="gelar_depan" class="form-control" value="{!! ($pasangan) ? $pasangan->gelar_depan : '' !!}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Gelar Belakang</label>
								<div class="col-md-9">
									<input type="text" name="gelar_belakang" class="form-control" value="{!! ($pasangan) ? $pasangan->gelar_belakang : '' !!}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Tempat Lahir</label>
								<div class="col-md-9">
									<input type="text" name="tempat_lahir" class="form-control" value="{!! ($pasangan) ? $pasangan->tempat_lahir : '' !!}" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Tanggal Lahir</label>
								<div class="col-md-9">
									<input type="text" datepicker name="tanggal_lahir" class="form-control" value="{!! ($pasangan) ? $pasangan->tanggal_lahir : '' !!}" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Agama</label>
								<div class="col-md-9">
									<select select2 name="agama" class="form-control" required>
										@foreach(config('simpeg.agama') as $agama)
											@if($pasangan)
												@if($pasangan->agama == $agama)
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
								<label class="col-md-3 control-label" for="inputDefault">Jenis Kelamin</label>
								<div class="col-md-9">
									<select select2 name="jenis_kelamin" class="form-control" required>
										@foreach(config('simpeg.jenis_kelamin') as $jenis_kelamin)
											@if($pasangan)
												@if($pasangan->jenis_kelamin == $jenis_kelamin)
												<option value="{{$jenis_kelamin}}" selected>{{$jenis_kelamin}}</option>
												@else
												<option value="{{$jenis_kelamin}}">{{$jenis_kelamin}}</option>
												@endif
											@else
												<option value="{{$jenis_kelamin}}">{{$jenis_kelamin}}</option>
											@endif
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Email</label>
								<div class="col-md-9">
									<input type="email" name="email" class="form-control" value="{!! ($pasangan) ? $pasangan->email : '' !!}" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Telepon</label>
								<div class="col-md-9">
									<input type="text" name="telepon" class="form-control" value="{!! ($pasangan) ? $pasangan->telepon : '' !!}" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Status Hidup</label>
								<div class="col-md-9">
									<select select2 name="status_hidup" class="form-control" id="status_hidup" required>
										@foreach(config('simpeg.status_hidup') as $status_hidup)
											@if($pasangan)
												@if($pasangan->status_hidup == $status_hidup)
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
									<input type="text" name="alamat" class="form-control" value="{!! ($pasangan) ? $pasangan->alamat : '' !!}" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Status Perkawinan</label>
								<div class="col-md-9">
									<select select2 name="status_perkawinan" class="form-control" required>
										@foreach(config('simpeg.status_pernikahan_pasangan') as $status_perkawinan)
											@if($pasangan)
												@if($pasangan->status_perkawinan == $status_perkawinan)
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
								<label class="col-md-3 control-label" for="inputDefault">Akte Perceraian</label>
								<div class="col-md-9">
									<input type="text" name="akte_perceraian" class="form-control" value="{!! ($pasangan) ? $pasangan->akte_perceraian : '' !!}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Tanggal Akte Perceraian</label>
								<div class="col-md-9">
									<input type="text" datepicker name="tanggal_akte_perceraian" class="form-control" value="{!! ($pasangan) ? $pasangan->tanggal_akte_perceraian : '' !!}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Akte Kelahiran</label>
								<div class="col-md-9">
									<input type="text" name="akte_kelahiran" class="form-control" value="{!! ($pasangan) ? $pasangan->akte_kelahiran : '' !!}" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Tanggal Akte Kelahiran</label>
								<div class="col-md-9">
									<input type="text" datepicker name="tanggal_akte_kelahiran" class="form-control" value="{!! ($pasangan) ? $pasangan->tanggal_akte_kelahiran : '' !!}" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Akte Meninggal</label>
								<div class="col-md-9">
									<input type="text" name="akte_meninggal" class="form-control" value="{!! ($pasangan) ? $pasangan->akte_meninggal : '' !!}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Tanggal Akte Meninggal</label>
								<div class="col-md-9">
									<input type="text" datepicker name="tanggal_akte_meninggal" class="form-control" value="{!! ($pasangan) ? $pasangan->tanggal_akte_meninggal : '' !!}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">NPWP</label>
								<div class="col-md-9">
									<input type="text" name="npwp" class="form-control" value="{!! ($pasangan) ? $pasangan->npwp : '' !!}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Tanggal NPWP</label>
								<div class="col-md-9">
									<input type="text" datepicker name="tanggal_npwp" class="form-control" value="{!! ($pasangan) ? $pasangan->tanggal_npwp : '' !!}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Nama Istri / Suami ( Jika PNS )</label>
								<div class="col-md-9">
									<input type="text" name="nama_pasangan" class="form-control" value="{!! ($pasangan) ? $pasangan->nama_pasangan : '' !!}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">NIP Istri / Suami ( Jika PNS )</label>
								<div class="col-md-9">
									<input type="text" name="nip_pasangan" class="form-control" value="{!! ($pasangan) ? $pasangan->nip_pasangan : '' !!}">
								</div>
							</div>

							{!! csrf_field() !!}
							@if($pasangan)
								<input type="hidden" name="status" value="edit">
							@else
								<input type="hidden" name="status" value="add">
							@endif
							<input type="hidden" name="pegawai_id" value="{{$id}}">
							<input type="hidden" name="id" value="{!! ($pasangan) ? $pasangan->id : '' !!}">
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
