@extends("backend.layout.backend")

@section("title","Laporan Konfirgurasi - Usia")

@section("content")
	<div class="table-responsive">
		<table class="table table-bordered" style="background-color: #fff;">
			<thead>
				<tr>
					<th rowspan="2" style="vertical-align: middle;text-align: center">No</th>
					<th rowspan="2" style="vertical-align: middle;text-align: center">Nama Struktural</th>
					<th rowspan="2" style="vertical-align: middle;text-align: center">Singkatan</th>
					<th colspan="8" style="vertical-align: middle;text-align: center">Usia Eselon I</th>
					<th rowspan="2" style="vertical-align: middle;text-align: center">Jumlah</th>
					<th colspan="8" style="vertical-align: middle;text-align: center">Usia Eselon II</th>
					<th rowspan="2" style="vertical-align: middle;text-align: center">Jumlah</th>
					<th colspan="8" style="vertical-align: middle;text-align: center">Usia Eselon III</th>
					<th rowspan="2" style="vertical-align: middle;text-align: center">Jumlah</th>
					<th colspan="8" style="vertical-align: middle;text-align: center">Usia Eselon IV</th>
					<th rowspan="2" style="vertical-align: middle;text-align: center">Jumlah</th>
					<th colspan="8" style="vertical-align: middle;text-align: center">Usia Jabatan Fungsional</th>
					<th rowspan="2" style="vertical-align: middle;text-align: center">Jumlah</th>
					<th colspan="8" style="vertical-align: middle;text-align: center">Usia Total</th>
					<th rowspan="2" style="vertical-align: middle;text-align: center">Total</th>
				</tr>
				<tr>
					<th style="vertical-align: middle;text-align: center">18-25</th>
					<th style="vertical-align: middle;text-align: center">26-30</th>
					<th style="vertical-align: middle;text-align: center">31-35</th>
					<th style="vertical-align: middle;text-align: center">36-40</th>
					<th style="vertical-align: middle;text-align: center">41-45</th>
					<th style="vertical-align: middle;text-align: center">46-50</th>
					<th style="vertical-align: middle;text-align: center">51-55</th>
					<th style="vertical-align: middle;text-align: center">56-60</th>
					
					<th style="vertical-align: middle;text-align: center">18-25</th>
					<th style="vertical-align: middle;text-align: center">26-30</th>
					<th style="vertical-align: middle;text-align: center">31-35</th>
					<th style="vertical-align: middle;text-align: center">36-40</th>
					<th style="vertical-align: middle;text-align: center">41-45</th>
					<th style="vertical-align: middle;text-align: center">46-50</th>
					<th style="vertical-align: middle;text-align: center">51-55</th>
					<th style="vertical-align: middle;text-align: center">56-60</th>
					
					<th style="vertical-align: middle;text-align: center">18-25</th>
					<th style="vertical-align: middle;text-align: center">26-30</th>
					<th style="vertical-align: middle;text-align: center">31-35</th>
					<th style="vertical-align: middle;text-align: center">36-40</th>
					<th style="vertical-align: middle;text-align: center">41-45</th>
					<th style="vertical-align: middle;text-align: center">46-50</th>
					<th style="vertical-align: middle;text-align: center">51-55</th>
					<th style="vertical-align: middle;text-align: center">56-60</th>
					
					<th style="vertical-align: middle;text-align: center">18-25</th>
					<th style="vertical-align: middle;text-align: center">26-30</th>
					<th style="vertical-align: middle;text-align: center">31-35</th>
					<th style="vertical-align: middle;text-align: center">36-40</th>
					<th style="vertical-align: middle;text-align: center">41-45</th>
					<th style="vertical-align: middle;text-align: center">46-50</th>
					<th style="vertical-align: middle;text-align: center">51-55</th>
					<th style="vertical-align: middle;text-align: center">56-60</th>
					
					<th style="vertical-align: middle;text-align: center">18-25</th>
					<th style="vertical-align: middle;text-align: center">26-30</th>
					<th style="vertical-align: middle;text-align: center">31-35</th>
					<th style="vertical-align: middle;text-align: center">36-40</th>
					<th style="vertical-align: middle;text-align: center">41-45</th>
					<th style="vertical-align: middle;text-align: center">46-50</th>
					<th style="vertical-align: middle;text-align: center">51-55</th>
					<th style="vertical-align: middle;text-align: center">56-60</th>
					
					<th style="vertical-align: middle;text-align: center">18-25</th>
					<th style="vertical-align: middle;text-align: center">26-30</th>
					<th style="vertical-align: middle;text-align: center">31-35</th>
					<th style="vertical-align: middle;text-align: center">36-40</th>
					<th style="vertical-align: middle;text-align: center">41-45</th>
					<th style="vertical-align: middle;text-align: center">46-50</th>
					<th style="vertical-align: middle;text-align: center">51-55</th>
					<th style="vertical-align: middle;text-align: center">56-60</th>
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