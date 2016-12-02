@extends("backend.layout.backend")

@section("title","Jabatan Struktural")

@section("content")
<div class="panel panel-featured panel-featured-primary">
	<div class="panel-heading">
		<h3 class="panel-title">@yield("title")</h3>
	</div>
	
	<div class="panel-body">
		<table class="table table-striped">
			<tr>
				<th>ID</th>
				<th>Title</th>
				<th>Unit Kerja</th>
				<th>Eselon</th>
				<th>Status</th>
				<th>
					<a href="{{route('dashboard.jabatan.add')}}" class="btn btn-sm btn-primary">Add New</a>
				</th>
			</tr>
			@foreach($jabatan as $data)
			<tr>
				<td>{{$data->id}}</td>
				<td>{{$data->title}}</td>
				<td>{{$data->unit_kerja->title}}</td>
				<td>{{$data->eselon}}</td>
				<td>{{($data->status == 1) ? 'Aktif' : 'Tidak Aktif'}}</td>
				<td>
					@if($data->status == 1)
        			<a href="{{ route('dashboard.jabatan.status', ['id' => $data->id, 'status' => 0]) }}">
        				<i class="fa fa-check text-success"></i>
        			</a>
        			@else
        			<a href="{{ route('dashboard.jabatan.status', ['id' => $data->id, 'status' => 1]) }}">
        				<i class="fa fa-times text-danger"></i>
        			</a>
        			@endif
        			<a href="{{ route('dashboard.jabatan.edit', ['id' => $data->id]) }}">
        				<i class="glyphicon glyphicon-pencil text-muted"></i>
        			</a>
        			<a href="{{ route('dashboard.jabatan.delete', ['id' => $data->id]) }}">
        				<i class="glyphicon glyphicon-trash text-danger"></i>
        			</a>
				</td>
			</tr>
			@endforeach
		</table>
	</div>
</div>

{{ $jabatan->links() }}

@endsection
