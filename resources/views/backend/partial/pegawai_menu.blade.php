<div style="width:100%; text-align:center; background-color:#0088cc; margin-bottom: 20px;">
	<div class="btn-group" role="group" aria-label="...">
		<a href="{{ route('dashboard.pegawai.riwayat_golongan', ['id' => $id]) }}" type="button" class="btn btn-primary">Riwayat Golongan</a>
		<a href="{{ route('dashboard.pegawai.riwayat_pendidikan', ['id' => $id]) }}" type="button" class="btn btn-primary">Riwayat Pendidikan</a>
		<a href="{{ route('dashboard.pegawai') }}" type="button" class="btn btn-primary">Riwayat Jabatan</a>
		<a href="{{ route('dashboard.pegawai') }}" type="button" class="btn btn-primary">Riwayat Diklat</a>
		<a href="{{ route('dashboard.pegawai') }}" type="button" class="btn btn-primary">Keluarga</a>
		<div class="btn-group" role="group">
			<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Keluarga
				<span class="caret"></span>
			</button>
			<ul class="dropdown-menu">
				<li><a href="#">Orang Tua</a></li>
				<li><a href="#">Istri/Suami</a></li>
				<li><a href="#">Anak</a></li>
			</ul>
		</div>
		<a href="{{ route('dashboard.pegawai') }}" type="button" class="btn btn-primary">Kursus</a>
		<a href="{{ route('dashboard.pegawai') }}" type="button" class="btn btn-primary">Penghargaan</a>`
	</div>
</div>