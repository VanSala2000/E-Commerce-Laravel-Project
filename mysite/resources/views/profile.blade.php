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

  #category{
    background: linear-gradient(rgb(255, 255, 255,0.5) 50%, rgba(255, 255, 255,0.5) 50%);
  }

  .category-card{
    border: 1px solid #ddd;
    box-shadow: 0 0.125rem 0.25rem rgb(0 0 0 / 8%);
    margin-bottom: 24px;
    background-color: none;
    background: white;
    border-radius: 10px;
}
.category-card a{
    text-decoration: none;
}
.category-card .category-card-img{
    max-height: 260px;
    overflow: hidden;
    border-bottom: 1px solid #ccc;
}
.category-card .category-card-body{
    padding: 10px 16px;
}
.category-card .category-card-body h5{
    margin-bottom: 0px;
    font-size: 18px;
    font-weight: 600;
    color: #000;
    text-align: center;
}

 #display{
    display: inline-block;
    width: 760px;
    height: auto;
    margin-left: 200px;
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

<div class="container mt-4 shadow-lg mb-4">
    <div class="row" id="display">

      @if(session()->has('message'))
      <div class="alert alert-success alert-dismissible">
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          {{session()->get('message')}}
          </div>
      @endif

      @foreach ($admin as $user)
      @endforeach
      
            <p style="font-size: 50px;margin-top: 20px;margin-left: 180px; color:black;"> <b>User Profile</b> <a href="{{ route('dashboard') }}"><button type="back" class="btn btn-danger" style="width: 100px;margin-left:105px"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a></p>
            <div class="form-group" style="padding-left: 170px;font-size: 18px;color: black;">
                  <b>Username:</b>
                  <p><label><textarea class="form-control" style="width: 300px; height: 10px;border-color: black" disabled>{{ Auth::user()->name }}</textarea>
              </div>
  
              <div class="form-group" style="padding-left: 170px;font-size: 18px;color: black;">
                <b>Email Address:</b>
                  <p><label><textarea class="form-control" style="width: 300px; height: 10px;border-color: black" disabled>{{ Auth::user()->email }}</textarea>
              </div>
  
              <div class="form-group" style="padding-left: 170px;font-size: 18px;color: black;">
               <b>Phone:</b>
                  <p><label><textarea class="form-control" style="width: 300px; height: 10px;border-color: black" disabled>{{ Auth::user()->phone }}</textarea>
              </div>
  
              <div class="form-group" style="padding-left: 170px;font-size: 18px;color: black;">
                <b>Address:</b>
                  <p><label><textarea class="form-control" style="width: 300px; height: 10px;border-color: black" disabled>{{ Auth::user()->address }}</textarea>
              </div>
  
              <div class="form-group" style="padding-left: 170px;font-size: 18px;color: black;">
                <b>Zip code:</b>
                  <p><label><textarea class="form-control" style="width: 300px; height: 10px;border-color: black" disabled>{{ Auth::user()->pincode }}</textarea>
              </div>

              <div class="form-group">
              <label><a href=" {{ url('edit/'.$user->id) }} "><input type="update" class="btn btn-primary" value="Edit Profile" style="width: 105px;margin-left:105px"></a></label>
              <label><a href="{{ route('changepass') }}"><input type="submit" class="btn btn-success" value="Change Password" style="width: 190px;margin-left: -40px"></a></label>
            </div>
      </form>
    </div>
  </div>