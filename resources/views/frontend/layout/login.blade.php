<!DOCTYPE html>
<html class="fixed">
	<head>
		<title> @yield('title', "Front End") </title>
		<link rel="shortcut icon" type="image/png" href="{{ asset("img/logo.png") }}"/> 
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<title>Log In</title>
    	<link rel="stylesheet" href="{{ elixir('css/backend.css') }}">
	</head>
	<body>
		<section class="body-sign">
			<div class="center-sign">
				<a href="/" class="logo pull-left">
					<img src="{{ asset("img/logosimpeg.png") }}" height="54" alt="Porto Admin" />
				</a>

				<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Log In</h2>
					</div>
					<div class="panel-body">
						@yield("content")
					</div>
				</div>

				<p class="text-center text-muted mt-md mb-md">&copy; Copyright 2016. Kementerian Desa, Pembangunan Daerah Tertinggal, dan Transmigrasi Republik Indonesia .</p>
			</div>
		</section>
	</body>
</html>