<?php
    include ('C:\xampp\htdocs\naturespalette\include\common/config.php');
    $id = $_GET['reject'];
    $result = $conn->query("DELETE FROM `member_exp1` WHERE `exp_id` = '$id';") or die($conn->error);
    $result = $conn->query("DELETE FROM `nc_gen_exp` WHERE `exp_id` = '$id';") or die($conn->error); 
   if(isset($_GET['reject'])){ 
     
       $result;
            header("location:manageevents.php");     
            
        }else{
            echo "Unknown error occured. Please try again.";
        }

?>
<br/>
