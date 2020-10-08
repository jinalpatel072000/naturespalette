
<?php
session_start(); 
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!==true){
  header("location:../index.php");
  exit;
}
  include ('C:\xampp\htdocs\naturespalette\include\common/config.php');
   $id=$_GET['member_id'];

   $Id=$_GET['ID'];
  $t = 'Batch Window';
$homehref="ncwindow.php?member_id=".$id ;
//header
include ('C:\xampp\htdocs\naturespalette\include\common/header.php');
  
 ?>
 

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <?php

                ?>
          <li class="nav-item">
            <a href="bnotice.php?member_id=<?php echo $_GET['member_id']; ?>&ID=<?php echo $_GET['ID'] ?>" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Notice Board
               
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="bexperiences.php?member_id=<?php echo $_GET['member_id']; ?>&ID=<?php echo $_GET['ID']  ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Member Experiences 
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="baddexperience.php?member_id=<?php echo $_GET['member_id']; ?>&ID=<?php echo $_GET['ID']  ?>" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Add Member Experience
              
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="bevents.php?member_id=<?php echo $_GET['member_id']; ?>&ID=<?php echo $_GET['ID']  ?>" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Upcoming Events
              
              </p>
            </a>
          </li> 
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container ">
        <div class="row mb-2">
          <div class="col-sm-2">
            <button class="btn btn-back" onclick="goBack()"><i class="fas fa-arrow-left"></i></button>
          </div>
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    

            
    <div class="container mt-3">
    
      <div class="row align-items-center pt-10">
        <div class="col-md-2"> 
        </div>
        <div class="col-md-4 ">
        
          <div class="small-box bg-info">
              <div class="inner">

                
                <h2>Notice</h2>
                <h2>Board</h2>

                
              </div>
                <div class="icon">
                  <i class="ion ion-clipboard"></i>
                </div>
                <a href="bnotice.php?member_id=<?php echo $_GET['member_id']; ?>&ID=<?php echo $_GET['ID'] ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>

              <div class="small-box bg-warning">
              <div class="inner">

                
              <h2>Member</h2>
                <h2>Experiences</h2>
              </div>
                <div class="icon">
                  <i class="ion ion-ios-people-outline"></i>
                </div>
                <a href="bexperiences.php?member_id=<?php echo $_GET['member_id']; ?>&ID=<?php echo $_GET['ID']  ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
          </div>

        <div class="col-md-4">
        
          <div class="small-box bg-success">
              <div class="inner">
              <h2>Add Member </h2>
                <h2>Experience</h2>
              </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="baddexperience.php?member_id=<?php echo $_GET['member_id']; ?>&ID=<?php echo $_GET['ID']  ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>

              <div class="small-box bg-danger">
              <div class="inner">
              
              <h2>Ucoming</h2>
                <h2>Events</h2>

              </div>
                <div class="icon">
                  <i class="ion ion-android-calendar"></i>
                </div>
                <a href="bevents.php?member_id=<?php echo $_GET['member_id']; ?>&ID=<?php echo $_GET['ID']  ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right  "></i></a>
              </div> 
        </div>           
        <div class="col-md-2"> 
        </div>
      </div>
  </div>
  <!-- /.content-wrapper -->

   <!-- footer -->
  <?php
include ('C:\xampp\htdocs\naturespalette\include\common/footer.php');
  ?>
