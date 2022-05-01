@extends("userDashborad/nav")
@section('containt')
<style type="text/css">
	form {
  /*width: 300px;
  margin: 0 auto;
  text-align: center;
  padding-top: 50px;*/
}

.value-button {
  display: inline-block;
  border: 1px solid #ddd;
  margin: 0px;
  width: 40px;
  height: 20px;
  text-align: center;
  vertical-align: middle;
  padding: 11px 0;
  background: #eee;
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;

}

.value-button:hover {
  cursor: pointer;
}

form #decrease {
  /*margin-right: -4px;
  border-radius: 8px 0 0 8px;*/
}

form #increase {
 /* margin-left: -4px;
  border-radius: 0 8px 8px 0;*/
}

form #input-wrap {
  margin: 0px;
  padding: 0px;
}

input#number {
  text-align: center;
  border: none;
  border-top: 1px solid #ddd;
  border-bottom: 1px solid #ddd;
  margin: 0px;
  width: 40px;
 // height: 40px;
}

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
</style>
	<div class="container">
		<div class="row">
      		<div class="col-sm-4">
      			<img src="{{asset('storage/'.$data->image)}}" style="width:80%;height:50%" >
      		</div>
      	
      			
	      		<div class="col-sm-4">
	      		<label style="font-size: 20px;">{{$data->company}}</label><br>
	      		<label style="font-size: 20px;">{{$data->brand}}</label><br>
	      		<label style="font-size: 20px;">Variant</label>

				<select name="variance" id="variance"  style="width: 250px;">	
					<option value="Choose Option">Choose Option</option>
						@foreach($var as $var)
							<option value="{{$var->id}}">{{$var->variance}}</option>
						@endforeach
				</select><a href="" id="clear" style="margin-left: 5px;font-size:20px; color:red">X</a>
				<input type="hidden" name="" id="type" value="{{$data->type}}">	
      			<div>
      				<b style="font-size: 20px;" id="p">Price :: </b><label id="price" style="font-size: 20px;"></label><br>

      				<b style="font-size: 20px;" id="color1">Color :: </b><label id="color" style="font-size: 20px;"></label><br>

      				<b style="font-size: 20px;" id="p1">Desription :: </b><label id="desc" style="font-size: 20px;"></label><br>
      			</div>
      		<form method="post" action="{{url('requestAddcart')}}">
      			
      			@csrf
					<div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value"><p style="margin-top: -10px;">-</p></div>

  					<input type="number" id="number" value="0" name="addQty"/>
  					<div class="value-button" id="increase" onclick="increaseValue()" value="Increase 		Value"><p style="margin-top: -10px;">+</p></div>
					
	      			<p style="font-size: 20px;">{{$data->desc}}</p>
	        		<input type="hidden" name="title" id="title" value="{{$data->brand}}">
	        		<input type="hidden" name="title" id="titles" value="{{$data->title}}">
	        		<input type="hidden" name="company" id="company" value="{{$data->title}}">	
	        		<input type="hidden" name="variance" id="variance1">	
	      			<textarea name="desc" id="desc1" style="display:none;"></textarea>
	      			<input type="hidden" name="quantity" id="quantity" value="{{$data->quantity}}">
	      			<input type="hidden" name="price" id="price1">
	      			<input type="hidden" name="tprice" id="price2">
					<input type="hidden" name="image" id="image" value="{{$data->image}}">
					<input type="hidden" name="mobile_id" id="ids" value="{{$data->id}}">

					@if ($data->quantity<=0)
						<button class="btn btn-warning" style="width: 100%;" disabled="" >Add Cart</button>
						<h3 class="alert alert-danger">Out Of Stock</h3>
					@else
						<button class="btn btn-warning" id="btn" style="width: 100%;">Add Cart</button>
					@endif
      		</form>
      		<form method="post" action="{{url('requestCompare')}}">
      			@csrf
      			<input type="hidden" name="title" id="title" value="{{$data->brand}}">
        		<input type="hidden" name="title" id="titles" value="{{$data->title}}">
        		<input type="hidden" name="company" id="company" value="{{$data->company}}">	
        		<input type="hidden" name="variance" id="variance2">	
      			<textarea name="desc" id="desc2" style="display:none;"></textarea>
      			<input type="hidden" name="quantity" id="quantity" value="{{$data->quantity}}">
      			<input type="hidden" name="price" id="price1">
				<input type="hidden" name="image" id="image" value="{{$data->image}}">
				<input type="hidden" name="mobile_id" id="ids" value="{{$data->id}}">
				<input type="hidden" name="color" id="color2">
				<input type="hidden" name="type" value="{{$data->type}}">
      			<button  style="font-size:20px;color:black;border:none;background-color:transparent;margin-top: 10px; " id="compare" class="mx-auto"><i class="fa fa-plus-square"></i>Compare</button>
      		</form>
      	</div>
      		<div class="col-sm-4">
      			
      		</div>
    	</div>
	</div>	
	
