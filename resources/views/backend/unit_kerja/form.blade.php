@extends("backend.layout.backend")

@section("title","Unit Kerja")

@section("content")
<div class="panel panel-featured panel-featured-primary">
	<div class="panel-heading">
		<h3 class="panel-title">@yield("title")</h3>
	</div>
	
	<div class="panel-body">
		<form class="form-horizontal" action="{{route('dashboard.unit_kerja.store')}}" method="POST">
		<div class="form-group">
			<label for="title" class="col-sm-2 control-label">Unit Kerja</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="title" id="title" required placeholder="Unit Kerja" value="{{ ($action === 'add') ? old('title') : ((old('title')) ? old('title') : $unit_kerja->title) }}">
			</div>
		</div>
		<div class="form-group">
			<label for="description" class="col-sm-2 control-label">Description</label>
			<div class="col-sm-10">
				<textarea name="description" class="form-control" required placeholder="Description">{{ ($action === 'add') ? old('description') : ((old('description')) ? old('description') : $unit_kerja->description) }}</textarea>
			</div>
		</div>
		<input type="hidden" name="action" value="{{$action}}">
		@if($action === 'edit')
		<input type="hidden" name="id" value="{{$unit_kerja->id}}">
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
