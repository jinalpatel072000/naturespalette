<?php 
session_start(); 
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!==true){
  header("location:../index.php");
  exit;
  }
include('nceventprocess.php'); 
 $t = 'Add NC Event';
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
            <h1 class="head m-0 text-center">All Events</h1>
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
                <h3 class="card-title">Added Events</h3>
              </div>
              <!-- /.card-header -->

  <?php require_once 'nceventprocess.php';  ?>
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
    $result = $conn->query("SELECT * from upcoming_event") or die($conn->error);
    ?>
    <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr style="text-transform: capitalize;">
                     <th>event id</th>
                      <th>event type</th>

                      <th>event name</th>
                      <th>start date</th>
                      <th>end date</th>
                      <th>description link</th>
                      <th>batch id</th>
                      <th colspan="2">action</th> 
                    </tr>
                  </thead>
                  <tbody>
    
    <?php
    while ($row = $result->fetch_assoc()):
    ?>
        <tr>
          <td><?php echo $row['UCevent_id']  ?></td>
          <td><?php echo $row['event_type']  ?></td>

          <td style="text-transform: capitalize;"><?php echo $row['event_name']  ?></td>
          <td><?php echo $row['start_date']  ?></td>
          <td><?php echo $row['end_date']  ?></td>
          <td><a href="https://<?php echo $row['description_link']  ?>"><?php echo $row['description_link']  ?></a></td>
          <td><?php echo $row['batch_id']  ?></td>
          <td>
            <a class="btn btn-back btn-sm" href="ncevent.php?edit=<?php echo $row['UCevent_id'];?>&BID=<?php echo $row['batch_id']?>">Edit</a>
            <input type="button" value="Delete" class="btn  btn-sm btn-danger" onClick="deleteme(<?php echo $row['UCevent_id']; ?>)" >
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
            <h1 class="head m-0 text-center">Add New Event</h1>
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
            <div class="card card-custom ">
              <div class="card-header ">
                <h3 class="card-title">Event Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <form action="nceventprocess.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id;  ?>"> 
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Event Type : </label><br>
                    <input type="radio" name="Type" value="Trip" <?php if($event_type =='Trip'){ echo "checked";} ?> >Trip
                    <input type="radio" name="Type" value="Seminar"  <?php if($event_type =='Seminar'){ echo "checked";} ?> >Seminar
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Event Name:</label><br>
                    <input type="text" name="name" value="<?php echo $event_name ?>" placeholder="enter name of event">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Start Date:</label>
                    <input type="date" name="sdate" value="<?php echo $start_date ?>" placeholder="start date" Required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">End Date:</label>
                    <input type="date" name="edate" value="<?php echo $end_date ?>" placeholder="end date" Required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Event Description Link:</label><br>
                    <input type="text" name="link" value="<?php echo $description_link ?>" placeholder="enter description">
                  </div>
                  <div class="form-group">
                    <label for="batch">Choose batch </label><br>
                    <select name="batch">
                    <?php
                    if(isset($_GET['edit'])){
                    echo "<option>".$B_name."</option>";
                    }
                    ?>
                    <option value="null">General</option>
 
                    <?php

                                  $records = mysqli_query($conn, "SELECT batch_id,batch_name From batch");  // Use select query here 
                          
                          while($data = mysqli_fetch_array($records))
                          {
                            if($B_name != $data['batch_name'] ){
                              echo "<option value='". $data['batch_id'] ."'>" .$data['batch_name']."</option>";  // displaying data in option menu
                            }
                          } 
                      ?>  
                    </select>
                  </div>
                
                <!-- /.card-body -->

                
                  <?php
                  if ($update == true): 
                  ?>  
                  <input class="btn btn-primary  " type="submit" name="update" value="Update" onclick="return mess();">
                  <?php else: ?>
                  <input class="btn btn-back " type="submit" name="add" value="Add" onclick="return mess();">
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
                window.location.href='ncevent.php?delete='+project_id+'';
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






     