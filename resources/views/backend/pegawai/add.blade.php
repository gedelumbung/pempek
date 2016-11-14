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
			<form class="form-horizontal panel-body" action="{{url('pegawai/proses')}}" id="submit_pegawai" method="POST" enctype="multipart/form-data" novalidate="novalidate">
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
									<input type="date" class="form-control" name="tanggal_lahir" datepicker rules="date">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Agama</label>
								<div class="col-md-3">
									<select select2 name="agama" class="form-control">
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
									<select select2 name="jenis_kelamin" class="form-control">
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
									<select select2 name="status_pernikahan" class="form-control">
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
									<select name="kedudukan_pns" class="form-control" select2>
										<option value=""></option>
										@if(isset($data['kddknpns_id']))
										    @foreach($a['kddk'] as $k)
										    	<option value="{{$k->kddknpns_id}}" @if($data['kddknpns_id'] == $k->kddknpns_id) selected @endif >{{$k->kedudukan}}</option>
										    @endforeach
									    @else
									    	@foreach($a['kddk'] as $k)
										    	<option value="{{$k->kddknpns_id}}">{{$k->kedudukan}}</option>
										    @endforeach
									    @endif
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Status Pegawai</label>
								@if(isset($data['status_pegawai']))
								<div class="col-md-9">
									<div class="radio-custom radio-default">
									<input type="radio" id="radio1" name="status_pegawai" value="0" @if($data['status_pegawai'] == 0) checked='true' @endif/>
									<label for="radio1">CPNS</label>
								</div>
								<div class="radio-custom radio-default">
									<input type="radio" id="radio1" name="status_pegawai" value="1" @if($data['status_pegawai'] == 1) checked='true' @endif/>
									<label for="radio2">PNS</label>
								</div>
								</div>
								@else
								<div class="col-md-9">
									<div class="radio-custom radio-default">
									<input type="radio" id="radio1" name="status_pegawai" value="0" />
									<label for="radio1">CPNS</label>
								</div>
								<div class="radio-custom radio-default">
									<input type="radio" id="radio1" name="status_pegawai" value="1" />
									<label for="radio2">PNS</label>
								</div>
								</div>
								@endif
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">TMT CPNS</label>
								<div class="col-md-2">
									<input type="text" class="form-control" id="inputDefault" name="tmtcpns" datepicker value="{{date("d/m/Y", strtotime($data['tmtcpns']))?:""}}">
								</div>
								<label class="col-md-1 control-label" for="inputDefault">TMT PNS</label>
								<div class="col-md-2">
									<input type="text" class="form-control" id="inputDefault" name="tmtpns" datepicker value="{{date("d/m/Y", strtotime($data['tmtpns']))?:""}}">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Tingkat Pendidikan Awal Pengangkatan CPNS</label>
								<div class="col-md-3">
									<select name="pendidikanawal_cpns" class="form-control" select2>
										<option value=""></option>
										@if(isset($data['pendidikanawal_cpns']))
										    @foreach($a['tingkat_pddk'] as $k)
										    	<option value="{{$k->tingkatpddk_id}}" @if($data['pendidikanawal_cpns'] == $k->tingkatpddk_id) selected @endif >{{$k->tingkat}}</option>
										    @endforeach

									    @else
									    	@foreach($a['tingkat_pddk'] as $k)
										    	<option value="{{$k->tingkatpddk_id}}">{{$k->tingkat}}</option>
										    @endforeach
									    @endif
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Diklat Struktural</label>
								<label class="col-md-2 control-label" for="inputDefault">SEPADA</label>
								<div class="col-md-3">
									<input class="form-control" maxlength="4" type="text" name="sepada" placeholder="Tahun" value="{{$data['sepada']?:""}}"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault"></label>
								<label class="col-md-2 control-label" for="inputDefault">SEPALA/ADUM/DIKLAT PIM TK. IV</label>
								<div class="col-md-3">
									<input class="form-control" maxlength="4" type="text" name="sepala" placeholder="Tahun" value="{{$data['sepala']?:""}}"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault"></label>
								<label class="col-md-2 control-label" for="inputDefault">SEPADYA/SPAMA/DIKLAT PIM TIK. III</label>
								<div class="col-md-3">
									<input class="form-control" maxlength="4" type="text" name="sepadya" placeholder="Tahun" value="{{$data['sepadya']?:""}}"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault"></label>
								<label class="col-md-2 control-label" for="inputDefault">SPAMEN/SESPA/SESPANAS /DIKLAT PIM TK.II</label>
								<div class="col-md-3">
									<input class="form-control" maxlength="4" type="text" name="spamen" placeholder="Tahun" value="{{$data['spamen']?:""}}"/>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault"></label>
								<label class="col-md-2 control-label" for="inputDefault">SEPATI/DIKLAT PIM TK.I</label>
								<div class="col-md-3">
									<input class="form-control" maxlength="4" type="text" name="sepati" placeholder="Tahun" value="{{$data['sepati']?:""}}"/>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Pendidikan Terakhir</label>
								<div class="col-md-3">
									<select name="pendidikanakhir" class="form-control" select2>
										<option value=""></option>
										@if(isset($data['pendidikanakhir']))
										    @foreach($a['tingkat_pddk'] as $k)
										    	<option value="{{$k->tingkatpddk_id}}" @if($data['pendidikanakhir'] == $k->tingkatpddk_id) selected @endif >{{$k->tingkat}}</option>
										    @endforeach

									    @else
									    	@foreach($a['tingkat_pddk'] as $k)
										    	<option value="{{$k->tingkatpddk_id}}">{{$k->tingkat}}</option>
										    @endforeach
									    @endif
									</select>
								</div>
								<label class="col-md-1 control-label" for="inputDefault">Tahun</label>
								<div class="col-md-1">
									<input type="text" class="form-control" id="inputDefault" name="tahunpendidikan" maxlength="4" value="{{$data['tahunpendidikan']?:""}}">
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
					    		        		@if(isset($data['foto']))
					    						<img id="previewHolder" width="60%" src="{{url($data['foto'])}}"></img>
					    						@else
					    						<img id="previewHolder" width="60%"></img>
					    						<div id='pember' style='margin-left: -15px;'>Pilih foto terlebih dahulu</div>
					    						@endif
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
									<input type="text" class="form-control" id="inputDefault" name="organisasi" value="{{$data['organisasi']?:""}}">
								</div>
							</div>
							<!-- hilmi -->
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Jenis Jabatan</label>
								<div class="col-md-3">
									<select name="jenisjab_id" class="form-control jenjab" select2>
										<option value=""></option>
										@if(isset($data['jenisjab_id']))
										    @foreach($a['jenisjab'] as $k)
										    	<option value="{{$k->jenisjab_id}}" @if($data['jenisjab_id'] == $k->jenisjab_id) selected @endif >{{ucwords($k->jabatan)}}</option>
										    @endforeach
									    @else
									    	@foreach($a['jenisjab'] as $k)
										    	<option value="{{$k->jenisjab_id}}">{{ucwords($k->jabatan)}}</option>
										    @endforeach
									    @endif
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Unit Kerja</label>
								<div class="col-md-9">
									<div class="col-md-3">
										<select class="form-control satker" style="margin-left:-15px;" name="kode_satker">
											<option value="">Pilih Unit Kerja</option>
											@if(isset($data['kode_satker']))
												@foreach($a['satker'] as $s)
													<option value="{{$s->kode_satker}}" @if($data['kode_satker'] == $s->kode_satker) selected @endif>{{$s->nama_satker}}</option>
												@endforeach
											@else
												@foreach($a['satker'] as $s)
													<option value="{{$s->kode_satker}}">{{$s->nama_satker}}</option>
												@endforeach
											@endif
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
											<select class="form-control unit_kerja" name="subunitkerja" style="margin-left:-15px;">
												@if(isset($data['namastruktural'])) 
												@foreach($a['jabatan'] as $j)
												<option value="{{$data['kode_jab']}}">{{$j->nama_jabatan}}</option>
												@endforeach
											 @endif 
											</select>
										</div>

									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Nama Jabatan Struktural </label>
									<div class="col-md-9">
										<div class="col-md-5">
											<select class="form-control jabatan" name="namastruktural" style="margin-left:-15px;">
												@if(isset($data['id_subker'])) 
												@foreach($a['jabatan_sub'] as $j)
												<option value="{{$data['namastruktural']}}">{{$j->sub_struktural}}</option>
												@endforeach
											 @endif 
											</select>
										</div>
									</div>
								</div>

								<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Satuan Kerja</label>
								<div class="col-md-9">
									<input type="text" class="form-control satuan" id="inputDefault" name="satuan" value="{{$data['namasatuanjabatan']?:""}}" readonly="true">
								</div>
							</div>
								
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Eselon</label>
									<div class="col-md-2">
										<input type="text" class="form-control eselon" id="inputDefault" name="eselon" value="{{$data['eselon']?:""}}">
									</div>

									<label class="col-md-2 control-label" for="inputDefault">TMT Eselon</label>
									<div class="col-md-2">
										<input type="text" class="form-control" id="inputDefault" name="tmteselon" datepicker value="{{date("d/m/Y", strtotime($data['tmteselon']))?:""}}">
									</div>
								</div>
							</div>
							
							<!-- JABATAN FUNGSIONAL -->
							
							<div id="jafung" style="margin-top:15px;margin-bottom:15px">
								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Sub Unit Kerja</label>
									<div class="col-md-9">
										<div class="col-md-5">
											<select class="form-control unit_kerja_ft" name="subunitkerja_ft" style="margin-left:-15px;">
												@if(isset($data['id_subker_ft'])) 
												@foreach($a['jabatan_sub_ft'] as $j)
												<option value="{{$data['id_subker_ft']}}">{{$j->sub_struktural}}</option>
												@endforeach
											 @endif 
											</select>
										</div>

									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Satuan Kerja</label>
									<div class="col-md-9">
										<div class="col-md-5">
											<select class="form-control satuan_ft" name="satuankerja_ft" style="margin-left:-15px;">
												@if(isset($data['nama'])) 
												
												<option value="{{$data['namasatuanjabatan_ft']}}">{{$data['namasatuanjabatan_ft']}}</option>
												
											 @endif 
											</select>
										</div>
									</div>
								</div>

								<div class="form-group" >
									<label class="col-md-3 control-label" for="inputDefault">Nama Jabatan Fungsional</label>
									<div class="col-md-2">
										<input type="text" class="form-control" id="inputDefault" name="namajafung" value="{{$data['namajafung']}}">
									</div>

									<label class="col-md-2 control-label" for="inputDefault">TMT Jafung</label>
									<div class="col-md-2">
										<input type="text" class="form-control" id="inputDefault" name="tmtjafung" datepicker value="{{date("d/m/Y", strtotime($data['tmtjafung']))?:""}}">
									</div>
								</div>
							</div>
							
							<!-- JABATAN FUNGSIONAL UMUM -->

							<div id="jafungumum" style="margin-top:15px;margin-bottom:15px">

							<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Sub Unit Kerja</label>
									<div class="col-md-9">
										<div class="col-md-5">
											<select class="form-control unit_kerja_umum" name="subunitkerja_umum" style="margin-left:-15px;">
												@if(isset($data['id_subker_umum'])) 
												@foreach($a['jabatan_sub_umum'] as $j)
												<option value="{{$data['id_subker_umum']}}">{{$j->sub_struktural}}</option>
												@endforeach
											 @endif 
											</select>
										</div>

									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Satuan Kerja</label>
									<div class="col-md-9">
										<div class="col-md-5">
											<select class="form-control satuan_umum" name="satuankerja_umum" style="margin-left:-15px;">
												@if(isset($data['nama'])) 
												
												<option value="{{$data['namasatuanjabatan_umum']}}">{{$data['namasatuanjabatan_umum']}}</option>
												
											 @endif 
											</select>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="inputDefault">Nama Jabatan Fungsional</label>
									<div class="col-md-2">
										<input type="text" class="form-control" id="inputDefault" name="namajafungumum" value="{{$data['namajafungumum']}}">
									</div>

									<label class="col-md-2 control-label" for="inputDefault">TMT Jafung Umum</label>
									<div class="col-md-2">
										<input type="text" class="form-control" id="inputDefault" name="tmtjafungumum" datepicker>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Golongan Ruang Awal</label>
								<div class="col-md-2">
									<select class="form-control" name="golruangawal">


										
										@foreach($a['golongan_awal'] as $s)
											<option value="{{$data['golruangawal']}}">{{$s->nama_golongan}} ({{$s->keterangan}})</option>
										@endforeach
										@foreach($a['golongan'] as $s)
											<option value="{{$s->kode}}">{{$s->nama_golongan}} ({{$s->keterangan}})</option>
										@endforeach
									</select>
								</div>
								<label class="col-md-2 control-label" for="inputDefault">TMT Gol. Awal</label>
								<div class="col-md-2">
									<input type="text" class="form-control" id="inputDefault" name="tmtgolawal" datepicker value="{{date("d/m/Y", strtotime($data['tmtgolawal']))?:""}}">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Golongan Ruang Akhir</label>
								<div class="col-md-2">
									<select class="form-control" name="golruangakhir">
										@foreach($a['golongan_akhir'] as $s)
											<option value="{{$data['golruangakhir']}}">{{$s->nama_golongan}} ({{$s->keterangan}})</option>
										@endforeach
										@foreach($a['golongan'] as $s)
											<option value="{{$s->kode}}">{{$s->nama_golongan}} ({{$s->keterangan}})</option>
										@endforeach
									</select>
								</div>
								<label class="col-md-2 control-label" for="inputDefault">TMT Gol. Akhir</label>
								<div class="col-md-2">
									<input type="text" class="form-control" id="inputDefault" name="tmtgolakhir" datepicker value="{{date("d/m/Y", strtotime($data['tmtgolakhir']))?:""}}">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Gaji Pokok Baru</label>
								<div class="col-md-2">
									<input type="text" class="form-control" id="inputDefault" name="gajipokok" value="{{$data['gajipokok']?:""}}">
								</div>

								<label class="col-md-1 control-label" for="inputDefault">Masa Kerja. Tahun</label>
								<div class="col-md-1">
									<input type="text" class="form-control" id="inputDefault" name="masakerja_thn" maxlength="4" value="{{$data['masakerja_thn']?:""}}">
								</div>
								<label class="col-md-1 control-label" for="inputDefault">Bulan</label>
								<div class="col-md-1">
									<input type="text" class="form-control" id="inputDefault" name="masakerja_bln" maxlength="2" value="{{$data['masakerja_bln']?:""}}">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Penyesuaian Masa Kerja Tahun</label>
								<div class="col-md-2">
									<input type="text" class="form-control" id="inputDefault" name="pmk_thn" maxlength="4" value="{{$data['pmk_thn']?:""}}">
								</div>
								<label class="col-md-1 control-label" for="inputDefault">Bulan</label>
								<div class="col-md-2">
									<input type="text" class="form-control" id="inputDefault" name="pmk_bln" maxlength="2" value="{{$data['pmk_bln']?:""}}">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">SK Penyesuaian Masa Kerja</label>
									<div class="col-md-5">
										<input type="text" class="form-control" id="inputDefault" name="skpmk" value="{{$data['skpmk']?:""}}">
									</div>

							</div>
						</div>
					</div>
					<div id="w2-datalainnya" class="tab-pane">
						<div class="panel-body">
						 	<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">No Seri KARPEG</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="inputDefault" name="noserikarpeg" maxlength="9" value="{{$data['noserikarpeg']?:""}}">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">No Seri KARIS/KARSU</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="inputDefault" name="noserikaris" maxlength="9" value="{{$data['noserikaris']?:""}}">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">No Akte Kelahiran</label>
								<div class="col-md-2">
									<input type="text" class="form-control" id="inputDefault" name="noakte" value="{{$data['noakte']?:""}}">
								</div>

								<label class="col-md-2 control-label" for="inputDefault">Tanggal</label>
								<div class="col-md-2">
									<input type="text" class="form-control" id="inputDefault" name="tanggalakte" datepicker value="{{date("d/m/Y", strtotime($data['tanggalakte']))?:""}}">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">No ASKES</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="inputDefault" name="noaskes" maxlength="13" value="{{$data['noaskes']?:""}}">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">No TASPEN</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="inputDefault" name="notaspen" maxlength="18" value="{{$data['notaspen']?:""}}">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">No NPWP</label>
								<div class="col-md-2">
									<input type="text" class="form-control" id="inputDefault" name="nonpwp" value="{{$data['nonpwp']?:""}}">
								</div>

								<label class="col-md-2 control-label" for="inputDefault">Tanggal NPWP</label>
								<div class="col-md-2">
									<input type="text" class="form-control" id="inputDefault" name="tanggalnpwp" datepicker value="{{date("d/m/Y", strtotime($data['tanggalnpwp']))?:""}}">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="inputDefault">Golongan Darah</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="inputDefault" name="gol_dar" value="{{$data['gol_dar']?:""}}">
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
	$(document).ready(function(){
		var jenjab = <?=$data['jenisjab_id']?:"0"?>;

		if(jenjab == 1){
			$("#struktural").show();
			$("#jafung").hide();
			$("#jafungumum").hide();
		}else if(jenjab == 2){
			$("#jafung").show();
			$("#struktural").hide();
			$("#jafungumum").hide();
		}else if(jenjab == 4){
			$("#jafungumum").show();
			$("#struktural").hide();
			$("#jafung").hide();
		}else{
			$("#struktural").hide();
			$("#jafung").hide();
			$("#jafungumum").hide();
		}

		function gantisubUK(isina, callback){
			$.ajax({
				url:"{{url('pegawai/carisub')}}",
				type:"POST",
				data:{isina:isina},
				success:function(data){
					$(".unit_kerja").html("");
					$(".unit_kerja").append(
							"<option disabled selected value>--- Pilih Sub Unit Kerja ---</option>"
						)
					for(var i=0;i<data.length;i++){
						$(".unit_kerja").append(
							"<option value='"+data[i].kode_jab+"' "
								// +(data[i].kode_jab=='' ? "selected='selected'" : "") 
							+">"
								+"Kepala "+data[i].nama_jabatan
							+"</option>"
						)
						// console.log(data[i].kode_jab);
					}
					// $(".eselon").val(data[0].eselon);

					if (typeof callback === "function")
						callback();
				}
			});
		}

		function gantisubUK_ft(isina, callback){
			$.ajax({
				url:"{{url('pegawai/carisub')}}",
				type:"POST",
				data:{isina:isina},
				success:function(data){
					$(".unit_kerja_ft").html("");
					$(".unit_kerja_ft").append(
							"<option disabled selected value>--- Pilih Sub Unit Kerja Fungsional---</option>"
						)
					for(var i=0;i<data.length;i++){
						$(".unit_kerja_ft").append(
							"<option value='"+data[i].kode_jab+"' "
								// +(data[i].kode_jab=='' ? "selected='selected'" : "") 
							+">"
								+data[i].nama_jabatan
							+"</option>"
						)
						// console.log(data[i].kode_jab);
					}
					// $(".eselon").val(data[0].eselon);

					if (typeof callback === "function")
						callback();
				}
			});
		}

		function gantisubUK_umum(isina, callback){
			$.ajax({
				url:"{{url('pegawai/carisub')}}",
				type:"POST",
				data:{isina:isina},
				success:function(data){
					$(".unit_kerja_umum").html("");
					$(".unit_kerja_umum").append(
							"<option disabled selected value>--- Pilih Sub Unit Kerja Fungsional---</option>"
						)
					for(var i=0;i<data.length;i++){
						$(".unit_kerja_umum").append(
							"<option value='"+data[i].kode_jab+"' "
								// +(data[i].kode_jab=='' ? "selected='selected'" : "") 
							+">"
								+data[i].nama_jabatan
							+"</option>"
						)
						// console.log(data[i].kode_jab);
					}
					// $(".eselon").val(data[0].eselon);

					if (typeof callback === "function")
						callback();
				}
			});
		}

		//satuan kerja

		function gantisatuankerja_ft(isina_ft, callback){
			$.ajax({
				url:"{{url('pegawai/carisatker_ft')}}",
				type:"POST",
				data:{isina_ft:isina_ft},
				success:function(data){
					$(".satuan_ft").html("");
					$(".satuan_ft").append(
							"<option disabled selected value>--- Pilih Satuan Kerja Fungsional---</option>"
						)
					for(var i=0;i<data.length;i++){
						$(".satuan_ft").append(
							"<option value='"+data[i].sub_struktural+"' "
								// +(data[i].kode_jab=='' ? "selected='selected'" : "") 
							+">"
								+data[i].sub_struktural
							+"</option>"
						)
						// console.log(data[i].kode_jab);
					}
					// $(".eselon").val(data[0].eselon);

					if (typeof callback === "function")
						callback();
				}
			});
		}

		function gantisatuankerja_umum(isina_ft, callback){
			$.ajax({
				url:"{{url('pegawai/carisatker_ft')}}",
				type:"POST",
				data:{isina_ft:isina_ft},
				success:function(data){
					$(".satuan_umum").html("");
					$(".satuan_umum").append(
							"<option disabled selected value>--- Pilih Sub Unit Kerja Fungsional---</option>"
						)
					for(var i=0;i<data.length;i++){
						$(".satuan_umum").append(
							"<option value='"+data[i].sub_struktural+"' "
								// +(data[i].kode_jab=='' ? "selected='selected'" : "") 
							+">"
								+data[i].sub_struktural
							+"</option>"
						)
						// console.log(data[i].kode_jab);
					}
					// $(".eselon").val(data[0].eselon);

					if (typeof callback === "function")
						callback();
				}
			});
		}

		//satuan kerja end

		function gantistruktural(isina_sub, callback){
			$.ajax({
				url:"{{url('pegawai/carijab')}}",
				type:"POST",
				data:{isina_sub:isina_sub},
				success:function(data){
					$(".jabatan").html("");
						$(".jabatan").append(
							"<option disabled selected value>--- Pilih Nama Jabatan ---</option>"
						)
					for(var i=0;i<data.length;i++){
						$(".jabatan").append(
							"<option value='"+data[i].kode_jab+"' "
								// +(data[i].kode_jab=='' ? "selected='selected'" : "") 
							+">"
								+data[i].sub_struktural
							+"</option>"
						)
						// console.log(data[i].kode_jab);
					}
					// $(".eselon").val(data[0].eselon);

					if (typeof callback === "function")
						callback();
				}
			});
		}

		$('body').on('change','.satker',function(){
			$('.eselon').val("");
			var isina = $(this).val();
			gantisubUK(isina);
		});

		$('body').on('change','.satker',function(){
			$('.eselon').val("");
			var isina = $(this).val();
			gantisubUK_ft(isina);
		});

		$('body').on('change','.satker',function(){
			$('.eselon').val("");
			var isina = $(this).val();
			gantisubUK_umum(isina);
		});

		$('body').on('change','.unit_kerja',function(){
			$('.eselon').val("");
			var isina_sub = $(this).val();
			gantistruktural(isina_sub);
		});

		$('body').on('change','.unit_kerja_ft',function(){
			$('.eselon').val("");
			var isina_ft = $(this).val();
			gantisatuankerja_ft(isina_ft);
		});

		$('body').on('change','.unit_kerja_umum',function(){
			$('.eselon').val("");
			var isina_ft = $(this).val();
			gantisatuankerja_umum(isina_ft);
		});

		$('body').on('change','.jenispeg',function(){
			$('.jenpeg').val("");
			var ini = $(this).val();

			if(ini == 1){
				document.getElementsByClassName("jenpeg")[0].setAttribute("placeholder", "Kabupaten");
			}else if(ini == 2){
				document.getElementsByClassName("jenpeg")[0].setAttribute("placeholder", "Lainnya");
			}
		});

		$('body').on('change','.jabatan',function(){
			$('.eselon').val("");
			var isi = $(this).val();

			$('.satuan').val("");
			var isi = $(this).val();

			$.ajax({
				url:"{{url('pegawai/carieselon')}}",
				type:"POST",
				data:{isi:isi},
				success:function(data){
					$('.eselon').val(data[0].eselon);
				}
			});

			$.ajax({
				url:"{{url('pegawai/carisk')}}",
				type:"POST",
				data:{isi:isi},
				success:function(data){
					$('.satuan').val(data[0].sub_struktural);
				}
			});
		});

		$(".finish").on('click', function( ev ) {
			ev.preventDefault();
			var validated = $('#w2 form').valid();
			if ( validated ) {
				new PNotify({
					title: 'Congratulations',
					text: 'You completed the wizard form.',
					type: 'custom',
					addclass: 'notification-success',
					icon: 'fa fa-check'
				});
			}
		});

		$(".jenjab").on('change',function(){
			var isinya = $(this).val();
			if(isinya == 1){
				$("#struktural").show();
				$("#jafung").hide();
				$("#jafungumum").hide();
				$("#jafung input").val("");
				$("#jafungumum input").val("");
			}else if(isinya == 2){
				$("#jafung").show();
				$("#struktural").hide();
				$("#jafungumum").hide();
				$("#jafungumum input").val("");
			}else if(isinya == 4){
				$("#jafungumum").show();
				$("#struktural").hide();
				$("#jafung").hide();
				$("#jafung input").val("");
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
			
			var url = window.location.href.split("/");
			if(url.indexOf("edit") > -1){
				@if(isset($data))
				window.datapeg = <?=$data?>;
				var data 	= window.datapeg;
				var namastruktural = data.namastruktural;

				$.ajax({
					url : "<?=url('formasi/jabatan/carisatker')?>",
					type : "POST",
					data : { key : namastruktural },
					success:function(data){
						var datana = data[0];
						var kodesatker = datana.kode_satker;
						gantistruktural(kodesatker, function() {
							$(".jabatan option[value='"+namastruktural.trim()+" ']").attr("selected", "selected");
							$(".satker option[value="+kodesatker+"]").attr("selected", "selected");
						});
					}
				});
				@endif
			}

		// $(".satker").change(function (){
  //             var url = "{{url('pegawai/carijab')}}/"+$(this).val();
  //             $('.jabatan').load(url);
  //             return false;
  //         });

		// $('body').on('submit','#submit_pegawai',function(e){
		// 	e.preventDefault();
		// 	var nipl = $('[name=nipl]').val();
		// 	console.log(nipl);
		// 	$.ajax({
		// 		url:"{{url('pegawai/proses')}}",
		// 		type:"POST",
		// 		data: $(this).serialize(),
		// 		success:function(data){
		// 			console.log(data);
		// 		}
		// 	});
		// });
	});
</script>
@endpush