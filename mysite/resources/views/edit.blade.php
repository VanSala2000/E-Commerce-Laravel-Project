<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Profile</title>
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
        background-size: 1100;
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
                 -10
  }

 #display{
    display: inline-block;
    width: 760px;
    height: auto;
    margin-left: 300px;
    background: linear-gradient(rgb(255, 255, 255,0.5) 50%, rgba(255, 255, 255,0.5) 50%); 
    margin-top: 85px;
    margin-bottom: 10px;
    text-indent: 50px;
    font-family: Arial;
    font-size: 15px;
    position: static;
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
       <div class="alert alert-success alert-dismissible" style="margin-right:15px">
         {{session()->get('message')}}
           </div>
       @endif
  
       <h2><b>Update Profile</b></h2>
       <small>Please fill this form to edit your profile.</small>
   
       <form action="{{ url('update-profile/'.$profile->id ) }}" method="POST">
        {{ csrf_field() }}
         @method('PUT')

          <div class="form-group">
          <label><b>Username:</b></label>
              <input type="text" name="name" class="form-control" value="{{ $profile->name }}" style="margin-bottom: 3%" placeholder="Enter new username" disabled>
          </div>
         
           <div class="form-group">
           <label><b>Email Address:</b></label>
               <input type="email" name="email" class="form-control" value="{{ $profile->email }}" style="margin-bottom: 3%" placeholder="Enter new email" disabled>
           </div>
  
           <div class="form-group">
           <label><b>Phone:</b></label>
                <input type="phone" name="phone" value="{{ $profile->phone }}" class="form-control" style="margin-bottom: 3%" placeholder="Enter new phone number" disabled>
            </div>
           
            <div class="form-group">
            <label><b>Address:</b></label>
                <input type="address" name="address" value="{{ $profile->address }}" class="form-control" style="margin-bottom: 3%" placeholder="Enter new address">
                @if ($errors->has('address'))
                <span class="text-danger">{{ $errors->first('address') }}</span>
                @endif
            </div>

            <div class="form-group">
            <label><b>Zip code:</b></label>
                <input type="pincode" value="{{ $profile->pincode }}" name="pincode" class="form-control" style="margin-bottom: 3%" placeholder="Enter new zip code">
                @if ($errors->has('pincode'))
                <span class="text-danger">{{ $errors->first('pincode') }}</span>
                @endif
            </div>
  
                <div class="form-group">
                  <input type="submit" class="btn btn-success mt-4" value="Save changes" style="width: 150px;">
                  <a href="{{ route('profile') }}"><input type="back" value="Cancel" class="btn btn-danger mt-4" style="width: 150px;"></a>
              </div>
            </form>
      </div>
  </div>