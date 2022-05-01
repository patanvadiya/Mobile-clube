
					<div class="category-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tshirt" data-toggle="tab">Mi</a></li>
								<li><a href="#blazers" data-toggle="tab">Oppo</a></li>
								<li><a href="#sunglass" data-toggle="tab">Realme</a></li>
								<li><a href="#kids" data-toggle="tab">Apple</a></li>
								<li><a href="#vivo" data-toggle="tab">Vivo</a></li>
								<li><a href="#motorola" data-toggle="tab">Motorola</a></li>
							</ul>
						</div>
						<div class="tab-content">
							@foreach($mi as $data)
							<div class="tab-pane fade active in" id="tshirt" >
								<div class="col-sm-4">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{asset('storage/'.$data->image)}}" style="width: 60%;height: 270px;" alt="" />
												<h2>{{$data->price}}</h2>
												<p>Easy Polo Black Edition</p>
												<a href="{{url('addCart/'.$data->id.'/'.$data->type)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div>
										<center><a href="{{url('wishlist/'.$data->id.'/'.$data->type)}}" style="color:black;"><i class="fa fa-plus-square">Add to wishlist</i></a></center>
									</div>
								</div>
							</div>
							@endforeach
							
							<div class="tab-pane fade" id="blazers" >
								@foreach($oppo as $data)
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{asset('storage/'.$data->image)}}" style="width: 60%;height: 270px;" alt="" />
												<h2>{{$data->price}}</h2>
												<p>{{$data->desc}}</p>
												<a href="{{url('addCart/'.$data->id.'/'.$data->type)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											<center><a href="{{url('wishlist/'.$data->id.'/'.$data->type)}}" style="color:black;"><i class="fa fa-plus-square">Add to wishlist</i></a></center>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							
							<div class="tab-pane fade" id="sunglass" >
								@foreach($realMe as $data)
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{asset('storage/'.$data->image)}}" style="width: 60%;height: 270px;" alt="" />
												<h2>{{$data->price}}</h2>
												<p>{{$data->desc}}</p>
												<a href="{{url('addCart/'.$data->id.'/'.$data->type)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											<center><a href="{{url('wishlist/'.$data->id.'/'.$data->type)}}" style="color:black;"><i class="fa fa-plus-square">Add to wishlist</i></a></center>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							<div class="tab-pane fade" id="kids" >
								@foreach($apple as $data)
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{asset('storage/'.$data->image)}}" style="width: 60%;height: 270px;" alt="" />
												
												<p>{{$data->desc}}</p>
												<a href="{{url('addCart/'.$data->id.'/'.$data->type)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											<center><a href="{{url('wishlist/'.$data->id.'/'.$data->type)}}" style="color:black;"><i class="fa fa-plus-square">Add to wishlist</i></a></center>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							
							<div class="tab-pane fade" id="vivo" >
								@foreach($vivo as $data)
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{asset('storage/'.$data->image)}}" style="width: 60%;height: 270px;" alt="" />
												<h2>{{$data->price}}</h2>
												<p>{{$data->desc}}</p>
												<a href="{{url('addCart/'.$data->id.'/'.$data->type)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											<center><a href="{{url('wishlist/'.$data->id.'/'.$data->type)}}" style="color:black;"><i class="fa fa-plus-square">Add to wishlist</i></a></center>
										</div>
									</div>
								</div>
								@endforeach
							</div>

						</div>
					</div><!--/category-tab-->