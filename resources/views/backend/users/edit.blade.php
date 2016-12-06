@extends("backend.layout.backend")

@section("title","User")

@section("content")
<div class="panel panel-featured panel-featured-primary">
	<div class="panel-heading">
		<h3 class="panel-title">@yield("title")</h3>
	</div>
	
	<div class="panel-body">
		<form class="form-horizontal" action="{{route('dashboard.users.store')}}" method="POST">
		<div class="form-group">
			<label for="nip" class="col-sm-2 control-label">Status</label>
			<div class="col-sm-10">
				<select select2 id="status" name="status" class="form-control">
					@if(empty($users->pegawai_id))
					<option value="pegawai">Pegawai</option>
					<option value="non_pegawai" selected>Non Pegawai</option>
					@else
					<option value="pegawai" selected>Pegawai</option>
					<option value="non_pegawai">Non Pegawai</option>
					@endif
				</select>
			</div>
		</div>
		<div class="form-group" id="pegawai">
			<label for="nip" class="col-sm-2 control-label">NIP</label>
			<div class="col-sm-10">
				<select select2 id="pegawai_id" class="form-control">
					<option value="">-- Pilih NIP --</option>
					@foreach($pegawai as $data_pegawai)
						@if($data_pegawai->id == $users->pegawai_id)
						<option value="{{$data_pegawai->id}}" selected>{{$data_pegawai->nama_lengkap}} - {{$data_pegawai->nip}}</option>
						@else
						<option value="{{$data_pegawai->id}}">{{$data_pegawai->nama_lengkap}} - {{$data_pegawai->nip}}</option>
						@endif
					@endforeach
				</select>
			</div>
		</div>
		<div class="form-group" id="nip_pegawai">
			<label for="nip" class="col-sm-2 control-label">NIP</label>
			<div class="col-sm-10">
				<input type="text" id="nip" name="nip" class="form-control" value="{{ ($action === 'add') ? old('nip') : ((old('nip')) ? old('nip') : $users->nip) }}">
			</div>
		</div>
		<div class="form-group">
			<label for="nama" class="col-sm-2 control-label">Nama</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="name" id="nama" required placeholder="Nama" value="{{ ($action === 'add') ? old('name') : ((old('name')) ? old('name') : $users->name) }}">
			</div>
		</div>
		<div class="form-group">
			<label for="email" class="col-sm-2 control-label">Email</label>
			<div class="col-sm-10">
				<input type="email" class="form-control" name="email" id="email" required placeholder="Email" value="{{ ($action === 'add') ? old('email') : ((old('email')) ? old('email') : $users->email) }}">
			</div>
		</div>
		<div class="form-group">
			<label for="password" class="col-sm-2 control-label">Password</label>
			<div class="col-sm-10">
				<input type="password" class="form-control" name="password" id="password" placeholder="Password">
				<small>*kosongkan jika tidak diganti</small>
			</div>
		</div>
		<div class="form-group">
			<label for="nip" class="col-sm-2 control-label">Role</label>
			<div class="col-sm-10">
				<select select2 id="role_id" name="role_id" class="form-control">
					@foreach($roles as $role)
						@if($role->id == $users->role_user->role_id)
						<option value="{{$role->id}}" selected>{{$role->name}}</option>
						@else
						<option value="{{$role->id}}">{{$role->name}}</option>
						@endif
					@endforeach
				</select>
			</div>
		</div>

		<input type="hidden" name="action" value="{{$action}}">
		@if($action === 'edit')
		<input type="hidden" name="id" value="{{$users->id}}">
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

@push("script")
    <script type="text/javascript">
    	@if(empty($users->pegawai_id))
    		$("#nip_pegawai").show();
    		$("#pegawai").hide();
    	@else
    		$("#nip_pegawai").hide();
    		$("#pegawai").show();
    	@endif
    	$('#status').change(function(){
    		var status = $(this).val();
    		if(status == 'pegawai'){
    			$("#nip_pegawai").hide();
    			$("#pegawai").show();
    		}
    		else if(status == 'non_pegawai'){
    			$("#nip_pegawai").show();
    			$("#pegawai").hide();
    		}
    	});

		$("#pegawai_id").change(function(){
		    $.ajax({
		        type: "POST",
		        url: "{{ route('dashboard.ajax.pegawai') }}",
		        dataType:"json",
		        data: {
		        	'pegawai_id' : $(this).val(),
		        	'_token' : '{{ csrf_token() }}'
		        },
		        success: function (response) {
	        		$("#nama").val(response.nama_lengkap);
	        		$("#nip").val(response.nip);
	        		$("#nama").val(response.nama_lengkap);
	        		$("#email").val(response.email);
		        }
		    });
		});
    </script>
@endpush

@endsection
