<?php
    session_start(); 
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!==true){
      header("location:../index.php");
      exit;
      }

include ('C:\xampp\htdocs\naturespalette\include\common/config.php');
$t = 'Member Experiences';
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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="head m-0">Requested Member Experiences</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content"  style="height: 350px; overflow:auto;">
      <div class="container-fluid">
        
        <!-- Timelime example  -->
        <div class="row">
          <div class="col-md-12">
            <!-- The time line -->
            <div class="timeline">
              
              <div>
                <i class="fas fa-envelope bg-green"></i>
                <?php
            
               $result = $conn->query("SELECT * from member_exp1 where approved=0;") or die($conn->error);
                if ($result->num_rows>0) {
                  
                   while ($row = $result->fetch_assoc()):
                          
                        ?>
                      
                <div class="timeline-item">
                 <?php $eid=$row['exp_id']; ?>
                  <span class="time" style="color:white;"><i class="fas fa-clock" ></i><?php echo $row['add_time']; ?></span>
                  <h3 class="timeline-header"  style="color:white;"><?php echo $row['message']; ?></h3>
            
                  <div class="timeline-body">
                    <h5 style="text-transform: capitalize;"><b><?php echo $row['title']; ?></b></h5>
                  
                  </div>
                  <div class="timeline-footer">
                    <a href="viewexperience.php?exp=<?php echo $eid; ?>" class="btn btn-view btn-sm">View</a>
                       
                    <a class="btn btn-success btn-sm" href="accept.php?accept=<?php echo $eid?>">Accept</a>
                    <a class="btn btn-danger btn-sm" href="reject.php?reject=<?php echo $eid ?>" class="btn btn-secondary my-2">Reject</a>
                  </div>
                 </div>
                  <br>
                  <?php
                    endwhile;
                }
                    
               
                

            
               $result = $conn->query("SELECT * from nc_gen_exp where approved=0;") or die($conn->error);
                if ($result->num_rows>0) {
                  
                   while ($row = $result->fetch_assoc()):
                          
                        ?>
                      
                <div class="timeline-item">
                 <?php $eid=$row['exp_id']; ?>
                  <span class="time" style="color:white;"><i class="fas fa-clock" ></i><?php echo $row['add_time']; ?></span>
                  <h3 class="timeline-header"  style="color:white;"><?php echo $row['message']; ?></h3>
            
                  <div class="timeline-body">
                    <h5 style="text-transform: capitalize;"><b><?php echo $row['exp_title']; ?></b></h5>
                  
                  </div>
                  <div class="timeline-footer">
                    <a href="viewgenexp.php?exp=<?php echo $eid; ?>" class="btn btn-view btn-sm">View</a>
                       
                    <a class="btn btn-success btn-sm" href="accept.php?accept=<?php echo $eid?>">Accept</a>
                    <a class="btn btn-danger btn-sm" href="reject.php?reject=<?php echo $eid ?>" class="btn btn-secondary my-2">Reject</a>
                  </div>
                 </div>
                  <br>
                  <?php
                    endwhile;
                }else{ ?>
                  <div class="timeline-item">
                 <?php echo "<br><h5>No Experiences are pending.</h5><br>";?>
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
      <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
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
        <div class="row">
          <div class="col-md-12">
            <!-- The time line -->
            <div class="timeline">
              
              <div>
                <i class="fas fa-envelope bg-green"></i>
                <?php
            
               $result = $conn->query("SELECT * from member_exp1 where approved=1;") or die($conn->error);
                if ($result->num_rows>0) {
                  # code...
                   while ($row = $result->fetch_assoc()):
                        ?>
                 
                <div class="timeline-item">
                 <?php $eid=$row['exp_id']; ?>
                  <span class="time" style="color:white;"><i class="fas fa-clock"></i><?php echo $row['add_time']; ?></span>
                  <h3 class="timeline-header" style="color:white; text-transform: capitalize;">Experience Shared By Batch Member <big><b><?php echo $row['member_name']; ?></b></big></h3>

                  <div class="timeline-body">
                    <h5 style="text-transform: capitalize;"><b><?php echo $row['title']; ?></b></h5><br>
                   </div>
                  <div class="timeline-footer">
                    <a href="viewexperience.php?exp=<?php echo $eid; ?>" class="btn btn-view btn-sm">View</a>
                       
                    <input type="button" value="Delete" class="btn btn-danger btn-sm" onClick="deleteme(<?php echo $eid; ?>)">
                  </div>
                 </div>
                  <br>
                  <?php
                    endwhile;
              
                    
              
                
            $result = $conn->query("SELECT * from nc_gen_exp where approved=1;") or die($conn->error);
                if ($result->num_rows>0) {
                  # code...
                   while ($row = $result->fetch_assoc()):
                        ?>
                 
                <div class="timeline-item">
                 <?php $eid=$row['exp_id']; ?>
                  <span class="time" style="color:white;"><i class="fas fa-clock"></i><?php echo $row['add_time']; ?></span>
                  <h3 class="timeline-header" style="color:white; text-transform: capitalize;">Experience Shared By NC General Member  <big><b><?php echo $row['m_name']; ?></b></big></h3>

                  <div class="timeline-body">
                    <h5 style="text-transform: capitalize;"><b><?php echo $row['exp_title']; ?></b></h5><br>
                   </div>
                  <div class="timeline-footer">
                    <a href="viewgenexp.php?exp=<?php echo $eid; ?>" class="btn btn-view btn-sm">View</a>
                       
                    <input type="button" value="Delete" class="btn btn-danger btn-sm" onClick="deleteme(<?php echo $eid; ?>)">
                  </div>
                 </div>
                  <br>
                  <?php
                    endwhile;
                }}else{ ?>
                  <div class="timeline-item">
                 <?php echo "<br><h5>No Experiences are pending.</h5><br>";?>
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
<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; naturespalette.in</strong> All rights
    reserved.
  </footer>
  <script>
  function deleteme(project_id)
        {
            if (confirm("Are you sure you want to delete?")) {
                window.location.href='reject.php?reject='+project_id+'';
                return true;
            }
      }
  </script>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
     
  


<!-- jQuery -->
<script src="../../AdminLTE-3.0.5/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../AdminLTE-3.0.5/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../AdminLTE-3.0.5/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../AdminLTE-3.0.5/dist/js/demo.js"></script>
</body>
</html>