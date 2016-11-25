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
					<th>NIP</th>
					<th>Nama</th>
					<th>Unit Kerja</th>
					<th>Jenis Jabatan</th>
					<th>Nama Jabatan</th>
					<th>Progress</th>
					<th>
						<a href="{{route('dashboard.pegawai.add')}}" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Add New</a>
					</th>
				</tr>
			</thead>
			<tbody>
				@foreach($pegawai as $key => $data)
				<tr>
					<td>{{$data->nip}}</td>
					<td>{{$data->nama_lengkap}}</td>
					<td>{{$data->unit_kerja->title}}</td>
					<td>{{$data->jenis_jabatan}}</td>
					<td>
						@if(!empty($data->jabatan_fungsional_tertentu))
							{{$data->jabatan_fungsional_tertentu}}
						@elseif(!empty($data->jabatan_fungsional_umum))
							{{$data->jabatan_fungsional_umum}}
						@else
							{{$data->jabatan_struktural->title}}
						@endif
					</td>
					<td>
						<div class="progress progress-squared" style="margin-bottom: -20px">
							<div class="progress-bar progress-bar-dark" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 50%;" title="50 field yang kosong.">
								50%
							</div>
						</div>
					</td>
					<td>
	        			<a href="{{ route('dashboard.pegawai.show', ['id' => $data->id]) }}" class="btn btn-sm btn-warning">
	        				<i class="glyphicon glyphicon-eye-open"></i>
	        			</a>
	        			<a href="{{ route('dashboard.pegawai.riwayat_golongan', ['id' => $data->id]) }}" class="btn btn-sm btn-default">
	        				<i class="glyphicon glyphicon-folder-open"></i>
	        			</a>
	        			<a href="{{ route('dashboard.pegawai.edit', ['id' => $data->id]) }}" class="btn btn-sm btn-success">
	        				<i class="glyphicon glyphicon-pencil"></i>
	        			</a>
	        			<a href="{{ route('dashboard.pegawai.delete', ['id' => $data->id]) }}" class="btn btn-sm btn-danger">
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

@section("scripts")

		<script type="text/javascript">
		    $(document).ready( function () {
		        $('#table_id').DataTable();
		    } );
		</script>

@endsection