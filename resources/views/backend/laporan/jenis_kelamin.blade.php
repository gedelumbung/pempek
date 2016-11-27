@extends("backend.layout.backend")

@section("title","Laporan Konfirgurasi - Jenis Kelamin")

@section("content")
	<div class="table-responsive">
		<table class="table table-bordered" style="background-color: #fff;">
			<thead>
				<tr>
					<th rowspan="2" style="vertical-align: middle;text-align: center">No</th>
					<th rowspan="2" style="vertical-align: middle;text-align: center">Nama Struktural</th>
					<th rowspan="2" style="vertical-align: middle;text-align: center">Singkatan</th>
					<th colspan="2" style="vertical-align: middle;text-align: center">Golongan I</th>
					<th rowspan="2" style="vertical-align: middle;text-align: center">Jumlah</th>
					<th colspan="2" style="vertical-align: middle;text-align: center">Golongan II</th>
					<th rowspan="2" style="vertical-align: middle;text-align: center">Jumlah</th>
					<th colspan="2" style="vertical-align: middle;text-align: center">Golongan III</th>
					<th rowspan="2" style="vertical-align: middle;text-align: center">Jumlah</th>
					<th colspan="2" style="vertical-align: middle;text-align: center">Golongan IV</th>
					<th rowspan="2" style="vertical-align: middle;text-align: center">Jumlah</th>
					<th colspan="3" style="vertical-align: middle;text-align: center">Jumlah Total</th>
				</tr>
				<tr>
					<th style="vertical-align: middle;text-align: center">Laki-Laki</th>
					<th style="vertical-align: middle;text-align: center">Perempuan</th>
					<th style="vertical-align: middle;text-align: center">Laki-Laki</th>
					<th style="vertical-align: middle;text-align: center">Perempuan</th>
					<th style="vertical-align: middle;text-align: center">Laki-Laki</th>
					<th style="vertical-align: middle;text-align: center">Perempuan</th>
					<th style="vertical-align: middle;text-align: center">Laki-Laki</th>
					<th style="vertical-align: middle;text-align: center">Perempuan</th>
					<th style="vertical-align: middle;text-align: center">Laki-Laki</th>
					<th style="vertical-align: middle;text-align: center">Perempuan</th>
					<th style="vertical-align: middle;text-align: center">Pegawai</th>
				</tr>
			</thead>
			<tbody>
				@foreach($unit_kerja as $key=>$unit)
					<tr style="background-color: #efefef; font-weight: bold;">
						<td style="vertical-align: middle;text-align: center">{{$key+1}}</td>
						<td style="vertical-align: middle;">{{$unit->title}}</td>
						<td style="vertical-align: middle;">{{$unit->title}}</td>
						<td style="vertical-align: middle;"></td>
						<td style="vertical-align: middle;"></td>
						<td style="vertical-align: middle;"></td>
						<td style="vertical-align: middle;"></td>
						<td style="vertical-align: middle;"></td>
						<td style="vertical-align: middle;"></td>
						<td style="vertical-align: middle;"></td>
						<td style="vertical-align: middle;"></td>
						<td style="vertical-align: middle;"></td>
						<td style="vertical-align: middle;"></td>
						<td style="vertical-align: middle;"></td>
						<td style="vertical-align: middle;"></td>
						<td style="vertical-align: middle;"></td>
						<td style="vertical-align: middle;"></td>
						<td style="vertical-align: middle;"></td>
					</tr>
					@foreach($unit->sub_unit_kerja as $key_sub=>$sub_unit)
						<tr>
							<td style="vertical-align: middle;text-align: center">{{$key_sub+1}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->title}}</td>
							<td style="vertical-align: middle;"></td>
							<td style="vertical-align: middle;"></td>
							<td style="vertical-align: middle;"></td>
							<td style="vertical-align: middle;"></td>
							<td style="vertical-align: middle;"></td>
							<td style="vertical-align: middle;"></td>
							<td style="vertical-align: middle;"></td>
							<td style="vertical-align: middle;"></td>
							<td style="vertical-align: middle;"></td>
							<td style="vertical-align: middle;"></td>
							<td style="vertical-align: middle;"></td>
							<td style="vertical-align: middle;"></td>
							<td style="vertical-align: middle;"></td>
							<td style="vertical-align: middle;"></td>
							<td style="vertical-align: middle;"></td>
							<td style="vertical-align: middle;"></td>
						</tr>
					@endforeach
				@endforeach
			</tbody>
		</table>
	</div>

@endsection