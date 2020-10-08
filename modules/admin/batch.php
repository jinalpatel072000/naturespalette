
<?php
session_start(); 
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!==true){
  header("location:../index.php");
  exit;
  }


 include('batchprocess.php');     
$t = 'Add Batch';
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
          <div class="col-sm-12">
            <h1 class="head m-0 text-center">All Batches</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
         <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card card-custom">
              <div class="card-header">
                <h3 class="card-title">Batches</h3>
              </div>
              <!-- /.card-header --> 


  <?php require_once 'batchprocess.php';  ?>
  <?php
  if (isset($_SESSION['message'])): ?>
    <div class="alert alert=<?=$_SESSION['msg_type']  ?>">
      <?php
      echo $_SESSION['message'];
      unset($_SESSION['message']);   
      ?>
      
    </div> 
  <?php endif  ?>
  <?php
  include ('C:\xampp\htdocs\naturespalette\include\common/config.php');
    $result = $conn->query("SELECT * from batch order by batch_id ") or die($conn->error);
    ?>
    <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr style="text-transform: capitalize;">
                     <th>batch id</th>
                      <th>batch Name </th>
                      <th colspan="2">action</th>
                    </tr>
                  </thead>
                  <tbody>
    
    
    <?php
    while ($row = $result->fetch_assoc()):
    ?>
        <tr>
          <td><?php echo $row['batch_id']  ?></td>
          <td style="text-transform: capitalize;"><?php echo $row['batch_name']  ?></td>

          
          
          
          <td>
            <a class="btn btn-back btn-sm" href="batch.php?edit=<?php echo $row['batch_id'];  ?>">Edit</a>
            <input type="button" value="Delete" class="btn btn-primary btn-sm btn-danger" onClick="deleteme(<?php echo $row['batch_id']; ?>)" >
          </td>
        </tr>
    <?php endwhile; ?> 
    </div>
    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              
            <!-- /.card -->

          </div>
     <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="head m-0 text-center">Create New Batch</h1>
          </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6 mx-auto">
            <!-- general form elements -->
            <div class="card card-custom">
              <div class="card-header ">
                <h3 class="card-title">Fill Batch Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action="" method="POST" >
                <input type="hidden" name="id" value="<?php echo $id;  ?>">
                

                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">batch name:</label><br>
                    <input type="text" name="bname" value="<?php echo $batch_name ?>" placeholder="enter batch name" Required>
                  </div>
                  
                <!-- /.card-body --> 
                  <?php
                  if ($update == true): 
                  ?>  
                  <input class="btn btn-primary " type="submit" name="update" value="Update" onclick="return mess();">
                  <?php else: ?>
                  <input class="btn btn-back " type="submit" name="create" value="create" onclick="return mess();">
                  <?php endif; ?>  
                </div>
              </form>
            </div>
            <!-- /.card -->
    <script type="text/javascript">
      function mess()
      {
        alert ("record stored successfully");
        return true;
      }
      function deleteme(project_id)
        {
            if (confirm("Are you sure you want to delete?")) {
                window.location.href='batch.php?delete='+project_id+'';
                return true;
            }
      }
    </script>

            </div>
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
  </div>
  <!-- /.content-wrapper -->      
<!-- footer -->
  <?php
include ('C:\xampp\htdocs\naturespalette\include\common/footer.php');
  ?>