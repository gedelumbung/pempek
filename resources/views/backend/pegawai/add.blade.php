@extends("backend.layout.backend")

@section("title", "Tambah Pegawai")

@section('content')

<section class="panel">
	<section class="panel form-wizard" id="w2">
			<form class="form-horizontal panel-body" action="{{route('dashboard.pegawai.store')}}" id="submit_pegawai" method="POST" enctype="multipart/form-data" novalidate="novalidate">
				<input type="hidden" name="_token" value="{{csrf_token()}}" />
				<div class="tab-content">
					<div>
						<div class="panel-body">
							<h3 style="border-bottom: 1px solid #eee; padding-left: 10px; padding-bottom: 10px;">1. Data Utama</h3>
							<div class="form-group">
								<label class="col-md-3 control-label">NIP</label>
								<div class="col-md-9">
									<input class="form-control" id="inputDefault" type="text" name="nip" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Nama Lengkap</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="inputDefault" name="nama_lengkap" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Gelar Depan</label>
								<div class="col-md-2">
									<input type="text" class="form-control" id="inputDefault" name="gelar_depan">
								</div>
								<label class="col-md-2 control-label">Gelar Belakang</label>
								<div class="col-md-2">
									<input type="text" class="form-control" id="inputDefault" name="gelar_belakang">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Tempat Lahir</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="tempat_lahir" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Tanggal Lahir</label>
								<div class="col-md-9">
									<input type="text" data-toggle="datepicker" readonly="true" class="form-control" name="tanggal_lahir" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Agama</label>
								<div class="col-md-3">
									<select select2 name="agama" class="form-control" required>
										@foreach(config('simpeg.agama') as $agama)
											<option value="{{$agama}}">{{$agama}}</option>
										@endforeach
									</select>
								</div>
								<div class="col-md-3 tambah"></div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Jenis Kelamin</label>
								<div class="col-md-3">
									<select select2 name="jenis_kelamin" class="form-control" required>
										@foreach(config('simpeg.jenis_kelamin') as $jenis_kelamin)
											<option value="{{$jenis_kelamin}}">{{$jenis_kelamin}}</option>
										@endforeach
									</select>
								</div>
								<div class="col-md-3 tambah"></div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Status Pernikahan</label>
								<div class="col-md-3">
									<select select2 name="status_pernikahan" class="form-control" required>
										@foreach(config('simpeg.status_pernikahan') as $status_pernikahan)
											<option value="{{$status_pernikahan}}">{{$status_pernikahan}}</option>
										@endforeach
									</select>
								</div>
								<div class="col-md-3 tambah"></div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Email</label>
								<div class="col-md-9">
									<input type="email" class="form-control" id="inputDefault" name="email">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Alamat</label>
								<div class="col-md-9">
									<textarea class="form-control" name="alamat"></textarea>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Kode Pos</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="inputDefault" name="kode_pos" maxlength="5">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">No Telepon</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="inputDefault" name="telepon">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">No Handpone</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="inputDefault" name="handphone">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Kedudukan PNS</label>
								<div class="col-md-3">
									<select select2 name="kedudukan_pns" class="form-control" required>
									    @foreach(config('simpeg.kedudukan_pegawai') as $kedudukan_pegawai)
									    	<option value="{{$kedudukan_pegawai}}">{{$kedudukan_pegawai}}</option>
									    @endforeach
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Status Pegawai</label>
								<div class="col-md-3">
									<select select2 name="status_pegawai" class="form-control" required>
									    @foreach(config('simpeg.status_pegawai') as $status_pegawai)
									    	<option value="{{$status_pegawai}}">{{$status_pegawai}}</option>
									    @endforeach
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="tmt_cpns">TMT CPNS</label>
								<div class="col-md-2">
									<input type="text"  data-toggle="datepicker" readonly="true" class="form-control" name="tmt_cpns" id="tmt_cpns">
								</div>
								<label class="col-md-1 control-label">TMT PNS</label>
								<div class="col-md-2">
									<input type="text"  data-toggle="datepicker" readonly="true" class="form-control" name="tmt_pns">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Tingkat Pendidikan Awal Pengangkatan CPNS</label>
								<div class="col-md-3">
									<select select2 name="pendidikan_awal_cpns" class="form-control" required>
									    @foreach(config('simpeg.pendidikan') as $pendidikan)
									    	<option value="{{$pendidikan}}">{{$pendidikan}}</option>
									    @endforeach
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Tingkat Pendidikan Akhir</label>
								<div class="col-md-3">
									<select select2 name="pendidikan_akhir" class="form-control" required>
									    @foreach(config('simpeg.pendidikan') as $pendidikan)
									    	<option value="{{$pendidikan}}">{{$pendidikan}}</option>
									    @endforeach
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Pendidikan Terakhir</label>
								<label class="col-md-3 control-label">Fakultas</label>
								<div class="col-md-6">
									<input class="form-control" type="text" name="pendidikan_akhir_fakultas" placeholder="Fakultas" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label"></label>
								<label class="col-md-3 control-label">Jurusan</label>
								<div class="col-md-6">
									<input class="form-control" type="text" name="pendidikan_akhir_jurusan" placeholder="Jurusan"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label"></label>
								<label class="col-md-3 control-label">Lulus Tahun</label>
								<div class="col-md-6">
									<input class="form-control" maxlength="4" type="text" name="pendidikan_akhir_tahun_lulus" placeholder="Tahun"/>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Diklat Struktural</label>
								<label class="col-md-3 control-label">SEPADA</label>
								<div class="col-md-6">
									<input class="form-control" maxlength="4" type="text" name="tahun_diklat_sepada" placeholder="Tahun"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label"></label>
								<label class="col-md-3 control-label">SEPALA/ADUM/DIKLAT PIM TK. IV</label>
								<div class="col-md-6">
									<input class="form-control" maxlength="4" type="text" name="tahun_diklat_sepala" placeholder="Tahun"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label"></label>
								<label class="col-md-3 control-label">SEPADYA/SPAMA/DIKLAT PIM TIK. III</label>
								<div class="col-md-6">
									<input class="form-control" maxlength="4" type="text" name="tahun_diklat_sepadya" placeholder="Tahun"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label"></label>
								<label class="col-md-3 control-label">SPAMEN/SESPA/SESPANAS /DIKLAT PIM TK.II</label>
								<div class="col-md-6">
									<input class="form-control" maxlength="4" type="text" name="tahun_diklat_spamen" placeholder="Tahun"/>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label"></label>
								<label class="col-md-3 control-label">SEPATI/DIKLAT PIM TK.I</label>
								<div class="col-md-6">
									<input class="form-control" maxlength="4" type="text" name="tahun_diklat_sepati" placeholder="Tahun"/>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Foto</label>
								<div class="col-md-5">
									<div class="fileUpload btn btn-primary" style="margin-top: 0px;">
									    <span>Upload</span>
									    <input type="file" name="input_foto" class="upload" accept="image/*" />
									</div>
									<div class="panel">
										<span class="label label-danger">Perhatian! Resolusi Foto 3 x 4 ! </span>
									</div>
								</div>
								<div class="col-md-4">
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
							<input type="hidden" name="foto" id="foto">
						</div>
					</div>
					<div>
						<div class="panel-body">
							<h3 style="border-bottom: 1px solid #eee; padding-left: 10px; padding-bottom: 10px;">2. Posisi dan Jabatan</h3>
							<div class="form-group">
								<label class="col-md-3 control-label">Unit Organisasi</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="inputDefault" name="unit_organisasi" value="Kementrian Desa, Pembanguanan Daerah Tertinggal dan Transmigrasi" required>
								</div>
							</div>
							<!-- hilmi -->
							<div class="form-group">
								<label class="col-md-3 control-label">Jenis Jabatan</label>
								<div class="col-md-3">
									<select select2 name="jenis_jabatan" class="form-control jenjab" id="jenis_jabatan" required>
										<option value=""></option>
									    @foreach(config('simpeg.jenis_jabatan') as $jenis_jabatan)
									    	<option value="{{$jenis_jabatan}}">{{$jenis_jabatan}}</option>
									    @endforeach
									</select>
								</div>
							</div>

							<!-- STRUKTURAL -->
							<div id="struktural" style="margin-top:15px;margin-bottom:15px">

								<div class="form-group">
									<label class="col-md-3 control-label">Nama Jabatan Struktural </label>
									<div class="col-md-9">
										<div class="col-md-5">
											<select select2 class="form-control jabatan" name="jabatan_struktural_id" style="margin-left:-15px;" id="jabatan_struktural_id">
												<option value=""></option>
												@foreach($unit_kerja as $data_unit_kerja)
													<optgroup label="{{$data_unit_kerja->title}}">
														@foreach($data_unit_kerja->jabatan as $jabatan)
											    			<option value="{{$jabatan->id}}">{{$jabatan->title}}</option>
														@endforeach
													</optgroup>
												@endforeach
											</select>
										</div>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-3 control-label">Eselon</label>
									<div class="col-md-2">
										<input type="text" class="form-control eselon" readonly="true" name="eselon" id="eselon">
									</div>

									<label class="col-md-2 control-label">TMT Eselon</label>
									<div class="col-md-2">
										<input type="text"  data-toggle="datepicker" readonly="true" class="form-control" id="inputDefault" name="tmt_eselon">
									</div>
								</div>
							</div>
							
							<!-- JABATAN FUNGSIONAL -->
							
							<div id="jafung" style="margin-top:15px;margin-bottom:15px">

								<div class="form-group" >
									<label class="col-md-3 control-label">Nama Jabatan Fungsional</label>
									<div class="col-md-2">
										<input type="text" class="form-control" id="inputDefault" name="jabatan_fungsional_tertentu">
									</div>

									<label class="col-md-2 control-label">TMT Jafung</label>
									<div class="col-md-2">
										<input type="text"  data-toggle="datepicker" readonly="true" class="form-control" id="inputDefault" name="tmt_jabatan_fungsional_tertentu">
									</div>
								</div>
							</div>
							
							<!-- JABATAN FUNGSIONAL UMUM -->

							<div id="jafungumum" style="margin-top:15px;margin-bottom:15px">

								<div class="form-group">
									<label class="col-md-3 control-label">Nama Jabatan Fungsional</label>
									<div class="col-md-2">
										<input type="text" class="form-control" id="inputDefault" name="jabatan_fungsional_umum">
									</div>

									<label class="col-md-2 control-label">TMT Jafung Umum</label>
									<div class="col-md-2">
										<input type="text"  data-toggle="datepicker" readonly="true" class="form-control" id="inputDefault" name="tmt_jabatan_fungsional_umum">
									</div>
								</div>
							</div>

							<div id="jenis_jabatan_sub" style="margin-top:15px;margin-bottom:15px">
								<div class="form-group">
									<label class="col-md-3 control-label">Unit Kerja</label>
									<div class="col-md-9">
										<div class="col-md-3">
											<select select2 class="form-control satker" style="margin-left:-15px;" name="unit_kerja_id" id="unit_kerja_id">
												<option value=""></option>
											    @foreach($unit_kerja as $unit)
											    	<option value="{{$unit->id}}">{{$unit->title}}</option>
											    @endforeach
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Sub Unit Kerja </label>
									<div class="col-md-9">
										<div class="col-md-5">
											<select select2 class="form-control unit_kerja" name="sub_unit_kerja_id" style="margin-left:-15px;" id="sub_unit_kerja_id">
												<option value=""></option>
											</select>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label">Satuan Kerja </label>
									<div class="col-md-9">
										<div class="col-md-5">
											<select select2 class="form-control jabatan" name="satuan_kerja_id" style="margin-left:-15px;" id="satuan_kerja_id">
												<option value=""></option>
											</select>
										</div>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Golongan Ruang Awal</label>
								<div class="col-md-2">
									<select select2 class="form-control" name="golongan_id_awal" required>
									    @foreach($golongan as $data_golongan)
									    	<option value="{{$data_golongan->id}}">{{$data_golongan->title}} - {{$data_golongan->description}}</option>
									    @endforeach
									</select>
								</div>
								<label class="col-md-2 control-label">TMT Gol. Awal</label>
								<div class="col-md-2">
									<input type="text"  data-toggle="datepicker" readonly="true" class="form-control" id="inputDefault" name="tmt_golongan_awal" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Golongan Ruang Akhir</label>
								<div class="col-md-2">
									<select select2 class="form-control" name="golongan_id_akhir" required>
									    @foreach($golongan as $data_golongan)
									    	<option value="{{$data_golongan->id}}">{{$data_golongan->title}} - {{$data_golongan->description}}</option>
									    @endforeach
									</select>
								</div>
								<label class="col-md-2 control-label">TMT Gol. Akhir</label>
								<div class="col-md-2">
									<input type="text"  data-toggle="datepicker" readonly="true" class="form-control" id="inputDefault" name="tmt_golongan_akhir" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Gaji Pokok</label>
								<div class="col-md-2">
									<input type="text" class="form-control" id="inputDefault" name="gaji_pokok" required>
								</div>

								<label class="col-md-1 control-label" for="masa_kerja_tahun">Masa Kerja. Tahun</label>
								<div class="col-md-1">
									<input type="text" class="form-control" id="masa_kerja_tahun" name="masa_kerja_tahun" readonly="true" maxlength="2">
								</div>
								<label class="col-md-1 control-label" for="masa_kerja_bulan">Bulan</label>
								<div class="col-md-1">
									<input type="text" class="form-control" id="masa_kerja_bulan" name="masa_kerja_bulan" readonly="true" maxlength="2">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Penyesuaian Masa Kerja Tahun</label>
								<div class="col-md-2">
									<input type="text" maxlength="2" class="form-control" id="inputDefault" name="penyesuaian_masa_kerja_tahun" required>
								</div>
								<label class="col-md-1 control-label">Bulan</label>
								<div class="col-md-2">
									<input type="text" maxlength="2" class="form-control" id="inputDefault" name="penyesuaian_masa_kerja_bulan" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">SK Penyesuaian Masa Kerja</label>
								<div class="col-md-3">
									<input type="text" class="form-control" id="inputDefault" name="sk_penyesuaian_masa_kerja">
								</div>
							</div>
						</div>
					</div>
					<div>
						<div class="panel-body">
							<h3 style="border-bottom: 1px solid #eee; padding-left: 10px; padding-bottom: 10px;">3. Data Lainnya</h3>
						 	<div class="form-group">
								<label class="col-md-3 control-label">No Seri KARPEG</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="inputDefault" name="no_seri_karpeg" maxlength="9">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">No Seri KPE</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="inputDefault" name="no_seri_kpe" maxlength="9">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">No Seri KARIS/KARSU</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="inputDefault" name="no_seri_karis" maxlength="9">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">No Akte Kelahiran</label>
								<div class="col-md-2">
									<input type="text" class="form-control" id="inputDefault" name="no_akte_kelahiran">
								</div>

								<label class="col-md-2 control-label">Tahun Akte</label>
								<div class="col-md-2">
									<input type="text" class="form-control" id="inputDefault" name="tahun_no_akte_kelahiran" maxlength="4">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">No ASKES</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="inputDefault" name="no_askes" maxlength="13">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">No TASPEN</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="inputDefault" name="no_taspen" maxlength="18">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">No NPWP</label>
								<div class="col-md-2">
									<input type="text" class="form-control" id="inputDefault" name="no_npwp">
								</div>

								<label class="col-md-2 control-label">Tanggal NPWP</label>
								<div class="col-md-2">
									<input type="text"  data-toggle="datepicker" readonly="true" class="form-control" id="inputDefault" name="tanggal_npwp">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Golongan Darah</label>
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
<script type="text/javascript">

