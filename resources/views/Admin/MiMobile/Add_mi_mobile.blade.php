 @extends("Admin/nav")
    @section("containt")
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <br><br>
        <center><h1>Add Mobile</h1></center>
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
                    <h2>Seen Mi Mobile</h2>         
                    <table id="example" class="display" style="width:100%;">
                        <thead>
                            <tr>
                                <th>Company</th>
                                <th>Brand</th>
                                <th>Quantity</th>                               
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $data)
                            <tr>
                                <td>{{$data->title}}</td>
                                <td>{{$data->brand}}</td>
                                <td>{{$data->quantity}}</td>
                                <td><img src="{{asset('storage/'.$data->image)}}" style="width: 50px;height:50px;"></td>
                                <td><a href="{{url('updateMiImag/'.$data->id)}}" class="btn btn-primary">Edit</a><a href="{{'deleteHomeImage/'.$data->id}}" class="btn btn-danger">Delete</a></td>

                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Title</th>
                                <th>Brand</th>
                                <th>Quantity</th>
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
                    <h5 class="modal-title" id="exampleModalLabel">Add mi Mobile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                         <form  method="post" action="{{ url('addMiMobileImage') }}" enctype="multipart/form-data">
                     @if(session()->has('status'))
                       <center> <h3 class="alert alert-success">{{session('status')}}</h3></center>
                    @endif
                    @csrf    
                    <div class="form-group">
                        <label class="control-label">Tile</label>
                        <input type="text" name="title" value="MI" readonly="" class="form-control @error('title') is-invalid @enderror" >
                        <!-- <select id="title" name="title" class="form-control" required="">
                            <option value=" ">Select Title</option>
                      <option value="Mi">Mi</option>
                      <option value="Vivo">Vivo</option>
                      <option value="Oppo">Oppo</option>
                      <option value="RealMe">RealMe</option>
                      <option value="Apple">Apple</option>
                      <option value="Motorola">Motorola</option>
                    </select> -->
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label">Brand</label>
                        <input type="text" name="brand" class="form-control @error('Brand') is-invalid @enderror">
                        @error('brand')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label">Front page Image</label>
                        <input type="file" name="image" class="@error('image') is-invalid @enderror" >
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        
                    </div>
                    <div class="form-group">
                        <label class="control-label">Quantity</label>
                        <input type="text" name="quantity" class="form-control @error('quantity') is-invalid @enderror">
                        @error('quantity')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="control-label">Published date</label>
                        <input type="date" name="date" class="form-control @error('date') is-invalid @enderror">
                        @error('date')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- <div class="form-group">
                        <label class="control-label">Price</label>
                        <input type="price" name="price" class="form-control @error('price') is-invalid @enderror" >
                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="desc" class="form-control" ></textarea>
                    </div> -->
                    <button class="btn btn-primary">Submit</button>     
                </form>
                  </div>
                  
                </div>
              </div>
            </div>


<script type="text/javascript">
        $(document).ready(function(){
            $("#variance").change(function(){
                var idd =  $(this).val();
                //console.log(id);
                var a_id = $("#a_id").val();
                //alert(a_id);
                $.ajax({

                    url:'variancemi/'+idd,
                    dataType: 'json',
                    type: "GET", 
                    success:function(data)
                    {
                        console.log(data);
                        alert(data);
                    }
                });
            });
        });
    </script>
    @endsection   

   
    
    