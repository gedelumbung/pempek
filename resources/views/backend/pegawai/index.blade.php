@extends("backend.layout.backend")

@section("title","Pegawai")

@section("content")

<div class="panel panel-featured panel-featured-primary">
	<div class="panel-heading">
		<h3 class="panel-title">@yield("title")</h3>
	</div>
	
	<div class="panel-body">
		<table class="table table-striped">
			<tr>
				<th>NIP</th>
				<th>Nama</th>
				<th>Unit Kerja</th>
				<th>Jenis Jabatan</th>
				<th>Nama Jabatan</th>
				<th>Progress</th>
				<th>
					<a href="{{route('dashboard.pegawai.add')}}" class="btn btn-sm btn-primary">Add New</a>
				</th>
			</tr>
			<tbody>
				@foreach($pegawai as $key => $data)
				<tr>
					<td>{{$data->nip}}</td>
					<td>{{$data->nama}}</td>
					<td>{{$data->unit_kerja->title}}</td>
					<td>{{$data->jenis_jabatan}}</td>
					<td>{{$data->nama_jabatan}}</td>
					<td>50%</td>
					<td>
	        			<a href="{{ route('dashboard.golongan.edit', ['id' => $data->id]) }}">
	        				<i class="glyphicon glyphicon-pencil text-muted"></i>
	        			</a>
	        			<a href="{{ route('dashboard.golongan.delete', ['id' => $data->id]) }}">
	        				<i class="glyphicon glyphicon-trash text-danger"></i>
	        			</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection
