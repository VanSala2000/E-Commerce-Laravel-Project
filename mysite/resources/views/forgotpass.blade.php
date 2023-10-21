<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login Form</title>
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
    #innerPage {
    max-width:840px;
    margin : 0 auto;
    border-radius: 12px;
    background: whitesmoke;
    box-shadow:  7px 7px 13px 1px #010b1e,
                 -10px -9px 11px 1px #1d335a;
  }
  #navPage{
    background: #010b1e;
    box-shadow:  7px 7px 13px 1px #010b1e,
                 -10px -9px 11px 1px #1d335a;
  }
  .form-control {
    background: none;
    border:none;
    border-bottom : 1px solid #45bdd9;
  }

  #imgBgn {
    background : url('http://cioal.com/wp-content/uploads/sites/2/2016/10/Checkout-Ecommerce-1024x576.jpg') no-repeat;
    background-size: cover;
    background-position:center;
    min-height:75vh;
    width:100%;
    border-radius: 12px 0px 0px 12px;
  }

  #dropdown:hover{
    background-color: #45bdd9;
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

  .wrapper{ 
    width: 200px; padding: 20px; 
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
        <li><a href="{{ route('register') }}" id="dropdown" style="color: white"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="{{ route('login') }}" id="dropdown" style="color: white"><span class="glyphicon glyphicon-log-in" active></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
</div>

<div class="wrapper">
    <div class="form" style="color:black" id="innerPage">
       <h2><b>Forgot password</b></h2>
       <p>Please fill this form to reset your account password.</p>

       @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible" style="margin-right:15px">
          {{session()->get('message')}}
            </div>
        @endif

       <form action="{{ route('forgotpass.post') }}" method="POST">

       @csrf

    <div class="form-group">
   <label>Enter email:</label>
   <input type="email" name="email" class="form-control" placeholder="Enter your email address">
   @if ($errors->has('email'))
        <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-info" value="Send Verification Link" href="" style="width: 450px;">
    </div>
   <a href="{{ route('login') }}"><button type="button" class="btn btn-danger" style="width: 95px;"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go back</button></a>
       </form>
    </div>
</div>    

</body>
</html>






