<?php

include ('C:\xampp\htdocs\naturespalette\include\common/config.php');
    $title='';
    $description='';
    $attachments='';
    $time='';
    $update= false;
    $id= 0;
    $msg = "";

if (isset($_POST['add'])) {
    # code...

    $file = $_FILES['attachments'];
    $filename = $file['name']; 
    $filerror = $file['error']; 
    $filetmp = $file['tmp_name']; 
    $target = "../files/" . $filename;
    move_uploaded_file($filetmp,$target);

    $title=$_POST['title'];

    $description=$_POST['desc'];
    
       


    $register_query = "INSERT INTO `newsletter`(`title`, `description`, `attachments`) VALUES ('$title','$description','$filename')";
            try{
        $register_result = mysqli_query($conn,$register_query);

        if(move_uploaded_file($_FILES['attachments']['tmp_name'], $target)){
            $msg="file uploaded successfully";
        }else{
            $msg="there was a problem uploading file";
        }

        if($register_result){
            if (mysqli_affected_rows($conn)>0) {
                # code...
              header("Location: newsletter.php");
              exit;
            }
            else{
                echo "error";
                
            }
        }
    }catch(Exception $ex){
        echo ("error" . $ex->getMessage());
    }
    $_SESSION['message'] = "record has been saved!";
    $_SESSION['msg_type'] = "success";

    header("Location: newsletter.php");
}
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE from newsletter Where sr_no=$id"; 

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('Location: newsletter.php'); //If book.php is your main page where you list your all records
    exit;
} else {
    echo "Error deleting record";
}
    $_SESSION['message'] = "record has been deleted!";
    $_SESSION['msg_type'] = "danger";
        header("Location: newsletter.php");

}
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update =true;
    $result = $conn->query("SELECT * from newsletter Where sr_no=$id") or die($conn->error); 

 
    if(isset($result->num_rows) && $result->num_rows > 0){
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $title=$row['title'];
    $description=$row['description'];
    $attachments=$row['attachments'];
    

}
}
if (isset($_POST['update'])) {
    $id=$_POST['id'];
    $title=$_POST['title'];
    $description=$_POST['desc'];
    $file = $_FILES['attachments'];
    $filename = $file['name']; 
    $filerror = $file['error']; 
    $filetmp = $file['tmp_name']; 
    $target = "../files/" . $filename;
    move_uploaded_file($filetmp,$target);


    if ($filename) {
        try{
    
            if(move_uploaded_file($_FILES['attachments']['tmp_name'], $target)){
                $msg="file uploaded successfully";
            }else{
                $msg="there was a problem uploading file";
            }
    
            if($register_result){
                if (mysqli_affected_rows($conn)>0) {
                    # code...
                  header("Location: newsletter.php");
                  exit;
                }
                else{
                    echo "error";
                    
                }
            }
        }catch(Exception $ex){
            echo ("error" . $ex->getMessage());
        }

    }else{
        $filename=$row['attachments'];
    }

     $conn->query("UPDATE newsletter SET title= '$title', description= '$description', attachments='$filename', nl_time=CURRENT_TIMESTAMP  where sr_no= $id") or die($conn->error); 

     

     header("Location: newsletter.php");

}

?>