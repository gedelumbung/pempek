@extends("backend.layout.backend")

@section("title", "Tambah Pegawai")

@section('content')

<section class="panel">
	<section class="panel form-wizard" id="w2">
		<div class="tabs panel">
			<ul class="nav nav-tabs nav-justify">
				<li class='active'>
					<a href="#w2-datautama" data-toggle="tab" class="text-center">
						<span class="badge hidden-xs">1</span>
						Data Utama
					</a>
				</li>
				<li>
					<a href="#w2-posisijabatan" data-toggle="tab" class="text-center">
						<span class="badge hidden-xs">2</span>
						Posisi & Jabatan
					</a>
				</li>
				<li>
					<a href="#w2-datalainnya" data-toggle="tab" class="text-center">
						<span class="badge hidden-xs">3</span>
						Data Lainnya
					</a>
				</li>
			</ul>
			<form class="form-horizontal panel-body" action="{{route('dashboard.pegawai.store')}}" id="submit_pegawai" method="POST" enctype="multipart/form-data" novalidate="novalidate">
				<input type="hidden" name="_token" value="{{csrf_token()}}" />
				<div class="tab-content">
					<div id="w2-datautama" class="tab-pane active">
						<div class="panel-body">
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">NIP</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="inputDefault" name="nip">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Nama</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="inputDefault" name="nama_lengkap">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Gelar Depan</label>
								<div class="col-md-2">
									<input type="text" class="form-control" id="inputDefault" name="gelar_depan">
								</div>
								<label class="col-md-2 control-label" for="inputDefault">Gelar Belakang</label>
								<div class="col-md-2">
									<input type="text" class="form-control" id="inputDefault" name="gelar_belakang">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Tempat Lahir</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="tempat_lahir">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Tanggal Lahir</label>
								<div class="col-md-9">
									<input type="text" datepicker rules="date" class="form-control" name="tanggal_lahir">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Agama</label>
								<div class="col-md-3">
									<select select2 select2 name="agama" class="form-control">
										@foreach(config('simpeg.agama') as $agama)
											<option value="{{$agama}}">{{$agama}}</option>
										@endforeach
									</select>
								</div>
								<div class="col-md-3 tambah"></div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Jenis Kelamin</label>
								<div class="col-md-3">
									<select select2 select2 name="jenis_kelamin" class="form-control">
										@foreach(config('simpeg.jenis_kelamin') as $jenis_kelamin)
											<option value="{{$jenis_kelamin}}">{{$jenis_kelamin}}</option>
										@endforeach
									</select>
								</div>
								<div class="col-md-3 tambah"></div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Status Pernikahan</label>
								<div class="col-md-3">
									<select select2 select2 name="status_pernikahan" class="form-control">
										@foreach(config('simpeg.status_pernikahan') as $status_pernikahan)
											<option value="{{$status_pernikahan}}">{{$status_pernikahan}}</option>
										@endforeach
									</select>
								</div>
								<div class="col-md-3 tambah"></div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Email</label>
								<div class="col-md-9">
									<input type="email" class="form-control" id="inputDefault" name="email">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Alamat</label>
								<div class="col-md-9">
									<textarea class="form-control" name="alamat"></textarea>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Kode Pos</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="inputDefault" name="kode_pos" maxlength="5">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">No Telepon</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="inputDefault" name="no_telepon">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">No Handpone</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="inputDefault" name="handphone">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Kedudukan PNS</label>
								<div class="col-md-3">
									<select select2 name="kedudukan_pns" class="form-control">
										<option value=""></option>
									    @foreach(config('simpeg.kedudukan_pegawai') as $kedudukan_pegawai)
									    	<option value="{{$kedudukan_pegawai}}">{{$kedudukan_pegawai}}</option>
									    @endforeach
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Status Pegawai</label>
								<div class="col-md-3">
									<select select2 name="status_pegawai" class="form-control">
										<option value=""></option>
									    @foreach(config('simpeg.status_pegawai') as $status_pegawai)
									    	<option value="{{$status_pegawai}}">{{$status_pegawai}}</option>
									    @endforeach
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">TMT CPNS</label>
								<div class="col-md-2">
									<input type="text" datepicker rules="date" class="form-control" id="inputDefault" name="tmt_cpns">
								</div>
								<label class="col-md-1 control-label" for="inputDefault">TMT PNS</label>
								<div class="col-md-2">
									<input type="text" datepicker rules="date" class="form-control" id="inputDefault" name="tmt_pns">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Tingkat Pendidikan Awal Pengangkatan CPNS</label>
								<div class="col-md-3">
									<select select2 name="pendidikan_awal_cpns" class="form-control">
										<option value=""></option>
									    @foreach(config('simpeg.pendidikan') as $pendidikan)
									    	<option value="{{$pendidikan}}">{{$pendidikan}}</option>
									    @endforeach
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Tingkat Pendidikan Akhir</label>
								<div class="col-md-3">
									<select select2 name="pendidikan_akhir" class="form-control">
										<option value=""></option>
									    @foreach(config('simpeg.pendidikan') as $pendidikan)
									    	<option value="{{$pendidikan}}">{{$pendidikan}}</option>
									    @endforeach
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Diklat Struktural</label>
								<label class="col-md-3 control-label" for="inputDefault">SEPADA</label>
								<div class="col-md-6">
									<input class="form-control" maxlength="4" type="text" name="tahun_diklat_sepada" placeholder="Tahun"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault"></label>
								<label class="col-md-3 control-label" for="inputDefault">SEPALA/ADUM/DIKLAT PIM TK. IV</label>
								<div class="col-md-6">
									<input class="form-control" maxlength="4" type="text" name="tahun_diklat_sepala" placeholder="Tahun"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault"></label>
								<label class="col-md-3 control-label" for="inputDefault">SEPADYA/SPAMA/DIKLAT PIM TIK. III</label>
								<div class="col-md-6">
									<input class="form-control" maxlength="4" type="text" name="tahun_diklat_sepadya" placeholder="Tahun"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault"></label>
								<label class="col-md-3 control-label" for="inputDefault">SPAMEN/SESPA/SESPANAS /DIKLAT PIM TK.II</label>
								<div class="col-md-6">
									<input class="form-control" maxlength="4" type="text" name="tahun_diklat_spamen" placeholder="Tahun"/>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault"></label>
								<label class="col-md-3 control-label" for="inputDefault">SEPATI/DIKLAT PIM TK.I</label>
								<div class="col-md-6">
									<input class="form-control" maxlength="4" type="text" name="tahun_diklat_sepati" placeholder="Tahun"/>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Pendidikan Terakhir</label>
								<label class="col-md-3 control-label" for="inputDefault">Fakultas</label>
								<div class="col-md-6">
									<input class="form-control" maxlength="4" type="text" name="pendidikan_akhir_fakultas" placeholder="Fakultas"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault"></label>
								<label class="col-md-3 control-label" for="inputDefault">Jurusan</label>
								<div class="col-md-6">
									<input class="form-control" maxlength="4" type="text" name="pendidikan_akhir_jurusan" placeholder="Jurusan"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault"></label>
								<label class="col-md-3 control-label" for="inputDefault">Lulus Tahun</label>
								<div class="col-md-6">
									<input class="form-control" maxlength="4" type="text" name="pendidikan_akhir_tahun_lulus" placeholder="Tahun"/>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Foto</label>
								<div class="col-md-3">
									<div class="fileUpload btn btn-primary" style="margin-top: 0px;">
									    <span>Upload</span>
									    <input type="file" name="foto" class="upload" accept="image/*" />
									</div>
									<div class="panel">
										<span class="label label-danger">Perhatian! Resolusi Foto 3 x 4 ! </span>
									</div>
								</div>
								<div class="col-md-3">
							  		<div class="form-group">
					    		        <label>
					    		            Preview Foto
					    		        </label>
					    		        <div class="panel-body">
				    						<img id="previewHolder" width="60%"></img>
				    						<div id='pember' style='margin-left: -15px;'>Pilih foto terlebih dahulu</div>
					    				</div>
					        		</div>
								</div>
							</div>
						</div>
					</div>
					<div id="w2-posisijabatan" class="tab-pane">
						<div class="panel-body">

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Unit Organisasi</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="inputDefault" name="unit_organisasi">
								</div>
							</div>
							<!-- hilmi -->
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Jenis Jabatan</label>
								<div class="col-md-3">
									<select select2 name="jenis_jabatan" class="form-control jenjab" id="jenis_jabatan">
										<option value=""></option>
									    @foreach(config('simpeg.jenis_jabatan') as $jenis_jabatan)
									    	<option value="{{$jenis_jabatan}}">{{$jenis_jabatan}}</option>
									    @endforeach
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Unit Kerja</label>
								<div class="col-md-9">
									<div class="col-md-3">
										<select select2 class="form-control satker" style="margin-left:-15px;" name="unit_kerja_id">
											<option value="">Pilih Unit Kerja</option>
										    @foreach($unit_kerja as $unit)
										    	<option value="{{$unit->id}}">{{$unit->title}}</option>
										    @endforeach
										</select>
									</div>
								</div>
							</div>

							<!-- STRUKTURAL -->
							<div id="struktural" style="margin-top:15px;margin-bottom:15px">
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Sub Unit Kerja </label>
									<div class="col-md-9">
										<div class="col-md-5">
											<select select2 class="form-control unit_kerja" name="sub_unit_kerja_id" style="margin-left:-15px;">

											</select>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Satuan Kerja </label>
									<div class="col-md-9">
										<div class="col-md-5">
											<select select2 class="form-control jabatan" name="satuan_kerja_id" style="margin-left:-15px;">
											</select>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Nama Jabatan Struktural </label>
									<div class="col-md-9">
										<div class="col-md-5">
											<select select2 class="form-control jabatan" name="jabatan_struktural_id" style="margin-left:-15px;">
											</select>
										</div>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Eselon</label>
									<div class="col-md-2">
										<input type="text" class="form-control eselon" id="inputDefault" name="eselon">
									</div>

									<label class="col-md-2 control-label" for="inputDefault">TMT Eselon</label>
									<div class="col-md-2">
										<input type="text" class="form-control" id="inputDefault" name="tmt_eselon" datepicker>
									</div>
								</div>
							</div>
							
							<!-- JABATAN FUNGSIONAL -->
							
							<div id="jafung" style="margin-top:15px;margin-bottom:15px">
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Sub Unit Kerja </label>
									<div class="col-md-9">
										<div class="col-md-5">
											<select select2 class="form-control unit_kerja" name="sub_unit_kerja_id" style="margin-left:-15px;">

											</select>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Satuan Kerja </label>
									<div class="col-md-9">
										<div class="col-md-5">
											<select select2 class="form-control jabatan" name="satuan_kerja_id" style="margin-left:-15px;">
											</select>
										</div>
									</div>
								</div>

								<div class="form-group" >
									<label class="col-md-3 control-label" for="inputDefault">Nama Jabatan Fungsional</label>
									<div class="col-md-2">
										<input type="text" class="form-control" id="inputDefault" name="jabatan_fungsional_tertentu">
									</div>

									<label class="col-md-2 control-label" for="inputDefault">TMT Jafung</label>
									<div class="col-md-2">
										<input type="text" class="form-control" id="inputDefault" name="tmt_jabatan_fungsional_tertentu" datepicker>
									</div>
								</div>
							</div>
							
							<!-- JABATAN FUNGSIONAL UMUM -->

							<div id="jafungumum" style="margin-top:15px;margin-bottom:15px">
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Sub Unit Kerja </label>
									<div class="col-md-9">
										<div class="col-md-5">
											<select select2 class="form-control unit_kerja" name="sub_unit_kerja_id" style="margin-left:-15px;">

											</select>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Satuan Kerja </label>
									<div class="col-md-9">
										<div class="col-md-5">
											<select select2 class="form-control jabatan" name="satuan_kerja_id" style="margin-left:-15px;">
											</select>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Nama Jabatan Fungsional</label>
									<div class="col-md-2">
										<input type="text" class="form-control" id="inputDefault" name="jabatan_fungsional_umum">
									</div>

									<label class="col-md-2 control-label" for="inputDefault">TMT Jafung Umum</label>
									<div class="col-md-2">
										<input type="text" class="form-control" id="inputDefault" name="tmt_jabatan_fungsional_umum" datepicker>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Golongan Ruang Awal</label>
								<div class="col-md-2">
									<select select2 class="form-control" name="golongan_id_awal">
									    @foreach($golongan as $data_golongan)
									    	<option value="{{$data_golongan->id}}">{{$data_golongan->title}}</option>
									    @endforeach
									</select>
								</div>
								<label class="col-md-2 control-label" for="inputDefault">TMT Gol. Awal</label>
								<div class="col-md-2">
									<input type="text" class="form-control" id="inputDefault" name="tmt_golongan_awal" datepicker>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Golongan Ruang Akhir</label>
								<div class="col-md-2">
									<select select2 class="form-control" name="golongan_id_akhir">
									    @foreach($golongan as $data_golongan)
									    	<option value="{{$data_golongan->id}}">{{$data_golongan->title}}</option>
									    @endforeach
									</select>
								</div>
								<label class="col-md-2 control-label" for="inputDefault">TMT Gol. Akhir</label>
								<div class="col-md-2">
									<input type="text" class="form-control" id="inputDefault" name="tmt_golongan_akhir" datepicker>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Gaji Pokok</label>
								<div class="col-md-2">
									<input type="text" class="form-control" id="inputDefault" name="gaji_pokok">
								</div>

								<label class="col-md-1 control-label" for="inputDefault">Masa Kerja. Tahun</label>
								<div class="col-md-1">
									<input type="text" class="form-control" id="inputDefault" name="masa_kerja_tahun" maxlength="4">
								</div>
								<label class="col-md-1 control-label" for="inputDefault">Bulan</label>
								<div class="col-md-1">
									<input type="text" class="form-control" id="inputDefault" name="masa_kerja_bulan" maxlength="2">
								</div>
							</div>
						</div>
					</div>
					<div id="w2-datalainnya" class="tab-pane">
						<div class="panel-body">
						 	<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">No Seri KARPEG</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="inputDefault" name="no_seri_karpeg" maxlength="9">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">No Seri KPE</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="inputDefault" name="no_seri_kpe" maxlength="9">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">No Seri KARIS/KARSU</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="inputDefault" name="no_seri_karis" maxlength="9">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">No Akte Kelahiran</label>
								<div class="col-md-2">
									<input type="text" class="form-control" id="inputDefault" name="no_akte_kelahiran">
								</div>

								<label class="col-md-2 control-label" for="inputDefault">Tahun Akte</label>
								<div class="col-md-2">
									<input type="text" class="form-control" id="inputDefault" name="tahun_no_akte_kelahiran">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">No ASKES</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="inputDefault" name="no_askes" maxlength="13">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">No TASPEN</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="inputDefault" name="no_taspen" maxlength="18">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">No NPWP</label>
								<div class="col-md-2">
									<input type="text" class="form-control" id="inputDefault" name="no_npwp">
								</div>

								<label class="col-md-2 control-label" for="inputDefault">Tanggal NPWP</label>
								<div class="col-md-2">
									<input type="text" class="form-control" id="inputDefault" name="tanggal_npwp" datepicker>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Golongan Darah</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="inputDefault" name="golongan_darah">
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12" style="text-align: right;">
									<button type="submit" class="btn btn-primary simpan"><span class="fa fa-save"></span> Simpan</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="panel-footer">
			<ul class="pager">
				<li class="previous disabled">
					<a><i class="fa fa-angle-left"></i> Previous</a>
				</li>
				<li class="finish hidden pull-right">
					<a>Finish</a>
				</li>
				<li class="next">
					<a>Next <i class="fa fa-angle-right"></i></a>
				</li>
			</ul>
		</div>
	</section>
