 @extends("Admin/nav")
    @section("containt")
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <br><br>
        <center><h1>Mi Accessories</h1></center>
        @if(session()->has('status'))
           <center><p class="alert alert-success" style="width: 50%; margin-left: 50px;">{{session('status')}}</p></center>
        @endif
            <br><br><br>

            <div class="container">

                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                    Add Mobile 
                </button>  
            </div>
                
            <div class="container">

                <div class="row justify-content-center"  >
                    <div class="col-auto">

                        <h2>Seen Accsseories</h2>

                        <table id="example" class="display" style="width:120%;">
                            <thead>
                                <tr>
                                    <th>Company</th>
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th>Price</th>
                                    <th>Desc</th>    
                                    <th>Image</th>
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $data)
                                <tr>
                                    <td>{{$data->company}}</td>
                                    <td>{{$data->title}}</td>
                                    <td>{{$data->type}}</td>
                                    <td>{{$data->price}}</td>
                                    <td>{{$data->desc}}</td>
                                    <td><img src="{{asset('storage/'.$data->image)}}" style="width: 50px;height:50px;"></td>
                                    <td><a href="{{url('updateMiImag/'.$data->id)}}" class="btn btn-primary">Edit</a><a href="{{'deleteHomeImage/'.$data->id}}" class="btn btn-danger">Delete</a></td>

                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Company</th>
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th>Price</th>
                                    <th>Desc</th>    
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        
                        </table>
                  
                    </div>

                </div>

            </div>
            <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js
            "></script>
            <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
                <script type="text/javascript">
                    $(document).ready(function() {
                    $('#example').dataTable({
                        "lengthMenu": [ 5, 10, 15, 75, 100 ]
                    });
                } );
            </script>
            <br>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">MI Accessories</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                          <div class="modal-body">
                                <form  method="post" action="{{ url('addMIAccessorieRequest') }}" enctype="multipart/form-data">
                                @csrf 

                                <div class="form-group">
                                    <label class="control-label">Company</label>
                                            <input type="text" name="company" value="{{ old('company') }}" class="form-control @error('company') is-invalid @enderror">
                                    @error('quantity')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Title</label>
                                    <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror">
                                    @error('quantity')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- <div class="form-group">
                                    <label class="control-label">Type</label>
                                    <input type="text" name="type" value="{{ old('type') }}" class="form-control @error('type') is-invalid @enderror">
                                    @error('Type')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div> -->

                                <div class="form-group">
                                    <label class="control-label">Front page Image</label>
                                    <input type="file" name="image"  class="@error('image') is-invalid @enderror" >
                                    @error('image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror 
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Quantity</label>
                                    <input type="text" name="quantity" value="{{ old('quantity') }}" class="form-control @error('quantity') is-invalid @enderror">
                                    @error('quantity')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Price</label>
                                    <input type="price" name="price"  class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" >
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
         <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js
            "></script>
            <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
                <script type="text/javascript">
                    $(document).ready(function() {
                    $('#example').dataTable({
                        "lengthMenu": [ 5, 10, 15, 75, 100 ]
                    });
                } );
            </script>

    @endsection   

   
    
    