<br><br>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#p").hide();
			$("#p1").hide();
			$("#sel").hide();
			$("#sel1").hide();
			$("#btn").hide();
			$("#clear").hide();
			$("#wishlist").hide();
			$("#color1").hide();
			$("#color").hide();
			$("#compare").hide();
			$("#increase").hide();
			$("#decrease").hide();
			$("#number").hide();
		  	$("#variance").change(function(){
		    	var idd =  $("#variance").val();
		    	//alert(idd);
		    	var type = $("#type").val();
		    	if (idd == "Choose Option") {

		    		$("#p").hide();
					$("#p1").hide();
					$("#sel").hide();
					$("#sel1").hide();
					$("#btn").hide();
					$("#clear").hide();
					$("#price").hide();
					$("#desc").hide();
					$("#color").hide();
					$("#color1").hide();
					$("#compare").hide();
					$("#increase").hide();
					$("#decrease").hide();
					$("#number").hide();
		    	} else {
		    	//alert(type);
			    	$.ajax({

			    		url:'variancemi/'+idd+'/'+type,
			    		dataType: 'json',
			    		type: "GET", 
			    		success:function(data)
			    		{
			    			//alert(data);
			    			$("#p").show();
			    			$("#sel").show();
			    			$("#sel1").show();
			    			$("#btn").show();
			    			$("#clear").show();
			    			$("#price").show();
							$("#desc").show();
							$("#wishlist").show();
							$("#color1").show();
							$("#color").show();
							$("#compare").show();
							$("#increase").show();
							$("#decrease").show();
							$("#number").show();
			    			$("#price").html(data.price);
			    			$("#desc").html(data.desc);
			    			$("#price1").val(data.price);
			    			$("#price2").val(data.price);
			    			$("#desc1").html(data.desc);
			    			$("#desc2").html(data.desc);
			    			$("#color").html(data.color);
			    			$("#color2").val(data.color);
			    			$("#variance1").val(data.variance);
			    			$("#variance2").val(data.variance);
			    			//alert(data);
			    		}
			    	});

		    	}
		  	});

		  	$('#clear').click(function(e) {
		  		e.preventDefault();
			    location.reload();
			});

			// $("#wishlist").click(function(e){
			// 	e.preventDefault();	
			// 	var titles = $("#titles").val();
			// 	var title = $("#title").val();
			// 	var company = $("#company").val();
			// 	var variance1 = $("#variance1").val();
			// 	var desc1 = $("#desc1").val();
			// 	var quantity = $("#quantity").val();

			// });
		});

		function increaseValue() {
			var value = parseInt(document.getElementById('number').value, 10);
			value = isNaN(value) ? 0 : value;
			value++;
			document.getElementById('number').value = value;
		}

		function decreaseValue() {
			var value = parseInt(document.getElementById('number').value, 10);
			value = isNaN(value) ? 0 : value;
			value < 1 ? value = 1 : '';
			value--;
			document.getElementById('number').value = value;
		}
	</script>  	
@endsection
















