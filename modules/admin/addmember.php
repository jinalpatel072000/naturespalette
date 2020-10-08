<?php
  session_start(); 
  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!==true){
    header("location:../index.php");
    exit;
    }
  include ('C:\xampp\htdocs\naturespalette\include\common/config.php');
  $t = 'Add New Members';
$homehref='adminwindow.php' ; 
//header
include ('C:\xampp\htdocs\naturespalette\include\common/header.php');
include 'addmemberprocess.php';

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
            <h1 class="head m-0 text-center">All Nclub Members</h1>
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
                <h3 class="card-title">Members</h3>
              </div>
              <!-- /.card-header -->               
<?php
  include ('C:\xampp\htdocs\naturespalette\include\common/config.php');
    $result = $conn->query("SELECT * from members_data") or die($conn->error);
    ?>
        <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>memberid</th>
                      <th>name</th>
                      <th>phone no</th>
                      <th>email</th>
                     <th>member expiry</th>
                      <th>gender</th>
                      <th>age</th>
                      <th>location</th>
                      <th colspan="2">action</th>
                    </tr>
                  </thead>
                  <tbody>


            
                    <?php
    while ($row = $result->fetch_assoc()):
    ?>
        <tr>
          <?php $mid=$row['member_id'];  ?>
          <td><?php echo $row['member_id']  ?></td>
          <td><?php echo $row['name']  ?></td>
          <td><?php echo $row['ph_no']  ?></td>
          <td><?php echo $row['email']  ?></td>
          <td><?php echo $row['member_expiry']  ?></td>
          <td><?php echo $row['gender']  ?></td>
          <td><?php echo $row['age']  ?></td>
          <td><?php echo $row['location']  ?></td>
          
          <td>
            <a class="btn btn-back btn-sm" href="addmember.php?edit=<?php echo $row['member_id'];  ?>">Edit</a>
            <input type="button" class="btn btn-sm btn-danger" onClick="deleteme(<?php echo $row['member_id']; ?>)" value="Delete">
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
            <h1 class="head m-0 text-center">Add New Member</h1>
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
              <div class="card-header">
                <h3 class="card-title">Fill Member's Data </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                  <form action="addmemberprocess.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $id;  ?>">
                

                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name:</label><br>
                    <input type="text" name="name" value="<?php echo $name ?>" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Contact no: </label><br>
                    <input type="tel" name="contact" value="<?php echo $ph_no ?>"  placeholder="enter your 10 digit no.">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">email</label><br>
                    <input type="email" name="email" value="<?php echo $email ?>"  >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">membership expiry</label>
                    <input type="date"  name="me" placeholder="enter  date" value="<?php echo  $member_exp ?>" Required >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Gender:</label>
                    <input type="radio" name="gender" value="male" <?php if($gender =='male'){ echo "checked";} ?> >MALE
                    <input type="radio" name="gender" value="female"  <?php if($gender =='female'){ echo "checked";} ?> >FEMALE
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Age:</label>
                    <input type="number" value="<?php echo $age ?>"  name="age">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Location:</label><br>
                    <input type="text" name="location" value="<?php echo $location ?>"  placeholder="enter your location">
                  </div>
                  <div class="form-group">
                   <label for="batch">Choose batch </label><br>
                      <?php
                          $query="select distinct * from batch";
                          $res=mysqli_query($conn,$query);
                          $count=mysqli_num_rows($res);
                          
                          
                            while($row=mysqli_fetch_array($res))
                            {$c=$row['batch_name'];
                          $d=$row['batch_id'];
                      ?>
                      <input type="hidden" name="batchid[]" value="<?php echo $d ?>"/>
                      <input type="checkbox" name="batch[]" value="<?php echo $c ?>"/
                      <?php
                      if (isset($_GET['edit'])) {
                        if(in_array("$c",$b)){
                          echo "checked";
                        }
                      }
                      ?>
                      > 
                       <?php echo $row['batch_name']; ?> </td>
                       <?php  } ?>
                  </div>
                
                
                  <?php
                  if ($update == true): 
                  ?>  
                  <input class="btn btn-primary " type="submit" name="update" value="Update" onclick="return mess();">
                  <?php else: ?>
                  <input class="btn btn-back" type="submit" name="submit" value="Add" onclick="return update();">
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
                window.location.href='addmember.php?delete='+project_id+'';
                return true;
            }
      }
      function update()
        {
            if (confirm("UPDATED")) {
                window.location.href='addmember.php';
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