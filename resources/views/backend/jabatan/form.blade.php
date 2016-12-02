@extends("backend.layout.backend")

@section("title","Jabatan Struktural")

@section("content")
<div class="panel panel-featured panel-featured-primary">
	<div class="panel-heading">
		<h3 class="panel-title">@yield("title")</h3>
	</div>
	
	<div class="panel-body">
		<form class="form-horizontal" action="{{route('dashboard.jabatan.store')}}" method="POST">
		<div class="form-group">
			<label for="title" class="col-sm-2 control-label">Title</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="title" id="title" required placeholder="Title" value="{{ ($action === 'add') ? old('title') : ((old('title')) ? old('title') : $jabatan->title) }}">
			</div>
		</div>
		<div class="form-group">
			<label for="description" class="col-sm-2 control-label">Unit Kerja</label>
			<div class="col-sm-10">
				<select name="unit_kerja_id">
					@if($action == 'add')
						@foreach($unit_kerja as $unit)
							<option value="{{$unit->id}}">{{$unit->title}}</option>
						@endforeach
					@elseif($action == 'edit')
						@foreach($unit_kerja as $unit)
							@if($jabatan->unit_kerja_id == $unit->id)
								<option value="{{$unit->id}}" selected="selected">{{$unit->title}}</option>
							@else
								<option value="{{$unit->id}}">{{$unit->title}}</option>
							@endif
						@endforeach
					@endif
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="eselon" class="col-sm-2 control-label">Eselon</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="eselon" id="eselon" required placeholder="Eselon" value="{{ ($action === 'add') ? old('eselon') : ((old('eselon')) ? old('eselon') : $jabatan->eselon) }}">
			</div>
		</div>
		<input type="hidden" name="action" value="{{$action}}">
		@if($action === 'edit')
		<input type="hidden" name="id" value="{{$jabatan->id}}">
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
