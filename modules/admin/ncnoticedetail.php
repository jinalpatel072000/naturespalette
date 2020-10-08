
<?php
session_start(); 
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!==true){
  header("location:../index.php");
  exit;
  }
  include ('C:\xampp\htdocs\naturespalette\include\common/config.php');
 
  
$t = 'Notice Details';
$homehref='adminwindow.php' ; 
//header
include ('C:\xampp\htdocs\naturespalette\include\common/header.php');
 ?>
 <style>
  .widget-user-header{
    background-color: #3f5d61;
    color: white;
    
  }
</style>

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
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container ">
        <div class="row mb-2">
          <div class="col-sm-2">
            <button class="btn btn-back" onclick="goBack()"><i class="fas fa-arrow-left"></i></button>
          </div>
          <div class="col-sm-8">
            <h3 class="head m-0 text-center">Notice Details</h3>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  <div class="col justify-content-center"> 
  

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <?php 

            if (isset($_GET['read'])) {
                $id=mysqli_real_escape_string($conn,$_GET['read']);
              $result = $conn->query("select * from nc_notice where notice_id='".$id."'") or die($conn->error); 
              if ($result->num_rows>0) {
               while ($row = $result->fetch_assoc()):
                  ?>
                  <!-- Widget: user widget style 2 -->
                  <div class="card card-widget card-custom widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header">
                      <h4 class="text-center" style="text-transform: capitalize;"><b><?php echo $row['notice_title']  ?></b></h3>
                      <h6 class="text-center"><i class="fas fa-clock"></i>  <?php echo $row['time']; ?></h6>
                    </div>
                    <div class=" card-body">
                      <p><?php echo $row['notice_desc'];  ?></p>
                      <p><?php
                          $allowed=array('pdf','docx');
                          $ext=pathinfo($row['attachments'], PATHINFO_EXTENSION);
                          if (! in_array($ext, $allowed)) {
                            echo "<div class='mt-3 text-center'><a href='../files/".$row['attachments']."' target='_blank'><img class='img-fluid ' src='../files/" .$row['attachments']."' alt='photo'></a></div>";

                          }
                          else{
                            echo "<div class='mt-3 text-center'>Attachment:<br><a href='../files/".$row['attachments']."' target='_blank'>".$row['attachments']."</a></div>";
                          }

                         ?> 

                       </p> 
                    </div>
                  </div>
                <?php endwhile;
              }else 
               { 
                 
                  echo "<br><h5>No Notice Added.</h5><br>";
                }
            } ?>   
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
</div>
    <!-- /.content-wrapper -->

  <!-- footer -->
  <?php
include ('C:\xampp\htdocs\naturespalette\include\common/footer.php');
  ?>