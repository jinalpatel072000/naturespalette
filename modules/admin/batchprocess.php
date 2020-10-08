<?php

$conn =mysqli_connect('localhost', 'root','9898','nature');

if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    
    
    $batch_name='';
    
    
    $update= false;
    $id= 0;

if (isset($_POST['create'])) {
    # code...
    
    $batch_name=$_POST['bname'];
    


    $register_query = "INSERT INTO `batch`(`batch_name`) VALUES ('$batch_name')";
            try{
        $register_result = mysqli_query($conn,$register_query);
        if($register_result){
            if (mysqli_affected_rows($conn)>0) {
                # code...
              header("Location: batch.php");
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

    header("Location: batch.php");
}
if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
	$sql = "DELETE from batch Where batch_id=$id"; 

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('Location: batch.php'); //If book.php is your main page where you list your all records
    exit;
} else {
    echo "Error deleting record";
}
    $_SESSION['message'] = "record has been deleted!";
    $_SESSION['msg_type'] = "danger";
        header("Location: batch.php");

}
if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$update =true;
	$result = $conn->query("SELECT * from batch Where batch_id=$id") or die($conn->error); 

 
if(isset($result->num_rows) && $result->num_rows > 0){
        $row = $result->fetch_array(MYSQLI_ASSOC);
    
    $batch_name=$row['batch_name'];
    
    
}
}
if (isset($_POST['update'])) {
    $id=$_POST['id'];
    
	$batch_name=$_POST['bname'];
    

     $conn->query("UPDATE batch SET batch_name='$batch_name' where batch_id= $id") or die($conn->error); 

     $_SESSION['message'] = "record has been updated!";
     $_SESSION['msg_type'] = "warning!";

     header("Location: batch.php");

}

?>