<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Change Password</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="icon" type="image/x-icon" href="/img/web.png">
 <style>

    body{
        background-image: url('https://cdn5.f-cdn.com/files/download/93243757/ecommerce-.jpg');
        background-size: cover;
    }
    #navPage{
    background: #010b1e;
    box-shadow:  7px 7px 13px 1px #010b1e,
                 -10px -9px 11px 1px #1d335a;
  }
  #dropdown:hover{
    background-color: #45bdd9;
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
    
  </style>
</head>
<body>

<nav class="navbar navbar-expand-sm fixed-top" id="navPage">
  <div class="container-fluid" style="padding-left:50px;padding-top:10px">
    <a class="navbar-brand" style="margin-top:10px" href="javascript:void(0)"><img src="/img/web.png" class="rounded" alt="Avatar Logo" style="width:90px;margin-top: -20%"></a>
   
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto" style="font-size: large; font-family: sans-serif;cursor: pointer;margin-left:5px">
      <li class="nav-item">
          <a href="{{ route('dashboard') }}" class="nav-link" id="dropdown" style="color: white;padding:35px">Shop</a>
      </li>
      <li class="nav-item">
        <a href="{{ url('orderdetails') }}" class="nav-link" id="dropdown" style="color: white;padding:35px">Order Items</a>
    </li>
      </ul>
      <form class="d-flex" style="margin-right: 30px;font-size: 17px">
        @csrf
      <button type="button" class="btn btn-primary" style="margin-right: 10px;padding: 15px">
       <a class="nav-link" href="{{ url('cart') }}"> <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge bg-danger">{{$count}}</span></a></button>
       <div class="dropdown">
        <button class="btn btn-transparent" style="padding: 15px;color:white" data-bs-toggle="dropdown">
          <i class="fa fa-user"  aria-hidden="true"></i>  {{ Auth::user()->name }}
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
          <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
        </ul>
      </div>
      
      </form>
    </div>
  </div>
</nav>
<br><br>

<div class="wrapper">
  <div class="form" style="color:black" id="innerPage">

   @if(session()->has('message'))
     <div class="alert alert-danger alert-dismissible" style="margin-right:15px">
       {{session()->get('message')}}
         </div>
     @endif

     <h2><b>Change Password</b></h2>
     <small>Please fill this form to change your password.</small>
 
       
     <form action="{{ route('changepass') }}" method="POST">
       @csrf
         <div class="form-group">
         <label><b>Current Password:</b></label>
             <input type="password" name="current_password" class="form-control" placeholder="Enter your current password">
             @if ($errors->has('current_password'))
             <span class="text-danger">{{ $errors->first('current_password') }}</span>
             @endif
         </div><br>

         <div class="form-group">
             <label><b>New Password:</b></label>
             <input type="password" name="password" class="form-control" placeholder="Enter your new password">
             @if ($errors->has('password'))
             <span class="text-danger">{{ $errors->first('password') }}</span>
             @endif
         </div><br>
         
         <div class="form-group">
           <label><b>Confirm Password:</b></label>
           <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
           @if ($errors->has('password_confirmation'))
           <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
           @endif
       </div>

              <div class="form-group">
                <input type="submit" class="btn btn-info mt-4" value="Submit" style="width: 150px;">
                <a href="{{ route('profile') }}"><input type="back" value="Cancel" class="btn btn-danger mt-4" style="width: 150px;"></a>
            </div>
          </form>
    </div>
</div>