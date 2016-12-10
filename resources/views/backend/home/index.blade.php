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
<div id="jabatan" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<br><br>
<div id="pendidikan" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<br><br>
<div id="jenis_kelamin" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<br><br>
<div id="usia" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<br><br>
<div id="masa_kerja" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<br><br>
<div id="agama" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
@push("script")
    <script type="text/javascript">
    	var agama = <?=json_encode($temp['agama']); ?>;
    	var agama_data = [];
    	console.log(agama)
    	for(var i=0;i<agama.length; i++){
    		var params = {
    			'title' : agama[i].title
    		};
    	}
		new Morris.Bar({
		  element: 'jabatan',
		  data: agama_data,
		  xkey: 'title',
		  ykeys: ['a', 'b', 'c' ,'d'],
		  labels: ['Series A', 'Series B']
		});
    </script>
@endpush

@endsection
