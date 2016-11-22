
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<style type="text/css">
		body{
			margin:0;
		}
		table{
			width: 100%;
			border-collapse: collapse;
		}
		.title{
			font-size : 9.5pt;
		}
		.dua{
			height : 113px;
			width : 85px;
		}
		img.pas{
			height : 113px;
			width : 85px;
			position: absolute;
		}

		table.t_main{
			width: 99.8%;
			margin-left: 0.6px;
			margin-top: -0.5px;
			border-top: 1px solid black;
			border-bottom: 1px solid black;
		}

		.inside_title{
			font-size : 11pt;
			font-weight: bold;
			margin-left: 30px;
		}
		.inside_number{
			font-weight: bold;
			border-left: 1px solid black;
			border-bottom: none;
			font-size: 11pt;
		}
		.inside_main{
			border-left : 1px solid black;
			border-right: 1px solid black;
			border-bottom : none;
		}
		.table_main_head{
			font-size: 9pt;
		}
		.pas{
			width: 300px;
			height: 400px;
			zoom:50%;
			border:1px solid;
		}
	</style>
</head>
<body>
	<table>
		<tr>
			<td>
				<center><h3>BIODATA PEGAWAI <br> DITJEN PEMBINAAN PENYIAPAN PERMUKIMAN DAN <br> PENEMPATAN TRANSMIGRASI</h3></center>
			</td>
			<td width="100">
				@if(!empty($pegawai->foto))
				<img src="{{$pegawai->foto}}" class="pas">
				@else
				<img src="{{asset('data/foto/def_pas_foto.png')}}" class="pas">
				@endif
			</td>
		</tr>
	</table>
	<h4><b>I. DATA PRIBADI PEGAWAI </b></h4>
	<table border="1">
		<tr>
			<td width="20px">1</td>
			<td>NAMA LENGKAP</td>
			<td width="250px">{{$pegawai->gelar_depan}} {{$pegawai->nama_lengkap}} {{$pegawai->gelar_belakang}}</td>
		</tr>
		<tr>
			<td>2</td>
			<td>NIP/NRP</td>
			<td>{{$pegawai->nip}}</td>
		</tr>
		<tr>
			<td>3</td>
			<td>TEMPAT,TANGGAL LAHIR/USIA </td>
			<td>{{$pegawai->tempat_lahir}}, {{indonesian_date($pegawai->tanggal_lahir)}}</td>
		</tr>
		<tr>
			<td>4</td>
			<td>PANGKAT/GOLONGAN RUANG/TMT</td>
			<td> {{$pegawai->golongan_akhir->description}} / {{$pegawai->golongan_akhir->title}} / {{indonesian_date($pegawai->tmt_golongan_akhir)}}</td>
		</tr>
		<tr>
			<td>5</td>
			<td>JABATAN</td>
			<td>{{$pegawai->namajafungumum}}</td>
		</tr>
		<tr>
			<td>6</td>
			<td>PENDIDIKAN TERAKHIR</td>
			<td>{{$pegawai->pendidikan_akhir}}, {{$pegawai->pendidikan_akhir_tahun_lulus}}</td>
		</tr>
		<tr>
			<td>7</td>
			<td>AGAMA</td>
			<td>{{$pegawai->agama}}</td>
		</tr>
		<tr>
			<td>8</td>
			<td>JENIS KELAMIN</td>
			<td>{{$pegawai->jenis_kelamin}}</td>
		</tr>
		<tr>
			<td>9</td>
			<td>STATUS PERKAWINAN</td>
			<td>{{$pegawai->status_pernikahan}}</td>
		</tr>
		<tr>
			<td rowspan="4">10</td>
			<td rowspan="4">KEMAMPUAN BAHASA ASING</td>
			<td>(1)</td>
		</tr>
		<tr><td>(2)</td></tr>
		<tr><td>(3)</td></tr>
		<tr><td>(4)</td></tr>
		<tr>
			<td>11</td>
			<td>ALAMAT RUMAH</td>
			<td>{{$pegawai->alamat}}</td>
		</tr>
		<tr>
			<td></td>
			<td>KODE POS</td>
			<td>{{$pegawai->kode_pos}}</td>
		</tr>
		<tr>
			<td></td>
			<td>NOMOR TELEPON</td>
			<td>{{$pegawai->telepon}}</td>
		</tr>
	</table>
	<br>
	<h4><b>II. DATA KEPEGAWAIAN </b></h4>
	<table border="1">
		<tr>
			<td width="20px">1</td>
			<td>TMT CALON PEGAWAI NEGERI SIPIL</td>
			<td width="250px">{{indonesian_date($pegawai->tmt_cpns)}}</td>
		</tr>
		<tr>
			<td>2</td>
			<td>TMT PEGAWAI NEGERI SIPIL</td>
			<td>{{indonesian_date($pegawai->tmt_pns)}}</td>
		</tr>
		<tr>
			<td>6</td>
			<td>MASA KERJA SELURUHNYA</td>
			<td>{{$pegawai->masa_kerja_tahun}} TAHUN {{$pegawai->masa_kerja_bulan}} BULAN</td>
		</tr>
		<tr>
			<td>7</td>
			<td>NOMOR KARTU PEGAWAI</td>
			<td>{{$pegawai->no_seri_karpeg}}</td>
		</tr>
		<tr>
			<td>8</td>
			<td>NOMOR KARIS/KARSU</td>
			<td>{{$pegawai->no_seri_karis}}</td>
		</tr>
		<tr>
			<td>9</td>
			<td>NOMOR DOSIR</td>
			<td>[]</td>
		</tr>
	</table>
	<br>
	<h4><b>III. DATA KELUARGA </b></h4>

	<table border="1">
		<tr>
			<td colspan="3">
				<b>
					AYAH KANDUNG
				</b>
			</td>
		</tr>
		<tr>
			<td width="20px">
				1.
			</td>
			<td>
				Nama
			</td>
			<td>
			 	{{$ayah->nama}} 
			</td>
		</tr>
		<tr>
			<td>
				2.
			</td>
			<td>
				Gelar Depan
			</td>
			<td>
				{{$ayah->gelar_depan}}
			</td>
		</tr>
		<tr>
			<td width="20px">
				3.
			</td>
			<td>
				Gelar Belakang
			</td>
			<td>
				{{$ayah->gelar_belakang}}
			</td>
		</tr>
		<tr>
			<td width="20px">
				4.
			</td>
			<td>
				Tanggal Lahir
			</td>
			<td>
				{{indonesian_date($ayah->tanggal_lahir)}}
			</td>
		</tr>
		<tr>
			<td width="20px">
				5.
			</td>
			<td>
				Agama
			</td>
			<td>
				{{ucwords($ayah->agama)}}
			</td>
		</tr>
		<tr>
			<td width="20px">
				6.
			</td>
			<td>
				Email
			</td>
			<td>
				{{$ayah->email}}
			</td>
		</tr>
		<tr>
			<td width="20px">
				7.
			</td>
			<td>
				Status Perkawinan
			</td>
			<td>
				{{$ayah->status_perkawinan}}
			</td>
		</tr>
		<tr>
			<td width="20px">
				8.
			</td>
			<td>
				Status Hidup
			</td>
			<td>
				{{$ayah->status_hidup}}
			</td>
		</tr>
		<tr>
			<td width="20px">
				9.
			</td>
			<td>
				NO HP / TELPON
			</td>
			<td>
				{{$ayah->telepon}}
			</td>
		</tr>
		<tr>
			<td width="20px">
				10.
			</td>
			<td>
				Alamat
			</td>
			<td>
				{{$ayah->alamat}}
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<b>
					IBU KANDUNG
				</b>
			</td>
		</tr>
		<tr>
			<td width="20px">
				1.
			</td>
			<td>
				Nama
			</td>
			<td>
			 	{{$ibu->nama}} 
			</td>
		</tr>
		<tr>
			<td>
				2.
			</td>
			<td>
				Gelar Depan
			</td>
			<td>
				{{$ibu->gelar_depan}}
			</td>
		</tr>
		<tr>
			<td width="20px">
				3.
			</td>
			<td>
				Gelar Belakang
			</td>
			<td>
				{{$ibu->gelar_belakang}}
			</td>
		</tr>
		<tr>
			<td width="20px">
				4.
			</td>
			<td>
				Tanggal Lahir
			</td>
			<td>
				{{indonesian_date($ibu->tanggal_lahir)}}
			</td>
		</tr>
		<tr>
			<td width="20px">
				5.
			</td>
			<td>
				Agama
			</td>
			<td>
				{{ucwords($ibu->agama)}}
			</td>
		</tr>
		<tr>
			<td width="20px">
				6.
			</td>
			<td>
				Email
			</td>
			<td>
				{{$ibu->email}}
			</td>
		</tr>
		<tr>
			<td width="20px">
				7.
			</td>
			<td>
				Status Perkawinan
			</td>
			<td>
				{{$ibu->status_perkawinan}}
			</td>
		</tr>
		<tr>
			<td width="20px">
				8.
			</td>
			<td>
				Status Hidup
			</td>
			<td>
				{{$ibu->status_hidup}}
			</td>
		</tr>
		<tr>
			<td width="20px">
				9.
			</td>
			<td>
				NO HP / TELPON
			</td>
			<td>
				{{$ibu->telepon}}
			</td>
		</tr>
		<tr>
			<td width="20px">
				10.
			</td>
			<td>
				Alamat
			</td>
			<td>
				{{$ibu->alamat}}
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<b>ISTERI / SUAMI</b>
			</td>
		</tr>
		<tr>
			<td>
				1.
			</td>
			<td>
				Nama
			</td>
			<td>
				{{$pasangan->nama}}
			</td>
		</tr>
		<tr>
			<td>
				2.
			</td>
			<td>
				Gelar Depan
			</td>
			<td>
				{{$pasangan->gelar_depan}}
			</td>
		</tr>
		<tr>
			<td>
				3.
			</td>
			<td>
				Gelar Belakang
			</td>
			<td>
				{{$pasangan->gelar_belakang}}
			</td>
		</tr>
		<tr>
			<td>
				4.
			</td>
			<td>
				Tanggal Lahir
			</td>
			<td>
				{{indonesian_date($pasangan->tanggal_lahir)}}
			</td>
		</tr>
		<tr>
			<td>
				5.
			</td>
			<td>
				Agama
			</td>
			<td>
				{{$pasangan->agama}}
			</td>
		</tr>
		<tr>
			<td>
				6.
			</td>
			<td>
				Email
			</td>
			<td>
				{{$pasangan->email}}
			</td>
		</tr>
		<tr>
			<td>
				7.
			</td>
			<td>
				Alamat
			</td>
			<td>
				{{$pasangan->alamat}}
			</td>
		</tr>
		<tr>
			<td>
				8.
			</td>
			<td>
				NO HP / TELPON
			</td>
			<td>
				{{$pasangan->telepon}}
			</td>
		</tr>
		<tr>
			<td>
				9.
			</td>
			<td>
				Status Perkawinan
			</td>
			<td>
				{{$pasangan->status_perkawinan}}
			</td>
		</tr>
		<tr>
			<td>
				10.
			</td>
			<td>
				Akter Perceraian
			</td>
			<td>
				Nomor : {{$pasangan->akte_perceraian}}<br>
				Tanggal : {{indonesian_date($pasangan->tanggal_akte_perceraian)}}
			</td>
		</tr>
		<tr>
			<td>
				11.
			</td>
			<td>
				Akte Kelahiran
			</td>
			<td>
				Nomor : {{$pasangan->akte_kelahiran}}<br>
				Tanggal : {{indonesian_date($pasangan->tanggal_akte_perceraian)}}
			</td>
		</tr>
		<tr>
			<td>
				12.
			</td>
			<td>
				Akte Meninggal
			</td>
			<td>
				Nomor : {{$pasangan->akte_meninggal}}<br>
				Tanggal : {{indonesian_date($pasangan->tanggal_akte_meninggal)}}
			</td>
		</tr>
		<tr>
			<td>
				13.
			</td>
			<td>
				NPWP
			</td>
			<td>
				Nomor : {{$pasangan->npwp}}<br>
				Tanggal : {{indonesian_date($pasangan->tanggal_npwp)}}
			</td>
		</tr>
		<tr>
			<td align="center" valign="top">
				14.
			</td>
			<td>
				Jika Suami/Isteri Anda PNS, Tuliskan Nama
			</td>
			<td valign="top">
				{{$pasangan->nama_pasangan}}
			</td>
		</tr>
		<tr>
			<td>
				15.
			</td>
			<td>
				NIP Suami/Isteri Anda
			</td>
			<td>
				{{$pasangan->nip_pasangan}}
			</td>
		</tr>
		</table>
		<table border="1"> 
		<tr>
			<td>
				<b>ANAK</b><br>
				<table border='1' width="100%">
					<tr class="table_main_head">
						<th></th>
						<th>
							Nama
						</th>
						<th>
							Tempat Lahir
						</th>
						<th>
							Tanggal Lahir
						</th>
						<th>
							Jenis Kelamin
						</th>
						<th>
							Pendidikan
						</th>
						<th>
							Pekerjaan
						</th>
					</tr>
					<tr>
						<th align="center"></th>
						<th>1</th>
						<th>2</th>
						<th>3</th>
						<th>4</th>
						<th>5</th>
						<th>6</th>
					</tr>
					<?php $no = 1; ?>
					@foreach($anak as $an)
					<tr>
						<td align="center">{{$no++}}</td>
						<td>{{$an->nama}}</td>
						<td></td>
						<td>{{indonesian_date($an->tanggal_lahir)}}</td>
						<td>{{$an->jenis_kelamin}}</td>
						<td>{{$an->pendidikan}}</td>
						<td>{{$an->pekerjaan}}</td>
					</tr>
					@endforeach
				</table>
				<b>(Sambungan Data Anak)</b>
				<table border='1' width="100%">
					<tr class="table_main_head">
						<th rowspan="2"></th>
						<th rowspan="2">
							Agama
						</th>
						<th rowspan="2">
							Status Perkawinan
						</th>
						<th>
							Status Hidup
						</th>
						<th>
							Status Anak
						</th>
						<th rowspan="2">
							Alamat
						</th>
						<th rowspan="2">
							NO TELPON/HP
						</th>
					</tr>
					<tr class="table_main_head">
						<th>
							Hidup/Meninggal
						</th>
						<th>
							AK/AA/AT
						</th>
					</tr>
					<tr>
						<th align="center"></th>
						<th>7</th>
						<th>8</th>
						<th>9</th>
						<th>10</th>
						<th>11</th>
						<th>12</th>
					</tr>
					<?php $no2 = 1; ?>
					@foreach($anak as $an)
					<tr>
						<td align="center">{{$no2++}}</td>
						<td>{{$an->agama}}</td>
						<td>{{$an->status_perkawinan}}</td>
						<td>{{$an->status_hidup}}</td>
						<td>{{$an->status_anak}}</td>
						<td>{{$an->alamat}}</td>
						<td>{{$an->telepon}}</td>
					</tr>
					@endforeach
				</table>
				<br/>
			</td>
		</tr>
	</table>
	<br>
	<h4><b>IV. RIWAYAT JABATAN </b></h4>
	<table border="1">
		<tr>
			<th>No</th>
			<th>JABATAN</th>
			<th>DARI TGL/TH s.d TGL/TH MASA</th>
			<th>KETERANGAN</th>
		</tr>
		<?php $no = 1; ?>
		@foreach($riwayat_jabatan as $rm)					
			<tr>
				<td align="center">{{$no++}}</td>
				<td>{{$rm->jabatan->title}}</td>
				<td>{{indonesian_date($rm->tmt)}} s/d </td>
				<td>
					Eselon  : {{$rm->eselon}}<br> 
					No. SK : {{$rm->nomor_sk}}<br> 
					Tgl SK : {{indonesian_date($rm->tanggal)}}<br>
					Tgl Sumpah: <br>
					Nilai KUM  :
				</td>
			</tr>
		@endforeach
	</table>
	<br>
	<h4><b>V. RIWAYAT KEPANGKATAN </b></h4>
	<table border="1">
		<tr>
			<th>No</th>
			<th>PANGKAT/GOL. RUANG</th>
			<th>TMT</th>
			<th>STATUS KP</th>
			<th>NO & TGL SK</th>
		</tr>
		<?php $norg = 1; ?>
		@foreach($riwayat_golongan as $rg)		
			<tr>
				<td>{{$norg}}</td>
				<td>{{$rg->golongan->title}}</td>
				<td>{{indonesian_date($rg->tmt)}}</td>
				<td></td>
				<td >{{$rg->nomor_sk}}<br>
					{{indonesian_date($rg->tanggal_sk)}}</td>
			</tr>
		<?php $norg++; ?>
		@endforeach
	</table>
	<br>
	<h4><b>VI. RIWAYAT PENDIDIKAN </b></h4>
	<table border="1">
		<tr>
			<td colspan="5"><b>1. PENDIDIKAN UMUM</b></td>
		</tr>
		<tr>
			<th>No</th>
			<th>NAMA SEKOLAH</th>
			<th>JURUSAN</th>
			<th>NOMOR & TANGGAL IJAZAH</th>
			<th>KETERANGAN</th>
		</tr>
		<?php $no = 1; ?>
			@foreach($riwayat_pendidikan as $rs)
			<tr>
				<td>{{$no++}}</td>
				<td>{{$rs->nama_sekolah}}</td>
				<td>{{$rs->fakultas}}</td>
				<td>{{$rs->ijazah_pendidikan}}<br>{{indonesian_date($rs->tanggal_lulus)}}</td>
				<td>{{$rs->tingkat_pendidikan}}</td>
			</tr>
			@endforeach
	</table>
	<table border='1'>
		<tr>
			<td colspan="5"><b>2. DIKLAT STRUKTURAL</b></td>
		</tr>
		<tr>
			<th>No</th>
			<th>NAMA DIKLAT STRUKTURAL</th>
			<th>NOMOR SERTIFIKAT</th>
			<th>TGL SERTIFIKASI</th>
			<th>KETERANGAN</th>
		</tr>
		<?php $no = 1; ?>
			@foreach($riwayat_diklat as $ds)
			<tr>
				<td>{{$no++}}</td>
				<td>{{$ds->nama_diklat}}</td>
				<td>{{$ds->nomor_sertifikat}}</td>
				<td>{{$ds->tahun}}</td>
				<td>{{$ds->jumlah_jam}} Jam</td>
			</tr>
			@endforeach
	</table>
	<table border='1'>
		<tr>
			<td colspan="6"><b>3. KURSUS</b></td>
		</tr>
		<tr>
			<th>No</th>
			<th>NAMA KURSUS</th>
			<th>INSTITUSI PENYELENGGARA</th>
			<th>NOMOR SERTIFIKAT</th>
			<th>TGL SERTIFIKASI</th>
			<th>KETERANGAN</th>
		</tr>
		<?php $no = 1; ?>
		@foreach($riwayat_kursus as $ks)
			<tr>
				<td>{{$no++}}</td>
				<td>{{$ks->nama_kursus}}</td>
				<td>{{$ks->penyelenggara}}</td>
				<td>{{$ks->nomor_sertifikat}}</td>
				<td>{{indonesian_date($ks->tanggal)}}</td>
				<td>{{$ks->jumlah_jam}}</td>
			</tr>
		@endforeach
	</table>
	<br>
	<h4><b>VII. PENGALAMAN </b></h4>
	<table border="1">
		<tr><td colspan="5"><b>1. PENUGASAN KE LUAR NEGERI</b></td></tr>
		<tr><th>No</th><th>NEGARA</th><th>TUJUAN PENUGASAN</th><th>LAMANYA</th><th>KETERANGAN</th></tr>
	</table>
	<br>
	<h4><b>VIII. TANDA JASA / KEHORMATAN </b></h4>
	<table border="1">
		<tr>
			<th>No</th>
			<th>NAMA BINTANG / SATYA LENCANA / PENGHARGAAN / NO.</th>
			<th>TGL PEROLEHAN</th>
			<th>DIBERIKAN OLEH</th>
		</tr>
		@foreach($riwayat_penghargaan as $ph)
			<tr>
				<td>{{$no++}}</td>
				<td>{{$ph->nama_penghargaan}}<br> No. {{$ph->nomor_surat_keputusan}}</td>
				<td>{{indonesian_date($ph->tanggal)}}</td>
				<td>{{$ph->nama_pemberi_penghargaan}}</td>
			</tr>
		@endforeach
	</table>
	<br>
	<br>
	<br>
	<br>
</body>
</html>