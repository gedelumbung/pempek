@extends("backend.layout.backend")

@section("title", "Detail Pegawai")

@section('content')


<section class="panel">
	<header class="panel-heading">
		
	</header>
	<div class="panel-body">
		<a href="{{ route('dashboard.pegawai.prints', ['id' => $pegawai->id]) }}" class="btn btn-danger pull-right"><span class="fa fa-download"></span> Export to Pdf</a>
		<div class="tabs">
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#popular" data-toggle="tab" aria-expanded="true"><i class="fa fa-star"></i> Data Utama</a>
				</li>
				<li class="">
					<a href="#recent" data-toggle="tab" aria-expanded="false"><i class="fa fa-briefcase"></i> Data Riwayat</a>
				</li>
			</ul>
			<div class="tab-content">
				<div id="popular" class="tab-pane active form-bordered">
					<fieldset>
						<section class="panel">
							<header class="panel-heading">
								<h5>DATA UTAMA</h5>
							</header>
						</section>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Foto</label>
							<div class="col-md-6">
								@if(empty($pegawai->foto))
									<img src="" style="width: 150px;height: 200px">
								@else
									<img src="{{asset('pegawai/'.$pegawai->foto)}}" style="width: 150px;height: 200px">
								@endif
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">NIP</label>
							<div class="col-md-6">
							{{$pegawai->nip}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Nama</label>
							<div class="col-md-6">
							{{$pegawai->nama_lengkap}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Gelar Depan</label>
							<div class="col-md-6">
							{{$pegawai->gelar_depan}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Gelar Belakang</label>
							<div class="col-md-6">
							{{$pegawai->gelar_belakang}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Tempat Lahir</label>
							<div class="col-md-6">
							{{$pegawai->tempat_lahir}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Tanggal Lahir</label>
							<div class="col-md-6">
							{{indonesian_date($pegawai->tanggal_lahir)}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Agama</label>
							<div class="col-md-6">
							{{$pegawai->agama}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Jenis Kelamin</label>
							<div class="col-md-6">
							{{$pegawai->jenis_kelamin}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Status Pernikahan</label>
							<div class="col-md-6">
							{{$pegawai->status_pernikahan}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Email</label>
							<div class="col-md-6">
							{{$pegawai->email}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Alamat</label>
							<div class="col-md-6">
							{{$pegawai->alamat}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Kode POS</label>
							<div class="col-md-6">
							{{$pegawai->kode_pos}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Telepon</label>
							<div class="col-md-6">
							{{$pegawai->telepon}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Handphone</label>
							<div class="col-md-6">
							{{$pegawai->handphone}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Kedudukan PNS</label>
							<div class="col-md-6">
							{{$pegawai->kedudukan_pns}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Status Pegawai</label>
							<div class="col-md-6">
							{{$pegawai->status_pegawai}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">TMT CPNS</label>
							<div class="col-md-6">
							{{$pegawai->tmt_cpns}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">TMT PNS</label>
							<div class="col-md-6">
							{{$pegawai->tmt_pns}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Pendidikan Awal CPNS</label>
							<div class="col-md-6">
							{{$pegawai->pendidikan_awal_cpns}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Pendidikan Akhir</label>
							<div class="col-md-6">
							{{$pegawai->pendidikan_akhir}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Tahun Diklat Sepada</label>
							<div class="col-md-6">
							{{$pegawai->tahun_diklat_sepada}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Tahun Diklat Sepala</label>
							<div class="col-md-6">
							{{$pegawai->tahun_diklat_sepala}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Tahun Diklat Sepadya</label>
							<div class="col-md-6">
							{{$pegawai->tahun_diklat_sepadya}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Tahun Diklat Spamen</label>
							<div class="col-md-6">
							{{$pegawai->tahun_diklat_spamen}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Tahun Diklat Sepati</label>
							<div class="col-md-6">
							{{$pegawai->tahun_diklat_sepati}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Pendidikan Akhir Fakultas</label>
							<div class="col-md-6">
							{{$pegawai->pendidikan_akhir_fakultas}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Pendidikan Akhir Jurusan</label>
							<div class="col-md-6">
							{{$pegawai->pendidikan_akhir_jurusan}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Pendidikan Akhir Tahun Lulus</label>
							<div class="col-md-6">
							{{$pegawai->pendidikan_akhir_tahun_lulus}}
							</div>
						</div>
					 </fieldset>
					 <fieldset>
						<section class="panel">
							<header class="panel-heading">
								<h5>POSISI DAN JABATAN</h5>
							</header>
						</section>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Unit Organisasi</label>
							<div class="col-md-6">
							{{$pegawai->unit_organisasi}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Jenis Jabatan</label>
							<div class="col-md-6">
							{{$pegawai->jenis_jabatan}}
							</div>
						</div>
						@if(!empty($pegawai->jabatan_fungsional_tertentu))
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Nama Jabatan Fungsional Tertentu</label>
								<div class="col-md-3">
								{{$pegawai->jabatan_fungsional_tertentu}}
								</div>
								<label class="col-md-3 control-label" for="inputDefault">TMT Jabatan Fungsional Tertentu</label>
								<div class="col-md-3">
								{{$pegawai->tmt_jabatan_fungsional_tertentu}}
								</div>
							</div>
						@elseif(!empty($pegawai->jabatan_fungsional_umum))
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Nama Jabatan Fungsional Umum</label>
								<div class="col-md-3">
								{{$pegawai->jabatan_fungsional_umum}}
								</div>
								<label class="col-md-3 control-label" for="inputDefault">TMT Jabatan Fungsional Umum</label>
								<div class="col-md-3">
								{{$pegawai->tmt_jabatan_fungsional_umum}}
								</div>
							</div>
						@else
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Nama Jabatan Struktural</label>
								<div class="col-md-3">
								{{$pegawai->unit_kerja->title}}
								</div>
								<label class="col-md-3 control-label" for="inputDefault">TMT Jabatan Struktural</label>
								<div class="col-md-3">
								{{$pegawai->tmt_eselon}}
								</div>
							</div>
						@endif
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Golongan Ruang Awal</label>
							<div class="col-md-3">
							{{$pegawai->golongan_awal->title}}
							</div>
							<label class="col-md-3 control-label" for="inputDefault">TMT Gol. Awal</label>
							<div class="col-md-3">
							{{$pegawai->tmt_golongan_awal}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Golongan Ruang Akhir</label>
							<div class="col-md-3">
							{{$pegawai->golongan_akhir->title}}
							</div>
							<label class="col-md-3 control-label" for="inputDefault">TMT Gol. Akhir</label>
							<div class="col-md-3">
							{{$pegawai->tmt_golongan_akhir}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Gaji Pokok Baru</label>
							<div class="col-md-3">
							{{$pegawai->gaji_pokok}}
							</div>
							<label class="col-md-1 control-label" for="inputDefault">Masa Kerja. Tahun</label>
							<div class="col-md-2">
							{{$pegawai->masa_kerja_tahun}}
							</div>
							<label class="col-md-1 control-label" for="inputDefault">Masa Kerja. Bulan</label>
							<div class="col-md-2">
							{{$pegawai->masa_kerja_bulan}}
							</div>
						</div>
					 </fieldset>
					 <fieldset>
						<section class="panel">
							<header class="panel-heading">
								<h5>DATA LAINNYA</h5>
							</header>
						</section>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">No Seri KARPEG</label>
							<div class="col-md-6">
							{{$pegawai->no_seri_karpeg}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">No Seri KPE</label>
							<div class="col-md-6">
							{{$pegawai->no_seri_kpe}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">No Seri KARIS/KARSU</label>
							<div class="col-md-6">
							{{$pegawai->no_seri_karis}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">No Akte Kelahiran</label>
							<div class="col-md-3">
							{{$pegawai->no_akte_kelahiran}}
							</div>
							<label class="col-md-3 control-label" for="inputDefault">Tahun Akte</label>
							<div class="col-md-3">
							{{$pegawai->tahun_no_akte_kelahiran}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">No Askes</label>
							<div class="col-md-6">
							{{$pegawai->no_askes}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">No Taspen</label>
							<div class="col-md-6">
							{{$pegawai->no_taspen}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">No NPWP</label>
							<div class="col-md-3">
							{{$pegawai->no_npwp}}
							</div>
							<label class="col-md-3 control-label" for="inputDefault">Tahun Akte</label>
							<div class="col-md-3">
							{{indonesian_date($pegawai->tanggal_npwp)}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Golongan Darah</label>
							<div class="col-md-6">
							{{$pegawai->golongan_darah}}
							</div>
						</div>
					 </fieldset>
				</div>

				<!-- BATAS TABULAR -->
				<div id="recent" class="tab-pane">
					 <fieldset>
						<section class="panel">
							<header class="panel-heading">
								<h5 style="text-transform: uppercase; font-weight:bold; text-align:center;">Riwayat Golongan</h5>
							</header>
						</section>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-striped">
									<tr>
										<th rowspan="2">No</th>
										<th rowspan="2">Golongan</th>
										<th rowspan="2">TMT</th>
										<th colspan="2">Masa Kerja</th>
										<th colspan="2">Nomor SK</th>
										<th colspan="2">Nomor Persetujuan BKN</th>
									</tr>
									<tr>
										<th>Tahun</th>
										<th>Bulan</th>
										<th colspan="2">Tgl/Bln/Tahun SK</th>
										<th colspan="2">Tgl/Bln/Tahun Persetujuan BKN</th>
									</tr>
									<tbody>
										@foreach($riwayat_golongan as $key => $data)
											<tr>
												<td>{{$key+1}}</td>
												<td>{{$data->golongan->title}}</td>
												<td>{{$data->tmt}}</td>
												<td>{{$data->masa_kerja_tahun}}</td>
												<td>{{$data->masa_kerja_bulan}}</td>
												<td>{{$data->nomor_sk}}</td>
												<td>{{indonesian_date($data->tanggal_sk)}}</td>
												<td>{{$data->nomor_persetujuan_bkn}}</td>
												<td>{{$data->tahun_persetujuan_bkn}}</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
						<br><br>
						<section class="panel">
							<header class="panel-heading">
								<h5 style="text-transform: uppercase; font-weight:bold; text-align:center;">Riwayat Pendidikan</h5>
							</header>
						</section>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-striped">
									<tr>
										<th>No</th>
										<th>Tingkat Pendidikan</th>
										<th>Nama Sekolah</th>
										<th>Fakultas</th>
										<th>Ijazah Pendidikan</th>
										<th>Tanggal Lulus</th>
										<th>Nama Pimpinan</th>
									</tr>
									<tbody>
										@foreach($riwayat_pendidikan as $key => $data)
											<tr>
												<td>{{$key+1}}</td>
												<td>{{$data->tingkat_pendidikan}}</td>
												<td>{{$data->nama_sekolah}}</td>
												<td>{{$data->fakultas}}</td>
												<td>{{$data->ijazah_pendidikan}}</td>
												<td>{{indonesian_date($data->tanggal_lulus)}}</td>
												<td>{{$data->nama_pimpinan}}</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
						<br><br>
						<section class="panel">
							<header class="panel-heading">
								<h5 style="text-transform: uppercase; font-weight:bold; text-align:center;">Riwayat Jabatan</h5>
							</header>
						</section>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-striped">
									<tr>
										<th rowspan="2">No</th>
										<th rowspan="2">Jabatan</th>
										<th rowspan="2">Unit Kerja</th>
										<th rowspan="2">Instansi</th>
										<th rowspan="2">Nomor SK</th>
										<th rowspan="2">Tanggal</th>
										<th rowspan="2">TMT</th>
										<th rowspan="2">Eselon</th>
									</tr>
									<tbody>
										@foreach($riwayat_jabatan as $key => $data)
											<tr>
												<td>{{$key+1}}</td>
												<td>{{$data->jabatan->title}}</td>
												<td>{{$data->unit_kerja->title}}</td>
												<td>{{$data->instansi}}</td>
												<td>{{$data->nomor_sk}}</td>
												<td>{{indonesian_date($data->tanggal)}}</td>
												<td>{{$data->tmt}}</td>
												<td>{{$data->eselon}}</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
						<br><br>
						<section class="panel">
							<header class="panel-heading">
								<h5 style="text-transform: uppercase; font-weight:bold; text-align:center;">Riwayat Diklat</h5>
							</header>
						</section>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-striped">
									<tr>
										<th>No</th>
										<th>Nama Diklat</th>
										<th>Nomor Sertifikat</th>
										<th>Tahun</th>
										<th>Jumlah Jam</th>
									</tr>
									<tbody>
										@foreach($riwayat_diklat as $key => $data)
											<tr>
												<td>{{$key+1}}</td>
												<td>{{$data->nama_diklat}}</td>
												<td>{{$data->nomor_sertifikat}}</td>
												<td>{{$data->tahun}}</td>
												<td>{{$data->jumlah_jam}}</td>
											</tr>
											</form>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
						<br><br>
						<section class="panel">
							<header class="panel-heading">
								<h5 style="text-transform: uppercase; font-weight:bold; text-align:center;">Kursus</h5>
							</header>
						</section>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-striped">
									<tr>
										<th>No</th>
										<th>Nama Kursus</th>
										<th>Jumlah Jam</th>
										<th>Nomor Sertifikat</th>
										<th>Tanggal</th>
										<th>Penyelenggara</th>
									</tr>
									<tbody>
										@foreach($riwayat_kursus as $key => $data)
											<tr>
												<td>{{$key+1}}</td>
												<td>{{$data->nama_kursus}}</td>
												<td>{{$data->jumlah_jam}}</td>
												<td>{{$data->nomor_sertifikat}}</td>
												<td>{{indonesian_date($data->tanggal)}}</td>
												<td>{{$data->penyelenggara}}</td>
											</tr>
											</form>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
						<br><br>
						<section class="panel">
							<header class="panel-heading">
								<h5 style="text-transform: uppercase; font-weight:bold; text-align:center;">Penghargaan</h5>
							</header>
						</section>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-striped">
									<tr>
										<th>No</th>
										<th>Nama Penghargaan</th>
										<th>Nomor Sertifikat</th>
										<th>Tanggal</th>
										<th>Penyelenggara</th>
									</tr>
									<tbody>
										@foreach($riwayat_penghargaan as $key => $data)
											<form method="POST" action="{{route('dashboard.pegawai.riwayat_penghargaan.store', ['id' => $id])}}">
											{!! csrf_field() !!}
											<input type="hidden" name="status" value="edit">
											<input type="hidden" name="pegawai_id" value="{{$data->pegawai_id}}">
											<input type="hidden" name="id" value="{{$data->id}}">
											<tr>
												<td>{{$key+1}}</td>
												<td>{{$data->nama_penghargaan}}</td>
												<td>{{$data->nomor_surat_keputusan}}</td>
												<td>{{indonesian_date($data->tanggal)}}</td>
												<td>{{$data->nama_pemberi_penghargaan}}</td>
											</tr>
											</form>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
						<br><br>
						<section class="panel">
							<header class="panel-heading">
								<h5 style="text-transform: uppercase; font-weight:bold; text-align:center;">Anak</h5>
							</header>
						</section>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-striped">
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Tempat Lahir</th>
										<th>Tanggal Lahir</th>
										<th>Jenis Kelamin</th>
										<th>Pendidikan</th>
										<th>Pekerjaan</th>
										<th>Agama</th>
										<th>Status</th>
										<th>Alamat</th>
										<th>Telepon</th>
									</tr>
									<tbody>
										@foreach($anak as $key => $data)
											<tr>
												<td>{{$key+1}}</td>
												<td>{{$data->nama}}</td>
												<td>{{$data->tempat_lahir}}</td>
												<td>{{indonesian_date($data->tanggal_lahir)}}</td>
												<td>{{$data->jenis_kelamin}}</td>
												<td>{{$data->pendidikan}}</td>
												<td>{{$data->pekerjaan}}</td>
												<td>{{$data->agama}}</td>
												<td>
													<h5><b>Status Perkawinan</b></h5>
													{{$data->status_perkawinan}}
													<h5><b>Status Hidup</b></h5>
													{{$data->status_hidup}}
													<h5><b>Status Anak</b></h5>
													{{$data->status_anak}}
												</td>
												<td>{{$data->alamat}}</td>
												<td>{{$data->telepon}}</td>
											</tr>
											</form>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
						<br><br>
						<section class="panel">
							<header class="panel-heading">
								<h5 style="text-transform: uppercase; font-weight:bold; text-align:center;">Suami/Istri</h5>
							</header>
						</section>
						@if($pasangan)
						<div>
							<div class="panel-body">
								<h3>Suami/Istri</h3>
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Nama</label>
									<div class="col-md-1">:</div>
									<div class="col-md-8">{{$pasangan->nama}}</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Gelar Depan</label>
									<div class="col-md-1">:</div>
									<div class="col-md-8">{{$pasangan->gelar_depan}}</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Gelar Belakang</label>
									<div class="col-md-1">:</div>
									<div class="col-md-8">{{$pasangan->gelar_belakang}}</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Tempat Lahir</label>
									<div class="col-md-1">:</div>
									<div class="col-md-8">{{$pasangan->tempat_lahir}}</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Tanggal Lahir</label>
									<div class="col-md-1">:</div>
									<div class="col-md-8">{{indonesian_date($pasangan->tanggal_lahir)}}</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Agama</label>
									<div class="col-md-1">:</div>
									<div class="col-md-8">{{$pasangan->agama}}</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Jenis Kelamin</label>
									<div class="col-md-1">:</div>
									<div class="col-md-8">{{$pasangan->jenis_kelamin}}</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Email</label>
									<div class="col-md-1">:</div>
									<div class="col-md-8">{{$pasangan->email}}</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Telepon</label>
									<div class="col-md-1">:</div>
									<div class="col-md-8">{{$pasangan->telepon}}</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Status Hidup</label>
									<div class="col-md-1">:</div>
									<div class="col-md-8">{{$pasangan->status_hidup}}</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Alamat</label>
									<div class="col-md-1">:</div>
									<div class="col-md-8">{{$pasangan->alamat}}</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Status Perkawinan</label>
									<div class="col-md-1">:</div>
									<div class="col-md-8">{{$pasangan->status_perkawinan}}</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Akte Perceraian</label>
									<div class="col-md-1">:</div>
									<div class="col-md-8">{{$pasangan->akte_perceraian}}</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Tanggal Akte Perceraian</label>
									<div class="col-md-1">:</div>
									<div class="col-md-8">{{indonesian_date($pasangan->tanggal_akte_perceraian)}}</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Akte Kelahiran</label>
									<div class="col-md-1">:</div>
									<div class="col-md-8">{{$pasangan->akte_kelahiran}}</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Tanggal Akte Kelahiran</label>
									<div class="col-md-1">:</div>
									<div class="col-md-8">{{indonesian_date($pasangan->tanggal_akte_kelahiran)}}</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Akte Meninggal</label>
									<div class="col-md-1">:</div>
									<div class="col-md-8">{{$pasangan->akte_meninggal}}</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Tanggal Akte Meninggal</label>
									<div class="col-md-1">:</div>
									<div class="col-md-8">{{indonesian_date($pasangan->tanggal_akte_meninggal)}}</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">NPWP</label>
									<div class="col-md-1">:</div>
									<div class="col-md-8">{{$pasangan->npwp}}</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Tanggal NPWP</label>
									<div class="col-md-1">:</div>
									<div class="col-md-8">{{indonesian_date($pasangan->tanggal_npwp)}}</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Nama Istri / Suami ( Jika PNS )</label>
									<div class="col-md-1">:</div>
									<div class="col-md-8">{{$pasangan->nama_pasangan}}</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">NIP Istri / Suami ( Jika PNS )</label>
									<div class="col-md-1">:</div>
									<div class="col-md-8">{{$pasangan->nip_pasangan}}</div>
								</div>

							</div>
						</div>
						@endif
						<br><br>
						<section class="panel">
							<header class="panel-heading">
								<h5 style="text-transform: uppercase; font-weight:bold; text-align:center;">Orang Tua</h5>
							</header>
						</section>
						@if($ayah)
						<div>
							<div class="panel-body">
								<h3>Ayah Kandung</h3>
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Nama</label>
									<div class="col-md-9">{{$ayah->nama}}</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Gelar Depan</label>
									<div class="col-md-9">{{$ayah->gelar_depan}}</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Gelar Belakang</label>
									<div class="col-md-9">{{$ayah->gelar_belakang}}</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Tempat Lahir</label>
									<div class="col-md-9">{{$ayah->tempat_lahir}}</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Tanggal Lahir</label>
									<div class="col-md-9">{{indonesian_date($ayah->tanggal_lahir)}}</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Agama</label>
									<div class="col-md-9">{{$ayah->agama}}</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Email</label>
									<div class="col-md-9">{{$ayah->email}}</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Telepon</label>
									<div class="col-md-9">{{$ayah->telepon}}</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Status Perkawinan</label>
									<div class="col-md-9">{{$ayah->status_perkawinan}}</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Status Hidup</label>
									<div class="col-md-9">{{$ayah->status_hidup}}</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Alamat</label>
									<div class="col-md-9">{{$ayah->alamat}}</div>
								</div>

							</div>
							@endif
							@if($ibu)
							<div class="panel-body">
								<h3>Ibu Kandung</h3>
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Nama</label>
									<div class="col-md-9">{{$ibu->nama}}</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Gelar Depan</label>
									<div class="col-md-9">{{$ibu->gelar_depan}}</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Gelar Belakang</label>
									<div class="col-md-9">{{$ibu->gelar_belakang}}</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Tempat Lahir</label>
									<div class="col-md-9">{{$ibu->tempat_lahir}}</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Tanggal Lahir</label>
									<div class="col-md-9">{{indonesian_date($ibu->tanggal_lahir)}}</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Agama</label>
									<div class="col-md-9">{{$ibu->agama}}</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Email</label>
									<div class="col-md-9">{{$ibu->email}}</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Telepon</label>
									<div class="col-md-9">{{$ibu->telepon}}</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Status Perkawinan</label>
									<div class="col-md-9">{{$ibu->status_perkawinan}}</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Status Hidup</label>
									<div class="col-md-9">{{$ibu->status_hidup}}</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Alamat</label>
									<div class="col-md-9">{{$ibu->alamat}}</div>
								</div>
							</div>
							@endif
						</div>
					 </fieldset>
				</div>
			</div>
		</div>
	</div>
</section>

<style type="text/css">
	<in
</style>

@endsection
