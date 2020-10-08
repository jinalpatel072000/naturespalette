<?php 
session_start(); 
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!==true){
  header("location:../index.php");
  exit;
  }
include('noticeprocess.php'); 
$t = 'Add Notice';
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
            <h1 class="head m-0 text-center">All Notices</h1>
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
                <h3 class="card-title">Added Notices </h3>
              </div>
              <!-- /.card-header -->
	<?php require_once 'noticeprocess.php';  ?>
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
    $result = $conn->query("SELECT * from notice1 n join events e on e.event_id=n.eventid order by eventid ") or die($conn->error);
    ?>
    <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr style="text-transform: capitalize;">
                     <th>notice id</th>
                     <th>notice title </th>
                     <th>eventname</th>
                     <th>Details</th>
                     <th colspan="2">action</th> 
                    </tr>
                  </thead>
                  <tbody>
    
    <?php
    while ($row = $result->fetch_assoc()):
    ?>
    		<tr style="text-transform: capitalize;">
    			<td><?php echo $row['notice_id']  ?></td>
    			<td><?php echo $row['notice_title']  ?></td>
          <td><?php echo $row['event_name']  ?></td>
    			<td><a class="btn btn-primary btn-sm " href="noticedetail.php?read=<?php echo $row['notice_id'];  ?>">View</a></td>
          
          
    			
    			
    			<td>
    				<a class="btn btn-back  btn-sm  " href="notice.php?edit=<?php echo $row['notice_id'];  ?>">Edit</a>
    				<input type="button" value="Delete" class="btn  btn-sm btn-danger" onClick="deleteme(<?php echo $row['notice_id']; ?>)" >
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
            <h1 class="head m-0 text-center">Add New Notice</h1>
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
                <h3 class="card-title">Notice Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action="noticeprocess.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $id;  ?>">
                <input type="hidden" name="size" value="1000000">

                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title of Notice:</label><br>
                    <input type="text" name="title"  value="<?php echo $notice_title ?>" placeholder="enter event title" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Description:</label><br>
                    <textarea name="desc" placeholder="enter description" required><?php echo $notice_desc ?> </textarea>
                  </div>
                  <div class="form-group">
                    <label>Previous Attachment:</label><?php echo $prev_attachments; ?>
                    <br>
                    <input type="file" name="attachments"   placeholder="Attachments" id="files">
                  </div>
                  <div class="form-group">
                   <label for="eventid">Choose event</label>
                   <select name="eventid" id="eventid" value="<?php echo $event_name ?>" >
                    <?php

                                  $records = mysqli_query($conn, "SELECT event_id,event_name From events");  // Use select query here 

                          while($data = mysqli_fetch_array($records))
                          {
                              echo "<option value='". $data['event_id'] ."'>" .$data['event_name']."</option>";  // displaying data in option menu
                          } 
                      ?>  
                     </select>
                  </div>
                
                <!-- /.card-body --> 
                
                  <?php
                  if ($update == true): 
                  ?>  
                  <input class="btn btn-success" type="submit" name="update" value="Update" onclick="return mess();">
                  <?php else: ?>
                  <input class="btn  btn-back"type="submit" name="add" value="Add" onclick="return mess();">
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
                window.location.href='notice.php?delete='+project_id+'';
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