</section>

@endsection


@push("style")
	<style>
		.fileUpload {
		    position: relative;
		    overflow: hidden;
		    margin: 10px;
		}
		.fileUpload input.upload {
		    position: absolute;
		    top: 0;
		    right: 0;
		    margin: 0;
		    padding: 0;
		    font-size: 20px;
		    cursor: pointer;
		    opacity: 0;
		    filter: alpha(opacity=0);
		}
	</style>
@endpush

@push("script")
<script src="{{ asset("js/jquery.bootstrap.wizard.js") }}"></script>
<script src="{{ asset("js/jquery.validate.js") }}"></script>
<script src="{{ asset("js/examples.wizard.js") }}"></script>
<script type="text/javascript">

$("#struktural").hide();
$("#jafung").hide();
$("#jafungumum").hide();

$("#jenis_jabatan").change(function(){
	var jenis_jabatan = $(this).val();

	if(jenis_jabatan == 'Struktural'){
		$("#struktural").show();
		$("#jafung").hide();
		$("#jafungumum").hide();
	}
	else if(jenis_jabatan == 'Fungsional Tertentu'){
		$("#struktural").hide();
		$("#jafung").show();
		$("#jafungumum").hide();
	}
	else if(jenis_jabatan == 'Fungsional Umum'){
		$("#struktural").hide();
		$("#jafung").hide();
		$("#jafungumum").show();
	}
});

var foto="";
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      foto 	= e.target.result;
      var ext = foto.split(";", 1);
      var extt = ext.toString();
      var rules = ["data:image/jpeg",'data:image/png','data:image/gif','data:image/bmp','data:image/x-windows-bmp'];
      if($.inArray(extt, rules) == -1){
      	fn.alert("File tidak didukung !");
      	$("input.upload").val("");
      	$('#previewHolder').attr('src', "");
      	$(".submit").attr("disabled", "disabled");
      }
      else{
      	$('#previewHolder').attr('src', e.target.result);
      	$(".submit").removeAttr("disabled");
      }
      $('#pember').html('');
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("input.upload").change(function() {
  if($(this).val()){
    readURL(this);
  }
  else{
    setTimeout(function(){
        $('#previewHolder').attr('src', "");
        $('#pember').html('');
    });
  }
});
</script>
@endpush