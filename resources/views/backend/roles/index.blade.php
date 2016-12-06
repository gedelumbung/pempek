@extends("backend.layout.backend")

@section("title","Roles")

@section("content")
<div class="panel panel-featured panel-featured-primary">
	<div class="panel-heading">
		<h3 class="panel-title">@yield("title")</h3>
	</div>
	
	<div class="panel-body">
		<table class="table table-striped">
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Slug</th>
				<th>Description</th>
				<th>
					<a href="{{route('dashboard.roles.add')}}" class="btn btn-sm btn-primary">Add New</a>
				</th>
			</tr>
			@foreach($roles as $role)
			<tr>
				<td>{{$role->id}}</td>
				<td>{{$role->name}}</td>
				<td>{{$role->slug}}</td>
				<td>{{$role->description}}</td>
				<td>
        			<a href="{{ route('dashboard.roles.edit', ['id' => $role->id]) }}">
        				<i class="glyphicon glyphicon-pencil text-muted"></i>
        			</a>
        			<a href="{{ route('dashboard.roles.delete', ['id' => $role->id]) }}">
        				<i class="glyphicon glyphicon-trash text-danger"></i>
        			</a>
				</td>
			</tr>
			@endforeach
		</table>
	</div>
</div>

{{ $roles->links() }}

@endsection
