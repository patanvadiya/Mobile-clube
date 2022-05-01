@extends("userDashborad/nav")
@section('containt')

<div class="container" >
    <div>
        <center><h3 class="bat btn-success" style="height: 100px; padding: 30px;">Your Payment Successfully</h3></center>
    </div>
        <a href="{{url('/')}}" class="btn btn-warning">Continue Shopping</a>
</div>

@endsection