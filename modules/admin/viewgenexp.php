<?php
session_start(); 
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!==true){
  header("location:../index.php");
  exit;
  }
  include ('C:\xampp\htdocs\naturespalette\include\common/config.php');
  
   $t = 'View Experience';
$homehref="adminwindow.php"; 
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
    
    <!-- /.content -->
      <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-2">
            <button class="btn btn-back" onclick="goBack()"><i class="fas fa-arrow-left"></i></button>
          </div>
          <div class="col-sm-8">
            <h3 class="head m-0">Member Experience</h3>
          </div><!-- /.col -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        
        <!-- Timelime example  -->
        <div class="row">
          <div class="col-md-12">
            <!-- The time line -->
            <div class="timeline">
              
              <!-- timeline item -->
              <div>
                <i class="fa fa-camera bg-success"></i>
                <?php
               if (isset($_GET['exp'])) {
                $id=mysqli_real_escape_string($conn,$_GET['exp']);
    
               $result = $conn->query("SELECT * from nc_gen_exp where exp_id='".$id."'") or die($conn->error);
                if ($result) {
                  # code...
                   while ($row = $result->fetch_assoc()):
                        ?>
                <div class="timeline-item">
                   <?php $eid=$row['exp_id']; ?>
                  <span class="time"><i class="fas fa-clock"></i><?php echo $row['add_time']; ?></span>
                  <h4 class="timeline-header" style="color:white; text-transform: capitalize;"><small>Experience Shared By</small> <b><big><?php echo $row['m_name']; ?></big></b></h4>
                  <div class="timeline-body">
                    <h5 style="text-transform: capitalize;"><b><?php echo $row['exp_title']; ?></b></h5><br>
                    
                    <?php echo $row['exp_desc']; ?><br><br>
                    <?php 
                     $i=1;
                     $queryImg = "Select * from gen_multi_img where e_id= $eid ";
                     $resultImg = $conn->query($queryImg);
                     if ($resultImg->num_rows > 0) {
                      while ($row = $resultImg->fetch_object()) {?>
                     <a href="../files/<?php echo $row->img; ?>">
                    <img class="img-fluid mb-2 rounded" src="<?php echo '../files/'.$row->img;?>" style="width: 150px height: 100px;"></a>
                     <?php $i++;
                      }?>  
                  </div>
                &nbsp; &nbsp;
                      
                     <?php 
                    }


                     ?>
                  </div>
                  
                  </div>
                  <br>
                  <?php
                    endwhile;
                }else{
                    exit;
                }
              }
                
            ?>
             
              
              <div>
                <i class="fas fa-clock bg-gray"></i>
              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
      </div>
      <!-- /.timeline -->

    </section>

  <!-- /.content-wrapper -->

</div> 
<!-- footer -->
<?php
include ('C:\xampp\htdocs\naturespalette\include\common/footer.php');
  ?>