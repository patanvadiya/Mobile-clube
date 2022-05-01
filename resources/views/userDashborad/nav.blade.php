<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Mobile</title>
    <link href="{{url('assests/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('assests/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{url('assests/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{url('assests/css/price-range.css')}}" rel="stylesheet">
    <link href="{{url('assests/css/animate.css')}}" rel="stylesheet">
	<link href="{{url('assests/css/main.css')}}" rel="stylesheet">
	<link href="{{url('assests/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{url('assests/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{url('assests/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{url('assests/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{url('assests/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{url('assests/images/ico/apple-touch-icon-57-precomposed.png')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>

<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
<style>
	.ui-widget {
		z-index: 2024;
	}
</style>
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<!-- <a href="index.html"><img src="{{url('assests/images/home/logo.png')}}" alt="" /></a> -->
							<a href="" style="font-size:35px; color:orange; text-decoration: none;" >Mobile Clube</a>
						</div>
						</div>
					<div class="col-sm-8">
						@if(session()->has('name'))
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#" id="{{$profile->id}}" data-toggle="modal" data-target="#exampleModal" class="btn"><i class="fa fa-user"></i>Profile</a></li>
								<li><a href="{{url('viewWishlist')}}"><i class="fa fa-star"></i> Wishlist</a></li>
								<li><a href="{{url('compare')}}"><i class="fa fa-plus-square"></i> Compare</a></li>
								<li><a href="{{url('order')}}"><i class="fa fa-crosshairs"></i> Order</a></li>
								<li><a href="{{url('showAddcart')}}"><i class="fa fa-shopping-cart"></i>{{$count}}</a></li>
								<li><a href="{{url('logout')}}"><i class="fa fa-lock"></i> logout</a></li>
							</ul>
						</div>
						@else 
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="{{url('login')}}"><i class="fa fa-lock"></i> Login</a></li>
							</ul>
						</div>
						@endif	
					</div>
				</div>
				@if (Session::has('message'))
		   			<div class="alert alert-success" style="width: 25%;"><center>{{ Session::get('message') }}</center></div>
				@endif
			</div>
			
		</div><!--/header-middle-->
		
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left dropdown">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{url('/')}}" class="active">Home</a></li>
								 
								<!-- <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">Blog List</a></li>
										<li><a href="blog-single.html">Blog Single</a></li>
                                    </ul>
                                </li>  -->
                               <!--URL::CURRENT().'?sort=price_asc'-->
								<li><a href="">Abouts</a></li>
								<li><a href="">Contact</a></li>
								<li><a href="{{url('accessories')}}">Accessries</a></li>
								<!-- <li class="dropdown"><a href="#">Sorting<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="{{URL::CURRENT().'?sort=price_asc'}}">High-Low</a></li>
										<li><a href="{{URL::CURRENT().'?sort=price_dec'}}">Low-High</a></li>
										<li><a href="{{URL::CURRENT().'?sort=new_item'}}">New Mobile</a></li> 
 
                                    </ul>
                                </li> -->
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<!-- <div class="search_box pull-right">
							<form method="post" id="search_form" action="">
								@csrf
								<input type="search" placeholder="Search"/ name="serach_product" id="search_text">
								<button type="submit" name="searchbtn" >Search</button>
								<button type="submit" name="searchbtn" style="height: 35px; border: 	none;"><i class="fa fa-search"></i></button>
							</form>
						</div> -->
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	@yield("containt")
	
	<footer id="footer" ><!--Footer-->
		
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Online Help</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Order Status</a></li>
								<li><a href="#">Change Location</a></li>
								<li><a href="#">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Quock Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">T-Shirt</a></li>
								<li><a href="#">Mens</a></li>
								<li><a href="#">Womens</a></li>
								<li><a href="#">Gift Cards</a></li>
								<li><a href="#">Shoes</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Terms of Use</a></li>
								<li><a href="#">Privecy Policy</a></li>
								<li><a href="#">Refund Policy</a></li>
								<li><a href="#">Billing System</a></li>
								<li><a href="#">Ticket System</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Company Information</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">Store Location</a></li>
								<li><a href="#">Affillate Program</a></li>
								<li><a href="#">Copyright</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
			    <div class="modal-content">
			      	<div class="modal-header">
			      		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          		<span aria-hidden="true">&times;</span>
			        	</button>
			        	<h5 class="modal-title" id="exampleModalLabel" style="font-size: 20px;">Profile</h5>
			        	
			      	</div>
			      	<div class="modal-body">
			        	<table>
	      					<tr>
	      						<td><b style="font-size: 20px;">Name :: </b></td>
	      						<td><b style="font-size: 20px;margin-left: 50px;" id="name"></b></td>
	      					</tr>
	      					<tr>
	      						<td><b style="font-size: 20px;">Last Name :: </b></td>
	      						<td><b style="font-size: 20px;margin-left: 50px;" id="lname"></b></td>
	      					</tr>
	      					<tr>
	      						<td><b style="font-size: 20px;">Email Id :: </b></td>
	      						<td><b style="font-size: 20px;margin-left: 50px;" id="email"></b></td>
	      					</tr>
      					</table>
			      	</div>
			      
			    	</div>
			  	</div>
		</div>

		<script type="text/javascript">
			$(document).ready(function(){

				$(".btn").click(function(){
					var idd = $(this).attr("id");

					$.ajax({
						url :"profile/"+idd,
						type: "GET",
						data:{
							idd:idd
						},
						success:function(data)
						{
							$("#name").html(data.name);
							$("#lname").html(data.lname);
							$("#email").html(data.email);
						}

					});
				});
				

				$( "#search_text").autocomplete({
				      	source: function(request, responce){

				      		$.ajax({

				      			url: "searchcomp",
				      			data : {
				      				term : request.term,
				      			},
				      			dataType: "json",
				      			success:function(data)
				      			{
				      				responce(data);
				      			}

				      		});

				      	},
				      	minLenght: 1,
				    });

				$(document).on('click', '.ui-manu-item', function(){

					$("#search_form").submit();
				});
			});


		</script>
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="#">Nehal</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="{{url('assests/js/jquery.js')}}"></script>
	<script src="{{url('assests/js/bootstrap.min.js')}}"></script>
	<script src="{{url('assests/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{url('assests/js/price-range.js')}}"></script>
    <script src="{{url('assests/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{url('assests/js/main.js')}}"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</body>
</html>

