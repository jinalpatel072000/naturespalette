
<?php
session_start(); 
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!==true){
  header("location:../index.php");
  exit;
  }
  include ('C:\xampp\htdocs\naturespalette\include\common/config.php');
 
  
$t = 'Admin Window';
$homehref='adminwindow.php' ; 
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
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
             <i class="fas fa-user"></i> 
              <p>
                General Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="participants.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List of Applicants </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="events.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Event</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="notice.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Notice</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="newsletter.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add News Letter</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-user-shield"></i>
              <p>
                N Club
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="batch.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Batch</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="ncevent.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Event</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="ncnotice.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Notice</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="manageevents.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Member Experiences</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="addmember.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Member</p>
                </a>
              </li>
            </ul>
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
    
    
    <div class="row">
  
  </div>
  <div class="row">
    
  </div>
         
    <div class="container mt-3">
    
      <div class="row align-items-center pt-10">
        <div class="col-md-2"> 
        </div>
        <div class="col-md-4 ">
        <div class="m-4 pb-3"> 
        <h2 class="head m-0 text-center"> General User</h2>
        </div>
         <?php
                  $result = mysqli_query($conn,"SELECT COUNT(customer_id) AS count FROM applicants;");
                  $row = mysqli_fetch_assoc($result);
                  $applicants = $row['count'];

                  $result = mysqli_query($conn,"SELECT COUNT(event_id) AS count FROM events;");
                  $row = mysqli_fetch_assoc($result);
                  $events = $row['count'];

                  $result = mysqli_query($conn,"SELECT COUNT(member_id) AS count FROM members_data;");
                  $row = mysqli_fetch_assoc($result);
                  $ncmember = $row['count'];

                  
                  $result = mysqli_query($conn,"SELECT COUNT(exp_id) AS count FROM nc_gen_exp where approved=0;");
                  $row = mysqli_fetch_assoc($result);
                  $nc_exp = $row['count'];

                  $result = mysqli_query($conn,"SELECT COUNT(exp_id) AS count FROM member_exp1 where approved=0;");
                  $row = mysqli_fetch_assoc($result);
                  $m_exp = $row['count'];


          ?>
          <div class="small-box bg-info ">
              <div class="inner">

                
                <h3><?php  echo $applicants; ?></h3>

                <p><h4>Total General Applicants</h4></p>
              </div>
                <div class="icon">
                  <i class="ion ion-ios-people-outline"></i>
                </div>
                <a href="participants.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>

              <div class="small-box bg-warning ">
              <div class="inner">
                <h3><?php  echo $events; ?></h3>
                
                <p><h4>Total Event</h4></p>
              </div>
                <div class="icon">
                  <i class="ion ion-android-calendar"></i>
                </div>
                <a href="events.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
          </div>

        <div class="col-md-4">
        <div class="m-4 pb-3"> 
        <h2 class="head m-0 text-center">N Club</h2>
        </div>
          <div class="small-box bg-success ">
              <div class="inner">
                <h3><?php  echo $ncmember; ?></h3>

                <p><h4>Total NClub Member</h4></p>
              </div>
                <div class="icon">
                  <i class="ion ion-ios-people-outline"></i>
                </div>
                <a href="addmember.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>

              <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $nc_exp + $m_exp ; ?></h3>

                <p><h5>Total Pending Member Experiences</h5></p>
              </div>
                <div class="icon">
                  <i class="ion ion-android-people"></i>
                </div>
                <a href="manageevents.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right  "></i></a>
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