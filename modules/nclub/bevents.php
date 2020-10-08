

<?php
session_start(); 
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!==true){
  header("location:../index.php");
  exit;
}
  include ('C:\xampp\htdocs\naturespalette\include\common/config.php');
   $id=$_GET['member_id'];

  
        $Id=$_GET['ID'];
        $t = 'Nclub window';
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
            <a href="bnotice.php?member_id=<?php echo $_GET['member_id']; ?>&ID=<?php echo $_GET['ID']  ?>" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Notice Board
               
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="bexperiences.php?member_id=<?php echo $_GET['member_id']; ?>&ID=<?php echo $_GET['ID'] ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Member Experiences 
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="baddexperience.php?member_id=<?php echo $_GET['member_id']; ?>&ID=<?php echo $_GET['ID'] ?>" class="nav-link">
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
          <div class="col-sm-8">
            <h1 class="m-0 text-center"><b>Upcoming Events</b></h1>
            
          </div><!-- /.col -->
        
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="col justify-content-center"> 
       <div class="card">   
         <div class="content-header">
            <div class="container">
              <div class="row mb-2">
                <div class="col-md-6">
                  <h2 class="head m-0 text-center">Seminars</h2>
                </div><!-- /.col -->
                 <div class="col-md-6">
                  <h2 class="head m-0 text-center ">Trips</h2>
                </div><!-- /.col --> 
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>
          <!-- Main content -->
          <div class="row">
           <div class="col-md-6 ">
                <!-- PRODUCT LIST -->
             <div class="content" >
               <div class="container"> 

                 <div class="card card-custom card-outline">
                    <div class="card-header">
                      <h3 class="card-title"><b>Added Seminars</b></h3>
                
                     <div class="card-tools">
                       <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                     </div>
                   </div>
                    <!-- /.card-header -->
               
                    <div class="card-body p-0"  >
                      <ul class="products-list product-list-in-card pl-2 pr-2">
                       <?php
                          $result = $conn->query("select * from upcoming_event  where batch_id = $Id and Event_type= 'Seminar'; ") or die($conn->error);
                          if ($result->num_rows>0) {
                            while ($row = $result->fetch_assoc()):?>      
                              <li class="item">
                              <div class="element">
                                    <h5  style="text-transform: capitalize;"><b><?php echo $row['event_name']  ?></b></h5>
                                     <span class="badge float-right"  > &nbsp; &nbsp;  <i class="fas fa-clock"></i>  <?php echo $row['e_time']; ?></span>
                                
                                <span class="product-description">
                                 From  <?php echo $row['start_date']  ?> To <?php echo $row['end_date']  ?> 
                                </span>
                              </div>
                             </li>
                            <?php endwhile;
                          }else { 
                            echo "<br><h5>You have not registered for any Seminars.</h5><br>";
                                }?>
                       </ul>
                    </div>
                   <!-- /.card-body -->
                    <div class="card-footer rounded" >
                
                    </div>
                 </div>
                 <!-- /.card -->
               </div>         
             </div>
             <!-- /.row -->
           </div><!-- /.container-fluid -->
           <div class="col-md-6 ">
                <!-- PRODUCT LIST -->
             <div class="content" >
               <div class="container"> 

                 <div class="card card-custom card-outline">
                    <div class="card-header">
                      <h3 class="card-title"><b>Added Seminars</b></h3>
                
                     <div class="card-tools">
                       <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                     </div>
                   </div>
                    <!-- /.card-header -->
               
                    <div class="card-body p-0"  >
                      <ul class="products-list product-list-in-card pl-2 pr-2">
                       <?php
                          $result = $conn->query("select * from upcoming_event  where batch_id = $Id and Event_type= 'Trip'; ") or die($conn->error);
                          if ($result->num_rows>0) {
                            while ($row = $result->fetch_assoc()):?>      
                              <li class="item">
                              <div class="element">
                                    <h5 style="text-transform: capitalize;"><b><?php echo $row['event_name']  ?></b></h5>
                                     <span class="badge float-right"  > &nbsp; &nbsp;  <i class="fas fa-clock"></i>  <?php echo $row['e_time']; ?></span>
                                
                                <span class="product-description">
                                 From  <?php echo $row['start_date']  ?> To <?php echo $row['end_date']  ?> 
                                </span>
                              </div>
                             </li>
                            <?php endwhile;
                          }else { 
                            echo "<br><h5>You have not registered for any Trips.</h5><br>";
                                }?>
                       </ul>
                    </div>
                   <!-- /.card-body -->
                    <div class="card-footer rounded" >
                
                    </div>
                 </div>
                 <!-- /.card -->
               </div>         
             </div>
             <!-- /.row -->
           </div><!-- /.container-fluid -->
         </div>
         <!-- /.content -->
       </div>
     </div>
      
</div>
<!-- footer -->
  <?php
include ('C:\xampp\htdocs\naturespalette\include\common/footer.php');
  ?>