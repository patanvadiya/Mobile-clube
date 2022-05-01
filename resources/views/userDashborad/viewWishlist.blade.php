@extends("userDashborad/nav")
@section('containt')
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Wishlist Items</h2>
						@foreach($data as $data)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								
								<div class="single-products">

										<div class="productinfo text-center">
											<img src="{{('storage/'.$data->image)}}" style="width: 60%;height: 270px;" alt="" />
											<h2>{{$data->price}}</h2>
											<p>{{$data->desc}}</p>
											<a href="{{url('addCart/'.$data->mobile_id.'/'.$data->type)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>{{$data->price}}</h2>
												<p>{{$data->desc}}</p>
												<a href="{{url('addCart/'.$data->mobile_id.'/'.$data->type)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div>
								</div>
								
							</div>
						</div>
						@endforeach
						
					</div><!--features_items-->
					
				</div>
			</div>
		</div>
	</section>

@endsection