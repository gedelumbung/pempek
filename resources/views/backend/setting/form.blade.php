@extends("backend.layout.backend")

@section("title","Setting")

@section("content")
<div class="panel panel-featured panel-featured-primary">
	<div class="panel-heading">
		<h3 class="panel-title">@yield("title")</h3>
	</div>
	
	<div class="panel-body">
		<form class="form-horizontal" action="{{route('dashboard.settings.store')}}" method="POST">
		<div class="form-group">
			<label for="title" class="col-sm-2 control-label">Title</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="title" id="title" required placeholder="Title" value="{{ ($action === 'add') ? old('title') : ((old('title')) ? old('title') : $setting->title) }}">
			</div>
		</div>
		<div class="form-group">
			<label for="description" class="col-sm-2 control-label">Content</label>
			<div class="col-sm-10">
				<textarea name="content" class="form-control" required placeholder="Content">{{ ($action === 'add') ? old('content') : ((old('content')) ? old('content') : $setting->content) }}</textarea>
			</div>
		</div>
		<input type="hidden" name="image" id="image">
		<input type="hidden" name="action" value="{{$action}}">
		@if($action === 'edit')
		<input type="hidden" name="id" value="{{$setting->id}}">
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
