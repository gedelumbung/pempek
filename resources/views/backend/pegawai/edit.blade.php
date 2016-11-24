@extends("backend.layout.backend")

@section("title", "Edit Pegawai")

@section('content')

<section class="panel">
	<section class="panel form-wizard" id="w2">
			<form class="form-horizontal panel-body" action="{{route('dashboard.pegawai.update')}}" id="submit_pegawai" method="POST" enctype="multipart/form-data" novalidate="novalidate">
				<input type="hidden" name="_token" value="{{csrf_token()}}" />
				<input type="hidden" name="id" value={{$pegawai->id}}>
				<div class="tab-content">
					<div>
						<div class="panel-body">
							<h3 style="border-bottom: 1px solid #eee; padding-left: 10px; padding-bottom: 10px;">1. Data Utama</h3>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">NIP</label>
								<div class="col-md-9">
									<input value="{{$pegawai->nip}}" type="text" class="form-control" id="inputDefault" name="nip" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Nama</label>
								<div class="col-md-9">
									<input value="{{$pegawai->nama_lengkap}}" type="text" class="form-control" id="inputDefault" name="nama_lengkap" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Gelar Depan</label>
								<div class="col-md-2">
									<input value="{{$pegawai->gelar_depan}}" type="text" class="form-control" id="inputDefault" name="gelar_depan">
								</div>
								<label class="col-md-2 control-label" for="inputDefault">Gelar Belakang</label>
								<div class="col-md-2">
									<input value="{{$pegawai->gelar_belakang}}" type="text" class="form-control" id="inputDefault" name="gelar_belakang">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Tempat Lahir</label>
								<div class="col-md-9">
									<input value="{{$pegawai->tempat_lahir}}" type="text" class="form-control" name="tempat_lahir" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Tanggal Lahir</label>
								<div class="col-md-9">
									<input value="{{$pegawai->tanggal_lahir}}" type="date" class="form-control" name="tanggal_lahir" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Agama</label>
								<div class="col-md-3">
									<select select2 name="agama" class="form-control" required>
										@foreach(config('simpeg.agama') as $agama)
											@if($pegawai->agama == $agama)
											<option value="{{$agama}}" selected="selected">{{$agama}}</option>
											@else
											<option value="{{$agama}}">{{$agama}}</option>
											@endif
										@endforeach
									</select>
								</div>
								<div class="col-md-3 tambah"></div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Jenis Kelamin</label>
								<div class="col-md-3">
									<select select2 name="jenis_kelamin" class="form-control" required>
										@foreach(config('simpeg.jenis_kelamin') as $jenis_kelamin)
											@if($pegawai->jenis_kelamin == $jenis_kelamin)
											<option value="{{$jenis_kelamin}}" selected="selected">{{$jenis_kelamin}}</option>
											@else
											<option value="{{$jenis_kelamin}}">{{$jenis_kelamin}}</option>
											@endif
										@endforeach
									</select>
								</div>
								<div class="col-md-3 tambah"></div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Status Pernikahan</label>
								<div class="col-md-3">
									<select select2 name="status_pernikahan" class="form-control" required>
										@foreach(config('simpeg.status_pernikahan') as $status_pernikahan)
											@if($pegawai->status_pernikahan == $status_pernikahan)
											<option value="{{$status_pernikahan}}" selected="selected">{{$status_pernikahan}}</option>
											@else
											<option value="{{$status_pernikahan}}">{{$status_pernikahan}}</option>
											@endif
										@endforeach
									</select>
								</div>
								<div class="col-md-3 tambah"></div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Email</label>
								<div class="col-md-9">
									<input value="{{$pegawai->email}}" type="email" class="form-control" id="inputDefault" name="email" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Alamat</label>
								<div class="col-md-9">
									<textarea class="form-control" name="alamat" required>{{$pegawai->alamat}}</textarea>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Kode Pos</label>
								<div class="col-md-9">
									<input value="{{$pegawai->kode_pos}}" type="text" class="form-control" id="inputDefault" name="kode_pos" maxlength="5" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">No Telepon</label>
								<div class="col-md-9">
									<input value="{{$pegawai->telepon}}" type="text" class="form-control" id="inputDefault" name="telepon">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">No Handpone</label>
								<div class="col-md-9">
									<input value="{{$pegawai->handphone}}" type="text" class="form-control" id="inputDefault" name="handphone" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Kedudukan PNS</label>
								<div class="col-md-3">
									<select select2 name="kedudukan_pns" class="form-control" required>
									    @foreach(config('simpeg.kedudukan_pegawai') as $kedudukan_pegawai)
											@if($pegawai->kedudukan_pns == $kedudukan_pegawai)
											<option value="{{$kedudukan_pegawai}}" selected="selected">{{$kedudukan_pegawai}}</option>
											@else
											<option value="{{$kedudukan_pegawai}}">{{$kedudukan_pegawai}}</option>
											@endif
									    @endforeach
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Status Pegawai</label>
								<div class="col-md-3">
									<select select2 name="status_pegawai" class="form-control" required>
									    @foreach(config('simpeg.status_pegawai') as $status_pegawai)
											@if($pegawai->status_pegawai == $status_pegawai)
											<option value="{{$status_pegawai}}" selected="selected">{{$status_pegawai}}</option>
											@else
											<option value="{{$status_pegawai}}">{{$status_pegawai}}</option>
											@endif
									    @endforeach
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="tmt_cpns">TMT CPNS</label>
								<div class="col-md-2">
									<input value="{{$pegawai->tmt_cpns}}" type="date" class="form-control" id="tmt_cpns" name="tmt_cpns" required>
								</div>
								<label class="col-md-1 control-label" for="inputDefault">TMT PNS</label>
								<div class="col-md-2">
									<input value="{{$pegawai->tmt_pns}}" type="date" class="form-control" id="inputDefault" name="tmt_pns" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Tingkat Pendidikan Awal Pengangkatan CPNS</label>
								<div class="col-md-3">
									<select select2 name="pendidikan_awal_cpns" class="form-control" required>
									    @foreach(config('simpeg.pendidikan') as $pendidikan)
											@if($pegawai->pendidikan_awal_cpns == $pendidikan)
											<option value="{{$pendidikan}}" selected="selected">{{$pendidikan}}</option>
											@else
											<option value="{{$pendidikan}}">{{$pendidikan}}</option>
											@endif
									    @endforeach
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Tingkat Pendidikan Akhir</label>
								<div class="col-md-3">
									<select select2 name="pendidikan_akhir" class="form-control" required>
									    @foreach(config('simpeg.pendidikan') as $pendidikan)
											@if($pegawai->pendidikan_akhir == $pendidikan)
											<option value="{{$pendidikan}}" selected="selected">{{$pendidikan}}</option>
											@else
											<option value="{{$pendidikan}}">{{$pendidikan}}</option>
											@endif
									    @endforeach
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Diklat Struktural</label>
								<label class="col-md-3 control-label" for="inputDefault">SEPADA</label>
								<div class="col-md-6">
									<input value="{{$pegawai->tahun_diklat_sepada}}" class="form-control" maxlength="4" type="text" name="tahun_diklat_sepada" placeholder="Tahun"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault"></label>
								<label class="col-md-3 control-label" for="inputDefault">SEPALA/ADUM/DIKLAT PIM TK. IV</label>
								<div class="col-md-6">
									<input value="{{$pegawai->tahun_diklat_sepala}}" class="form-control" maxlength="4" type="text" name="tahun_diklat_sepala" placeholder="Tahun"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault"></label>
								<label class="col-md-3 control-label" for="inputDefault">SEPADYA/SPAMA/DIKLAT PIM TIK. III</label>
								<div class="col-md-6">
									<input value="{{$pegawai->tahun_diklat_sepadya}}" class="form-control" maxlength="4" type="text" name="tahun_diklat_sepadya" placeholder="Tahun"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault"></label>
								<label class="col-md-3 control-label" for="inputDefault">SPAMEN/SESPA/SESPANAS /DIKLAT PIM TK.II</label>
								<div class="col-md-6">
									<input value="{{$pegawai->tahun_diklat_spamen}}" class="form-control" maxlength="4" type="text" name="tahun_diklat_spamen" placeholder="Tahun"/>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault"></label>
								<label class="col-md-3 control-label" for="inputDefault">SEPATI/DIKLAT PIM TK.I</label>
								<div class="col-md-6">
									<input value="{{$pegawai->tahun_diklat_sepati}}" class="form-control" maxlength="4" type="text" name="tahun_diklat_sepati" placeholder="Tahun"/>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Pendidikan Terakhir</label>
								<label class="col-md-3 control-label" for="inputDefault">Fakultas</label>
								<div class="col-md-6">
									<input value="{{$pegawai->pendidikan_akhir_fakultas}}" class="form-control" type="text" name="pendidikan_akhir_fakultas" placeholder="Fakultas" required />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault"></label>
								<label class="col-md-3 control-label" for="inputDefault">Jurusan</label>
								<div class="col-md-6">
									<input value="{{$pegawai->pendidikan_akhir_jurusan}}" class="form-control" type="text" name="pendidikan_akhir_jurusan" placeholder="Jurusan" required/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault"></label>
								<label class="col-md-3 control-label" for="inputDefault">Lulus Tahun</label>
								<div class="col-md-6">
									<input value="{{$pegawai->pendidikan_akhir_tahun_lulus}}" class="form-control" maxlength="4" type="text" name="pendidikan_akhir_tahun_lulus" placeholder="Tahun" required/>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Foto</label>
								<div class="col-md-5">
									<div class="fileUpload btn btn-primary" style="margin-top: 0px;">
									    <span>Upload</span>
									    <input value="{{$pegawai->nama_lengkap}}" type="file" name="input_foto" class="upload" accept="image/*" />
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
					    		        	@if(empty($pegawai->foto))
				    							<img id="previewHolder" width="60%"></img>
				    						@else
				    							<img id="previewHolder" src="{{ asset('pegawai/'.$pegawai->foto) }}" width="60%"></img>
				    						@endif
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
								<label class="col-md-3 control-label" for="inputDefault">Unit Organisasi</label>
								<div class="col-md-9">
									<input value="{{$pegawai->unit_organisasi}}" type="text" class="form-control" id="inputDefault" name="unit_organisasi" required>
								</div>
							</div>
							<!-- hilmi -->
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Jenis Jabatan</label>
								<div class="col-md-3">
									<select select2 name="jenis_jabatan" class="form-control jenjab" id="jenis_jabatan" required>
										<option value=""></option>
									    @foreach(config('simpeg.jenis_jabatan') as $jenis_jabatan)
									    	@if($pegawai->jenis_jabatan == $jenis_jabatan)
									    	<option value="{{$jenis_jabatan}}" selected>{{$jenis_jabatan}}</option>
									    	@else
									    	<option value="{{$jenis_jabatan}}">{{$jenis_jabatan}}</option>
									    	@endif
									    @endforeach
									</select>
								</div>
							</div>

							<!-- STRUKTURAL -->
							<div id="struktural" style="margin-top:15px;margin-bottom:15px">

								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Nama Jabatan Struktural </label>
									<div class="col-md-9">
										<div class="col-md-5">
											<select select2 class="form-control jabatan" name="jabatan_struktural_id" style="margin-left:-15px;" id="jabatan_struktural_id">
												<option value=""></option>
												@foreach($unit_kerja as $data_unit_kerja)
													<optgroup label="{{$data_unit_kerja->title}}">
														@foreach($data_unit_kerja->jabatan as $jabatan)
															@if($pegawai->jabatan_struktural_id == $jabatan->id)
											    			<option value="{{$jabatan->id}}" selected>{{$jabatan->title}}</option>
											    			@else
											    			<option value="{{$jabatan->id}}">{{$jabatan->title}}</option>
											    			@endif
														@endforeach
													</optgroup>
												@endforeach
											</select>
										</div>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Eselon</label>
									<div class="col-md-2">
										<input value="{{$pegawai->eselon}}" type="text" class="form-control eselon" readonly="true" name="eselon" id="eselon">
									</div>

									<label class="col-md-2 control-label" for="inputDefault">TMT Eselon</label>
									<div class="col-md-2">
										<input value="{{$pegawai->tmt_eselon}}" type="date" class="form-control" id="inputDefault" name="tmt_eselon">
									</div>
								</div>
							</div>
							
							<!-- JABATAN FUNGSIONAL -->
							
							<div id="jafung" style="margin-top:15px;margin-bottom:15px">

								<div class="form-group" >
									<label class="col-md-3 control-label" for="inputDefault">Nama Jabatan Fungsional Tertentu</label>
									<div class="col-md-2">
										<input value="{{$pegawai->jabatan_fungsional_tertentu}}" type="text" class="form-control" id="inputDefault" name="jabatan_fungsional_tertentu">
									</div>

									<label class="col-md-2 control-label" for="inputDefault">TMT Jafung</label>
									<div class="col-md-2">
										<input value="{{$pegawai->tmt_jabatan_fungsional_tertentu}}" type="date" class="form-control" id="inputDefault" name="tmt_jabatan_fungsional_tertentu">
									</div>
								</div>
							</div>
							
							<!-- JABATAN FUNGSIONAL UMUM -->

							<div id="jafungumum" style="margin-top:15px;margin-bottom:15px">

								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Nama Jabatan Fungsional Umum</label>
									<div class="col-md-2">
										<input value="{{$pegawai->jabatan_fungsional_umum}}" type="text" class="form-control" id="inputDefault" name="jabatan_fungsional_umum">
									</div>

									<label class="col-md-2 control-label" for="inputDefault">TMT Jafung Umum</label>
									<div class="col-md-2">
										<input value="{{$pegawai->tmt_jabatan_fungsional_umum}}" type="date" class="form-control" id="inputDefault" name="tmt_jabatan_fungsional_umum">
									</div>
								</div>
							</div>

							<div id="jenis_jabatan_sub" style="margin-top:15px;margin-bottom:15px">
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Unit Kerja</label>
									<div class="col-md-9">
										<div class="col-md-3">
											<select select2 class="form-control satker" style="margin-left:-15px;" name="unit_kerja_id" id="unit_kerja_id" required>
												<option value=""></option>
											    @foreach($unit_kerja as $unit)
											    	@if($pegawai->unit_kerja_id == $unit->id)
											    	<option value="{{$unit->id}}" selected>{{$unit->title}}</option>
											    	@else
											    	<option value="{{$unit->id}}">{{$unit->title}}</option>
											    	@endif
											    @endforeach
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Sub Unit Kerja </label>
									<div class="col-md-9">
										<div class="col-md-5">
											<select select2 class="form-control unit_kerja" name="sub_unit_kerja_id" style="margin-left:-15px;" id="sub_unit_kerja_id" required>
												<option value=""></option>
											    @foreach($sub_unit_kerja as $sub_unit)
											    	@if($pegawai->sub_unit_kerja_id == $sub_unit->id)
											    	<option value="{{$sub_unit->id}}" selected>{{$sub_unit->title}}</option>
											    	@else
											    	<option value="{{$sub_unit->id}}">{{$sub_unit->title}}</option>
											    	@endif
											    @endforeach
											</select>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Satuan Kerja </label>
									<div class="col-md-9">
										<div class="col-md-5">
											<select select2 class="form-control jabatan" name="satuan_kerja_id" style="margin-left:-15px;" id="satuan_kerja_id" required>
												<option value=""></option>
											    @foreach($satuan_kerja as $satker)
											    	@if($pegawai->satuan_kerja_id == $satker->id)
											    	<option value="{{$satker->id}}" selected>{{$satker->title}}</option>
											    	@else
											    	<option value="{{$satker->id}}">{{$satker->title}}</option>
											    	@endif
											    @endforeach
											</select>
										</div>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Golongan Ruang Awal</label>
								<div class="col-md-2">
									<select select2 class="form-control" name="golongan_id_awal" required>
									    @foreach($golongan as $data_golongan)
											@if($pegawai->golongan_id_awal == $data_golongan->id)
											<option value="{{$data_golongan->id}}" selected="selected">{{$data_golongan->title}} - {{$data_golongan->description}}</option>
											@else
											<option value="{{$data_golongan->id}}">{{$data_golongan->title}} - {{$data_golongan->description}}</option>
											@endif
									    @endforeach
									</select>
								</div>
								<label class="col-md-2 control-label" for="inputDefault">TMT Gol. Awal</label>
								<div class="col-md-2">
									<input value="{{$pegawai->tmt_golongan_awal}}" type="date" class="form-control" id="inputDefault" name="tmt_golongan_awal" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Golongan Ruang Akhir</label>
								<div class="col-md-2">
									<select select2 class="form-control" name="golongan_id_akhir" required>
									    @foreach($golongan as $data_golongan)
											@if($pegawai->golongan_id_akhir == $data_golongan->id)
											<option value="{{$data_golongan->id}}" selected="selected">{{$data_golongan->title}} - {{$data_golongan->description}}</option>
											@else
											<option value="{{$data_golongan->id}}">{{$data_golongan->title}} - {{$data_golongan->description}}</option>
											@endif
									    @endforeach
									</select>
								</div>
								<label class="col-md-2 control-label" for="inputDefault">TMT Gol. Akhir</label>
								<div class="col-md-2">
									<input value="{{$pegawai->tmt_golongan_akhir}}" type="date" class="form-control" id="inputDefault" name="tmt_golongan_akhir" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Gaji Pokok</label>
								<div class="col-md-2">
									<input value="{{$pegawai->gaji_pokok}}" type="text" class="form-control" id="inputDefault" name="gaji_pokok" required>
								</div>

								<label class="col-md-1 control-label" for="inputDefault">Masa Kerja. Tahun</label>
								<div class="col-md-1">
									<input value="{{$pegawai->masa_kerja_tahun}}" type="text" class="form-control" id="masa_kerja_tahun" name="masa_kerja_tahun" maxlength="2" readonly="true" required>
								</div>
								<label class="col-md-1 control-label" for="inputDefault">Bulan</label>
								<div class="col-md-1">
									<input value="{{$pegawai->masa_kerja_bulan}}" type="text" class="form-control" id="masa_kerja_bulan" name="masa_kerja_bulan" maxlength="2" readonly="true" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Penyesuaian Masa Kerja Tahun</label>
								<div class="col-md-2">
									<input value="{{$pegawai->penyesuaian_masa_kerja_tahun}}" type="text" maxlength="2" class="form-control" id="inputDefault" name="penyesuaian_masa_kerja_tahun" required>
								</div>
								<label class="col-md-1 control-label" for="inputDefault">Bulan</label>
								<div class="col-md-2">
									<input value="{{$pegawai->penyesuaian_masa_kerja_bulan}}" type="text" maxlength="2" class="form-control" id="inputDefault" name="penyesuaian_masa_kerja_bulan" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">SK Penyesuaian Masa Kerja</label>
								<div class="col-md-3">
									<input value="{{$pegawai->penyesuaian_masa_kerja_bulan}}" type="text" class="form-control" id="inputDefault" name="sk_penyesuaian_masa_kerja" required>
								</div>
							</div>
						</div>
					</div>
					<div>
						<div class="panel-body">
							<h3 style="border-bottom: 1px solid #eee; padding-left: 10px; padding-bottom: 10px;">3. Data Lainnya</h3>
						 	<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">No Seri KARPEG</label>
								<div class="col-md-9">
									<input value="{{$pegawai->no_seri_karpeg}}" type="text" class="form-control" id="inputDefault" name="no_seri_karpeg" maxlength="9" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">No Seri KPE</label>
								<div class="col-md-9">
									<input value="{{$pegawai->no_seri_kpe}}" type="text" class="form-control" id="inputDefault" name="no_seri_kpe" maxlength="9" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">No Seri KARIS/KARSU</label>
								<div class="col-md-9">
									<input value="{{$pegawai->no_seri_karis}}" type="text" class="form-control" id="inputDefault" name="no_seri_karis" maxlength="9" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">No Akte Kelahiran</label>
								<div class="col-md-2">
									<input value="{{$pegawai->no_akte_kelahiran}}" type="text" class="form-control" id="inputDefault" name="no_akte_kelahiran" required>
								</div>

								<label class="col-md-2 control-label" for="inputDefault">Tahun Akte</label>
								<div class="col-md-2">
									<input value="{{$pegawai->tahun_no_akte_kelahiran}}" type="text" class="form-control" id="inputDefault" name="tahun_no_akte_kelahiran" maxlength="4" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">No ASKES</label>
								<div class="col-md-9">
									<input value="{{$pegawai->no_askes}}" type="text" class="form-control" id="inputDefault" name="no_askes" maxlength="13" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">No TASPEN</label>
								<div class="col-md-9">
									<input value="{{$pegawai->no_taspen}}" type="text" class="form-control" id="inputDefault" name="no_taspen" maxlength="18" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">No NPWP</label>
								<div class="col-md-2">
									<input value="{{$pegawai->no_npwp}}" type="text" class="form-control" id="inputDefault" name="no_npwp" required>
								</div>

								<label class="col-md-2 control-label" for="inputDefault">Tanggal NPWP</label>
								<div class="col-md-2">
									<input value="{{$pegawai->tanggal_npwp}}" type="date" class="form-control" id="inputDefault" name="tanggal_npwp" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Golongan Darah</label>
								<div class="col-md-9">
									<input value="{{$pegawai->golongan_darah}}" type="text" class="form-control" id="inputDefault" name="golongan_darah" required>
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

@if($pegawai->jenis_jabatan == 'Struktural')
	$("#struktural").show();
	$("#jafung").hide();
	$("#jafungumum").hide();
@elseif($pegawai->jenis_jabatan == 'Fungsional Tertentu')
	$("#struktural").hide();
	$("#jafung").show();
	$("#jafungumum").hide();
@elseif($pegawai->jenis_jabatan == 'Fungsional Umum')
	$("#struktural").hide();
	$("#jafung").hide();
	$("#jafungumum").show();
@endif

$("#jenis_jabatan").change(function(){
	var jenis_jabatan = $(this).val();
	$("#jenis_jabatan_sub").show();

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

$("#tmt_cpns").change(function(){
	var today = new Date();
	var birthDate = new Date($("#tmt_cpns").val());
	var year = today.getFullYear() - birthDate.getFullYear();
	var m = today.getMonth() - birthDate.getMonth();
	if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
		year--;
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