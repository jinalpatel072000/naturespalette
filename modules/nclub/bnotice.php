
<?php
session_start(); 
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!==true){
  header("location:../index.php");
  exit;
}
  include ('C:\xampp\htdocs\naturespalette\include\common/config.php');
   $id=$_GET['member_id'];

  $Id=$Id=$_GET['ID'];
   
     $t = 'Notice Board';
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
    <div class="content-header">
      <div class="container ">
        <div class="row mb-2">
          <div class="col-sm-2">
            <button class="btn btn-back" onclick="goBack()"><i class="fas fa-arrow-left"></i></button>
          </div>
          <div class="col-sm-8">
            <h3 class="head m-0 text-center">Notice Board</h3>
          </div><!-- /.col -->
        
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-11 mx-auto">

            <!-- TABLE: LATEST ORDERS -->
            <div class="card card-custom">
              <div class="card-header border-transparent">
                <h3 class="card-title">Added Notices</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr class="text-center">
                      <th>Sr.no</th>
                      <th>Title of Notice</th>
                      <th>Posted On</th>
                      <th>Details</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php 
        
                           $result = $conn->query("SELECT * from nc_notice where batch_id=$Id") or die($conn->error);
                           if ($result->num_rows>0) {
                            $x=1;
                              while ($row = $result->fetch_assoc()):
                               ?>
                            <tr class="text-center">
                      
                             <td><?php echo $x; ?></td>
                             <td style="text-transform: capitalize;"><?php echo $row['notice_title'];  ?></a></td>
                             <td><span class="badge badge-info"><i class="fas fa-clock"></i>  <?php echo $row['time']; ?></span></td>
                             <td>
                              <div class="sparkbar" data-color="#00a65a" data-height="20"><a href="gncnotice.php?member_id=<?php echo $_GET['member_id']; ?>&nid=<?php echo $row['notice_id']; ?>" class="btn btn-sm btn-view">View</a></div>
                              </td>
                           </tr>     
             
                          <?php $x++; endwhile;
                        }else { 
                               echo "<tr><br><h5>No Notice Added.</h5><br></tr>";
                                 }
                               ?>
                        </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->       
            
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  
</div>
  
  <!-- footer -->
  <?php
include ('C:\xampp\htdocs\naturespalette\include\common/footer.php');
  ?>
