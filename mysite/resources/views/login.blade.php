<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
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
    width:100%;
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
    background : url('https://www.drsallystone.com/wp-content/uploads/2016/08/shopping-cart-1026501.jpg') no-repeat;
    background-size: cover;
    background-position:center;
    min-height:75vh;
    width:100%;
    border-radius: 12px 0px 0px 12px;
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
        <li><a href="{{ route('register') }}" id="dropdown" style="color: white"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="" id="dropdown" style="color: white"><span class="glyphicon glyphicon-log-in" active></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
</div>

<div class="container vh-100 d-flex align-items-center">
  <div id="innerPage">
    <div class="row align-items-center justify-content-center">
      <div class="col-sm-6 col-xs-12 d-sm-block d-none">
        <div id="imgBgn">
        </div>
      </div>
      <div class="col-sm-6 col-xs-12 text-white p-5">
        <div class="lead" style="color: black;padding-top:40px">
          <h3><b>Welcome Back</b></h3>
          <p class="fs-6 mb-4">
            <h5>Login to continue to your valuable services. Current pricing and futures.</h5>
          </p>
        </div>

        @if(session()->has('messages'))
        <div class="alert alert-danger alert-dismissible" style="margin-right:15px">
          {{session()->get('messages')}}
            </div>
        @endif

        @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible" style="margin-right:15px">
          {{session()->get('message')}}
            </div>
        @endif

        @if(session()->has('messager'))
        <div class="alert alert-success alert-dismissible" style="margin-right:15px">
          {{session()->get('messager')}}
            </div>
        @endif

       <form action="{{ route('loginvalidate') }}" method="POST">
        @csrf
        <input class="form-control rounded-0 mb-3" type="text" name="name" placeholder="Enter Username" />
        @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
        <br>
        <input class="form-control rounded-0 mb-3" type="password" name="password" placeholder="Enter Password" />
        @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif
        <br>
        
        <a href="{{ route('forgotpass') }}" style="margin-left: 120px">Forgotten Password?</a><br>
        <button class="btn btn-info mt-4 w-100" type="submit">Submit</button><br><br>
       </form>
       <a href="{{ route('admin') }}"><button class="btn btn-success mt-4 w-150">Admin Log-in</button></a>
      </div>
    </div>
  </div>
</div>

</body>
</html>






