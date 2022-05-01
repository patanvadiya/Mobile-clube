<!DOCTYPE html>
<html>
<head>
	<title>Mi Accessories</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  	<style type="text/css"></style>
</head>
<body>
	<div class="container mt-3">
		<h3 class="text-center">Mi Accessories</h3>
		<h4><a href="{{url('/')}}" style="text-decoration:none;color:black;">Back To Home</a></h4>
		<hr>
		<div class="row mt-5">
			<div class="col-sm-3 mt-5">
				<a href="{{url('mi')}}"><img src="{{asset('assets/img/mi_logo.png')}}" class="img-responsive w-75 h-100"></a>
			</div>

			<div class="col-sm-3 mt-5">
				<a href="{{url('apple')}}"><img src="{{asset('assets/img/applelogo.jpg')}}" class="img-responsive w-75 h-100" style=""></a>
			</div>

			<div class="col-sm-3 mt-5">
				<a href="{{url('oppo')}}"><img src="{{asset('assets/img/OPPO-Logo.jpg')}}" style="" class="img-responsive w-75 h-100"></a>
			</div>

			<div class="col-sm-3 mt-5">
				<a href="{{url('realmemo')}}"><img src="{{asset('assets/img/Reaalme.jpg')}}" style="height: 200px;" class="img-responsive w-100"></a>
			</div>
			<div class="col-sm-3 mt-5">
				<a href="{{url('vivo')}}"><img src="{{asset('assets/img/vivo_logo.jpg')}}" style="height: 200px;" class="img-responsive w-100"></a>
			</div>

			<div class="col-sm-3 mt-5">
				<a href="#"><img src="{{asset('assets/img/Samsung_logo.png')}}" style="height: 200px;" class="img-responsive w-100"></a>
			</div>

			<!-- <div class="col-sm-3 mt-5">
				<img src="{{asset('assets/img/mi_logo.png')}}" class="img-responsive w-100 h-100">
			</div>

			<div class="col-sm-3 mt-5">
				<img src="{{asset('assets/img/Samsung_logo.png')}}" class="img-responsive w-100 h-100" style="">
			</div> -->
		</div>
	</div>
</body>
</html>