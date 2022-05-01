@extends("userDashborad/nav")
@section('containt')
	<div class="container">
		<div class="row">
      		<div class="col-sm-4">
      			<img src="{{asset('storage/'.$data->image)}}">
      		</div>
      		<form method="post" action="{{url('requestAddcart')}}">
      			@csrf
	      		<div class="col-sm-4">
	      		<label style="font-size: 20px;"> Quantity</label>
				<select name="addQty" style="width: 50px;"><br>
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
				</select><br><br>
	      			<p style="font-size: 20px;">{{$data->desc}}</p>
	      			<label style="font-size: 20px;"><b>Price</b> {{$data->price}}</label><br><br>
	   .     			<input type="hidden" name="title" value="{{$data->title}}">
	      			<input type="hidden" name="desc" value="{{$data->desc}}">
	      			<input type="hidden" name="quantity" value="{{$data->quantity}}">
	      			<input type="hidden" name="price" value="{{$data->price}}">
					<input type="hidden" name="image"value="{{$data->image}}">
					<input type="hidden" name="mobile_id" value="{{$data->id}}">
					@if ($data->quantity==0)
						<button class="btn btn-warning" style="width: 100%;" disabled="" >Add Cart</button>
						<h3 class="alert alert-danger">Out Of Stock</h3>
					@else
						<button class="btn btn-warning" style="width: 100%;">Add Cart</button>
					@endif
	      			
	      		</div>
      		</form>
      		<div class="col-sm-4">
      			
      		</div>

    	</div>
	</div>	  	
@endsection
<label style="font-size: 20px;">Variant</label>
				<select name="variance" id="variance">																
					<option>Choose Option</option>
					@foreach($var as $var)
						<option value="{{$var->id}}">{{$var->variance}}</option>
					@endforeach
				</select><br><br>
	      			<div id="dis">
	      				
	      			</div>