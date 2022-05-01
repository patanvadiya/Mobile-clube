<!DOCTYPE html>
<html>
<head>

	<title>Mi</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  	<style type="text/css">
  		
		.main {
		    width: 50%;
		   // margin: 50px auto;
		}

		/* Bootstrap 4 text input with search icon */

		.has-search .form-control {
		   padding-left: 2.375rem;
		}

		.has-search .form-control-feedback {
		    position: absolute;
		    z-index: 2;
		    display: block;
		    width: 2.375rem;
		    height: 2.375rem;
		    line-height: 2.375rem;
		    text-align: center;
		    pointer-events: none;
		    color: #aaa;
		}
  	</style>
  	<script>
  		$(document).ready(function(){
  			$("#myinput").on("keyup", function(){
  				var value = $(this).val().toLowerCase();
  				$("#card div").filter(function(){
  					$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);

  				});	

  			});

  		});
  	</script>
</head>
<body>
		<div class="container mt-3" id="top">
			<h1 class="text-center">Mi Mobile</h1>
			<h4><a href="{{url('/')}}" style="text-decoration:none;color:black;">Back To Home</a></h4>
				
			<hr>
			<div class="main">
			  	<div class="form-group has-search">
			    	<span class="fa fa-search form-control-feedback"></span>
			    	<input type="text" class="form-control" id="myinput" placeholder="Search">
			  	</div>
			</div>
			<div class="btn-group">
		        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Sorting Price</button>
		        <div class="dropdown-menu">
		            <a class="dropdown-item" href="{{URL::CURRENT().'?sort=price_latest'}}">Sort By latest</a>
				    <a class="dropdown-item" href="{{URL::CURRENT().'?sort=price_asc'}}">Sort By Price:Low To High</a>
				    <a class="dropdown-item" href="{{URL::CURRENT().'?sort=price_dec'}}">Sort By Price:High to Low</a>
		        </div>

		    </div>
		    <div class="btn-group">
		        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">All category</button>
		        <div class="dropdown-menu">
		            <a href="{{url('mi')}}" class="dropdown-item">MI</a>
		            <a href="{{url('apple')}}" class="dropdown-item">Apple</a>
		            <a href="{{url('oppo')}}" class="dropdown-item">Oppo</a>
		            <a href="{{url('realmemo')}}" class="dropdown-item">Relame</a>
		            <a href="{{url('vivo')}}" class="dropdown-item">Vivo</a>
		        </div>
		    </div>
		    <div class="btn-group">
		    	<a href="#accessories" style="text-decoration:none;color:black;" class="btn btn-success" >Accessories</a>
		    </div>
			<div class="row mt-5" id="card">
				@foreach($data as $mi)
				<div class="col-sm-3">
					<div class="card">
						<div class="card-header">{{$mi->title}} {{$mi->company}}</div>
						<div class="card-body">
							<textarea style="display:none;">{{$mi->title}} {{$mi->company}}</textarea>
							<img src="{{('storage/'.$mi->image)}}" style="height:200px;">
						</div>
					</div>
					<a href="{{url('addCart/'.$mi->id.'/'.$mi->type)}}" class="btn btn-warning mt-2">Add Cart</a>
				</div> 
				@endforeach				
			</div>
			<div class="mt-5">
				<hr>
				<h3 class="text-center" id="accessories">Accessories</h3>
				<hr>
				<div class="row mt-5" id="card">
					@foreach($miAccessoires as $miAccessoires)
					<div class="col-sm-3">
						<div class="card">
							<div class="card-header">{{$miAccessoires->title}} {{$miAccessoires->company}}</div>
							<div class="card-body">
								<textarea style="display:none;">{{$miAccessoires->title}} {{$miAccessoires->company}}</textarea>
								<img src="{{('storage/'.$miAccessoires->image)}}" class="w-100 h-100">
							</div>
						</div>
						<a href="{{url('AddCartAccessories/'.$miAccessoires->id)}}" class="btn btn-warning mt-2">Add Cart</a>
					</div> 
					@endforeach				
				</div>
			</div>
		</div>
		<div>
			<a href="#top" class="btn float-right" style="background-color:red;color:white;">Top</a>
		</div>
</body>
</html>


