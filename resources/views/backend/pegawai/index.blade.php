@extends("backend.layout.backend")

@section("title","Pegawai")

@section("content")

<div class="panel panel-featured panel-featured-primary">
	<div class="panel-heading">
		<h3 class="panel-title">@yield("title")</h3>
	</div>
	
	<div class="panel-body">
		<table class="table table-striped" id="table_id">
			<thead>
				<tr>
					<th width="180">NIP</th>
					<th width="180">Nama</th>
					<th>Unit Kerja</th>
					<th>Jenis Jabatan</th>
					<th>Nama Jabatan</th>
					<th>Progress</th>
					<th width="100">
						<a href="{{route('dashboard.pegawai.add')}}" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Tambah</a>
					</th>
				</tr>
			</thead>
			<tbody>
				@foreach($pegawai as $key => $data)
				<tr>
					<td>{{$data->nip}}</td>
					<td>{{($data->gelar_depan != '-' ? $data->gelar_depan : '')}} {{$data->nama_lengkap}}{{($data->gelar_belakang != '' ? ',' : '')}} {{($data->gelar_belakang != '' ? $data->gelar_belakang : '')}}</td>
					<td>
						@if(!empty($data->unit_kerja_id))
							{{$data->unit_kerja->title}}
						@endif
					</td>
					<td>{{$data->jenis_jabatan}}</td>
					<td>
						@if(!empty($data->jabatan_fungsional_tertentu))
							{{$data->jabatan_fungsional_tertentu}}
						@elseif(!empty($data->jabatan_fungsional_umum))
							{{$data->jabatan_fungsional_umum}}
						@elseif(!empty($data->jabatan_struktural_id))
							{{$data->jabatan_struktural->title}}
						@endif
					</td>
					<td>
						<div class="progress progress-squared" style="margin-bottom: -20px">
							<div class="progress-bar progress-bar-dark" role="progressbar" aria-valuenow="{{$data->count_progress}}" aria-valuemin="0" aria-valuemax="100" style="width: 50%;" title="{{61-$data->count_progress}} field yang kosong.">
								{{$data->count_progress}}
							</div>
						</div>
					</td>
					<td>
	        			<a href="{{ route('dashboard.pegawai.show', ['id' => $data->id]) }}" title="Detail Pegawai">
	        				<i class="glyphicon glyphicon-eye-open"></i>
	        			</a>
	        			<a href="{{ route('dashboard.pegawai.riwayat_golongan', ['id' => $data->id]) }}" title="Data Riwayat">
	        				<i class="glyphicon glyphicon-folder-open"></i>
	        			</a>
	        			<a href="{{ route('dashboard.pegawai.edit', ['id' => $data->id]) }}" title="Edit Detail Pegawai">
	        				<i class="glyphicon glyphicon-pencil"></i>
	        			</a>
	        			<a href="{{ route('dashboard.pegawai.delete', ['id' => $data->id]) }}" title="Hapus Pegawai">
	        				<i class="glyphicon glyphicon-trash"></i>
	        			</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection

@push("script")

		<script type="text/javascript">
		    $(document).ready( function () {
		        $('#table_id').DataTable();
		    } );
		</script>

@endpush