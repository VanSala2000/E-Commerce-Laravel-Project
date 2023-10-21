<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Cart</title>
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
            <button type="button" class="btn btn-primary" data-toggle="dropdown" style="margin-right: 10px">
             <a class="nav-link" href="{{ url('cart') }}"> <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart<span class="badge bg-danger">{{$count}}</span></a></button>
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

<div class="container">

    @if(session()->has('messages'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    {{session()->get('messages')}}
    </div>
@endif
    
    @if(session()->has('message'))
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    {{session()->get('message')}}
    </div>
@endif
@php $total = 0 @endphp

<form action="{{ url('order') }}" method="POST">
    @csrf

    <small><span class="text-danger">*</span> <b>Items will be delivered in 3 - 5 days.</b></small>

<table class="table table-striped table-hover table-light">
    <thead>
    <tr>
        <td style="padding: 50px;font-size:20px;text-align:center"><b>Product Name</b></td>
        <td style="padding: 50px;font-size:20px;text-align:center"><b>Quantity</b></td>
        <td style="padding: 50px;font-size:20px;text-align:center"><b>Price</b></td>
        <td style="padding: 50px;font-size:20px;text-align:center"><b>Total</b></td>
        <td style="padding: 50px;font-size:20px;text-align:center"></td>
    </tr>
    </thead>
    <tbody>
    @foreach ($carts as $cart)
    <tr>
        <td style="text-align:center">
            <input type="text" name="productname[]" value="{{$cart->product_title}}" hidden>
            {{$cart->product_title}}</td>
        <td style="text-align:center">
            <input type="text" name="quantity[]" value=" {{$cart->quantity}}" hidden>
            {{$cart->quantity}}</td>
        <td style="color:orange;text-align:center">
            ${{$cart->price}}</td>
        <td style="color:orange;text-align:center">
            <input type="text" name="price[]" value="{{$cart->price * $cart->quantity}}" hidden>
            ${{$cart->price * $cart->quantity}}</td>
            @php $total += $cart->price * $cart->quantity @endphp
        <td style="text-align:center">
        <a class="btn btn-danger" href="{{ url('delete',$cart->id) }}">Remove from Cart</a></td>
    </tr>
    @endforeach
    </tbody>
</table>
<br />
<div class="shadow bg-white p-2">
    <h5 class="text-primary">
        Item Total Amount :
        <span class="float-end">${{ $total }}</span>
    </h5>
</div>
<br />
<div class="col-md-12 mb-3">
<label><b>Select Payment Mode: </b></label>
    <div class="d-md-flex">
        <div class="nav col-md-3 flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <button class="nav-link fw-bold" id="cashOnDeliveryTab-tab" data-bs-toggle="pill" data-bs-target="#cashOnDeliveryTab" type="button" role="tab" aria-controls="cashOnDeliveryTab" aria-selected="true">Cash on Delivery</button>
        </div>
            <div class="tab-content col-md-9" id="v-pills-tabContent">
                <div class="tab-pane fade" id="cashOnDeliveryTab" role="tabpanel" aria-labelledby="cashOnDeliveryTab-tab" tabindex="0">
                <h6>Cash on Delivery Mode</h6>
                <hr/>
                <input type="text" name="paymentmode" value="Cash on Delivery" hidden>
                    <button type="submit" class="btn btn-primary">Place Order (Cash on Delivery)</button>
                </div>
            </div>
        </div>
    </div>
</form>
</div>

     

      