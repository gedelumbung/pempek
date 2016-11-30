@extends("backend.layout.backend")

@section("title","Laporan Nominatif")

@section("content")

	@foreach($unit_kerja as $unit)
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
							<li>> {{($duk->pegawai->gelar_depan != '-' ? $duk->pegawai->gelar_depan : '')}} {{$duk->pegawai->nama_lengkap}} {{($duk->pegawai->gelar_belakang != '-' ? $duk->pegawai->gelar_belakang : '')}}</li>
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
							<li>> {{$duk->pegawai->jabatan_struktural->title}}, {{$duk->pegawai->satuan_kerja->title}}, {{$duk->pegawai->sub_unit_kerja->title}}, {{$duk->pegawai->unit_kerja->title}}</li>
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