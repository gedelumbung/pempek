@extends("backend.layout.backend")

@section("title","Laporan DUK")

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
						<a href="{{route('dashboard.laporan.duk.cetak')}}?{{$uri}}" class="btn btn-danger">Export to Excel</a>
						<a href="{{route('dashboard.laporan.duk.fetch')}}" class="btn btn-warning">Refresh Data</a>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
<br>
<div class="table-responsive">
	<table class="table table-bordered" style="zoom:80%">
		<thead style="background:#eaeaea">
			<tr>
				<th rowspan="2" style="vertical-align:middle;text-align:center" width="50">No. Urut</th>
				<th rowspan="2" style="vertical-align:middle;text-align:center" width="200">NAMA<br>
					NIP<br>
					STATUS PERKAWINAN<br>
					STATUS PEGAWAI<br>
				</th>
				<th style="vertical-align:middle;text-align:center" width="180">PANGKAT</th>
				<th style="vertical-align:middle;text-align:center" width="200">JABATAN</th>
				<th colspan="2" style="vertical-align:middle;text-align:center">MASA KERJA PMK TOTAL</th>
				<th style="vertical-align:middle;text-align:center" width="200">PENDIDIKAN DAN PELATIHAN</th>
				<th style="vertical-align:middle;text-align:center" width="200">PENDIDIKAN TERAKHIR</th>
				<th style="vertical-align:middle;text-align:center" width="100">USIA</th>
				<th rowspan="2" style="vertical-align:middle;text-align:center" width="100">CATATAN MUTASI KEPEGAWAIAN</th>
				<th rowspan="2" style="vertical-align:middle;text-align:center" width="70">KET</th>
			</tr>
			<tr>
				<th style="vertical-align:middle;text-align:center">GOL. RUANG <br>
					TMT</th>
				<th style="vertical-align:middle;text-align:center">NAMA <br>ESELON<br> TMT</th>
				<th style="vertical-align:middle;text-align:center" width="80">THN</th>
				<th style="vertical-align:middle;text-align:center" width="80">BLN</th>
				<th style="vertical-align:middle;text-align:center">NAMA <br>TGL, BULAN, & TAHUN<br> JUMLAH JAM</th>
				<th style="vertical-align:middle;text-align:center">NAMA <BR>LULUS TGL, BULAN & TAHUN<Br> TINGKAT IJAZAH</th>
				<th style="vertical-align:middle;text-align:center">TEMPAT TGL. LAHIR  USIA</th>
			</tr>
		</thead>
		<tbody>
			@foreach($duk as $key=>$duk)
				<tr>
					<td>{{$key+1}}</td>
					<td>
						<ul>
							<li>> {{($duk->pegawai->gelar_depan != '-' ? $duk->pegawai->gelar_depan : '')}} {{$duk->pegawai->nama_lengkap}}{{($duk->pegawai->gelar_belakang != '' ? ', ' : '')}} {{($duk->pegawai->gelar_belakang != '' ? $duk->pegawai->gelar_belakang : '')}}</li>
							<li>> {{$duk->pegawai->nip}}</li>
							<li>> {{$duk->pegawai->jenis_kelamin}}</li>
							<li>> {{$duk->pegawai->status_pernikahan}}</li>
							<li>> Status Pegawai : {{$duk->pegawai->status_pegawai}}</li>
							<li>> TMT CAPEG : {{indonesian_date($duk->pegawai->tmt_cpns)}}</li>
							<li>> TMT PNS : {{indonesian_date($duk->pegawai->tmt_pns)}}</li>
						</ul>
					</td>
					<td>
						<ul>
							<li>> {{$duk->pegawai->golongan_akhir->description}} ({{$duk->pegawai->golongan_akhir->title}})</li>
							<li>> {{indonesian_date($duk->pegawai->tmt_golongan_akhir)}}</li>
							<li>> {{$duk->pegawai->intervalFromNow($duk->pegawai->tmt_golongan_akhir)}}</li>
						</ul>
					</td>
					<td>
						@if(!empty($duk->pegawai->jabatan_struktural_id))
						<ul>
							<li>> {{$duk->pegawai->jabatan_struktural->title}}, {{$duk->pegawai->satuan_kerja->title}}, {{$duk->pegawai->sub_unit_kerja->title}}, {{$duk->pegawai->unit_kerja->title}}</li>
							<li>> Eselon : {{$duk->pegawai->eselon}}</li>
							<li>> TMT Jabatan : {{indonesian_date($duk->pegawai->tmt_eselon)}} ({{$duk->pegawai->intervalFromNow($duk->pegawai->tmt_eselon)}})</li>
							<li>> Masa Kerja Eselon : ({{$duk->pegawai->intervalFromNow($duk->pegawai->tmt_eselon)}})</li>
						</ul>
						@elseif(!empty($duk->pegawai->jabatan_fungsional_tertentu))
						<ul>
							<li>> {{$duk->pegawai->jabatan_fungsional_tertentu}}, {{$duk->pegawai->satuan_kerja->title}}, {{$duk->pegawai->sub_unit_kerja->title}}, {{$duk->pegawai->unit_kerja->title}}</li>
							<li>> Eselon : {{$duk->pegawai->eselon}}</li>
							<li>> TMT Jabatan : {{indonesian_date($duk->pegawai->tmt_jabatan_fungsional_tertentu)}} ({{$duk->pegawai->intervalFromNow($duk->pegawai->tmt_jabatan_fungsional_tertentu)}})</li>
							<li>> Masa Kerja Eselon : ({{$duk->pegawai->intervalFromNow($duk->pegawai->tmt_jabatan_fungsional_tertentu)}})</li>
						</ul>
						@elseif(!empty($duk->pegawai->jabatan_fungsional_umum))
						<ul>
							<li>> {{$duk->pegawai->jabatan_fungsional_umum}}, {{$duk->pegawai->satuan_kerja->title}}, {{$duk->pegawai->sub_unit_kerja->title}}, {{$duk->pegawai->unit_kerja->title}}</li>
							<li>> Eselon : {{$duk->pegawai->eselon}}</li>
							<li>> TMT Jabatan : {{indonesian_date($duk->pegawai->tmt_jabatan_fungsional_umum)}} ({{$duk->pegawai->intervalFromNow($duk->pegawai->tmt_jabatan_fungsional_umum)}})</li>
							<li>> Masa Kerja Eselon : ({{$duk->pegawai->intervalFromNow($duk->pegawai->tmt_jabatan_fungsional_umum)}})</li>
						</ul>
						@endif
					</td>
					<td width="80">
						<ul>
							<li>> {{$duk->pegawai->masa_kerja_tahun}}</li>
							<li>> {{$duk->pegawai->penyesuaian_masa_kerja_tahun}}</li>
							<li>> {{($duk->pegawai->masa_kerja_tahun+$duk->pegawai->penyesuaian_masa_kerja_tahun)}}</li>
						</ul>
					</td>
					<td width="80">
						<ul>
							<li>> {{$duk->pegawai->masa_kerja_bulan}}</li>
							<li>> {{$duk->pegawai->penyesuaian_masa_kerja_bulan}}</li>
							<li>> {{($duk->pegawai->masa_kerja_bulan+$duk->pegawai->penyesuaian_masa_kerja_bulan)}}</li>
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
												<li><i>{{$diklat->nama_diklat}}</i></li>
												<li><i>{{indonesian_date($diklat->tahun)}}</i></li>
												<li><i>{{$diklat->jumlah_jam}} jam</i></li>
												<li><i>Peringkat : -</i></li>
											</ul>
										</div>
									</div>
								</li>
							@endforeach
						</ul>
					</td>
					<td>
						<ul>
							@foreach($duk->pegawai->riwayat_pendidikan as $no_pendidikan=>$pendidikan)
								<li>
									<div class="row">
										<ul style="margin-left: -10px;">
											<li><i>> Jenjang Pendidikan : {{$pendidikan->tingkat_pendidikan}}</i></li>
											<li><i>> Jurusan : <br> - {{$pendidikan->fakultas}}<br>- {{$pendidikan->nama_sekolah}}</i></li>
											<li><i>> Lulus : {{indonesian_date($pendidikan->tanggal_lulus)}}</i></li>
										</ul>
										<br>
									</div>
								</li>
							@endforeach
						</ul>
					</td>
					<td>
						<ul>
							<li>> {{$duk->pegawai->tempat_lahir}}</li>
							<li>> {{indonesian_date($duk->pegawai->tanggal_lahir)}}</li>
							<li>> {{$duk->pegawai->age()}} tahun</li>
						</ul>
					</td>
					<td></td>
					<td></td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

@endsection