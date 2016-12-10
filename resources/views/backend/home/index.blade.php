@extends("backend.layout.backend")

@section("title","Dashboard")

@section("content")
<div class="col-md-6 col-lg-6 col-xl-12">
	<section class="panel panel-featured-left panel-featured-success">
		<div class="panel-body">
			<div class="widget-summary">
				<div class="widget-summary-col widget-summary-col-icon">
					<div class="summary-icon bg-primary">
						<i class="fa fa-group"></i>
					</div>
				</div>
				<div class="widget-summary-col">
					<div class="summary">
						<h4 class="title">Total Pegawai</h4>
						<div class="info">
							<strong class="amount">{{$count_all}}</strong>
							<!-- <span class="text-primary">(14 unread)</span> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<div class="col-md-6 col-lg-6 col-xl-12">
	<section class="panel panel-featured-left panel-featured-warning">
		<div class="panel-body">
			<div class="widget-summary">
				<div class="widget-summary-col widget-summary-col-icon">
					<div class="summary-icon bg-primary">
						<i class="fa fa-group"></i>
					</div>
				</div>
				<div class="widget-summary-col">
					<div class="summary">
						<h4 class="title">Total Pegawai yang Datanya Belum Lengkap</h4>
						<div class="info">
							<strong class="amount">{{$count_all_not_completed}}</strong>
							<!-- <span class="text-primary">(14 unread)</span> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<div style="min-width: 310px; height: 310px; margin: 0 auto"></div>
<div id="jabatan" style="min-width: 310px; height: 300px; margin: 0 auto"></div>
<br><br>
<div id="pendidikan" style="min-width: 310px; height: 300px; margin: 0 auto"></div>
<br><br>
<div id="jenis_kelamin" style="min-width: 310px; height: 300px; margin: 0 auto"></div>
<br><br>
<div id="usia" style="min-width: 310px; height: 300px; margin: 0 auto"></div>
<br><br>
<div id="masa_kerja" style="min-width: 310px; height: 300px; margin: 0 auto"></div>
<br><br>
<div id="agama" style="min-width: 310px; height: 300px; margin: 0 auto"></div>
@push("script")
    <script type="text/javascript">
    	var agama = <?=json_encode($temp['agama']); ?>;
    	var ykeys_agama = <?=json_encode($ykeys['agama']); ?>;
		new Morris.Bar({
		  element: 'agama',
		  data: agama,
		  xkey: 'title',
		  ykeys: ykeys_agama,
		  labels: ykeys_agama
		});

    	var pendidikan = <?=json_encode($temp['pendidikan']); ?>;
    	var ykeys_pendidikan = <?=json_encode($ykeys['pendidikan']); ?>;
		new Morris.Bar({
		  element: 'pendidikan',
		  data: pendidikan,
		  xkey: 'title',
		  ykeys: ykeys_pendidikan,
		  labels: ykeys_pendidikan
		});

    	var jabatan = <?=json_encode($temp['jabatan']); ?>;
    	var ykeys_jabatan = <?=json_encode($ykeys['jabatan']); ?>;
		new Morris.Bar({
		  element: 'jabatan',
		  data: jabatan,
		  xkey: 'title',
		  ykeys: ykeys_jabatan,
		  labels: ykeys_jabatan
		});

    	var jenis_kelamin = <?=json_encode($temp['jenis_kelamin']); ?>;
    	var ykeys_jenis_kelamin = <?=json_encode($ykeys['jenis_kelamin']); ?>;
		new Morris.Bar({
		  element: 'jenis_kelamin',
		  data: jenis_kelamin,
		  xkey: 'title',
		  ykeys: ykeys_jenis_kelamin,
		  labels: ykeys_jenis_kelamin
		});
    </script>
@endpush

@endsection
