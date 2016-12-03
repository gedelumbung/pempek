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
<script src="https://code.highcharts.com/highcharts.js"></script>
    <script type="text/javascript">
    	$(function () {
		    $('#jabatan').highcharts({
		        chart: {
		            type: 'column'
		        },
		        title: {
		            text: 'Berdasarkan Jabatan'
		        },
		        xAxis: {
		            categories: <?=json_encode($golongan)?>
		        },
		        yAxis: {
		            title: {
		                text: 'Jumlah'
		            },
		        },
		        series: [{
		            name: 'Struktural',
		            data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
		        }, {
		            name: 'Fungsional Umum',
		            data: [0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
		        }, {
		            name: 'Fungsional Tertentu',
		            data: [0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
		        }]
		    });
		    $('#pendidikan').highcharts({
		        chart: {
		            type: 'column'
		        },
		        title: {
		            text: 'Berdasarkan Pendidikan'
		        },
		        xAxis: {
		            categories: <?=json_encode($golongan)?>
		        },
		        yAxis: {
		            title: {
		                text: 'Jumlah'
		            },
		        },
		        series: [{
		            name: 'Struktural',
		            data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
		        }, {
		            name: 'Fungsional Umum',
		            data: [0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
		        }, {
		            name: 'Fungsional Tertentu',
		            data: [0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
		        }]
		    });
		    $('#jenis_kelamin').highcharts({
		        chart: {
		            type: 'column'
		        },
		        title: {
		            text: 'Berdasarkan Jenis Kelamin'
		        },
		        xAxis: {
		            categories: <?=json_encode($golongan)?>
		        },
		        yAxis: {
		            title: {
		                text: 'Jumlah'
		            },
		        },
		        series: [{
		            name: 'Struktural',
		            data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
		        }, {
		            name: 'Fungsional Umum',
		            data: [0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
		        }, {
		            name: 'Fungsional Tertentu',
		            data: [0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
		        }]
		    });
		    $('#usia').highcharts({
		        chart: {
		            type: 'column'
		        },
		        title: {
		            text: 'Berdasarkan Usia'
		        },
		        xAxis: {
		            categories: <?=json_encode($golongan)?>
		        },
		        yAxis: {
		            title: {
		                text: 'Jumlah'
		            },
		        },
		        series: [{
		            name: 'Struktural',
		            data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
		        }, {
		            name: 'Fungsional Umum',
		            data: [0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
		        }, {
		            name: 'Fungsional Tertentu',
		            data: [0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
		        }]
		    });
		    $('#masa_kerja').highcharts({
		        chart: {
		            type: 'column'
		        },
		        title: {
		            text: 'Berdasarkan Masa Kerja'
		        },
		        xAxis: {
		            categories: <?=json_encode($golongan)?>
		        },
		        yAxis: {
		            title: {
		                text: 'Jumlah'
		            },
		        },
		        series: [{
		            name: 'Struktural',
		            data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
		        }, {
		            name: 'Fungsional Umum',
		            data: [0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
		        }, {
		            name: 'Fungsional Tertentu',
		            data: [0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
		        }]
		    });
		    $('#agama').highcharts({
		        chart: {
		            type: 'column'
		        },
		        title: {
		            text: 'Berdasarkan Agama'
		        },
		        xAxis: {
		            categories: <?=json_encode($golongan)?>
		        },
		        yAxis: {
		            title: {
		                text: 'Jumlah'
		            },
		        },
		        series: [{
		            name: 'Struktural',
		            data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
		        }, {
		            name: 'Fungsional Umum',
		            data: [0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
		        }, {
		            name: 'Fungsional Tertentu',
		            data: [0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
		        }]
		    });
		});
    </script>
@endpush

@endsection
