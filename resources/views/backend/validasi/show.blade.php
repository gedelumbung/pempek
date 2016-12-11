@extends("backend.layout.backend")

@section("title", "Validasi Pegawai")

@section('content')


<section class="panel">
	<header class="panel-heading">
		
	</header>
	<div class="panel-body">
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
						@if($pegawai_log->status == 0)
						<a href="{{ route('dashboard.validasi_data.approve.pegawai', ['id' => $pegawai_log->pegawai_id, 'status' => 1]) }}" class="btn btn-danger pull-right"><span class="fa fa-check"></span> Approve</a>
						@else
						<a class="btn btn-success pull-right"><span class="fa fa-check"></span> Approved</a>
						@endif
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Foto</label>
							<div class="col-md-6">
								@if(empty($pegawai_log->foto))
									<img src="" style="width: 150px;height: 200px">
								@else
									<img src="{{asset('pegawai/'.$pegawai_log->foto)}}" style="width: 150px;height: 200px">
								@endif
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">NIP</label>
							<div class="col-md-6">
							{{$pegawai_log->nip}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Nama</label>
							<div class="col-md-6">
							{{$pegawai_log->nama_lengkap}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Gelar Depan</label>
							<div class="col-md-6">
							{{$pegawai_log->gelar_depan}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Gelar Belakang</label>
							<div class="col-md-6">
							{{$pegawai_log->gelar_belakang}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Tempat Lahir</label>
							<div class="col-md-6">
							{{$pegawai_log->tempat_lahir}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Tanggal Lahir</label>
							<div class="col-md-6">
							{{indonesian_date($pegawai_log->tanggal_lahir)}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Agama</label>
							<div class="col-md-6">
							{{$pegawai_log->agama}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Jenis Kelamin</label>
							<div class="col-md-6">
							{{$pegawai_log->jenis_kelamin}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Status Pernikahan</label>
							<div class="col-md-6">
							{{$pegawai_log->status_pernikahan}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Email</label>
							<div class="col-md-6">
							{{$pegawai_log->email}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Alamat</label>
							<div class="col-md-6">
							{{$pegawai_log->alamat}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Kode POS</label>
							<div class="col-md-6">
							{{$pegawai_log->kode_pos}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Telepon</label>
							<div class="col-md-6">
							{{$pegawai_log->telepon}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Handphone</label>
							<div class="col-md-6">
							{{$pegawai_log->handphone}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Kedudukan PNS</label>
							<div class="col-md-6">
							{{$pegawai_log->kedudukan_pns}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Status Pegawai</label>
							<div class="col-md-6">
							{{$pegawai_log->status_pegawai}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">TMT CPNS</label>
							<div class="col-md-6">
							{{indonesian_date($pegawai_log->tmt_cpns)}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">TMT PNS</label>
							<div class="col-md-6">
							{{indonesian_date($pegawai_log->tmt_pns)}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Pendidikan Awal CPNS</label>
							<div class="col-md-6">
							{{$pegawai_log->pendidikan_awal_cpns}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Pendidikan Akhir</label>
							<div class="col-md-6">
							{{$pegawai_log->pendidikan_akhir}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Tahun Diklat Sepada</label>
							<div class="col-md-6">
							{{$pegawai_log->tahun_diklat_sepada}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Tahun Diklat Sepala</label>
							<div class="col-md-6">
							{{$pegawai_log->tahun_diklat_sepala}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Tahun Diklat Sepadya</label>
							<div class="col-md-6">
							{{$pegawai_log->tahun_diklat_sepadya}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Tahun Diklat Spamen</label>
							<div class="col-md-6">
							{{$pegawai_log->tahun_diklat_spamen}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Tahun Diklat Sepati</label>
							<div class="col-md-6">
							{{$pegawai_log->tahun_diklat_sepati}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Pendidikan Akhir Fakultas</label>
							<div class="col-md-6">
							{{$pegawai_log->pendidikan_akhir_fakultas}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Pendidikan Akhir Jurusan</label>
							<div class="col-md-6">
							{{$pegawai_log->pendidikan_akhir_jurusan}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Pendidikan Akhir Tahun Lulus</label>
							<div class="col-md-6">
							{{$pegawai_log->pendidikan_akhir_tahun_lulus}}
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
							{{$pegawai_log->unit_organisasi}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Jenis Jabatan</label>
							<div class="col-md-6">
							{{$pegawai_log->jenis_jabatan}}
							</div>
						</div>
						@if(!empty($pegawai_log->jabatan_fungsional_tertentu))
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Nama Jabatan Fungsional Tertentu</label>
								<div class="col-md-3">
								{{$pegawai_log->jabatan_fungsional_tertentu}}
								</div>
								<label class="col-md-3 control-label" for="inputDefault">TMT Jabatan Fungsional Tertentu</label>
								<div class="col-md-3">
								{{indonesian_date($pegawai_log->tmt_jabatan_fungsional_tertentu)}}
								</div>
							</div>
						@elseif(!empty($pegawai_log->jabatan_fungsional_umum))
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Nama Jabatan Fungsional Umum</label>
								<div class="col-md-3">
								{{$pegawai_log->jabatan_fungsional_umum}}
								</div>
								<label class="col-md-3 control-label" for="inputDefault">TMT Jabatan Fungsional Umum</label>
								<div class="col-md-3">
								{{indonesian_date($pegawai_log->tmt_jabatan_fungsional_umum)}}
								</div>
							</div>
						@elseif(!empty($pegawai_log->jabatan_struktural_id))
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Nama Jabatan Struktural</label>
								<div class="col-md-3">
								{{$pegawai_log->unit_kerja->title}}
								</div>
								<label class="col-md-3 control-label" for="inputDefault">TMT Jabatan Struktural</label>
								<div class="col-md-3">
								{{indonesian_date($pegawai_log->tmt_eselon)}}
								</div>
							</div>
						@endif
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Golongan Ruang Awal</label>
							<div class="col-md-3">
							{{$pegawai_log->golongan_awal->title}}
							</div>
							<label class="col-md-3 control-label" for="inputDefault">TMT Gol. Awal</label>
							<div class="col-md-3">
							{{indonesian_date($pegawai_log->tmt_golongan_awal)}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Golongan Ruang Akhir</label>
							<div class="col-md-3">
							{{$pegawai_log->golongan_akhir->title}}
							</div>
							<label class="col-md-3 control-label" for="inputDefault">TMT Gol. Akhir</label>
							<div class="col-md-3">
							{{indonesian_date($pegawai_log->tmt_golongan_akhir)}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Gaji Pokok Baru</label>
							<div class="col-md-3">
							{{$pegawai_log->gaji_pokok}}
							</div>
							<label class="col-md-1 control-label" for="inputDefault">Masa Kerja. Tahun</label>
							<div class="col-md-2">
							{{$pegawai_log->masa_kerja_tahun}}
							</div>
							<label class="col-md-1 control-label" for="inputDefault">Masa Kerja. Bulan</label>
							<div class="col-md-2">
							{{$pegawai_log->masa_kerja_bulan}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Penyesuaian Masa Kerja Tahun</label>
							<div class="col-md-3">
							{{$pegawai_log->penyesuaian_masa_kerja_tahun}}
							</div>
							<label class="col-md-1 control-label" for="inputDefault">Bulan</label>
							<div class="col-md-2">
							{{$pegawai_log->penyesuaian_masa_kerja_bulan}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">SK Penyesuaian Masa Kerja</label>
							<div class="col-md-5">
							{{$pegawai_log->sk_penyesuaian_masa_kerja}}
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
							{{$pegawai_log->no_seri_karpeg}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">No Seri KPE</label>
							<div class="col-md-6">
							{{$pegawai_log->no_seri_kpe}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">No Seri KARIS/KARSU</label>
							<div class="col-md-6">
							{{$pegawai_log->no_seri_karis}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">No Akte Kelahiran</label>
							<div class="col-md-3">
							{{$pegawai_log->no_akte_kelahiran}}
							</div>
							<label class="col-md-3 control-label" for="inputDefault">Tahun Akte</label>
							<div class="col-md-3">
							{{$pegawai_log->tahun_no_akte_kelahiran}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">No Askes</label>
							<div class="col-md-6">
							{{$pegawai_log->no_askes}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">No Taspen</label>
							<div class="col-md-6">
							{{$pegawai_log->no_taspen}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">No NPWP</label>
							<div class="col-md-3">
							{{$pegawai_log->no_npwp}}
							</div>
							<label class="col-md-3 control-label" for="inputDefault">Tanggal NPWP</label>
							<div class="col-md-3">
							{{indonesian_date($pegawai_log->tanggal_npwp)}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Golongan Darah</label>
							<div class="col-md-6">
							{{$pegawai_log->golongan_darah}}
							</div>
						</div>
					 </fieldset>
				</div>

				<!-- BATAS TABULAR -->
				<div id="recent" class="tab-pane">
					 <fieldset>
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
										<th>Action</th>
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
												<td>
								        			@if($data->status == 0)
								        			<a href="{{ route('dashboard.validasi_data.approve.pendidikan', ['pegawai' => $data->pegawai_id, 'id' => $data->id]) }}" class="btn btn-success btn-sm" title="Approve">
								        				<i class="glyphicon glyphicon-ok"></i> Approve
								        			</a>
								        			<a href="{{ route('dashboard.validasi_data.remove.pendidikan', ['pegawai' => $data->pegawai_id, 'id' => $data->id]) }}" class="btn btn-danger btn-sm" title="Remove">
								        				<i class="glyphicon glyphicon-remove"></i> Hapus
								        			</a>
								        			@else
								        			<a class="btn btn-success btn-sm" title="Approved">
								        				<i class="glyphicon glyphicon-ok"></i> Approved
								        			</a>
								        			@endif
							        			</td>
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
										<th>Action</th>
									</tr>
									<tbody>
										@foreach($riwayat_diklat as $key => $data)
											<tr>
												<td>{{$key+1}}</td>
												<td>{{$data->nama_diklat}}</td>
												<td>{{$data->nomor_sertifikat}}</td>
												<td>{{$data->tahun}}</td>
												<td>{{$data->jumlah_jam}}</td>
												<td>
								        			@if($data->status == 0)
								        			<a href="{{ route('dashboard.validasi_data.approve.diklat', ['pegawai' => $data->pegawai_id, 'id' => $data->id]) }}" class="btn btn-success btn-sm" title="Approve">
								        				<i class="glyphicon glyphicon-ok"></i> Approve
								        			</a>
								        			<a href="{{ route('dashboard.validasi_data.remove.diklat', ['pegawai' => $data->pegawai_id, 'id' => $data->id]) }}" class="btn btn-danger btn-sm" title="Remove">
								        				<i class="glyphicon glyphicon-remove"></i> Hapus
								        			</a>
								        			@else
								        			<a class="btn btn-success btn-sm" title="Approved">
								        				<i class="glyphicon glyphicon-ok"></i> Approved
								        			</a>
								        			@endif
							        			</td>
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
										<th>Action</th>
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
												<td>
								        			@if($data->status == 0)
								        			<a href="{{ route('dashboard.validasi_data.approve.kursus', ['pegawai' => $data->pegawai_id, 'id' => $data->id]) }}" class="btn btn-success btn-sm" title="Approve">
								        				<i class="glyphicon glyphicon-ok"></i> Approve
								        			</a>
								        			<a href="{{ route('dashboard.validasi_data.remove.kursus', ['pegawai' => $data->pegawai_id, 'id' => $data->id]) }}" class="btn btn-danger btn-sm" title="Remove">
								        				<i class="glyphicon glyphicon-remove"></i> Hapus
								        			</a>
								        			@else
								        			<a class="btn btn-success btn-sm" title="Approved">
								        				<i class="glyphicon glyphicon-ok"></i> Approved
								        			</a>
								        			@endif
							        			</td>
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
										<th>Action</th>
									</tr>
									<tbody>
										@foreach($riwayat_penghargaan as $key => $data)
											<tr>
												<td>{{$key+1}}</td>
												<td>{{$data->nama_penghargaan}}</td>
												<td>{{$data->nomor_surat_keputusan}}</td>
												<td>{{indonesian_date($data->tanggal)}}</td>
												<td>{{$data->nama_pemberi_penghargaan}}</td>
												<td>
								        			@if($data->status == 0)
								        			<a href="{{ route('dashboard.validasi_data.approve.penghargaan', ['pegawai' => $data->pegawai_id, 'id' => $data->id]) }}" class="btn btn-success btn-sm" title="Approve">
								        				<i class="glyphicon glyphicon-ok"></i> Approve
								        			</a>
								        			<a href="{{ route('dashboard.validasi_data.remove.penghargaan', ['pegawai' => $data->pegawai_id, 'id' => $data->id]) }}" class="btn btn-danger btn-sm" title="Remove">
								        				<i class="glyphicon glyphicon-remove"></i> Hapus
								        			</a>
								        			@else
								        			<a class="btn btn-success btn-sm" title="Approved">
								        				<i class="glyphicon glyphicon-ok"></i> Approved
								        			</a>
								        			@endif
							        			</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							</div>
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
