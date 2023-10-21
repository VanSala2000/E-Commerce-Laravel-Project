<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registration Form</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
  crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="icon" type="image/x-icon" href="/img/web.png">
    <style>
    body{
      background-image: url('https://img.freepik.com/free-photo/cyber-monday-retail-sales_23-2148688493.jpg?size=626&ext=jpg&ga=GA1.1.1972963.1685520745&semt=ais');
        background-size: cover;
    }
    
  #navPage{
    background: #010b1e;
    box-shadow:  7px 7px 13px 1px #010b1e,
                 -10px -9px 11px 1px #1d335a;
  }

  .wrapper{ 
            width: 350px; padding: 20px; 
  }
  .form{
            width: 500px;
            height: auto;
            position: absolute;
            top: 150px;
            left: 420px;
            border-radius: 10px;
            padding: 25px;
            color: white;
  }
  #innerPage{
    background: whitesmoke;
    box-shadow:  7px 7px 13px 1px #010b1e,
                 -10px -9px 11px 1px #1d335a;
  }

  .form-control {
    background: none;
    border:none;
    border-bottom : 1px solid #45bdd9;
  }

  #dropdown:hover{
    background-color: #45bdd9;
  }

    
  </style>
</head>
<body>

<div id="navPage">
<nav class="navbar" style="padding: 30px;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><img src="/img/web.png" class="rounded" alt="Avatar Logo" style="width:90px;margin-top: -35%"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav" style="font-size: large;">
        <li><a href="{{ route('welcome') }}" id="dropdown" style="color: white">Home</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right" style="font-size: medium;">
        <li><a href="#" id="dropdown" style="color: white"><span class="glyphicon glyphicon-user" active></span> Sign Up</a></li>
        <li><a href="{{ route('login') }}" id="dropdown" style="color: white"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
</div>


<div class="wrapper">
     <div class="form" style="color:black" id="innerPage">

      @if(session()->has('messages'))
        <div class="alert alert-success alert-dismissible" style="margin-right:15px">
          {{session()->get('messages')}}
            </div>
        @endif

        <h2><b>Sign Up</b></h2>
        <p>Please fill this form to create an account.</p>
    
          
        <form action="{{ route('registervalidate') }}" method="POST">
          @csrf
            <div class="form-group">
            <label><b>Username:</b></label>
                <input type="text" name="name" class="form-control" placeholder="Enter your username">
                @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label><b>Email Address:</b></label>
                <input type="text" name="email" class="form-control" placeholder="Enter your email address">
                @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            
            <div class="form-group">
              <label><b>Phone:</b></label>
              <input type="text" name="phone" class="form-control" placeholder="Enter your phone number">
              @if ($errors->has('phone'))
              <span class="text-danger">{{ $errors->first('phone') }}</span>
              @endif
          </div>

          <div class="form-group">
            <label><b>Address:</b></label>
            <input type="text" name="address" class="form-control" placeholder="Enter your address">
            @if ($errors->has('address'))
            <span class="text-danger">{{ $errors->first('address') }}</span>
            @endif
        </div>

        <div class="form-group">
          <label><b>Zip code:</b></label>
          <input type="number" name="pincode" class="form-control" placeholder="Enter zip code">
          @if ($errors->has('pincode'))
          <span class="text-danger">{{ $errors->first('pincode') }}</span>
          @endif
      </div>

            <div class="form-group">
                <label><b>Password:</b></label>
                <input type="password" name="password" class="form-control" placeholder="Enter your password">
                @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label><b>Confirm Password:</b></label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm your password">
                @if ($errors->has('password_confirmation'))
                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                @endif
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-info mt-4" value="Submit" style="width: 150px;">
            </div>

            <p style="font-size: 15px;"><b>Already have an account? <a href="{{ route('login') }}">Login here</a>.</b></p>
        </form>
    </div>
  </div>    

</body>
</html>