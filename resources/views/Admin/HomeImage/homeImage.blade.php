@extends("Admin/nav")
	@section("containt")
		<br><br>
        <h1 style="margin-left: 370px;">Add home image</h1><br>
            <div class="d-flex justify-content-center align-items-center">      
            <div class="row ">
                <form  method="post" action="{{ url('addHomeImage') }}" enctype="multipart/form-data">
                    @csrf    
                    <div class="form-group">
                        <label class="control-label">Front page Image</label>
                        <input type="file" name="image" class="@error('image') is-invalid @enderror" style="width: 500px; ">
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        
                    </div>
                   
                    <button class="btn btn-primary">Submit</button>     
                </form>   
            </div></div><br><br><br><br><br><br><br><br><br><br><br><br><br>
            

    @endsection        