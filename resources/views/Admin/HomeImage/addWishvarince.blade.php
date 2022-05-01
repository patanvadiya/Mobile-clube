 @extends("Admin/nav")
    @section("containt")
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">

    <br><br>
        <center><h1>Add Wishlist Varince</h1></center>
        @if(session()->has('status'))
           <center><p class="alert alert-success" style="width: 50%; margin-left: 50px;">{{session('status')}}</p></center>
        @endif
            <br><br><br>
            <div class="container">
                 <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                    Add Wishlist Varince 
                </button>  
         
            <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js
            "></script>
            <br>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Wishlist</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   <form  method="post" action="{{ url('WishlistAddVariance') }}" enctype="multipart/form-data">
                   
                    @csrf    
                    <div class="form-group">
                        <label class="control-label">Brand</label>
                        <!-- <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" > -->
                        <select id="title" name="title" class="form-control" required="">
                        <option value=" ">Select Brand</option>
                        @foreach($var as $var)
                        <option value="{{$var->id}}">{{$var->title}}</option>
                        @endforeach
                    </select>
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                 
                    <div class="form-group">
                        <label class="control-label">Variance</label>
                        <select id="title" name="variance" class="form-control" required="">
                        <option value="">Select Variance</option>
                        <option value="2GB">2GB</option>
                        <option value="4GB">4GB</option>
                        <option value="8GB">8GB</option>
                        <option value="16GB">16GB</option>
                    </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Price</label>
                        <input type="price" name="price" class="form-control @error('price') is-invalid @enderror" >
                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="desc" class="form-control" ></textarea>
                    </div>
                    <button class="btn btn-primary">Submit</button>     
                    </form>
                </div>
            </div>
        </div>
    </div>


    @endsection   

   
    
    