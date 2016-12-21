@extends("backend.layout.backend")

@section("title","Laporan Konfirgurasi - Usia")

@section("content")
	<div class="table-responsive">
		<table class="table table-bordered" style="background-color: #fff;">
			<thead>
				<tr>
					<th rowspan="2" style="vertical-align: middle;text-align: center">No</th>
					<th rowspan="2" style="vertical-align: middle;text-align: center">Nama Struktural</th>
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
					@php
						$parent_level = ($key > 0) ? 1 : 0;
						$list_jabatan_sub = $unit->list_jabatan_level($unit->id, $parent_level);

						$count_parent_eselon_1 = $unit->countParentPegawaiByUsiaEselon('struktural', 'I', $unit->id, 18, 25)+$unit->countParentPegawaiByUsiaEselon('struktural', 'I', $unit->id, 26, 30)+$unit->countParentPegawaiByUsiaEselon('struktural', 'I', $unit->id, 31, 35)+$unit->countParentPegawaiByUsiaEselon('struktural', 'I', $unit->id, 36, 40)+$unit->countParentPegawaiByUsiaEselon('struktural', 'I', $unit->id, 41, 45)+$unit->countParentPegawaiByUsiaEselon('struktural', 'I', $unit->id, 46, 50)+$unit->countParentPegawaiByUsiaEselon('struktural', 'I', $unit->id, 51, 55)+$unit->countParentPegawaiByUsiaEselon('struktural', 'I', $unit->id, 56, 60);

						$count_parent_eselon_2 = $unit->countParentPegawaiByUsiaEselon('struktural', 'II', $unit->id, 18, 25)+$unit->countParentPegawaiByUsiaEselon('struktural', 'II', $unit->id, 26, 30)+$unit->countParentPegawaiByUsiaEselon('struktural', 'II', $unit->id, 31, 35)+$unit->countParentPegawaiByUsiaEselon('struktural', 'II', $unit->id, 36, 40)+$unit->countParentPegawaiByUsiaEselon('struktural', 'II', $unit->id, 41, 45)+$unit->countParentPegawaiByUsiaEselon('struktural', 'II', $unit->id, 46, 50)+$unit->countParentPegawaiByUsiaEselon('struktural', 'II', $unit->id, 51, 55)+$unit->countParentPegawaiByUsiaEselon('struktural', 'II', $unit->id, 56, 60);

						$count_parent_eselon_3 = $unit->countParentPegawaiByUsiaEselon('struktural', 'III', $unit->id, 18, 25)+$unit->countParentPegawaiByUsiaEselon('struktural', 'III', $unit->id, 26, 30)+$unit->countParentPegawaiByUsiaEselon('struktural', 'III', $unit->id, 31, 35)+$unit->countParentPegawaiByUsiaEselon('struktural', 'III', $unit->id, 36, 40)+$unit->countParentPegawaiByUsiaEselon('struktural', 'III', $unit->id, 41, 45)+$unit->countParentPegawaiByUsiaEselon('struktural', 'III', $unit->id, 46, 50)+$unit->countParentPegawaiByUsiaEselon('struktural', 'III', $unit->id, 51, 55)+$unit->countParentPegawaiByUsiaEselon('struktural', 'III', $unit->id, 56, 60);

						$count_parent_eselon_4 = $unit->countParentPegawaiByUsiaEselon('struktural', 'IV', $unit->id, 18, 25)+$unit->countParentPegawaiByUsiaEselon('struktural', 'IV', $unit->id, 26, 30)+$unit->countParentPegawaiByUsiaEselon('struktural', 'IV', $unit->id, 31, 35)+$unit->countParentPegawaiByUsiaEselon('struktural', 'IV', $unit->id, 36, 40)+$unit->countParentPegawaiByUsiaEselon('struktural', 'IV', $unit->id, 41, 45)+$unit->countParentPegawaiByUsiaEselon('struktural', 'IV', $unit->id, 46, 50)+$unit->countParentPegawaiByUsiaEselon('struktural', 'IV', $unit->id, 51, 55)+$unit->countParentPegawaiByUsiaEselon('struktural', 'IV', $unit->id, 56, 60);

						$count_parent_fungsional = $unit->countParentPegawaiByUsiaEselon('fungsional', 'IV', $unit->id, 18, 25)+$unit->countParentPegawaiByUsiaEselon('fungsional', 'IV', $unit->id, 26, 30)+$unit->countParentPegawaiByUsiaEselon('fungsional', 'IV', $unit->id, 31, 35)+$unit->countParentPegawaiByUsiaEselon('fungsional', 'IV', $unit->id, 36, 40)+$unit->countParentPegawaiByUsiaEselon('fungsional', 'IV', $unit->id, 41, 45)+$unit->countParentPegawaiByUsiaEselon('fungsional', 'IV', $unit->id, 46, 50)+$unit->countParentPegawaiByUsiaEselon('fungsional', 'IV', $unit->id, 51, 55)+$unit->countParentPegawaiByUsiaEselon('fungsional', 'IV', $unit->id, 56, 60);

						$count_parent_usia_1 = $unit->countParentPegawaiByUsiaEselon('struktural', 'I', $unit->id, 18, 25)+$unit->countParentPegawaiByUsiaEselon('struktural', 'II', $unit->id, 18, 25)+$unit->countParentPegawaiByUsiaEselon('struktural', 'III', $unit->id, 18, 25)+$unit->countParentPegawaiByUsiaEselon('struktural', 'IV', $unit->id, 18, 25)+$unit->countParentPegawaiByUsiaEselon('fungsional', 'IV', $unit->id, 18, 25);

						$count_parent_usia_2 = $unit->countParentPegawaiByUsiaEselon('struktural', 'I', $unit->id, 26,30)+$unit->countParentPegawaiByUsiaEselon('struktural', 'II', $unit->id, 26,30)+$unit->countParentPegawaiByUsiaEselon('struktural', 'III', $unit->id, 26,30)+$unit->countParentPegawaiByUsiaEselon('struktural', 'IV', $unit->id, 26,30)+$unit->countParentPegawaiByUsiaEselon('fungsional', 'IV', $unit->id, 26,30);

						$count_parent_usia_3 = $unit->countParentPegawaiByUsiaEselon('struktural', 'I', $unit->id, 31,35)+$unit->countParentPegawaiByUsiaEselon('struktural', 'II', $unit->id, 31,35)+$unit->countParentPegawaiByUsiaEselon('struktural', 'III', $unit->id, 31,35)+$unit->countParentPegawaiByUsiaEselon('struktural', 'IV', $unit->id, 31,35)+$unit->countParentPegawaiByUsiaEselon('fungsional', 'IV', $unit->id, 31,35);

						$count_parent_usia_4 = $unit->countParentPegawaiByUsiaEselon('struktural', 'I', $unit->id, 36,40)+$unit->countParentPegawaiByUsiaEselon('struktural', 'II', $unit->id, 36,40)+$unit->countParentPegawaiByUsiaEselon('struktural', 'III', $unit->id, 36,40)+$unit->countParentPegawaiByUsiaEselon('struktural', 'IV', $unit->id, 36,40)+$unit->countParentPegawaiByUsiaEselon('fungsional', 'IV', $unit->id, 36,40);

						$count_parent_usia_5 = $unit->countParentPegawaiByUsiaEselon('struktural', 'I', $unit->id, 41,45)+$unit->countParentPegawaiByUsiaEselon('struktural', 'II', $unit->id, 41,45)+$unit->countParentPegawaiByUsiaEselon('struktural', 'III', $unit->id, 41,45)+$unit->countParentPegawaiByUsiaEselon('struktural', 'IV', $unit->id, 41,45)+$unit->countParentPegawaiByUsiaEselon('fungsional', 'IV', $unit->id, 41,45);

						$count_parent_usia_6 = $unit->countParentPegawaiByUsiaEselon('struktural', 'I', $unit->id, 46,50)+$unit->countParentPegawaiByUsiaEselon('struktural', 'II', $unit->id, 46,50)+$unit->countParentPegawaiByUsiaEselon('struktural', 'III', $unit->id, 46,50)+$unit->countParentPegawaiByUsiaEselon('struktural', 'IV', $unit->id, 46,50)+$unit->countParentPegawaiByUsiaEselon('fungsional', 'IV', $unit->id, 46,50);

						$count_parent_usia_7 = $unit->countParentPegawaiByUsiaEselon('struktural', 'I', $unit->id, 51,55)+$unit->countParentPegawaiByUsiaEselon('struktural', 'II', $unit->id, 51,55)+$unit->countParentPegawaiByUsiaEselon('struktural', 'III', $unit->id, 51,55)+$unit->countParentPegawaiByUsiaEselon('struktural', 'IV', $unit->id, 51,55)+$unit->countParentPegawaiByUsiaEselon('fungsional', 'IV', $unit->id, 51,55);

						$count_parent_usia_8 = $unit->countParentPegawaiByUsiaEselon('struktural', 'I', $unit->id, 56,60)+$unit->countParentPegawaiByUsiaEselon('struktural', 'II', $unit->id, 56,60)+$unit->countParentPegawaiByUsiaEselon('struktural', 'III', $unit->id, 56,60)+$unit->countParentPegawaiByUsiaEselon('struktural', 'IV', $unit->id, 56,60)+$unit->countParentPegawaiByUsiaEselon('fungsional', 'IV', $unit->id, 56,60);
					@endphp
					<tr style="background-color: #efefef; font-weight: bold;">
						<td style="vertical-align: middle;text-align: center">{{$key+1}}</td>
						<td style="vertical-align: middle;">{{$unit->title}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByUsiaEselon('struktural', 'I', $unit->id, 18, 25)}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByUsiaEselon('struktural', 'I', $unit->id, 26, 30)}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByUsiaEselon('struktural', 'I', $unit->id, 31, 35)}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByUsiaEselon('struktural', 'I', $unit->id, 36, 40)}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByUsiaEselon('struktural', 'I', $unit->id, 41, 45)}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByUsiaEselon('struktural', 'I', $unit->id, 46, 50)}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByUsiaEselon('struktural', 'I', $unit->id, 51, 55)}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByUsiaEselon('struktural', 'I', $unit->id, 56, 60)}}</td>
						<td style="vertical-align: middle;">{{$count_parent_eselon_1}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByUsiaEselon('struktural', 'II', $unit->id, 18, 25)}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByUsiaEselon('struktural', 'II', $unit->id, 26, 30)}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByUsiaEselon('struktural', 'II', $unit->id, 31, 35)}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByUsiaEselon('struktural', 'II', $unit->id, 36, 40)}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByUsiaEselon('struktural', 'II', $unit->id, 41, 45)}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByUsiaEselon('struktural', 'II', $unit->id, 46, 50)}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByUsiaEselon('struktural', 'II', $unit->id, 51, 55)}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByUsiaEselon('struktural', 'II', $unit->id, 56, 60)}}</td>
						<td style="vertical-align: middle;">{{$count_parent_eselon_2}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByUsiaEselon('struktural', 'III', $unit->id, 18, 25)}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByUsiaEselon('struktural', 'III', $unit->id, 26, 30)}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByUsiaEselon('struktural', 'III', $unit->id, 31, 35)}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByUsiaEselon('struktural', 'III', $unit->id, 36, 40)}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByUsiaEselon('struktural', 'III', $unit->id, 41, 45)}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByUsiaEselon('struktural', 'III', $unit->id, 46, 50)}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByUsiaEselon('struktural', 'III', $unit->id, 51, 55)}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByUsiaEselon('struktural', 'III', $unit->id, 56, 60)}}</td>
						<td style="vertical-align: middle;">{{$count_parent_eselon_3}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByUsiaEselon('struktural', 'IV', $unit->id, 18, 25)}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByUsiaEselon('struktural', 'IV', $unit->id, 26, 30)}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByUsiaEselon('struktural', 'IV', $unit->id, 31, 35)}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByUsiaEselon('struktural', 'IV', $unit->id, 36, 40)}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByUsiaEselon('struktural', 'IV', $unit->id, 41, 45)}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByUsiaEselon('struktural', 'IV', $unit->id, 46, 50)}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByUsiaEselon('struktural', 'IV', $unit->id, 51, 55)}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByUsiaEselon('struktural', 'IV', $unit->id, 56, 60)}}</td>
						<td style="vertical-align: middle;">{{$count_parent_eselon_4}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByUsiaEselon('fungsional', 'IV', $unit->id, 18, 25)}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByUsiaEselon('fungsional', 'IV', $unit->id, 26, 30)}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByUsiaEselon('fungsional', 'IV', $unit->id, 31, 35)}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByUsiaEselon('fungsional', 'IV', $unit->id, 36, 40)}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByUsiaEselon('fungsional', 'IV', $unit->id, 41, 45)}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByUsiaEselon('fungsional', 'IV', $unit->id, 46, 50)}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByUsiaEselon('fungsional', 'IV', $unit->id, 51, 55)}}</td>
						<td style="vertical-align: middle;">{{$unit->countParentPegawaiByUsiaEselon('fungsional', 'IV', $unit->id, 56, 60)}}</td>
						<td style="vertical-align: middle;">{{$count_parent_fungsional}}</td>
						<td style="vertical-align: middle;">{{$count_parent_usia_1}}</td>
						<td style="vertical-align: middle;">{{$count_parent_usia_2}}</td>
						<td style="vertical-align: middle;">{{$count_parent_usia_3}}</td>
						<td style="vertical-align: middle;">{{$count_parent_usia_4}}</td>
						<td style="vertical-align: middle;">{{$count_parent_usia_5}}</td>
						<td style="vertical-align: middle;">{{$count_parent_usia_6}}</td>
						<td style="vertical-align: middle;">{{$count_parent_usia_7}}</td>
						<td style="vertical-align: middle;">{{$count_parent_usia_8}}</td>
						<td style="vertical-align: middle;">{{$count_parent_usia_1+$count_parent_usia_2+$count_parent_usia_3+$count_parent_usia_4+$count_parent_usia_5+$count_parent_usia_6+$count_parent_usia_7+$count_parent_usia_8}}</td>
					</tr>
					@foreach($unit->sub_unit_kerja as $key_sub=>$sub_unit)
						@if($key > 0)
						@php
							$jabatan_sub_id = ($key > 0) ? $list_jabatan_sub[$key_sub] : $list_jabatan_sub[0];

							$count_sub_eselon_1 = $sub_unit->countSubPegawaiByUsiaEselon('struktural', 'I', $jabatan_sub_id, 18, 25)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'I', $jabatan_sub_id, 26, 30)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'I', $jabatan_sub_id, 31, 35)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'I', $jabatan_sub_id, 36, 40)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'I', $jabatan_sub_id, 41, 45)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'I', $jabatan_sub_id, 46, 50)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'I', $jabatan_sub_id, 51, 55)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'I', $jabatan_sub_id, 56, 60);

							$count_sub_eselon_2 = $sub_unit->countSubPegawaiByUsiaEselon('struktural', 'II', $jabatan_sub_id, 18, 25)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'II', $jabatan_sub_id, 26, 30)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'II', $jabatan_sub_id, 31, 35)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'II', $jabatan_sub_id, 36, 40)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'II', $jabatan_sub_id, 41, 45)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'II', $jabatan_sub_id, 46, 50)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'II', $jabatan_sub_id, 51, 55)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'II', $jabatan_sub_id, 56, 60);

							$count_sub_eselon_3 = $sub_unit->countSubPegawaiByUsiaEselon('struktural', 'III', $jabatan_sub_id, 18, 25)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'III', $jabatan_sub_id, 26, 30)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'III', $jabatan_sub_id, 31, 35)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'III', $jabatan_sub_id, 36, 40)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'III', $jabatan_sub_id, 41, 45)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'III', $jabatan_sub_id, 46, 50)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'III', $jabatan_sub_id, 51, 55)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'III', $jabatan_sub_id, 56, 60);

							$count_sub_eselon_4 = $sub_unit->countSubPegawaiByUsiaEselon('struktural', 'IV', $jabatan_sub_id, 18, 25)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'IV', $jabatan_sub_id, 26, 30)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'IV', $jabatan_sub_id, 31, 35)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'IV', $jabatan_sub_id, 36, 40)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'IV', $jabatan_sub_id, 41, 45)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'IV', $jabatan_sub_id, 46, 50)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'IV', $jabatan_sub_id, 51, 55)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'IV', $jabatan_sub_id, 56, 60);

							$count_sub_fungsional = $sub_unit->countSubPegawaiByUsiaEselon('fungsional', 'IV', $jabatan_sub_id, 18, 25)+$sub_unit->countSubPegawaiByUsiaEselon('fungsional', 'IV', $jabatan_sub_id, 26, 30)+$sub_unit->countSubPegawaiByUsiaEselon('fungsional', 'IV', $jabatan_sub_id, 31, 35)+$sub_unit->countSubPegawaiByUsiaEselon('fungsional', 'IV', $jabatan_sub_id, 36, 40)+$sub_unit->countSubPegawaiByUsiaEselon('fungsional', 'IV', $jabatan_sub_id, 41, 45)+$sub_unit->countSubPegawaiByUsiaEselon('fungsional', 'IV', $jabatan_sub_id, 46, 50)+$sub_unit->countSubPegawaiByUsiaEselon('fungsional', 'IV', $jabatan_sub_id, 51, 55)+$sub_unit->countSubPegawaiByUsiaEselon('fungsional', 'IV', $jabatan_sub_id, 56, 60);

							$count_sub_usia_1 = $sub_unit->countSubPegawaiByUsiaEselon('struktural', 'I', $jabatan_sub_id, 18, 25)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'II', $jabatan_sub_id, 18, 25)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'III', $jabatan_sub_id, 18, 25)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'IV', $jabatan_sub_id, 18, 25)+$sub_unit->countSubPegawaiByUsiaEselon('fungsional', 'IV', $jabatan_sub_id, 18, 25);

							$count_sub_usia_2 = $sub_unit->countSubPegawaiByUsiaEselon('struktural', 'I', $jabatan_sub_id, 26,30)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'II', $jabatan_sub_id, 26,30)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'III', $jabatan_sub_id, 26,30)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'IV', $jabatan_sub_id, 26,30)+$sub_unit->countSubPegawaiByUsiaEselon('fungsional', 'IV', $jabatan_sub_id, 26,30);

							$count_sub_usia_3 = $sub_unit->countSubPegawaiByUsiaEselon('struktural', 'I', $jabatan_sub_id, 31,35)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'II', $jabatan_sub_id, 31,35)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'III', $jabatan_sub_id, 31,35)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'IV', $jabatan_sub_id, 31,35)+$sub_unit->countSubPegawaiByUsiaEselon('fungsional', 'IV', $jabatan_sub_id, 31,35);

							$count_sub_usia_4 = $sub_unit->countSubPegawaiByUsiaEselon('struktural', 'I', $jabatan_sub_id, 36,40)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'II', $jabatan_sub_id, 36,40)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'III', $jabatan_sub_id, 36,40)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'IV', $jabatan_sub_id, 36,40)+$sub_unit->countSubPegawaiByUsiaEselon('fungsional', 'IV', $jabatan_sub_id, 36,40);

							$count_sub_usia_5 = $sub_unit->countSubPegawaiByUsiaEselon('struktural', 'I', $jabatan_sub_id, 41,45)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'II', $jabatan_sub_id, 41,45)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'III', $jabatan_sub_id, 41,45)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'IV', $jabatan_sub_id, 41,45)+$sub_unit->countSubPegawaiByUsiaEselon('fungsional', 'IV', $jabatan_sub_id, 41,45);

							$count_sub_usia_6 = $sub_unit->countSubPegawaiByUsiaEselon('struktural', 'I', $jabatan_sub_id, 46,50)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'II', $jabatan_sub_id, 46,50)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'III', $jabatan_sub_id, 46,50)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'IV', $jabatan_sub_id, 46,50)+$sub_unit->countSubPegawaiByUsiaEselon('fungsional', 'IV', $jabatan_sub_id, 46,50);

							$count_sub_usia_7 = $sub_unit->countSubPegawaiByUsiaEselon('struktural', 'I', $jabatan_sub_id, 51,55)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'II', $jabatan_sub_id, 51,55)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'III', $jabatan_sub_id, 51,55)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'IV', $jabatan_sub_id, 51,55)+$sub_unit->countSubPegawaiByUsiaEselon('fungsional', 'IV', $jabatan_sub_id, 51,55);

							$count_sub_usia_8 = $sub_unit->countSubPegawaiByUsiaEselon('struktural', 'I', $jabatan_sub_id, 56,60)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'II', $jabatan_sub_id, 56,60)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'III', $jabatan_sub_id, 56,60)+$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'IV', $jabatan_sub_id, 56,60)+$sub_unit->countSubPegawaiByUsiaEselon('fungsional', 'IV', $jabatan_sub_id, 56,60);
						@endphp
						<tr>
							<td style="vertical-align: middle;text-align: center">{{$key_sub+1}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->title}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'I', $jabatan_sub_id, 18, 25)}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'I', $jabatan_sub_id, 26, 30)}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'I', $jabatan_sub_id, 31, 35)}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'I', $jabatan_sub_id, 36, 40)}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'I', $jabatan_sub_id, 41, 45)}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'I', $jabatan_sub_id, 46, 50)}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'I', $jabatan_sub_id, 51, 55)}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'I', $jabatan_sub_id, 56, 60)}}</td>
							<td style="vertical-align: middle;">{{$count_sub_eselon_1}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'II', $jabatan_sub_id, 18, 25)}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'II', $jabatan_sub_id, 26, 30)}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'II', $jabatan_sub_id, 31, 35)}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'II', $jabatan_sub_id, 36, 40)}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'II', $jabatan_sub_id, 41, 45)}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'II', $jabatan_sub_id, 46, 50)}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'II', $jabatan_sub_id, 51, 55)}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'II', $jabatan_sub_id, 56, 60)}}</td>
							<td style="vertical-align: middle;">{{$count_sub_eselon_2}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'III', $jabatan_sub_id, 18, 25)}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'III', $jabatan_sub_id, 26, 30)}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'III', $jabatan_sub_id, 31, 35)}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'III', $jabatan_sub_id, 36, 40)}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'III', $jabatan_sub_id, 41, 45)}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'III', $jabatan_sub_id, 46, 50)}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'III', $jabatan_sub_id, 51, 55)}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'III', $jabatan_sub_id, 56, 60)}}</td>
							<td style="vertical-align: middle;">{{$count_sub_eselon_3}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'IV', $jabatan_sub_id, 18, 25)}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'IV', $jabatan_sub_id, 26, 30)}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'IV', $jabatan_sub_id, 31, 35)}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'IV', $jabatan_sub_id, 36, 40)}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'IV', $jabatan_sub_id, 41, 45)}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'IV', $jabatan_sub_id, 46, 50)}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'IV', $jabatan_sub_id, 51, 55)}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByUsiaEselon('struktural', 'IV', $jabatan_sub_id, 56, 60)}}</td>
							<td style="vertical-align: middle;">{{$count_sub_eselon_4}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByUsiaEselon('fungsional', 'IV', $jabatan_sub_id, 18, 25)}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByUsiaEselon('fungsional', 'IV', $jabatan_sub_id, 26, 30)}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByUsiaEselon('fungsional', 'IV', $jabatan_sub_id, 31, 35)}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByUsiaEselon('fungsional', 'IV', $jabatan_sub_id, 36, 40)}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByUsiaEselon('fungsional', 'IV', $jabatan_sub_id, 41, 45)}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByUsiaEselon('fungsional', 'IV', $jabatan_sub_id, 46, 50)}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByUsiaEselon('fungsional', 'IV', $jabatan_sub_id, 51, 55)}}</td>
							<td style="vertical-align: middle;">{{$sub_unit->countSubPegawaiByUsiaEselon('fungsional', 'IV', $jabatan_sub_id, 56, 60)}}</td>
							<td style="vertical-align: middle;">{{$count_sub_fungsional}}</td>
							<td style="vertical-align: middle;">{{$count_sub_usia_1}}</td>
							<td style="vertical-align: middle;">{{$count_sub_usia_2}}</td>
							<td style="vertical-align: middle;">{{$count_sub_usia_3}}</td>
							<td style="vertical-align: middle;">{{$count_sub_usia_4}}</td>
							<td style="vertical-align: middle;">{{$count_sub_usia_5}}</td>
							<td style="vertical-align: middle;">{{$count_sub_usia_6}}</td>
							<td style="vertical-align: middle;">{{$count_sub_usia_7}}</td>
							<td style="vertical-align: middle;">{{$count_sub_usia_8}}</td>
							<td style="vertical-align: middle;">{{$count_sub_usia_1+$count_sub_usia_2+$count_sub_usia_3+$count_sub_usia_4+$count_sub_usia_5+$count_sub_usia_6+$count_sub_usia_7+$count_sub_usia_8}}</td>
						</tr>
						@endif
					@endforeach
				@endforeach
			</tbody>
		</table>
	</div>

@endsection