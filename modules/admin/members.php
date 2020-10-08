<?php 
session_start(); 
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!==true){
  header("location:../index.php");
  exit;
  }


 ?>

 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    
</head>
<body>

             <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
        <div class="sidebar-brand-icon rotate-n-15">
        </div>
        <div class="sidebar-brand-text mx-3"><h2> Admin panel</h2></div>
      

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="adminwindow.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
            <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>General</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="participants.php">list of applicants</a><br>
            <a class="collapse-item" href="events.php">add events</a><br>
            <a class="collapse-item" href="notice.php">add notice</a><br>
            <a class="collapse-item" href="newsletter.php">add news letter</a><br>

          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>N CLUB</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
  
            <a class="collapse-item" href="members.php">list of members</a><br>
            <a class="collapse-item" href="batch.php">add batch</a><br>
            <a class="collapse-item" href="ncevent.php">add events</a><br>
            <a class="collapse-item" href="ncnotice.php">add notice</a><br>
            <a class="collapse-item" href="manageevents.php">manage member experiences</a><br>
                        <a class="collapse-item" href="addmember.php">add new members</a><br>


          </div>
        </div>
      </li>
                <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
          <a href="#" class="navbar-brand d-flex align-items-center">
           
          </a>
            <div class="pull-right">
                <?php
                if(isset($_POST['logout'])){
                    session_destroy();
                    header('location:adminlogin.php');
                }
    
                ?>
                <form method="post">
                    <button name="logout" class="btn btn-danger my-2">Logout</button>
                </form>
            </div>
        </div>
      </div>
    </ul>
            <div class="card-header py-3" align="center">
              <h2 class="m-0 font-weight-bold text-primary">list of members</h2>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" align="center" >
                        <tr>
                      <th>memberid</th>
                      <th>name</th>
                      <th>phone no</th>
                      <th>email</th>
                     <th>member expiry</th>
                      <th>gender</th>
                      <th>age</th>
                      <th>location</th>

                    </tr>                
                
</body>
</html>
<?php

include ('C:\xampp\htdocs\naturespalette\include\common/config.php');
$sql = "SELECT * from members_data ";
$result = $conn-> query($sql);

if ($result-> num_rows > 0) {
    while ($row = $result-> fetch_assoc()) {
      ?>
      <tr>
          <td><?php echo $row['member_id']  ?></td>
          <td><?php echo $row['name']  ?></td>
          <td><?php echo $row['ph_no']  ?></td>
          <td><?php echo $row['email']  ?></td>
          <td><?php echo $row['member_expiry']  ?></td>
          <td><?php echo $row['gender']  ?></td>
          <td><?php echo $row['age']  ?></td>
          <td><?php echo $row['location']  ?></td>

          
          
        </tr>
       
   <?php }
    echo "</table>";
   }
   else{
    echo "0 result";
   }
 $conn-> close();   
?>