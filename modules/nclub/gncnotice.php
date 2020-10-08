<?php
session_start(); 
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!==true){
  header("location:../index.php");
  exit;
}
  include ('C:\xampp\htdocs\naturespalette\include\common/config.php');
   $id=$_GET['member_id'];
  $Id=$_GET['nid'];
$t='Notice Details';
$homehref='ncwindow.php?member_id='.$id ; //header
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
                    {?>
                      <li class="nav-item ">
                       <a  href="details.php?member_id=<?php echo $_GET['member_id']; ?>&ID=<?php echo $data['batch_id']  ?>"  class="nav-link"><i class="far fa-circle nav-icon"></i><p><?PHP echo $data['batch_id'].".&nbsp&nbsp; " .$data['batch_name'] ;?></p></a>
                     </li>
                  <?php } 
                }
                else { ?>
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
                if (isset($_GET['nid'])) {
                 $nid=mysqli_real_escape_string($conn,$_GET['nid']);
                 $result = $conn->query("SELECT * from nc_notice where notice_id='$nid'") or die($conn->error);
                 if ($result->num_rows>0) {
                    $row = $result->fetch_assoc();
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
                            echo "<div class='mt-3 text-center'><a href='".$row['attachments']."' target='_blank'><img class='img-fluid ' src='" .$row['attachments']."' alt='photo'></a></div>";

                          }
                          else{
                            echo "<div class='mt-3 text-center'>Attachment:<br><a href='".$row['attachments']."' target='_blank'>".$row['attachments']."</a></div>";
                          }

                         ?> 

                       </p> 
                    </div>
                  </div>
                <?php 
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

<!-- footer -->
  <?php
include ('C:\xampp\htdocs\naturespalette\include\common/footer.php');
  ?> 