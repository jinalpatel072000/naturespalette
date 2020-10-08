<?php
//include ('C:\xampp\htdocs\naturespalette\modules/auth/auth.php');
session_start(); 
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!==true){
  header("location:../index.php");
  exit;
  }

include ('C:\xampp\htdocs\naturespalette\include\common/config.php');
 $id=$_GET['customer_id'];
 $homehref="gwindow.php?customer_id=".$id ;

$t='News Letters';
  
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
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Your Events
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="seminar.php?customer_id=<?php echo $_GET['customer_id']; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Seminar </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="trip.php?customer_id=<?php echo $_GET['customer_id']; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Trips</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="gnewsletter.php?customer_id=<?php echo $_GET['customer_id']; ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                News Letters
              </p>
            </a>
          </li>
            
        
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"  >
    <!-- Content Header (Page header) -->
    
    <!-- /.content-header -->
    <div class="col justify-content-center"> 
  
      <div class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-md-12">
              <h2 class="head m-0 text-center">All News Letters</h2>
            </div><!-- /.col -->
              
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <div class="row">
        <div class="col-md-10 mx-auto">
                <!-- PRODUCT LIST -->
          <div class="content" >
            <div class="container"> 

              <div class="card card-custom card-outline">
                <div class="card-header">
                  <h3 class="card-title"><b>News Letters</b></h3>
                
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
                      $result = $conn->query("select * from newsletter") or die($conn->error);
                       if ($result->num_rows>0) {
                         while ($row = $result->fetch_assoc()): ?>      
                        <li class="item">
                          <div class="element">
                            <a href="viewnewsletter.php?customer_id=<?php echo $_GET['customer_id'];   ?>&read=<?php echo $row['sr_no']; ?>" class="product-title">     <h5><?php echo $row['title']  ?></h5>
                                 <span class="badge float-right"  > &nbsp; &nbsp;  <i class="fas fa-clock"></i> <?php echo $row['nl_time']; ?> </span>
                            </a>
                          </div>
                        </li>
                        <?php endwhile;
                        }else {
                          echo "<br><h5>No News Letters.</h5><br>";
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
      </div>
    </div>
  </div>
</div>
  <!-- /.content-wrapper -->
<!-- footer -->
  <?php
include ('C:\xampp\htdocs\naturespalette\include\common/footer.php');
  ?>

  