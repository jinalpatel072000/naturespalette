<?php


include ('C:\xampp\htdocs\naturespalette\include\common/config.php');
   require "phpmailer/PHPMailerAutoload.php";
   $notice_title='';
    $notice_desc='';
    $attachments='';
    $batch_id='';
    $update= false;
    $id= 0;
    $msg='';
    $B_name="";
if (isset($_POST['add'])) {
    # code...

    $file = $_FILES['attachments'];
    $filename = $file['name']; 
    $filerror = $file['error']; 
    $filetmp = $file['tmp_name']; 
        
    $notice_title=$_POST['title'];
    $notice_desc=$_POST['desc'];
    //$attachments=$_POST['attachments'];
    $batch_id=$_POST['batch']; 
    $subject =  'NOTICE: '.$notice_title;
    $body= $notice_title."<br> ". $notice_desc; 
   
//Setup   
$mail=new PHPMailer();
   $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'craghavani342@gmail.com';                     // SMTP username
    $mail->Password   = '342@Charmi';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                  
                  
//FROM email
$mail->setFrom("craghavani342@gmail.com");
//Change to from eamil
 //TOMAIL
$sql="select * from members_data ";
$res=mysqli_query($conn,$sql);
if(mysqli_num_rows($res)>0)
{
//Change to whom you want to send.
$mail->addReplyTo("craghavani342@gmail.com");
//Change reply email, whom the reciever can reply.
//addCC
//addBCC 
// Attachments
//Add your attachement here.
$mail->addAttachment($_FILES['attachments']['tmp_name'],$_FILES['attachments']['name']);         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
while ($x=mysqli_fetch_assoc($res)) {
    $mail->addBCC($x['email']);
}
// Content
$mail->isHTML(true);  // Set email format to HTML
//Change the subject.
$mail->Subject = $subject;
//Change the content as per your wish.
$mail->Body    = $body.'<a href="https://$desc_link"></a>'  ;
//For client not supporting HTML rendering.
//$mail->AltBody = 'This is for non-html content';
if($mail->send())
{
    echo "Success";
}
else
echo "Failure";

}
else{
    echo "no data found";
}  
}
if (isset($_POST['add'])) {
    # code...
    $file = $_FILES['attachments'];
    $filename = $file['name']; 
    $filerror = $file['error']; 
    $filetmp = $file['tmp_name']; 
    $target = "../files/" . $filename;
    move_uploaded_file($filetmp,$target);    
    $notice_title=$_POST['title'];
    $notice_desc=$_POST['desc'];
    //$attachments=$_POST['attachments'];
    $batch_id=$_POST['batch']; 
    //$b=implode(',', $batch_id);  


    $register_query = "INSERT INTO `nc_notice`(`notice_title`, `notice_desc`, `attachments`, `batch_id`) VALUES ('$notice_title','$notice_desc','$filename','$batch_id')";
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
              header("Location: ncnotice.php");
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

    header("Location: ncnotice.php");
}
if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
	$sql = "DELETE from nc_notice Where notice_id=$id"; 

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('Location: ncnotice.php'); //If book.php is your main page where you list your all records
    exit;
} else {
    echo "Error deleting record";
}
    $_SESSION['message'] = "record has been deleted!";
    $_SESSION['msg_type'] = "danger";
        header("Location: ncnotice.php");

}
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $BID = $_GET['BID'];
    $batch_query = $conn->query("SELECT * from batch Where batch_id=$BID;") or die($conn->error);
    if(isset($batch_query->num_rows) && $batch_query->num_rows > 0){
        $B_row = $batch_query->fetch_array(MYSQLI_ASSOC);
        $B_name= $B_row['batch_name'];
    }
	$update =true;
	$result = $conn->query("SELECT * from nc_notice,batch Where notice_id=$id") or die($conn->error); 

 
if(isset($result->num_rows) && $result->num_rows > 0){
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $notice_title=$row['notice_title'];
    $notice_desc=$row['notice_desc'];
    $attachments=$row['attachments'];
    $batch_id=$row['batch_id'];
}
}
if (isset($_POST['update'])) {
    
	$id=$_POST['id'];
	$notice_title=$_POST['title'];
    $notice_desc=$_POST['desc'];
    $file = $_FILES['attachments'];
    $filename = $file['name'];
    $target = "../files/".$_FILES['attachments']['name'];
    move_uploaded_file($_FILES['attachments']['tmp_name'],$target);
    $batch_id=$_POST['batch']; 

     
     $conn->query("UPDATE nc_notice SET notice_title= '$notice_title', notice_desc= '$notice_desc', attachments='$filename', batch_id= '$batch_id' where notice_id= $id") or die($conn->error); 

     $subject =  'NOTICE: '.$notice_title;
    $body= $notice_title."<br> ". $notice_desc;
    try{
        $updated_register_result = mysqli_query($conn,$update_query);
        if(move_uploaded_file($_FILES['attachments']['tmp_name'],$target)){
            $msg="File updated successfully";
        }else{
            $msg="There was a problem uploading file";
        }

        if($register_result){
            if (mysqli_affected_rows($conn)>0) {
                # code...
              header("Location: ncnotice.php");
              exit;
            }
            else{
                echo "error";
                
            }
        }
    }catch(Exception $ex){
        echo ("error" . $ex->getMessage());
    } 
   
//Setup   
$mail=new PHPMailer();
   $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'craghavani342@gmail.com';                     // SMTP username
    $mail->Password   = '342@Charmi';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                  
                  
//FROM email
$mail->setFrom("craghavani342@gmail.com");
//Change to from eamil
 //TOMAIL
$sql="select * from members_data";
$res=mysqli_query($conn,$sql);
if(mysqli_num_rows($res)>0)
{
//Change to whom you want to send.
$mail->addReplyTo("craghavani342@gmail.com");
//Change reply email, whom the reciever can reply.
//addCC
//addBCC 
// Attachments
//Add your attachement here.
$mail->addAttachment($_FILES['attachments']['tmp_name'],$_FILES['attachments']['name']);         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
while ($x=mysqli_fetch_assoc($res)) {
    $mail->addBCC($x['email']);
}
// Content
$mail->isHTML(true);  // Set email format to HTML
//Change the subject.
$mail->Subject = $subject;
//Change the content as per your wish.
$mail->Body    = $body.'<a href="https://$desc_link"></a>'  ;
//For client not supporting HTML rendering.
//$mail->AltBody = 'This is for non-html content';
if($mail->send())
{
    echo "Success";
}
else
echo "Failure";

}
else{
    echo "no data found";
}  
 

     $_SESSION['message'] = "record has been updated!";
     $_SESSION['msg_type'] = "warning!";

     header("Location: ncnotice.php");

}

?>