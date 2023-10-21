<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Computer Parts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/x-icon" href="/img/web.png">
    <style>
        body {
            background-image: url('https://cdn5.f-cdn.com/files/download/93243757/ecommerce-.jpg');
        background-size: cover;
        }

        #navPage {
            background: #010b1e;
            box-shadow: 7px 7px 13px 1px #010b1e,
                -10px -9px 11px 1px #1d335a;
        }

        #dropdown:hover {
            background-color: #45bdd9;
        }

        .category-card {
            border: 1px solid #ddd;
            box-shadow: 0 0.125rem 0.25rem rgb(0 0 0 / 8%);
            margin-bottom: 24px;
            background-color: #fff;
        }

        .category-card a {
            text-decoration: none;
        }

        .category-card .category-card-img {
            max-height: 260px;
            overflow: hidden;
            border-bottom: 1px solid #ccc;
        }

        .category-card .category-card-body {
            padding: 10px 16px;
        }

        .category-card .category-card-body h5 {
            margin-bottom: 0px;
            font-size: 18px;
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
                    <a class="nav-link" href="{{ url('cart') }}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge bg-danger">{{$count}}</span></a></button>
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
        @if(session()->has('message'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    {{session()->get('message')}}
    </div>
@endif

        <div class="card shadow">
            <div class="card-body">
                <a href="{{ url('/dashboard') }}" class="float-end"><button type="button" class="btn btn-danger"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                <div class="row">
                    <div class="col-md-4 border-light">
                        <img src="/img/{{$products->image}}" class="w-100" alt="">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{ $products->title }}
                        </h2>

                        <hr>
                        <label class="me-3" style="color: gold;">Price: ${{ $products->price }}</label>
                        <p class="mt-3">
                            <b>{{ $products->description }}</b>
                        </p>
                        <hr>
                        @if($products->quantity > 0)
                        <label class="badge bg-success">In Stock</label>
                        @else
                        <label class="badge bg-danger">Out of Stock</label>
                        @endif
                        <form action="{{ url('addcart',$products->id)}}" method="POST">
                            @csrf
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <label for="Quantity"><b>Quantity</b></label>
                                <input type="number" value="1" min="1" class="form-control" style="width:100px" name="quantity">      
                            </div>
                            <div class="col-md-10">
                                <br />
                                <button type="submit" class="btn btn-primary me-3 float-start" style="margin-left: 15px"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to Cart</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
