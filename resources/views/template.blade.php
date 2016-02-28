<!DOCTYPE html>
<html>
<head>
<meta name="csrf-token" value="{{ csrf_token() }}">
	<title></title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/toastr.css')}}">
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
	<script type="text/javascript" src="{{asset('js/toastr.js')}}"></script>
</head>
<body>

@yield('content')


<script type="text/javascript" src="{{asset('js/main.js')}}"></script>	
</body>
</html>