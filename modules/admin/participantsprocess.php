<?php    
    include ('C:\xampp\htdocs\naturespalette\include\common/config.php');
    $name='';
    $ph_no='';
    $email='';
    $gender='';
    $age='';
    $location='';
// delete operation
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $sql = "delete from appevents Where customer_id='$id';";
  $sql=" delete from applicants where  customer_id='$id'"; 

//$con->exec($sql);
  if(mysqli_multi_query($conn,$sql)) {
    do{
      if ($result = $conn->store_result()) {
        $result->free();
      }
    if ($conn->more_results()) {
      printf("-------------");
      # code...
    }
  }while($conn->next_result());
  }
}
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = $conn->query("SELECT * from applicants Where customer_id='$id'") or die($conn->error); 

 
if(isset($result->num_rows) && $result->num_rows > 0){
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $name=$row['name'];
    $ph_no=$row['ph_no'];
    $email=$row['email'];
    $gender=$row['gender'];
    $age=$row['age'];
    $location=$row['location'];

}
}
if (isset($_POST['update'])) {
    $id=$_POST['id'];
    $name=$_POST['name'];
    $ph_no=$_POST['contact'];
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    $age=$_POST['age'];
    $location=$_POST['location'];
    $i=0;
    

     $conn->query(" UPDATE applicants SET name= '$name', ph_no= '$ph_no', email='$email',  gender= '$gender', age= '$age', location= '$location'     where customer_id= '$id'") or die($conn->error); 
     $_SESSION['message'] = "record has been updated!";
     $_SESSION['msg_type'] = "warning!";
     header("Location: participants.php");
}

?>