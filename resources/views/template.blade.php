<!DOCTYPE html>
<html>
<head>
<meta name="csrf-token" value="{{ csrf_token() }}">
	<title></title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">
	<style type="text/css">
		div.col-md-12 > h3 , div.col-md-12 > a {
			display: inline-block;
		}
		 div.col-md-12 > a {
		 	margin-top: 15px;
		 	
		 }
	</style>
	<script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>
</head>
<body>
@yield('content')
	
</body>
</html>