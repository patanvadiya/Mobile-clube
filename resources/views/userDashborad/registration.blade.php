<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
  <section><br><br><br>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-8 col-xl-6">
          <div class="row">
            <div class="col text-center">
              <h1>Register</h1>
            </div>
          </div>
          	<form method="post" action="{{url('storeRegistration')}}">
          	@csrf	
		        <div class="row align-items-center">
		            <div class="col mt-4">
		              <input type="text" class="form-control" name="name" placeholder="Enter Name">
		            </div>
		        </div>
		        <div class="row align-items-center mt-4">
		            <div class="col">
		              <input type="email" class="form-control" name="email" placeholder="Email">
		            </div>
		        </div>
		        <div class="row align-items-center mt-4">
		            <div class="col">
		              <input type="password" class="form-control" name="password" placeholder="Password">
		            </div>
		            <div class="col">
		              <input type="password" class="form-control" placeholder="Confirm Password">
		            </div>
		        </div>
		        <div class="row justify-content-start mt-4">
		            <div class="col">
		              <div class="form-check">
		                <label class="form-check-label">
		                  <input type="checkbox" class="form-check-input">
		                  I Read and Accept <a href="/">Terms and Conditions</a>
		                </label>
		              </div>
		              <button class="btn btn-primary mt-4">Submit</button>
		            </div>
		        </div>
      		</form>
        </div>
      </div>
    </div>
  </section>
</body>
</html>