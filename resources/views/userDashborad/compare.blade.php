<!DOCTYPE html>
<html>
<head>
	<title>Compare</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container-fluid">
		<h1 class="text-center">Compare products</h1>
		<hr class="mb-3">
			<a href="{{url('/')}}" style="color:black;font-size:25px; text-decoration: none;">Back To Home</a>
			<table class="table table-bordered table-hover table-striped">
			    <thead>
				    <tr>
				      	<th></th>
				      	@foreach($data as $data)
				        <th><a href="{{'deleteCompare/'.$data->id}}" style="color:red; text-decoration: none;">Remove X</a><hr><img src="{{('storage/'.$data->image)}}" style="height: 200px; width: 150px;" class="mt-4"></th>
				        @endforeach 
				    </tr>
			    </thead>		    
			    <tbody>
				    <tr>
				      	<td><b>TITLE</b></td>
				      	@foreach($title as $title)
				        <td><b>{{$title->company}}</b>  {{$title->title}} </td>
				        @endforeach
				    </tr>

				    <tr>
				    	<td><b>COLOR</b></td>
					    @foreach($color as $color)
				        <td>{{$color->color}}</td>
				        @endforeach	
				    </tr>

				    <tr>
				    	<td><b>ADD CART</b></td>
					    @foreach($add_cart as $add_cart)
				        <td><a href="{{url('addCart/'.$add_cart->mobile_id.'/'.$add_cart->type)}}" class="btn btn-warning">Select Option</a></td>
				        @endforeach	
				    </tr>

				    <tr>
				    	<td><b>DESCRIPTION</b></td>
					    @foreach($desc as $desc)
				        <td>{{$data->desc}}</td>
				        @endforeach	
				    </tr>

				    <tr>
				    	<td><b>AVAILABILITY</b></td>
					    @foreach($avl as $avl)
				        <td style="color:green;">In Stock</td>
				        @endforeach	
				    </tr>

				    <tr>
				    	<td><b>BATTERY</b></td>
					    @foreach($battery as $battery)
				        <td>4500 mAh</td>
				        @endforeach	
				    </tr>

				     <tr>
				    	<td><b>VARIANT</b></td>
					    @foreach($variant as $variant)
				        <td>{{$variant->variance}}</td>
				        @endforeach	
				    </tr>
			     										
			    </tbody>
			</table>
	</div>																		
</body>
</html>