<?php

include ('C:\xampp\htdocs\naturespalette\include\common/config.php');

$contact='';
$contact_err='';
$customer_id="";

 

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    
    if(empty(trim($_POST["contact"]))){
        $contact_err = "Please enter registered number.";
    } else{
       $contact = trim($_POST["contact"]);

    }
 
    
    
    
    
    if(empty($contact_err) ){
        
        $sql ="SELECT customer_id,ph_no from applicants where ph_no = ?";

        
        if($stmt = mysqli_prepare($conn, $sql)){
            
            mysqli_stmt_bind_param($stmt, "s", $param_contact);
            
            
            $param_contact = $contact;
           
            
            if(mysqli_stmt_execute($stmt)){
                
                mysqli_stmt_store_result($stmt);
                
                
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    
                    mysqli_stmt_bind_result($stmt,$id, $contact);

                    if(mysqli_stmt_fetch($stmt)){
    
                            
                            session_start();
                            
                            
                            $_SESSION["customer_id"]= $id;
                            $_SESSION["loggedin"] = true;
                            $_SESSION["contact"] = $contact;                            


                            
                            
                            header("location:generalusers/gwindow.php?customer_id=".$_SESSION["customer_id"]);

                        } 
                        }
                       else{
                            
                            $contact_err = "invalid mobile number";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    //mysqli_close($conn);
}
   
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../AdminLTE-3.0.5/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../AdminLTE-3.0.5/plugins/sweetalert2/sweetalert2.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../AdminLTE-3.0.5/plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../AdminLTE-3.0.5/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
    <div align="center">
      <div class="row">
          <div class="col-12">
            <h1>LOGIN</h1>
          </div>
      </div>
        <!-- ./row -->

        <div class="row justify-content-center">
          <div class="col-12 col-sm-6">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="generalusers/glogin.php" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">GENERAL USERS</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">NC MEMBERS</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">ADMIN</a>
                  </li>
                 
                </ul>
              </div>
              </div></div></div></div>
          <!-- jQuery -->
<script src="../AdminLTE-3.0.5/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../AdminLTE-3.0.5/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../AdminLTE-3.0.5/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../AdminLTE-3.0.5/dist/js/demo.js"></script>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>General Login</title>
</head>
<body>
    <div class="card-body">
        <div class="tab-content" id="custom-tabs-one-tabContent">
          <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
            <h1>GENERAL LOGIN</h1>
            
                 <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
              <table  align="center">

                <tr>
                  <td>ENTER YOUR REGISTERED MOBILE NUMBER:</td>
                  <td><input type="text" name="contact" placeholder="enter your 10 digit no." value="<?php echo $contact; ?>">                <span class="help-block"><?php echo $contact_err; ?></span></td>
                </tr>
                <br>
                <br>
                <tr>
        
                  <td><input type="submit" name="submit" class="btn btn-primary" value="Login"></td>
                  </td>        
                </tr>
             </table>
            </form>
          </div>
      </div>
    

</body>
</html>
