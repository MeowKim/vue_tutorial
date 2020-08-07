<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- Fonts -->
    <link href="//fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<style>
		code {
			margin: 0 2px;
			padding: 3px 5px;
			color: #d63200;
			background-color: #ccc;			
			border-radius: 2px;
		}
	</style>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>{{ config('app.name') }}</title>
</head>
<body>
	<div id="app">
		<div class="container">
			@yield('content')
		</div>
	</div>
</body>
</html>