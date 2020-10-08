<?php

include ('C:\xampp\htdocs\naturespalette\include\common/config.php');

$contact='';
$contact_err='';
$customer_id="";

 if (isset($_POST['submit'])) {
  

    
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
    mysqli_close($conn);
}
$username = $password = "";
$username_err = $password_err = "";
 if (isset($_POST['Submit'])) {
    
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    
    if(empty($_POST["password"])){
        $password_err = "Please enter your password.";
    } else{
        $password = $_POST["password"];
    }
    
    if(empty($username_err) && empty($password_err)){
        
        $sql = "SELECT * FROM adminlogin WHERE username = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            
            $param_username = $username;
           
            
            if(mysqli_stmt_execute($stmt)){
                
                mysqli_stmt_store_result($stmt);
                
                
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);

                    if(mysqli_stmt_fetch($stmt)){
                        if($password==$hashed_password){
                            
                            session_start();
                            
                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            
                            header("location:admin/adminwindow.php");

                        } else{
                            
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($conn);
}
   
?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link rel="stylesheet" type="text/css" href="style2.css">

</head>

<body>
   <section>
     <div class="container">

       <div class="user signinBx">
         <div class="imgBx"><img src="img/login3.jpg"></div>
          <div class="formBx">

            <form  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"><div class="d-sm-none mb-5 ">
              <img src="img/logo.jpg" style="height:70px; width: 300px; position: relative;bottom: 50px; ">
              </div>
              <div>
                <h1 class="text-center" style="position: relative;bottom: 20px; ">Welcome!!</h1>
              <div class="row py-2" style="text-align: center; position: relative;bottom: 20px;">
                <a class="cactive" id="acustom" href="index.php" >General</a>&nbsp; &nbsp; &nbsp; 
                <a class="cactive" id="acustom" href="nclub/nclogin.php">N Club</a>
              </div>
            </div>
              <h2 class="text-center"></h2>
              <input type="text" name="contact" placeholder="Registered no." value="<?php echo $contact; ?>">                <span class="help-block"><?php echo $contact_err; ?></span>
              <input type="submit" name="submit" class="btn btn-primary" value="Login">
              <p class="adminlogin">Are you an Admin?<a href="#" onclick="toggleForm();">Admin login.</a></p>
            </form>
          </div> 
       </div>
       <div class="user signupBx">
         
          <div class="formBx">
            <form  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"><div class="d-sm-none mb-5 ">
              <img src="img/logo.jpg" style="height:70px; width: 300px; position: relative;bottom: 40px; ">
              </div>
              <div>
                <h1 class="text-center">Welcome!!</h1>
              </div><br>
              <input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>" style=" width: 300px;">                <span class="help-block"><?php echo $username_err; ?></span>
              <input type="Password" name="password" placeholder="Password" value="<?php echo $password; ?>" style=" width: 300px;"><span class="help-block"><?php echo $password_err; ?></span>
              <input type="submit" name="Submit" class="btn btn-primary" value="Login">
              <p class="adminlogin">Are you User?<a href="#" onclick="toggleForm();">User Login.</a></p>
            </form>
          </div>
          <div class="imgBx"><img src="img/loginimg1.jpg"></div> 
       </div>
     </div>
   </section>
   <script type="text/javascript">
     function toggleForm(){
      var container = document.querySelector('.container');
      container.classList.toggle('active')
     }
   </script>
</body>
</html>