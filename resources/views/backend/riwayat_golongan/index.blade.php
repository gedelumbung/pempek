@extends("backend.layout.backend")

@section("title","Riwayat Golongan")

@section("content")

@include('backend.partial.pegawai_menu', ['id' => $id])

<div class="panel panel-featured panel-featured-primary">
	<div class="panel-heading">
		<h3 class="panel-title">@yield("title")</h3>
	</div>
	
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-striped">
				<tr>
					<th rowspan="2">No</th>
					<th rowspan="2">Golongan</th>
					<th rowspan="2">TMT</th>
					<th colspan="2">Masa Kerja</th>
					<th colspan="2">Nomor SK</th>
					<th colspan="2">Nomor Persetujuan BKN</th>
					<th><a href="{{route('dashboard.pegawai.riwayat_golongan.create', ['pegawai' => $id])}}" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Add New</a></th>
				</tr>
				<tr>
					<th>Tahun</th>
					<th>Bulan</th>
					<th colspan="2">Tgl/Bln/Tahun SK</th>
					<th colspan="2">Tgl/Bln/Tahun Persetujuan BKN</th>
				</tr>
				<tbody>
					@foreach($riwayat as $key => $data)
						<form method="POST" action="{{route('dashboard.pegawai.riwayat_golongan.store', ['id' => $id])}}">
						{!! csrf_field() !!}
						<input type="hidden" name="status" value="edit">
						<input type="hidden" name="pegawai_id" value="{{$data->pegawai_id}}">
						<tr>
							<td>{{$key+1}}</td>
							<td>
								<input type="hidden" name="id" value="{{$data->id}}">
								<select name='golongan_id' class="form-control" required>
								    @foreach($golongan as $data_golongan)
								    	@if($data_golongan->id == $data->golongan_id)
								    	<option value="{{$data_golongan->id}}" selected>{{$data_golongan->title}} - {{$data_golongan->description}}</option>
								    	@else
								    	<option value="{{$data_golongan->id}}">{{$data_golongan->title}} - {{$data_golongan->description}}</option>
								    	@endif
								    @endforeach
								</select>
							</td>
							<td><input type="date" name="tmt" class="form-control" value="{{$data->tmt}}" required></td>
							<td><input type="text" name="masa_kerja_tahun" class="form-control" value="{{$data->masa_kerja_tahun}}" required></td>
							<td><input type="text" name="masa_kerja_bulan" class="form-control" value="{{$data->masa_kerja_bulan}}" required></td>
							<td><input type="text" class="form-control" name="nomor_sk" value="{{$data->nomor_sk}}" required></td>
							<td><input type="date" class="form-control" name="tanggal_sk" value="{{$data->tanggal_sk}}" required /></td>
							<td><input type="text" class="form-control" name="nomor_persetujuan_bkn" value="{{$data->nomor_persetujuan_bkn}}" required></td>
							<td><input type="text" class="form-control" name="tahun_persetujuan_bkn" value="{{$data->tahun_persetujuan_bkn}}" required></td>
							<td width="200">
								<input type="submit" value="Save" class="btn btn-sm btn-success">
								<input type="reset" value="Cancel" class="btn btn-sm btn-warning">
								<a href="{{route('dashboard.pegawai.riwayat_golongan.delete', ['pegawai' => $id, 'id' => $data->id])}}" class="btn btn-sm btn-danger">Delete</a>
							</td>
						</tr>
						</form>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection
