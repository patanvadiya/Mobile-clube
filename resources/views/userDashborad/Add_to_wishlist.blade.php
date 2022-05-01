@extends("userDashborad/nav")
@section('containt')
	<div class="container">
		<div class="row">
      		<div class="col-sm-4">
      			<img src="{{asset('storage/'.$data->image)}}">
      		</div>
      		<form method="post" action="{{url('requestWishlist')}}">
      			@csrf
	      		<div class="col-sm-4">
	      		<label style="font-size: 20px;"> Quantity</label>
	      			<p style="font-size: 20px;">{{$data->desc}}</p>
	      			<p style="font-size: 20px;">{{$data->price}}</p>
	      			<label style="font-size: 20px;"><b>Price</b> {{$data->price}}</label><br><br>
	      			<input type="hidden" name="company" value="{{$data->company}}">
	      			<input type="hidden" name="title" value="{{$data->title}}">
	      			<input type="hidden" name="desc" value="{{$data->desc}}">
	      			<input type="hidden" name="quantity" value="{{$data->quantity}}">
	      			<input type="hidden" name="price" value="{{$data->price}}">
					<input type="hidden" name="image"value="{{$data->image}}">
					<input type="hidden" name="mobile_id" value="{{$data->id}}">
					<input type="hidden" name="type" value="{{$data->type}}">
	      			<button class="btn btn-warning" style="width: 100%;">Add To Wishlist</button>
	      		</div>
      		</form>
      		<div class="col-sm-4">
      			
      		</div>

    	</div>
	</div>	  	
@endsection
