@extends("userDashborad/nav")
@section('containt')
<script>
	jQuery(document).ready(function() {
	        
		jQuery('.carousel[data-type="multi"] .item').each(function(){
			var next = jQuery(this).next();
			if (!next.length) {
				next = jQuery(this).siblings(':first');
			}
			next.children(':first-child').clone().appendTo(jQuery(this));
		  
			for (var i=0;i<2;i++) {
				next=next.next();
				if (!next.length) {
					next = jQuery(this).siblings(':first');
				}
				next.children(':first-child').clone().appendTo($(this));
			}
		});
	        
	});
</script>

<style type="text/css">
	.carousel-control.left, .carousel-control.right {
	background-image:none;
	}

	.img-responsive{
		width:100%;
		height:auto;
	}

	@media (min-width: 992px ) {
		.carousel-inner .active.left {
			left: -25%;
		}
		.carousel-inner .next {
			left:  25%;
		}
		.carousel-inner .prev {
			left: -25%;
		}
	}

	@media (min-width: 768px) and (max-width: 991px ) {
		.carousel-inner .active.left {
			left: -33.3%;
		}
		.carousel-inner .next {
			left:  33.3%;
		}
		.carousel-inner .prev {
			left: -33.3%;
		}
		.active > div:first-child {
			display:block;
		}
		.active > div:first-child + div {
			display:block;
		}
		.active > div:last-child {
			display:none;
		}
	}

	@media (max-width: 767px) {
		.carousel-inner .active.left {
			left: -100%;
		}
		.carousel-inner .next {
			left:  100%;
		}
		.carousel-inner .prev {
			left: -100%;
		}
		.active > div {
			display:none;
		}
		.active > div:first-child {
			display:block;
		}
	}
</style>
	<section id="slider">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>Mobile</span>Hub</h1>
									<h2>Mobile Hub</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="{{asset('assests/images/home/grid-img1.jpg')}}" class="girl img-responsive" alt="" />
									<!-- <img src="{{asset('assests/images/home/pricing.png')}}"  class="pricing" alt="" /> -->
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>Mobile</span>hub</h1>
									<h2>Mobile Hub</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="{{asset('assests/images/home/grid-img2.jpg')}}" class="girl img-responsive" alt="" />
									<!-- <img src="{{asset('assests/images/home/pricing.png')}}"  class="pricing" alt="" /> -->
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>Mobile</span>Hub</h1>
									<h2>Mobile Hub</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="{{asset('assests/images/home/grid-img3.jpg')}}" class="girl img-responsive" alt="" />
									<!-- <img src="{{asset('assests/images/home/pricing.png')}}" class="pricing" alt="" /> -->
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section>
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					
				</div>
				
				<div class="col-sm-12 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						@foreach($data as $data)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								
								<div class="single-products">

										<div class="productinfo text-center">
											<img src="{{('storage/'.$data->image)}}" style="width: 60%;height: 270px;" alt="" />
											<h2></h2>
											<p>{{$data->desc}}</p>
											<h3>Rs {{$data->price}}</h3>
											<a href="{{url('addCart/'.$data->id.'/'.$data->type)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										
										<div class="product-overlay" style="opacity: 0.5">
											<div class="overlay-content">
												<a href="{{url('addCart/'.$data->id.'/'.$data->type)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="{{url('wishlist/'.$data->id.'/'.$data->type)}}"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										
									</ul>
								</div>
								
							</div>
						</div>
						@endforeach	
						</div>
					<div class="container">
						<div class="container text-center">
							<div class="carousel slide row" data-ride="carousel" data-type="multi" data-interval="2000" id="fruitscarousel">

							    <div class="carousel-inner">
							        <div class="item active">
							            <div class="col-md-3 col-sm-4 col-xs-12"><a href="{{url('mi')}}"><img src="{{asset('assets/img/mi_logo.png')}}" class="img-responsive" style="height: 200px;"></a></div>
							        </div>
							        <div class="item">
							            <div class="col-md-3 col-sm-4 col-xs-12"><a href="{{url('apple')}}"><img src="{{asset('assets/img/applelogo.jpg')}}" class="img-responsive" style="height: 200px;"></a></div>
							        </div>
							        <div class="item">
							            <div class="col-md-3 col-sm-4 col-xs-12"><a href="{{url('oppo')}}"><img src="{{asset('assets/img/OPPO-Logo.jpg')}}" style="height: 200px;" class="img-responsive"></a></div>
							        </div>
							        <div class="item">
							            <div class="col-md-3 col-sm-4 col-xs-12"><a href="{{url('realmemo')}}"><img src="{{asset('assets/img/Reaalme.jpg')}}" style="height: 200px;" class="img-responsive"></a></div>
							        </div>
							        <div class="item">
							            <div class="col-md-3 col-sm-4 col-xs-12"><a href="{{url('vivo')}}"><img src="{{asset('assets/img/vivo_logo.jpg')}}" style="height: 200px;" class="img-responsive"></a></div>
							        </div>
							        <div class="item">
							            <div class="col-md-3 col-sm-4 col-xs-12"><a href="#"><img src="{{asset('assets/img/Samsung_logo.png')}}" style="height: 200px;width: 300px;" class="img-responsive"></a></div>
							        </div>
							    </div>

							    <a class="left carousel-control" href="#fruitscarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
							    <a class="right carousel-control" href="#fruitscarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a> 
							</div>
						</div>
					</div>
						<br><br>
					<div class="recommended_items">
						<h2 class="title text-center">Accessory items</h2>
						
						<div id="recommended-item-carousel mt-5" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
								@foreach($data1 as $data)	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{asset('storage/'.$data->image)}}" alt="" style="width: 25%; height:100px;" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="{{url('addCart/'.$data->id.'/'.$data->type)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												<center><a href="{{url('wishlist/'.$data->id.'/'.$data->type)}}" style="color:black;"><i class="fa fa-plus-square">Add to wishlist</i></a></center>
											</div>
										</div>
									</div>
								@endforeach
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
	
@endsection