@extends("userDashborad/nav")
@section('containt')
    
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <h3 id="msg" class="alert alert-info" style="width: 50%;"></h3>
            <table class="table">
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
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <td class="col-sm-8 col-md-6">
                            <div class="media">
                                <a class="thumbnail pull-left" href="#"> <img class="media-object" src="{{asset('storage/'.$cartdata->image)}}" style="width: 72px; height: 72px;"> </a>
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="#" style="color:black">Product Name: <b style="color:black;"> {{$cartdata->company}}</b></a></h4>
                                    <h5 class="media-heading"> by <a href="#" style="color:black">Brand Name:  {{$cartdata->title}}/{{$cartdata->variance}}</a></h5>
                                    <!-- <span>Status: </span><span class="text-success"><strong>In                                                                 Stock</strong></span> -->
                                </div>
                            </div>
                        </td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                                    
                            <input type="hidden" value="{{$cartdata->id}}" name="ids" class="ids">
                            <input type="hidden" value="{{$cartdata->tprice}}" name="prices" class="prices">
                            <input type="hidden" value="{{$cartdata->mobile_id}}" name="mobile_id" class="mobile_id"> 

                        <input type="number" name="qty" value="{{$cartdata->addQty}}" min="0" class="itemqty" style="width: 40px;border: none;">                                            
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>{{$cartdata->price}}</strong></td>
                        
                        <td class="col-sm-1 col-md-1">    
                        <a href="{{url('DeleteAddCart/'.$cartdata->id)}}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Remove
                        </a></td>
                    </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td><h3>Total</h3></td>
                        <td class="" ><h3><strong style="margin-left: 50px;">{{$sum}}</strong></h3></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                        <a href="{{url('/')}}" class="btn btn-default"><span class="glyphicon glyphicon-shopping-cart"></span>Continue Shopping</a>
                        </td>
                        <td>
                        <form method="post" action="{{url('allCartData')}}">
                            @csrf
                            <input type="hidden" name="allCartData" value="{{$data}}">
                        <button class="btn btn-warning">CheckOut<span class="glyphicon glyphicon-play"></span></button>
                </form>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $("#msg").hide();
        $(".itemqty").on("change", function (){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });    
            location.reload(true);
            var el = $(this).closest("tr");
            var id = el.find(".ids").val();
            var price = el.find(".prices").val();
            var addQty  = el.find(".itemqty").val();
            var mobile_id  = el.find(".mobile_id").val();
            
            $.ajax({
                url: "updatecart",
                method  :"POST",
                data:{

                    id:id,
                    price:price,
                    addQty:addQty,
                    mobile_id:mobile_id,
                },
                success:function(data)
                {
                    console.log(data);
                    if(data==0) {
                        $("#msg").show();
                        $("#msg").html("Plese Less Quantity"); 
                        $("#msg").fadeOut(7000, function(){ 
                            $(this).remove();
                        });

                    } else {
                        
                        $("#msg").show();
                        $("#msg").html("Upadte Quantity Successfully");
                        $("#msg").fadeOut(7000, function(){ 
                            $(this).remove();
                        });
                    }
                }        
            });
        });
    });
</script>
@endsection
