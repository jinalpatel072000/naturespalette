<?php

include ('C:\xampp\htdocs\naturespalette\include\common/config.php');
   
 
 
    $mname='';
    $title='';
    $description='';
    $attachments='';
    $update= false;
    $id= 0;
    $mid=$_GET['member_id'];

$msg="";
    
if (isset($_POST['uploadImageBtn'])) {

     
    
    $title=$_POST['title'];
    $mname=$_POST['mname'];
    $description=$_POST['desc'];
    $message = "$mname  would like to request an Experience.";

    $register_query = "INSERT INTO `nc_gen_exp`(`m_name`,`exp_title`, `exp_desc`,`message`) VALUES ('$mname', '$title','$description', '$message')";
            if ($conn->query($register_query)) {
                $id = $conn->insert_id;
                $uploadFolder = '../files/';
    foreach ($_FILES['imageFile']['tmp_name'] as $key => $image) {
        $imageTmpName = $_FILES['imageFile']['tmp_name'][$key];
        $imageName = $_FILES['imageFile']['name'][$key];
        $result = move_uploaded_file($imageTmpName,$uploadFolder.$imageName);

        // save to database
        $query = "INSERT INTO gen_multi_img (img, e_id) values('$imageName','$id' );  " ;
        $run = $conn->query($query) or die("Error in saving image".$conn->error);
    }
    if ($result) {
        echo '<script>alert("Images uploaded successfully !")</script>';
         header("location:addexperience.php?member_id=$mid");
        
    }
                 
            
    }
            

}


    
    
    

?>