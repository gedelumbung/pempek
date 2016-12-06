@extends("backend.layout.backend")

@section("title","Roles")

@section("content")
<div class="panel panel-featured panel-featured-primary">
	<div class="panel-heading">
		<h3 class="panel-title">@yield("title")</h3>
	</div>
	
	<div class="panel-body">
		<form class="form-horizontal" action="{{route('dashboard.roles.store')}}" method="POST">
		<div class="form-group">
			<label for="name" class="col-sm-2 control-label">Name</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="name" id="name" required placeholder="Name" value="{{ ($action === 'add') ? old('name') : ((old('name')) ? old('name') : $role->name) }}">
			</div>
		</div>
		<div class="form-group">
			<label for="slug" class="col-sm-2 control-label">Slug</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="slug" id="slug" required placeholder="Display Name" value="{{ ($action === 'add') ? old('slug') : ((old('slug')) ? old('slug') : $role->slug) }}">
			</div>
		</div>
		<div class="form-group">
			<label for="description" class="col-sm-2 control-label">Description</label>
			<div class="col-sm-10">
				<textarea name="description" class="form-control" required placeholder="Description">{{ ($action === 'add') ? old('description') : ((old('description')) ? old('description') : $role->description) }}</textarea>
			</div>
		</div>
		<input type="hidden" name="action" value="{{$action}}">
		@if($action === 'edit')
		<input type="hidden" name="id" value="{{$role->id}}">
		@endif
		{!! csrf_field() !!}
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
		</div>
		</form>
	</div>
</div>

@endsection
