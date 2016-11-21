@extends("backend.layout.backend")

@section("title", "Tambah Pegawai")

@section('content')


<section class="panel">
	<header class="panel-heading">
		
	</header>
	<div class="panel-body">
		<a href="{{url('pegawai/printpegawai/')}}" class="btn btn-danger pull-right"><span class="fa fa-download"></span> Export to Pdf</a>
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
								<img src="" style="width: 150px;height: 200px">
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
							{{$pegawai->tanggal_lahir}}
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
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Unit Kerja</label>
							<div class="col-md-6">
							{{$pegawai->unit_kerja->title}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Handphone</label>
							<div class="col-md-6">
							{{$pegawai->handphone}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Handphone</label>
							<div class="col-md-6">
							{{$pegawai->handphone}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Handphone</label>
							<div class="col-md-6">
							{{$pegawai->handphone}}
							</div>
						</div>
					 </fieldset>
				</div>

				<!-- BATAS TABULAR -->
				<div id="recent" class="tab-pane">
				
				</div>
			</div>
		</div>
	</div>
</section>

@endsection
