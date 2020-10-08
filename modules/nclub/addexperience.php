
<?php
session_start(); 
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!==true){
  header("location:../index.php");
  exit;
   
   }
   include ('C:\xampp\htdocs\naturespalette\include\common/config.php');
   $id=$_GET['member_id'];
  
$homehref="ncwindow.php?member_id=".$id ;  

 $t = 'Add Experience';  
//header
include ('C:\xampp\htdocs\naturespalette\include\common/header.php');
  
   include('ncwindowprocess.php'); 
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
          <div class="col-sm-12">
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
            <form role="form" action="ncwindowprocess.php?member_id=<?php echo $id;  ?>" method="post" enctype="multipart/form-data">
               <input type="hidden" name="id" value="<?php echo $id;  ?>"> 
               <input type="hidden" name="shared_by" value="<?php echo $_SESSION['name'];  ?>"> 
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1"> Name:</label><br>
                    <input class="form-control" type="text" name="mname" value="<?php echo $mname ?>" id="exampleInputEmail1" placeholder="fill name" Required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Title:</label><br>
                    <input  class="form-control" id="exampleInputPassword1" type="text" name="title" value="<?php echo $title ?>" placeholder="give Experience title" Required>
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