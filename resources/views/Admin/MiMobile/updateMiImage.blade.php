@extends("Admin/nav")
	@section("containt")
		<br><br>
        <center><h1>Update Mi Mobile</h1></center>
        <div class="d-flex justify-content-center align-items-center" >      
            <div class="row ">
                <form  method="post" action="{{ url('RequestupdateMiImage') }}" enctype="multipart/form-data">
                    @csrf    
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <div class="form-group">
                        <label class="control-label">Tile</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{$data->title}}" style="width: 500px; ">
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- <div class="form-group">
                        <label class="control-label">Front page Image</label>
                        <input type="file" name="image"value="{{$data->title}}" class="@error('image') is-invalid @enderror" style="width: 500px; ">
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        
                    </div> -->
                    <div class="form-group">
                        <label class="control-label">Quantity</label>
                        <input type="text"   value="{{$data->quantity}}"name="quantity" class="form-control @error('quantity') is-invalid @enderror" style="width: 500px; ">
                        @error('quantity')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="control-label">Published date</label>
                        <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" value="{{$data->date}}" style="width: 500px; ">
                        @error('date')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="control-label">Price</label>
                        <input type="price" name="price" value="{{$data->price}}" class="form-control @error('price') is-invalid @enderror" style="width: 500px; ">
                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="desc" class="form-control" >{{$data->desc}}</textarea>
                    </div>
                    <button class="btn btn-primary">Submit</button>     
                </form>   
            </div></div>
            <br><br><br>

    @endsection        