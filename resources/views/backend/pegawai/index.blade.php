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
		</table>
	</div>
</div>

@endsection
