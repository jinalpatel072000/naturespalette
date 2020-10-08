<?php 
  include ('C:\xampp\htdocs\naturespalette\include\common/config.php');
  $name='';
    $ph_no='';
    $email='';
    $member_exp='';
    $gender='';
    $age='';
    $location='';
    $update = false;


if (isset($_POST['submit'])) {

    $b_id=$_POST['batchid'];
    $name=$_POST['name'];
    $ph_no=$_POST['contact'];
    $email=$_POST['email'];
    $member_exp=$_POST['me'];
    $gender=$_POST['gender'];
    $age=$_POST['age'];
    $location=$_POST['location'];

    
    
   $a=$_POST['batch'];
    $b=implode(',',$a);

    
    
    $chars="0123456789";
    $mpass=substr(str_shuffle($chars),0,4); 

   



$query ="insert into members_data (name, ph_no, email, member_expiry, gender, age, location, member_pass,batches) values('$name','$ph_no', '$email', '$member_exp', '$gender', '$age', '$location','$mpass', '$b' )";

if ($conn->query($query)) {
 
      
      
  $b_id=$_POST['batchid'];
 $id = $conn->insert_id;
  $i=0;
while ($i<count($b_id)) {
  echo  $bat= $b_id[$i];

  
$register_query =mysqli_query($conn,"insert into batch_member (member_id, id) values('$id','$bat' )");
            $i++;
 
                   
            }
         header("location: addmember.php") ;
         exit;
        }    
            else{
                echo "error";
                
            }
        
    
 

  }



// delete operation
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $sql = "delete from batch_member Where member_id='$id';";
  $sql=" delete from members_data where  member_id='$id'"; 

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
    $update =true;
    $result = $conn->query("SELECT * from members_data Where member_id='$id'") or die($conn->error); 

 
if(isset($result->num_rows) && $result->num_rows > 0){
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $name=$row['name'];
    $ph_no=$row['ph_no'];
    $email=$row['email'];
    $member_exp=$row['member_expiry'];
    $gender=$row['gender'];
    $age=$row['age'];
    $location=$row['location'];
    $a=$row['batches'];
    $b=explode(",", $a);

}
}
if (isset($_POST['update'])) {
    $id=$_POST['id'];
    $name=$_POST['name'];
    $ph_no=$_POST['contact'];
    $email=$_POST['email'];
    $member_exp=$_POST['me'];
    $gender=$_POST['gender'];
    $age=$_POST['age'];
    $location=$_POST['location'];
    $d=$_POST['batch'];
    $e=implode(',',$d);
    $i=0;
    

     $conn->query(" UPDATE members_data SET name= '$name', ph_no= '$ph_no', email='$email', member_expiry= '$member_exp', gender= '$gender', age= '$age', location= '$location' ,batches= '$e' where member_id= '$id'") or die($conn->error); 
     $_SESSION['message'] = "record has been updated!";
     $_SESSION['msg_type'] = "warning!";
     header("Location:addmember.php");
}
?>