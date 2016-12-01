@extends("backend.layout.backend")

@section("title","Laporan Nominatif")

@section("content")
<div>
	<form method="GET">
		<div class="row">
			<div class="row">
				<div class="form-group col-md-12 col-sm-12">
					<label class="col-md-3 control-label">Unit Kerja</label>
					<div class="col-md-9">
						<select name="unit_kerja">
							<option value="">Unit Kerja</option>
							@foreach($unit_kerja_data as $unit)
								@if($unit->id == $unit_kerja)
								<option value="{{$unit->id}}" selected="selected">{{$unit->title}}</option>
								@else
								<option value="{{$unit->id}}">{{$unit->title}}</option>
								@endif
							@endforeach
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-12 col-sm-12">
					<label class="col-md-3 control-label">Golongan</label>
					<div class="col-md-9">
						<select name="golongan">
							<option value="">Golongan</option>
							@foreach($golongan_data as $gol)
								@if($gol->title == $golongan)
								<option value="{{$gol->title}}" selected="selected">{{$gol->description}} ({{$gol->title}})</option>
								@else
								<option value="{{$gol->title}}">{{$gol->description}} ({{$gol->title}})</option>
								@endif
							@endforeach
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-12 col-sm-12">
					<label class="col-md-3 control-label">Umur</label>
					<div class="col-md-5">
						<input type="number" class="form-control" name="age_start" value="{{$age_start}}" placeholder="Dari">
						<input type="number" class="form-control" name="age_end" value="{{$age_end}}" placeholder="Sampai">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-12 col-sm-12">
					<label class="col-md-3 control-label"></label>
					<div class="col-md-5">
						<input type="submit" class="btn btn-success" value="Filter Data">
						<a href="{{route('dashboard.laporan.nominatif.cetak')}}?{{$uri}}" class="btn btn-danger">Export to Excel</a>
						<a href="{{route('dashboard.laporan.nominatif.fetch')}}" class="btn btn-warning">Refresh Data</a>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
<br>
	@foreach($unitKerja as $unit)
	<h2>{{$unit->title}}</h2>
	<table class="table table-bordered" style="zoom:80%">
		<thead style="background:#eaeaea">
			<tr>
				<th style="vertical-align:middle;text-align:center">No.</th>
				<th style="vertical-align:middle;text-align:center">NAMA<br>
					NIP<br>
					TEMPAT TANGGAL LAHIR<br>
					USIA<br>
				</th>
				<th style="vertical-align:middle;text-align:center">PANGKAT <br> GOLONGAN TMT</th>
				<th style="vertical-align:middle;text-align:center;width: 300px">JABATAN</th>
				<th style="vertical-align:middle;text-align:center">PENDIDIKAN TERAKHIR</th>
				<th style="vertical-align:middle;text-align:center">JENIS DIKLAT YG PERNAH DIIKUTI</th>
				<th style="vertical-align:middle;text-align:center">BATAS USIA PENSIUN</th>
			</tr>
		</thead>
		<tbody>
			@foreach($unit->duk as $key=>$duk)
				<tr>
					<td>{{$key+1}}</td>
					<td>
						<ul>
							<li>> {{($duk->pegawai->gelar_depan != '-' ? $duk->pegawai->gelar_depan : '')}} {{$duk->pegawai->nama_lengkap}}{{($duk->pegawai->gelar_belakang != '' ? ', ' : '')}} {{($duk->pegawai->gelar_belakang != '' ? $duk->pegawai->gelar_belakang : '')}}</li>
							<li>> {{$duk->pegawai->nip}}</li>
							<li>> {{$duk->pegawai->tempat_lahir}}, {{indonesian_date($duk->pegawai->tanggal_lahir)}}</li>
							<li>> {{$duk->pegawai->age()}} tahun</li>
						</ul>
					</td>
					<td>
						<ul>
							<li>> {{$duk->pegawai->golongan_akhir->description}} ({{$duk->pegawai->golongan_akhir->title}})</li>
							<li>> {{indonesian_date($duk->pegawai->tmt_golongan_akhir)}}</li>
						</ul>
					</td>
					<td>
						@if(!empty($duk->pegawai->jabatan_struktural_id))
						<ul>
							<li>> {{$duk->pegawai->jabatan_struktural->title}}, 
									{{(!empty($duk->pegawai->satuan_kerja_id) ? $duk->pegawai->satuan_kerja->title.',' : '')}} 
									{{(!empty($duk->pegawai->sub_unit_kerja_id) ? $duk->pegawai->sub_unit_kerja->title.',' : '')}} 
									{{$duk->pegawai->unit_kerja->title}}
							</li>
						</ul>
						@elseif(!empty($duk->pegawai->jabatan_fungsional_tertentu))
						<ul>
							<li>> {{$duk->pegawai->jabatan_fungsional_tertentu}}, {{$duk->pegawai->satuan_kerja->title}}, {{$duk->pegawai->sub_unit_kerja->title}}, {{$duk->pegawai->unit_kerja->title}}</li>
						</ul>
						@elseif(!empty($duk->pegawai->jabatan_fungsional_umum))
						<ul>
							<li>> {{$duk->pegawai->jabatan_fungsional_umum}}, {{$duk->pegawai->satuan_kerja->title}}, {{$duk->pegawai->sub_unit_kerja->title}}, {{$duk->pegawai->unit_kerja->title}}</li>
						</ul>
						@endif
					</td>
					<td>
						<ul>
							@foreach($duk->pegawai->riwayat_pendidikan as $no_pendidikan=>$pendidikan)
								<li>
									<div class="row">
										<div class="col-xs-1">
											{{$no_pendidikan+1}}
										</div>
										<div class="col-xs-10">
											<ul style="margin-left: -10px;">
												<li><i>{{$pendidikan->tingkat_pendidikan}} {{$pendidikan->fakultas}}<br>{{$pendidikan->nama_sekolah}} tahun {{substr($pendidikan->tanggal_lulus,0,4)}}</i></li>
											</ul>
										</div>
									</div>
								</li>
							@endforeach
						</ul>
					</td>
					<td>
						<ul>
							@foreach($duk->pegawai->riwayat_diklat as $no_diklat=>$diklat)
								<li>
									<div class="row">
										<div class="col-xs-1">
											{{$no_diklat+1}}
										</div>
										<div class="col-xs-10">
											<ul style="margin-left: -10px;">
												<li><i>{{$diklat->nama_diklat}}, {{indonesian_date($diklat->tahun)}}</i></li>
											</ul>
										</div>
									</div>
								</li>
							@endforeach
						</ul>
					</td>
					<td>
						<ul>
							<li>> {{indonesian_date($duk->pegawai->pensiun())}}</li>
						</ul>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<hr>
	<br>
	@endforeach

@endsection