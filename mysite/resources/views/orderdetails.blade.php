<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Orders</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="icon" type="image/x-icon" href="/img/web.png">
 <style>

    body{
        background-color: whitesmoke;
    }
    #navPage{
    background: #010b1e;
    box-shadow:  7px 7px 13px 1px #010b1e,
                 -10px -9px 11px 1px #1d335a;
  }
  #dropdown:hover{
    background-color: #45bdd9;
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
      <button type="button" class="btn btn-primary" style="margin-right: 10px">
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
<br><br><br><br><br><br><br>


<div class="container mb-5">
    
    @if(session()->has('message'))
<div class="alert alert-success alert-dismissible" style="margin-left: -50px;width: 1200px">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    {{session()->get('message')}}
    </div>
@endif

<h4  style=" margin-left: -50px;">
  <i class="fa fa-shopping-cart" aria-hidden="true"></i> Order Details:
</h4>
@php $total = 0 @endphp
<table class="table table-striped table-hover table-light" style=" margin-left: -50px;">
    <thead>
    <tr style="color: black">
        <td style="padding: 30px;font-size:20px;text-align:center"><b>Name</b></td>
        <td style="padding: 30px;font-size:20px;text-align:center"><b>Email</b></td>
        <td style="padding: 30px;font-size:20px;text-align:center"><b>Phone</b></td>
        <td style="padding: 30px;font-size:20px;text-align:center"><b>Zip code</b></td>
        <td style="padding: 30px;font-size:20px;text-align:center"><b>Address</b></td>
        <td style="padding: 30px;font-size:20px;text-align:center"><b>Product Name</b></td>
        <td style="padding: 30px;font-size:20px;text-align:center"><b>Quantity</b></td>
        <td style="padding: 30px;font-size:20px;text-align:center"><b>Price per Item</b></td>
        <td style="padding: 20px;font-size:20px;text-align:center"><b>Mode of Payment</b></td>
        <td style="padding: 30px;font-size:20px;text-align:center"><b>Status</b></td>
        <td style="padding: 30px;font-size:20px;text-align:center"></td>
    </tr>
    </thead>
    <tbody>
    @foreach ($carts as $cart)
    <tr>
        <td style="text-align:center">{{$cart->name}}</td>
        <td style="text-align:center">{{$cart->email}}</td>
        <td style="text-align:center">{{$cart->phone}}</td>
        <td style="text-align:center">{{$cart->pincode}}</td>
        <td style="text-align:center">{{$cart->address}}</td>
        <td style="text-align:center">{{$cart->product_title}}</td>
        <td style="text-align:center">{{$cart->quantity}}</td>
        <td style="color:orange;text-align:center">${{$cart->price}}</td>
        @php $total += $cart->price * $cart->quantity @endphp
        <td style="text-align:center">{{$cart->paymentmode}}</td>
        <td style="color:green;text-align:center">{{$cart->status}}</td>
        <td style="text-align:center"><a class="btn btn-danger" href="{{ url('remove',$cart->id) }}">Remove</a></td>
    </tr>
    @endforeach
    </tbody>
</table>
<div class="shadow bg-white p-2" style="margin-left: -50px;margin-right: -50px">
  <h5 class="text-primary">
      Items Total Amount :
      <span class="float-end">${{ $total }}</span>
  </h5>
  <div>{{ $carts->links() }}</div>
</div>
</div>


