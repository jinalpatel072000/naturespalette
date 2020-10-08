<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $t ; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../AdminLTE-3.0.5/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../AdminLTE-3.0.5/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
    .navbar-custom {
      background-color: #80936c;
    
    }
    .main-sidebar{
      background-color: #3f5d61;
    }
    .head{
      color: #87A96B; font-weight: bold; 
    }
    .card-header{
      background-color:#496b71; 
    }
    .card-body{
      height: 400px; overflow:auto;
    }
    .badge{
      background-color: #ebd58a;
      color: black;
      height:20px;
    }
    .btn-back, .btn-view{
     background-color:#80936c ; 
     color: white;
    }
    .btn-back:hover, .btn-view:hover{
     background-color:#3f5d61 ;
     color: white;
    
    }
    .btn-submit{
     background-color:#3f5d61 ; 
     color: white;
    }
    .btn-submit:hover{
     background-color:#80936c;
     color: white;
    
    }

    .card-custom{
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    .element{
    margin-left: 20px;
  }
    .card-footer{
      background:  #80936c;
    }
    #borders{
      border-radius: 10px;
      border: 1px solid #94b27b;
    }
    .brand-link {
    display: block;
    
    padding: .40rem .8rem;
    background-color: #496b71;
    }
   
    .img{
      height: 43px;
      width: 220px;
    }
    .card-title{
      color: white;
    }
    a{
      color: #80936c;
    }
    .timeline-header{
      background-color:#3f5d61;
      color: white; 
    }
    .product-title{
     text-transform: capitalize;
    }
    .brand-link .image {
    float: left;
    line-height: .8;
    /* margin-left: .8rem; */
    /*margin-right: .5rem;
    margin-top: -3px; */
    max-height: 45px;
    width: auto;
}
  </style>

    
  </style>
</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed layout-footer-fixed">
<!-- Site wrapper -->
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-custom navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo $homehref; ?>" class="nav-link">Home</a>
      </li>
     
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      
       <li class="nav-item dropdown no-arrow">
              
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
            </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="/naturespalette/include/common/logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo $homehref; ?>" class="brand-link" style="background-color: #496b71;">
      
      <span class="brand-text font-weight-light"><img src="../../AdminLTE-3.0.5/dist/img/logo.jpg"
           alt="AdminLTE Logo"
           class="img "
           style="opacity: .8"></span>
    </a>
  <!--<aside class="main-sidebar sidebar-dark-primary elevation-4">
     
    <a href="<?php echo $homehref; ?>" class="brand-link" style="background-color: #496b71;">
      <img src="../../AdminLTE-3.0.5/dist/img/logo.jpg"
           alt="AdminLTE Logo"
           class="img img-circle"
           style="opacity: .8">
      
    </a>-->
