@extends("userDashborad/nav")
@section('containt')
    
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $cartdata)
                    <tr>
                        <td class="col-sm-8 col-md-6">
                        <div class="dropdown">
						    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Shipping Address
						    <span class="caret"></span></button>
						    <ul class="dropdown-menu">
						      	<li><a href="#"><b>Full Name</b> = {{$cartdata->full_name}}</a></li>
						      	<li><a href="#"><b>Address</b> = {{$cartdata->address_line1}}</a></li>
						      	<li><a href="#"><b>City</b> = {{$cartdata->city}}</a></li>
						      	<li><a href="#"><b>State</b> = {{$cartdata->state}}</a></li>
						      	<li><a href="#"><b>Pincode</b> = {{$cartdata->pincode}}</a></li>
						      	<li><a href="#"><b>Country</b> = {{$cartdata->country}}</a></li>
						    </ul>
						</div>	
                            <div class="media">
                                <a class="thumbnail pull-left" href="#"> <img class="media-object" src="{{asset('storage/'.$cartdata->image)}}" style="width: 72px; height: 72px;"> </a>
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="#">Company <b style="color:black;"> {{$cartdata->company}}</b></a></h4>
                                    <h5 class="media-heading"> by <a href="#"> Brand name </a>{{$cartdata->title}}/{{$cartdata->variance}}</h5>
                                    <span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
                                </div>
                            </div>
                        </td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <label>{{$cartdata->addQty}}</label>
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>{{$cartdata->price}}</strong></td>
                        <td class="col-sm-1 col-md-1">
                        <!-- <a href="{{url('DeleteAddCart/'.$cartdata->id)}}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Remove
                        </a> --></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
