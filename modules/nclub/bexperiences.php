
<?php
session_start(); 
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!==true){
  header("location:../index.php");
  exit;
}
  include ('C:\xampp\htdocs\naturespalette\include\common/config.php');
   $id=$_GET['member_id'];

  $Id=$_GET['ID'];
  $t = 'Batch Experiences';
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
            <a href="bnotice.php?member_id=<?php echo $_GET['member_id']; ?>&ID=<?php echo $_GET['ID']?>" class="nav-link">
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
            <a href="bevents.php?member_id=<?php echo $_GET['member_id']; ?>&ID=<?php echo $_GET['ID'] ?>" class="nav-link">
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
    
    <!-- /.content -->
      <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
           <div class="col-sm-2">
            <button class="btn btn-back" onclick="goBack()"><i class="fas fa-arrow-left"></i></button>
          </div>
          <div class="col-sm-6">
            <h1 class="head m-0">All Shared Member Experiences</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content" style="height: 350px; overflow:auto;">
      <div class="container-fluid">
        
        <!-- Timelime example  -->
        <div class="row " >
          <div class="col-md-12">
            <!-- The time line -->
            <div class="timeline">
              
              <div>
                <i class="fas fa-envelope bg-green"></i>
                <?php
            
               $result = $conn->query("SELECT * from member_exp1 where batch_id=$Id and approved=1;") or die($conn->error);
                if ($result->num_rows>0) {
                  # code...
                   while ($row = $result->fetch_assoc()):
                        ?>
                 
                <div class="timeline-item">
                 <?php $eid=$row['exp_id']; ?>
                  <span class="time" style="color:white;"><i class="fas fa-clock"></i><?php echo $row['add_time']; ?></span>
                  <h4 class="timeline-header" style="color:white; text-transform: capitalize;"><small>Experience Shared By</small> <b><big><?php echo $row['member_name']; ?></big></b></h4>

                  <div class="timeline-body">
                    <h5 style="text-transform: capitalize;"><b><?php echo $row['title']; ?></b></h5><br>
                    <a href="viewexp.php?member_id=<?php echo $_GET['member_id']; ?>&exp=<?php echo $eid; ?>" class="btn btn-view">View</a>
                    
                  </div>
                  
                  </div>
                  <br>
                  <?php
                    endwhile;
                }else{ ?>
                  <div class="timeline-item">
                 <?php echo "<br><h5>No Experiences Shared yet.</h5><br>";?>
               </div>
                    
               <?php }
                
            ?>
              </div>
              
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
    <!-- /.content -->

  <!-- /.content-wrapper -->

    

</div> 

  <!-- footer -->
  <?php
include ('C:\xampp\htdocs\naturespalette\include\common/footer.php');
  ?>
