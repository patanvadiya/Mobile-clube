@extends("userDashborad/nav")
@section('containt')
<div class="container">
	<div class="row">

		<div class="col-sm-3">
			<img src="{{asset('storage/'.$accessories->image)}}" style="width: 100%;" alt="" />
		</div>
		<form method="post" action="{{url('requestAccessories')}}">	
      		@csrf
		<div class="col-sm-9">
			<table>
				<tr>
					<td class="" style="padding: 5px;"><b style="font-size: 18px;">Company :: </b></td>
					<td><b style="font-size: 18px;margin-left: 50px;"></b>{{$accessories->company}}</td>
				</tr>
				<tr>
					<td style="padding: 5px;"><b style="font-size: 18px;">Title :: </b></td>
					<td><b style="font-size: 18px;margin-left: 50px;" ></b>{{$accessories->title}}</td>
				</tr>
				<tr>
					<td style="padding: 5px;"><b style="font-size: 18px;">Price :: </b></td>
					<td><b style="font-size: 18px;margin-left: 50px;"></b>{{$accessories->price}}</td>
				</tr>


				<tr>
					<td style="padding: 5px;"><b style="font-size: 18px;">Descripation :: </b></td>
					<td><b style="font-size: 18px;margin-left: 50px;"></b>{{$accessories->desc}}</td>
				</tr>

				<tr>
					<td style="padding: 5px;"><b style="font-size: 18px;">Quantity :: </b></td>
					<td><b style="font-size: 18px;margin-left: 50px;"></b><select name="addQty"><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option></select></td>
				</tr>

			</table><br>
	        		<input type="hidden" name="company" id="company" value="{{$accessories->company}}">
	        		<input type="hidden" name="title" id="titles" value="{{$accessories->title}}">
	        		<input type="hidden" name="type" id="type" value="{{$accessories->type}}">		
	      			<input type="hidden" name="price" id="price" value="{{$accessories->price}}">
					<input type="hidden" name="image" id="image" value="{{$accessories->image}}">
					<input type="hidden" name="tprice" value="{{$accessories->price}}">
					<input type="hidden" name="mobile_id" id="ids" value="{{$accessories->id}}">

					@if ($accessories->qantity==0)
						<button class="btn btn-warning" style="width: 100%;" disabled="" >Add Cart</button>
						<h3 class="alert alert-danger">Out Of Stock</h3>
					@else
						<button class="btn btn-warning" id="btn" style="width: 30%;">Add Cart</button>
					@endif
      		</form>
		</div>
	</div>
</div>
@endsection
