
<?php
session_start(); 
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!==true){
  header("location:../index.php");
  exit;
}
  include ('C:\xampp\htdocs\naturespalette\include\common/config.php');
   $id=$_GET['member_id'];
$t = 'Nclub window';
$homehref='ncwindow.php?member_id='.$id ; 
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

  <div class="m-4 pb-3"> 
        <h2 class="head m-0 text-center">N Club</h2>
        </div>

   <div class="row">
  
  </div>
  <div class="row">
    
  </div>
         
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
                <a href="allnotice.php?member_id=<?php echo $_GET['member_id']; ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>

              <div class="small-box bg-warning">
              <div class="inner">

                
              <h2>Member</h2>
                <h2>Experiences</h2>
              </div>
                <div class="icon">
                  <i class="ion ion-ios-people-outline"></i>
                </div>
                <a href="allexperiences.php?member_id=<?php echo $_GET['member_id']; ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                <a href="addexperience.php?member_id=<?php echo $_GET['member_id']; ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>

              <div class="small-box bg-danger">
              <div class="inner">
              
              <h2>News</h2>
                <h2>Letter</h2>

              </div>
                <div class="icon">
                  <i class="ion ion-android-map"></i>
                </div>
                <a href="ncnewsletter.php?member_id=<?php echo $_GET['member_id']; ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right  "></i></a>
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
