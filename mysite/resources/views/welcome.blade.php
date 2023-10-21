<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Computer Parts</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="icon" type="image/x-icon" href="/img/web.png">
 <style>

    body{
        background-image: url('https://img.freepik.com/free-photo/cyber-monday-retail-sales_23-2148688493.jpg?size=626&ext=jpg&ga=GA1.1.1972963.1685520745&semt=ais');
        background-size: 1300px 600px;
    }
    #navPage{
    background: #010b1e;
    box-shadow:  7px 7px 13px 1px #010b1e,
                 -10px -9px 11px 1px #1d335a;
  }
  #dropdown:hover{
    background-color: #45bdd9;
  }

  .text-box{
    color: #fff;
    position: absolute;
    top: 30%;
  }
  .text-box p{
    font-size: 50px;
    font-weight: 600;
  }
  .text-box h6{
    position: relative;
    font-size: 50px;
    line-height: 160px;
    margin-left: 0;
    color: transparent;
    overflow: hidden;
    -webkit-text-stroke: 0.3vw #fff;

  }
  h6::before{
    content: attr(data-text);
    position: absolute;
    left: 0;
    top: 0;
    width: 0;
    height: 110%;
    color: goldenrod;
    -webkit-text-stroke: 0vw gold;
    border-right: 4px solid gold;
    overflow: hidden;
    animation: animate 6s linear infinite;
  }
  @keyframes animate{
    0%,10%,100%{
      width: 0;
    }
    70%,90%{
      width: 110%;
    }
  }

  .text-box h3{
    font-size: 30px;
    font-weight: 500;
    color: black;
  }

    
  </style>
</head>
<body>

<nav class="navbar navbar-expand-sm fixed-top" id="navPage">
  <div class="container-fluid" style="padding-left:50px;padding-top:10px">
    <a class="navbar-brand" style="margin-top:10px" href="javascript:void(0)"><img src="/img/web.png" class="rounded" alt="Avatar Logo" style="width:90px;margin-top: -20%"></a>
   
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto" style="font-size: large; font-family: sans-serif;cursor: pointer;margin-left:5px">
      </ul>
      <form class="d-flex" style="margin-right: 30px;font-size: 17px">
      <a href="{{ route('register') }}" id="dropdown" style="color: white;padding:15px;text-decoration: none;"><i class="fa fa-user" aria-hidden="true"></i> Sign Up</a>
      <a href="{{ route('login') }}" id="dropdown" style="color: white;padding:15px;text-decoration: none;"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
      </form>
    </div>
  </div>
</nav>

<div class="container">
  <div class="text-box">
  <h6 data-text="Welcome!">Welcome!</h6>
  <h6 data-text="ALLAcom" style="margin-left: 50px;font-size: 100px">ALLAcom</h6>
  <h3>Enjoy shopping!</h3>
  </div>
</div>

  

      