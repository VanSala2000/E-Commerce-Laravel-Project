<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Client Orders</title>
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

.form{
    width: 220px;
    height: 400px;
    background-color: rgb(255, 253, 253);
    border-radius: 10px;
    margin-left: 20px;
    font-family: Arial;
    margin-bottom: 10px;
  }

  span {
    margin-top:-240px;
    display: inline-block;
    width: 1000px;
    height: 400px;
    margin-left: 250px;
    background-color: rgb(255, 253, 253);
    margin-bottom: 10px;
    text-indent: 50px;
    font-family: Arial;
    font-size: 22px;
    box-shadow: 0 0.125rem 0.25rem rgb(0 0 0 / 8%);
    position: absolute;
  }

  #btn:hover{
    background-color: gray;
  }

  #btn1{
    background-color: gray;
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
.category-card .category-card-img{
    max-height: 260px;
    overflow: hidden;
    border-bottom: 1px solid #ccc;
}
.category-card .category-card-body{

}
.category-card .category-card-body h5{
    margin-bottom: 0px;
    font-weight: 600;
    color: #000;
    text-align: center;
}


    
  </style>
</head>
<body>

<nav class="navbar navbar-expand-sm fixed-top" id="navPage">
  <div class="container-fluid" style="padding-left:50px;padding-top:10px">
    <a class="navbar-brand" style="margin-top:10px" href="javascript:void(0)"><img src="/img/web.png" class="rounded" alt="Avatar Logo" style="width:90px;margin-top: -20%"></a>
   
    <div class="collapse navbar-collapse" id="mynavbar">
      <form class="d-flex" style="margin-right: 30px;font-size: 17px">
        @csrf
       <div class="dropdown" style="margin-left: 1080px">
        <button class="btn btn-transparent" style="padding: 15px;color:white" data-bs-toggle="dropdown">
          <i class="fa fa-user" aria-hidden="true"></i>  Admin
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
        </ul>
      </div>
      
      </form>
    </div>
  </div>
</nav>
<br><br><br><br><br><br>

<div class="form">
  <div class="container mt-1 shadow-lg p-2 mb-4">
    <ul class="nav flex-column" style="cursor: pointer;">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dashboard') }}" style="color: black;" id="btn">Dashboard</a>
      </li>
    </ul>
    <ul class="nav flex-column" style="cursor: pointer;">
      <li class="nav-item">
        <a class="nav-link" href="{{route('admin.addproduct')}}" style="color: black;" id="btn">Add Product</a>
      </li>
    </ul>
    <ul class="nav flex-column" style="cursor: pointer;">
      <li class="nav-item">
        <a class="nav-link" href="#" style="color: black;" id="btn">Edit Product</a>
      </li>
    </ul>
    <ul class="nav flex-column" style="cursor: pointer;">
      <li class="nav-item">
        <a class="nav-link" href="{{route('admin.delete')}}" style="color: black;" id="btn">Delete Product</a>
      </li>
    </ul>
    <ul class="nav flex-column" style="cursor: pointer;">
      <li class="nav-item">
        <a class="nav-link" style="color: black;" id="btn1" disabled>Client Orders</a>
      </li>
    </ul>
   </div>
  
  <div class="container shadow-lg ">
    <span class="rounded">
        <div class="container mb-5">
        
        <h4  style=" margin-left: -50px;margin-top: 20px">
          <i class="fa fa-shopping-cart" aria-hidden="true"></i> Orders from Users:
        </h4>
        @php $total = 0 @endphp
        <table class="table table-striped table-hover table-light">
            <thead>
            <tr style="color: black">
                <td style="padding: 10px;font-size:17px;text-align:center"><b>Email</b></td>   
                <td style="padding: 10px;font-size:17px;text-align:center"><b>Product Name</b></td>
                <td style="padding: 10px;font-size:17px;text-align:center"><b>Quantity</b></td>
                <td style="padding: 10px;font-size:17px;text-align:center"><b>Price per Item</b></td>
                <td style="padding: 10px;font-size:17px;text-align:center"><b>Status</b></td>
                <td style="padding: 10px;font-size:17px;text-align:center"></td>
            </tr>
            </thead>
            <tbody>
            @foreach ($carts as $cart)
            <tr style="font-size: 17px">
                <td style="text-align:center">{{$cart->email}}</td>
                <td style="text-align:center">{{$cart->product_title}}</td>
                <td style="text-align:center">{{$cart->quantity}}</td>
                <td style="color:orange;text-align:center">${{$cart->price}}</td>
                @php $total += $cart->price * $cart->quantity @endphp
                <td style="text-align:center"><a class="btn btn-success" href="{{ url('deleteorder',$cart->id) }}">To ship</a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <div class="shadow bg-white p-2" >
          <h5 class="text-primary">
              Item Total Amount :
              ${{ $total }}
          </h5>
        </div>
        </div>
    </span>
  </div>
</div>

      