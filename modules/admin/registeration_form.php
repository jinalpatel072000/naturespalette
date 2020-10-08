<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $t ; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../AdminLTE-3.0.5/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../AdminLTE-3.0.5/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


</head>
<body>
<!-- Site wrapper -->
<div class="wrapper">

<?php

include ('C:\xampp\htdocs\naturespalette\include\common/config.php');


//header
$name='';
  $ph_no='';
  $email='';
  $member_exp='';
  $gender='';
  $age='';
  $location='';
  $update = false;


if (isset($_POST['submit'])) {


  $name=$_POST['name'];
  $ph_no=$_POST['contact'];
  $email=$_POST['email'];
  $member_exp=$_POST['me'];
  $gender=$_POST['gender'];
  $age=$_POST['age'];
  $location=$_POST['location'];

 



$query ="insert into applicants (name, age, gender,  location, ph_no, email) values('$name', '$age', '$gender',  '$location', '$ph_no', '$email' )";

if ($conn->query($query)) {
    $id = $conn->insert_id;
    $eid=$_GET['eid'];
    
$register_query =mysqli_query($conn,"insert into appevents (customer_id, event_id) values('$id','$eid' )");
         

                 
         
       header("location: registerationn_form.php?id=".$_GET["eid"]);
       exit;
      }    
          else{
              echo "error";
              
          }
} 

?>


<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6 mx-auto">
            <!-- general form elements -->
            <div class="card card-custom">
              <div class="card-header">
                <h3 class="card-title">Fill the Data </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                  <form action="" method="post">
                    <input type="hidden" name="id" >
                

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
                  <input class="btn btn-primary" type="submit" name="submit" value="Register" onclick="return mess();">
                    
                </div>
              </form>
            </div>
            <!-- /.card -->
    <script type="text/javascript">
      function mess()
      {
        alert ("Registration successful");
        return true;
      }
    </script>

            </div>
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    

</section>
  </div>
  <!-- /.content-wrapper -->      
</div>
<!-- ./wrapper -->
<script src="../../AdminLTE-3.0.5/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../AdminLTE-3.0.5/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../AdminLTE-3.0.5/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../AdminLTE-3.0.5/dist/js/demo.js"></script>
</body>
</html>

<?php
include ('C:\xampp\htdocs\naturespalette\include\common/footer.php');
  ?>


