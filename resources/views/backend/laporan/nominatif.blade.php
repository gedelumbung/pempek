@extends("backend.layout.backend")

@section("title","Laporan Nominatif")

@section("content")

	@foreach($unit_kerja as $unit)
	<h4>{{$unit->title}}</h4>
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
							<li>> {{$duk->pegawai->nama_lengkap}}</li>
							<li>> {{$duk->pegawai->nip}}</li>
							<li>> {{$duk->pegawai->tempat_lahir}}</li>
							<li>> {{indonesian_date($duk->pegawai->tanggal_lahir)}}</li>
							<li>> {{$duk->pegawai->age()}} tahun</li>
						</ul>
					</td>
					<td>
						<ul>
							<li>> {{$duk->pegawai->golongan_akhir->title}}</li>
							<li>> {{indonesian_date($duk->pegawai->tmt_golongan_akhir)}}</li>
						</ul>
					</td>
					<td>
						<ul>
							@if(!empty($duk->pegawai->satuan_kerja_id))
							<li>> {{$duk->pegawai->satuan_kerja->title}}</li>
							@endif
							@if(!empty($duk->pegawai->sub_unit_kerja_id))
							<li>> {{$duk->pegawai->sub_unit_kerja->title}}</li>
							@endif
							@if(!empty($duk->pegawai->unit_kerja_id))
							<li>> {{$duk->pegawai->unit_kerja->title}}</li>
							@endif
							@if(!empty($duk->pegawai->jabatan_struktural_id))
							<li>> {{$duk->pegawai->jabatan_struktural->title}}</li>
							@elseif(!empty($duk->pegawai->jabatan_fungsional_umum))
							<li>> {{$duk->pegawai->jabatan_fungsional_umum}}</li>
							@elseif(!empty($duk->pegawai->jabatan_fungsional_tertentu))
							<li>> {{$duk->pegawai->jabatan_fungsional_tertentu}}</li>
							@endif
						</ul>
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
												<li><i>Jenjang Pendidikan : {{$pendidikan->tingkat_pendidikan}}</i></li>
												<li><i>Jurusan : {{$pendidikan->fakultas}}<br>{{$pendidikan->nama_sekolah}}</i></li>
												<li><i>Lulus : {{indonesian_date($pendidikan->tanggal_lulus)}}</i></li>
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
												<li><i>{{$diklat->nama_diklat}}</i></li>
												<li><i>{{$diklat->tahun}}</i></li>
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
							<li>> {{indonesian_date($duk->pegawai->pensiun())}}</li>
						</ul>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	@endforeach

@endsection