$("#jenis_jabatan_sub").hide();
$("#struktural").hide();
$("#jafung").hide();
$("#jafungumum").hide();

$("#jenis_jabatan").change(function(){
	var jenis_jabatan = $(this).val();
	$("#jenis_jabatan_sub").show();

	$("#eselon").val('');

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

$("#unit_kerja_id").change(function(){
    $.ajax({
        type: "POST",
        url: "{{ route('dashboard.ajax.sub_unit_kerja') }}",
        dataType:"json",
        data: {
        	'unit_kerja_id' : $(this).val(),
        	'_token' : '{{ csrf_token() }}'
        },
        success: function (responses) {
        	$("#sub_unit_kerja_id").select2("val", "");
        	$('#sub_unit_kerja_id').html('');
        	$("#satuan_kerja_id").select2("val", "");
        	$('#satuan_kerja_id').html('');
		    $('#sub_unit_kerja_id').append('<option disabled selected value>--- Pilih ---</option>');

        	$.each(responses, function (i, response) {
			    $('#sub_unit_kerja_id').append($('<option>', { 
			        value: response.id,
			        text : response.title 
			    }));
			});
        }
    });
});

$("#sub_unit_kerja_id").change(function(){
    $.ajax({
        type: "POST",
        url: "{{ route('dashboard.ajax.satuan_kerja') }}",
        dataType:"json",
        data: {
        	'sub_unit_kerja_id' : $(this).val(),
        	'_token' : '{{ csrf_token() }}'
        },
        success: function (responses) {
        	$("#satuan_kerja_id").select2("val", "");
        	$('#satuan_kerja_id').html('');
		    $('#satuan_kerja_id').append('<option disabled selected value>--- Pilih ---</option>');

        	$.each(responses, function (i, response) {
			    $('#satuan_kerja_id').append($('<option>', { 
			        value: response.id,
			        text : response.title 
			    }));
			});
        }
    });
});

$("#jabatan_struktural_id").change(function(){
    $.ajax({
        type: "POST",
        url: "{{ route('dashboard.ajax.jabatan_struktural_detail') }}",
        dataType:"json",
        data: {
        	'jabatan_struktural_id' : $(this).val(),
        	'_token' : '{{ csrf_token() }}'
        },
        success: function (responses) {
        	$("#eselon").val(responses.eselon)
        }
    });
});

$('#tmt_cpns').change(function(){
	var today = new Date();
	var birthDate = new Date($("#tmt_cpns").val());
	var year = today.getFullYear() - birthDate.getFullYear();
	var m = today.getMonth() - birthDate.getMonth();
	if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
		year--;
	}
	if (m === -1) {
		m = 11;
	}
	$("#masa_kerja_tahun").val(year);
	$("#masa_kerja_bulan").val(m);
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
      	$("#foto").val(e.target.result);
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