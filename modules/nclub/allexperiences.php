
<?php
session_start(); 
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!==true){
  header("location:../index.php");
  exit;
}
  include ('C:\xampp\htdocs\naturespalette\include\common/config.php');
   $id=$_GET['member_id'];
    $t = 'Member Experiences';
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
          <li class="nav-item">
            <a href="allnotice.php?member_id=<?php echo $_GET['member_id']; ?>" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Notice Board
               
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="allexperiences.php?member_id=<?php echo $_GET['member_id']; ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Member Experiences 
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="addexperience.php?member_id=<?php echo $_GET['member_id']; ?>" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Add Member Experience
              
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="ncnewsletter.php?member_id=<?php echo $_GET['member_id']; ?>" class="nav-link">
              <i class="fas fa-newspaper"></i>
              <p>
                News Letters
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-adjust"></i>
              <p>
                Your Batches
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              
                <?php
                include ('C:\xampp\htdocs\naturespalette\include\common/config.php');
  $id=$_GET['member_id'];
                $records = mysqli_query($conn, "select batch_id,batch_name from batch e, batch_member a, members_data p  where e.batch_id = a.id AND a.member_id = p.member_id AND  a.member_id=$id order by batch_id ");
                if ($records->num_rows>0) { 
        while($data = mysqli_fetch_array($records))
        {?><li class="nav-item ">
            <a  href="details.php?member_id=<?php echo $_GET['member_id']; ?>&ID=<?php echo $data['batch_id']  ?>"  class="nav-link"><i class="far fa-circle nav-icon"></i><p><?PHP echo $data['batch_id'].".&nbsp&nbsp; " .$data['batch_name'] ;?></p></a>
            
                </li>
              <?php } 
                }else { ?>
                 <li class="nav-item ">
                 <a class="nav-link">
                 <p><?php echo "<br>You haven't registerd for Batch.";?></p>
               </a>
               </li>
               <br>
               <?php }
              ?>
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
            
               $result = $conn->query("SELECT * from nc_gen_exp where approved=1;") or die($conn->error);
                if ($result->num_rows>0) {
                  # code...
                   while ($row = $result->fetch_assoc()):
                        ?>
                 
                <div class="timeline-item">
                 <?php $eid=$row['exp_id']; ?>
                  <span class="time" style="color:white;"><i class="fas fa-clock"></i><?php echo $row['add_time']; ?></span>
                  <h4 class="timeline-header" style="color:white; text-transform: capitalize;"><small>Experience Shared By</small> <b><big><?php echo $row['m_name']; ?></big></b></h4>

                  <div class="timeline-body">
                    <h5 style="text-transform: capitalize;"><b><?php echo $row['exp_title']; ?></b></h5><br>
                    <a href="viewgenexp.php?member_id=<?php echo $_GET['member_id']; ?>&exp=<?php echo $eid; ?>" class="btn btn-view">View</a>
                    
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

  