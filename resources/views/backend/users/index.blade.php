@extends("backend.layout.backend")

@section("title","User")

@section("content")
<div class="panel panel-featured panel-featured-primary">
	<div class="panel-heading">
		<h3 class="panel-title">@yield("title")</h3>
	</div>
	
	<div class="panel-body">
		<table class="table table-striped">
			<tr>
				<th>ID</th>
				<th>NIP</th>
				<th>Name</th>
				<th>Email</th>
				<th>Created At</th>
				<th>Updated At</th>
				<th>
					<a href="{{route('dashboard.users.add')}}" class="btn btn-sm btn-primary">Add New</a>
				</th>
			</tr>
			@foreach($users as $data)
			<tr>
				<td>{{$data->id}}</td>
				<td>{{$data->nip}}</td>
				<td>{{$data->name}}</td>
				<td>{{$data->email}}</td>
				<td>{{$data->created_at}}</td>
				<td>{{$data->updated_at}}</td>
				<td>
        			<a href="{{ route('dashboard.users.edit', ['id' => $data->id]) }}">
        				<i class="glyphicon glyphicon-pencil text-muted"></i>
        			</a>
        			<a href="{{ route('dashboard.users.delete', ['id' => $data->id]) }}">
        				<i class="glyphicon glyphicon-trash text-danger"></i>
        			</a>
				</td>
			</tr>
			@endforeach
		</table>
	</div>
</div>

{{ $users->links() }}

@endsection
