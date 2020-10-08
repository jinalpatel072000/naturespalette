
<?php

include ('C:\xampp\htdocs\naturespalette\include\common/config.php');

$username = $password = "";
$username_err = $password_err = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    
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
    <title></title>
</head>
<body>
                  <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                     <h1>ADMIN LOGIN</h1>
                     
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <table  align="center">

                    <tr>
            <td>Username:</td>
            <td><input type="text" name="username" placeholder="enter your username" value="<?php echo $username; ?>">                <span class="help-block"><?php echo $username_err; ?></span></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td><input type="Password" name="password" value="<?php echo $password; ?>"><span class="help-block"><?php echo $password_err; ?></span>
                </td>
        </tr>

            <br>
            <br>
            <tr>
                
                    <td><input type="submit" class="btn btn-primary" value="Login"></td>
                </td>        

            </tr>
        </table>
    </form> 
                  </div>
                  
                </div>
             

</body>
</html>