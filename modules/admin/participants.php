<?php
  session_start(); 
  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!==true){
    header("location:../index.php");
    exit;
    }
  include ('C:\xampp\htdocs\naturespalette\include\common/config.php');
  $t = 'Participants List';
$homehref='adminwindow.php' ; 
//header
include ('C:\xampp\htdocs\naturespalette\include\common/header.php');
include "participantsprocess.php";

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
                <a href="members.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Of Members</p>
                </a>
              </li>
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
            <h1 class="head m-0 text-center">List Of Participants</h1>
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
            <div class="card card-custom card-outline">
              <div class="card-header ">
                <h3 class="card-title  ">Participants Data</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr style="text-transform: capitalize;">
                      <th>id</th>
                      <th>name</th>
                      <th>age</th>
                      <th>gender</th>
                      <th>location</th>
                      <th>ph_no</th>
                      <th>email</th>
                      <th colspan="2">action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                      include ('C:\xampp\htdocs\naturespalette\include\common/config.php');
                      $sql = "SELECT customer_id, name, age, gender, location, ph_no, email, attendance, subscription from applicants ";
                      $result = $conn-> query($sql);
                      $srno=1;
                        if ($result-> num_rows > 0) {
                            while ($row = $result-> fetch_assoc()) {
                    ?>
                    <tr>
                        <!-- <td><?php $row['customer_id']?></td> -->
                        <td><?php echo $srno ?></td>
                        <td style="text-transform: capitalize;"><?php echo $row['name']  ?></td>
                        <td><?php echo $row['age']  ?></td>
                        <td><?php echo $row['gender']  ?></td>
                        <td style="text-transform: capitalize;"><?php echo $row['location']  ?></td>
                        <td><?php echo $row['ph_no']  ?></td>
                        <td><?php echo $row['email']  ?></td>

              
              <td>
                <a class="btn btn-back btn-sm" href="participants.php?edit=<?php echo $row['customer_id'];  ?>">Edit</a>
                <input type="button" class="btn btn-sm btn-danger" value="Delete" onClick="deleteme(<?php echo $row['customer_id']; ?>)">
              </td>
            </tr>
           
       <?php $srno++;
       }
        echo "</table>";
       }
       else{
        echo "0 result";
       }
     $conn-> close();   
    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <?php if (isset($_GET['edit'])) { ?>
  
    <br>
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-8 mx-auto">
            <!-- general form elements -->
            <div class="card card-custom">
              <div class="card-header ">
                <h3 class="card-title">Update customer's Data </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                  <form action="participantsprocess.php" method="post">
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
                  
                
                <!-- /.card-body --> 
                
                  <input class="btn  btn-back" type="submit" name="update" value="Update" onclick="return mess();"> 
                </div>
              </form>
            </div>
            <!-- /.card -->
    <script type="text/javascript">
      function mess()
      {
        if (confirm("Are you sure you want to UPDATE?")) {
          window.location.href='participants.php';
          return true;
        }
      }
    </script>

            </div>
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
  
<?php } ?>
  </div>
  <!-- /.content-wrapper -->

  <!-- footer -->
  <script>
    function deleteme(id)
        {
            if (confirm("Are you sure you want to delete?")) {
                window.location.href='participants.php?delete='+id+'';
                return true;
            }
      }
  </script>
  <?php
include ('C:\xampp\htdocs\naturespalette\include\common/footer.php');
  ?>
