
<?php
session_start(); 
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!==true){
  header("location:../index.php");
  exit;
}
  include ('C:\xampp\htdocs\naturespalette\include\common/config.php');
   $id=$_GET['member_id'];
   include('addexpprocess.php');
   $Id=$_GET['ID'];
   $t = 'Add Experience Batchwise';
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
            <a href="baddexperience.php?member_id=<?php echo $_GET['member_id']; ?>&ID=<?php echo $_GET['ID'] ?>" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Add Member Experience
              
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="bevents.php?member_id=<?php echo $_GET['member_id']; ?>&ID=<?php echo $_GET['ID'] ; ?>" class="nav-link">
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
          <div class="col-sm-8">
            <h1 class="head m-0 text-center">Share Your Experience</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content" >
      <div class="container-fluid">
        
        <!-- Timelime example  -->
        <div class="row " >
          <div class="col-md-8 mx-auto">
            <div class="card card-custom">
              <div class="card-header">
                <h3 class="card-title" >Details</h3>
              </div>
            <form role="form" action="addexpprocess.php?member_id=<?php echo $id;  ?>&ID=<?php echo $data['batch_id']  ?>" method="post" enctype="multipart/form-data">
               <input type="hidden" name="id" value="<?php echo $id;  ?>"> 
               <input type="hidden" name="shared_by" value="<?php echo $_SESSION['name'];  ?>"> 
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">your name:</label><br>
                    <input type="text" name="mname" value="<?php echo $mname ?>" id="exampleInputEmail1" placeholder="fill name" Required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Title:</label><br>
                    <input  id="exampleInputPassword1" type="text" name="title" value="<?php echo $title ?>" placeholder="give Experience title" Required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword">Description</label><br>
                    <textarea  class="form-control"  id="exampleInputPassword" type="text" name="desc" value="<?php echo $description ?>"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Add File</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="imageFile[]" class="custom-file-input" id="exampleInputFile" required multiple >
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer rounded">
                  <button type="submit" name="uploadImageBtn" value="send" onclick="return mess();" class="btn btn-submit">Share</button>
                </div>
                <script type="text/javascript">
      function mess()
      {
        alert ("Your experience  request is now pending for approval. Please wait for confirmation. Thank you.");
        return true;
      }
    </script>
              </form>
          </div>
          <!-- /.col -->
        </div>
      </div>
      <!-- /.timeline -->
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

<!-- ./wrapper -->
<!-- footer -->
<?php
include ('C:\xampp\htdocs\naturespalette\include\common/footer.php');
  ?>
    