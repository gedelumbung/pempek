@extends("backend.layout.backend")

@section("title","Laporan DUK")

@section("content")

<table class="table table-bordered" style="zoom:80%">
	<thead style="background:#eaeaea">
		<tr>
			<th rowspan="2" style="vertical-align:middle;text-align:center">No. Urut</th>
			<th rowspan="2" style="vertical-align:middle;text-align:center">NAMA<br>
				NIP<br>
				STATUS PERKAWINAN<br>
				STATUS PEGAWAI<br>
			</th>
			<th style="vertical-align:middle;text-align:center">PANGKAT</th>
			<th style="vertical-align:middle;text-align:center">JABATAN</th>
			<th colspan="2" style="vertical-align:middle;text-align:center">MASA KERJA PMK TOTAL</th>
			<th style="vertical-align:middle;text-align:center">PENDIDIKAN DAN PELATIHAN</th>
			<th style="vertical-align:middle;text-align:center">PENDIDIKAN TERAKHIR</th>
			<th style="vertical-align:middle;text-align:center">USIA</th>
			<th rowspan="2" style="vertical-align:middle;text-align:center">CATATAN MUTASI KEPEGAWAIAN</th>
			<th rowspan="2" style="vertical-align:middle;text-align:center">KET</th>
		</tr>
		<tr>
			<th style="vertical-align:middle;text-align:center">GOL. RUANG <br>
				TMT</th>
			<th style="vertical-align:middle;text-align:center">NAMA <br>ESELON<br> TMT</th>
			<th style="vertical-align:middle;text-align:center">THN</th>
			<th style="vertical-align:middle;text-align:center">BLN</th>
			<th style="vertical-align:middle;text-align:center">NAMA <br>TGL, BULAN, & TAHUN<br> JUMLAH JAM</th>
			<th style="vertical-align:middle;text-align:center">NAMA <BR>LULUS TGL, BULAN & TAHUN<Br> TINGKAT IJAZAH</th>
			<th style="vertical-align:middle;text-align:center">TEMPAT TGL. LAHIR  USIA</th>
		</tr>
	</thead>
	<tbody>
		@foreach($duk as $key=>$duk)
			<tr>
				<td>{{$key+1}}</td>
				<td>
					<ul>
						<li>> {{$duk->pegawai->nama_lengkap}}</li>
						<li>> {{$duk->pegawai->nip}}</li>
						<li>> {{$duk->pegawai->jenis_kelamin}}</li>
						<li>> {{$duk->pegawai->status_pernikahan}}</li>
						<li>> Status Pegawai : {{$duk->pegawai->status_pegawai}}</li>
						<li>> TMT CPNS : {{indonesian_date($duk->pegawai->tmt_cpns)}}</li>
						<li>> TMT PNS : {{indonesian_date($duk->pegawai->tmt_pns)}}</li>
					</ul>
				</td>
				<td>
					<ul>
						<li>> {{$duk->pegawai->golongan_akhir->title}}</li>
						<li>> {{indonesian_date($duk->pegawai->tmt_golongan_akhir)}}</li>
					</ul>
				</td>
				<td>
					@if(!empty($duk->pegawai->jabatan_struktural_id))
					<ul>
						<li>> {{$duk->pegawai->golongan_akhir->title}}</li>
						<li>> Eselon : {{$duk->pegawai->eselon}}</li>
						<li>> TMT Jabatan : {{indonesian_date($duk->pegawai->tmt_eselon)}}</li>
					</ul>
					@elseif(!empty($duk->pegawai->jabatan_fungsional_tertentu))
					<ul>
						<li>> {{$duk->pegawai->jabatan_fungsional_tertentu}}</li>
						<li>> Eselon : {{$duk->pegawai->eselon}}</li>
						<li>> TMT Jabatan : {{indonesian_date($duk->pegawai->tmt_jabatan_fungsional_tertentu)}}</li>
					</ul>
					@elseif(!empty($duk->pegawai->jabatan_fungsional_umum))
					<ul>
						<li>> {{$duk->pegawai->jabatan_fungsional_umum}}</li>
						<li>> Eselon : {{$duk->pegawai->eselon}}</li>
						<li>> TMT Jabatan : {{indonesian_date($duk->pegawai->tmt_jabatan_fungsional_umum)}}</li>
					</ul>
					@endif
				</td>
				<td>
					<ul>
						<li>> {{$duk->pegawai->masa_kerja_tahun}}</li>
						<li>> {{$duk->pegawai->penyesuaian_masa_kerja_tahun}}</li>
						<li>> {{($duk->pegawai->masa_kerja_tahun+$duk->pegawai->penyesuaian_masa_kerja_tahun)}}</li>
					</ul>
				</td>
				<td>
					<ul>
						<li>> {{$duk->pegawai->masa_kerja_bulan}}</li>
						<li>> {{$duk->pegawai->penyesuaian_masa_kerja_bulan}}</li>
						<li>> {{($duk->pegawai->masa_kerja_bulan+$duk->pegawai->penyesuaian_masa_kerja_bulan)}}</li>
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
						<li>> {{$duk->pegawai->tempat_lahir}}</li>
						<li>> {{indonesian_date($duk->pegawai->tanggal_lahir)}}</li>
						<li>> {{$duk->pegawai->age()}} tahun</li>
					</ul>
				</td>
				<td></td>
				<td></td>
			</tr>
		@endforeach
	</tbody>
</table>

@endsection

@push("script")

		<script type="text/javascript">
		    $(document).ready( function () {
		        $('#table_id').DataTable();
		    } );
		</script>

@endpush