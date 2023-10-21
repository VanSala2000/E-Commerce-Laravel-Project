<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Product</title>
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
    height: auto;
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
          <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
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
        <a class="nav-link" href="{{route('admin.dashboard')}}" style="color: black;" id="btn">Dashboard</a>
      </li>
    </ul>
    <ul class="nav flex-column" style="cursor: pointer;">
      <li class="nav-item">
        <a class="nav-link" style="color: black;" id="btn1" disabled>Add Product</a>
      </li>
    </ul>
    <ul class="nav flex-column" style="cursor: pointer;">
      <li class="nav-item">
        <a class="nav-link" href="{{route('admin.editproduct')}}" style="color: black;" id="btn">Edit Product</a>
      </li>
    </ul>
    <ul class="nav flex-column" style="cursor: pointer;">
      <li class="nav-item">
        <a class="nav-link" href="{{route('admin.delete')}}" style="color: black;" id="btn">Delete Product</a>
      </li>
    </ul>
    <ul class="nav flex-column" style="cursor: pointer;">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('clientorder') }}" style="color: black;" id="btn">Client Orders</a>
      </li>
    </ul>
   </div>
  
  <div class="container shadow-lg ">
    <span class="rounded">
        
        @if(session()->has('message'))
     <div class="alert alert-success alert-dismissible" class="btn-close" style="margin-right:15px">
       {{session()->get('message')}}
         </div>
     @endif

      <h2 style="text-align: center"><b> Add Product </b></h2><br>

<form action="{{url('/addproduct')}}" method="POST">
    @csrf

    <div class="row">
        <div class="col-4 col-md-4">
        <div class="form-group">
        <label><b style="font-size: 18px">Category Id:</b></label>
        <select class="form-control" name="cate_id" style="margin-left: 100px; width: 300px" required="">
            <option value="" selected="">-Enter category id-</option>
            @foreach ($product as $products)
                <option value="{{ $products->cate_id }}">{{ $products->cate_id }}</option>
            @endforeach
        </select>
        </div>
    </div>
        <div class="col-4 col-md-4">
        <div class="form-group">
            <label><b style="font-size: 18px">Product Name:</b></label>
                <input type="text" name="title" class="form-control" style="width: 400px; margin-left: 100px" placeholder="Enter product name" required="">
        </div>
    </div>
    </div>   

    <div class="row">
        <div class="col-4 col-md-4">
        <div class="form-group">
        <label><b style="font-size: 18px">Image:</b></label>
            <select class="form-control" name="image" style="margin-left: 100px; width: 300px" required="">
                <option value="" selected="">-Select type of image-</option>
                @foreach ($product as $products)
                    <option value="{{ $products->image }}">{{ $products->image }}</option>
                @endforeach
            </select>
        </div>
    </div>
        <div class="col-4 col-md-4">
        <div class="form-group">
            <label><b style="font-size: 18px">Type:</b></label>
            <select class="form-control" name="type" style="margin-left: 100px; width: 300px" required="">
                <option value="" selected="">-Select what type of product-</option>
                @foreach ($product as $products)
                    <option value="{{ $products->type }}">{{ $products->type }}</option>
                @endforeach
            </select>
        </div>
    </div>
    </div>

    <div class="row">
        <div class="col-4 col-md-4">
        <div class="form-group">
        <label><b style="font-size: 18px">Description:</b></label>
            <textarea name="description" class="form-control" style="width: 300px; margin-left: 100px; margin-bottom:5px" placeholder="Write a description" required=""></textarea>
        </div>
    </div>
        <div class="col-4 col-md-4">
        <div class="form-group">
        <label><b style="font-size: 18px">Quantity:</b></label>
            <input type="number" name="quantity" min="1" class="form-control" style="width: 150px; margin-left: 100px" placeholder="Enter quantity" required="">
        </div>
    </div>
    </div>

    <div class="row">
        <div class="col-4 col-md-4">
        <div class="form-group">
        <label><b style="font-size: 18px">Price:</b></label>
            <input type="number" name="price" min="1" class="form-control" style="width: 200px; margin-left: 100px" placeholder="Write a price" required="">
        </div>
    </div>
        <div class="col-4 col-md-4">
        <div class="form-group">
        <label><b style="font-size: 18px">Status:</b></label>
            <input type="number" min="0" max="0" name="status" class="form-control" style="width: 100px; margin-left: 100px; margin-bottom: 20px" required="">
        </div>
    </div>
    </div>

    <input type="submit" style="margin-left: 100px; margin-bottom: 100px" value="Add Product" class="btn btn-success">
</form>
    </span>
  </div>
</div>

      