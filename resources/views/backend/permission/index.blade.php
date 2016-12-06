@extends("backend.layout.backend")

@section("title","Permission")

@section("content")

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">@yield("title")</h3>
	</div>

	<div class="panel-body">
	<form method="POST" action="{{route('dashboard.permissions.save')}}">
		<table class="table table-responsive table-bordered table-striped table-hover">
			<thead>
				<tr class="dark">
					<th style="text-align: center;">Permission Name</th>

					@foreach ($roles as $role)
						<th style="text-align: center;">{{ $role->display_name }}</th>
					@endforeach
				</tr>
			</thead>

			<tbody>
				@foreach ($permissions as $permission)
					<tr>
						<td>
							<span>{{ $permission->display_name }}</span>
							<h6 class="text-muted">{{ $permission->description }}</h6>
						</td>
						@foreach ($roles as $role)
							<td style="text-align: center;">
								@if($role->findPermissionRole($permission->id, $role->id))
									<input type="checkbox" checked name="permission_role[]" value="{{$permission->id}},{{$role->id}}">
								@else
									<input type="checkbox" name="permission_role[]" value="{{$permission->id}},{{$role->id}}">
								@endif
							</td>
						@endforeach
					</tr>
				@endforeach
			</tbody>
		</table>

		<div style="position: fixed; top: 20%; right: 0;">
			<input class="btn btn-warning" type="submit" value="Simpan"></input>
	    </div>
	    {!! csrf_field() !!}
	</form>
	</div>
</div>

@endsection