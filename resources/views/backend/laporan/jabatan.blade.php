@extends("backend.layout.backend")

@section("title","Laporan Konfirgurasi - Jabatan")

@section("content")
	<div class="table-responsive">
		<table class="table table-bordered" style="background-color: #fff;">
			<thead>
				<tr>
					<th rowspan="2" style="vertical-align: middle;text-align: center">No</th>
					<th rowspan="2" style="vertical-align: middle;text-align: center">Nama Struktural</th>
					<th rowspan="2" style="vertical-align: middle;text-align: center">Singkatan</th>
					<th colspan="4" style="vertical-align: middle;text-align: center">Pejabat Struktural</th>
					<th rowspan="2" style="vertical-align: middle;text-align: center">Jumlah</th>
					<th colspan="4" style="vertical-align: middle;text-align: center">Pejabat Fungsional</th>
					<th rowspan="2" style="vertical-align: middle;text-align: center">Jumlah</th>
					<th colspan="4" style="vertical-align: middle;text-align: center">Jumlah</th>
					<th rowspan="2" style="vertical-align: middle;text-align: center">Jumlah Total</th>
				</tr>
				<tr>
					<th style="vertical-align: middle;text-align: center">GOL. I</th>
					<th style="vertical-align: middle;text-align: center">GOL. II</th>
					<th style="vertical-align: middle;text-align: center">GOL. III</th>
					<th style="vertical-align: middle;text-align: center">GOL. IV</th>
					<th style="vertical-align: middle;text-align: center">GOL. I</th>
					<th style="vertical-align: middle;text-align: center">GOL. II</th>
					<th style="vertical-align: middle;text-align: center">GOL. III</th>
					<th style="vertical-align: middle;text-align: center">GOL. IV</th>
					<th style="vertical-align: middle;text-align: center">GOL. I</th>
					<th style="vertical-align: middle;text-align: center">GOL. II</th>
					<th style="vertical-align: middle;text-align: center">GOL. III</th>
					<th style="vertical-align: middle;text-align: center">GOL. IV</th>
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