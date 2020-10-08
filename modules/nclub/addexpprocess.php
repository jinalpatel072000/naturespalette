<?php

include ('C:\xampp\htdocs\naturespalette\include\common/config.php');
 $mid=$_GET['member_id'];
   $records = mysqli_query($conn, "select batch_id from batch ");
                
        $data = mysqli_fetch_array($records);
          
 $bid=$data['batch_id'];    
 
 
    $mname='';
    $title='';
    $description='';
    $attachments='';
    $update= false;
    

$msg="";
    
if (isset($_POST['uploadImageBtn'])) {

     
    
    $title=$_POST['title'];
    $mname=$_POST['mname'];
    $description=$_POST['desc'];
    $message = "$mname  would like to request an Experience.";

    $register_query = "INSERT INTO `member_exp1`(`member_name`,`title`, `description`, `attachments`,`message`, `batch_id`) VALUES ('$mname', '$title','$description','$file', '$message', '$bid')";
            if ($conn->query($register_query)) {
                $id = $conn->insert_id;
                $uploadFolder = '../files/';
    foreach ($_FILES['imageFile']['tmp_name'] as $key => $image) {
        $imageTmpName = $_FILES['imageFile']['tmp_name'][$key];
        $imageName = $_FILES['imageFile']['name'][$key];
        $result = move_uploaded_file($imageTmpName,$uploadFolder.$imageName);

        // save to database
        $query = "INSERT INTO multi_img (img, e_id) values('$imageName','$id' );  " ;
        $run = $conn->query($query) or die("Error in saving image".$conn->error);
    }
    if ($result) {
        echo '<script>alert("Images uploaded successfully !")</script>';
         header("location:baddexperience.php?member_id=$mid&ID=$bid");
        
    }
                 
            
    }
            

}


    
    
    

?>





