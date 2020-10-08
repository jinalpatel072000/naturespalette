<?php


    include ('C:\xampp\htdocs\naturespalette\include\common/config.php');
     $id=0;
    $id = $_GET['accept'];
    
$result = $conn->query("UPDATE member_exp1
SET approved = true
where `exp_id` = '$id'; ") or die($conn->error);
$result = $conn->query("UPDATE nc_gen_exp
SET approved = true
where `exp_id` = '$id'; ") or die($conn->error); 
   if(isset($_GET['accept'])){ 
     
       $result;
            header("location:manageevents.php");        
            
            

} else{
            echo "Unknown error occured. Please try again.";
        }

   
?>
