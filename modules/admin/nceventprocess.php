<?php



include ('C:\xampp\htdocs\naturespalette\include\common/config.php');
    $event_name='';
    $event_type='';
    $start_date='';
    $end_date='';
    $description_link='';
    $batch_id='';
    $update= false;
    $id= 0;
    $B_name="";
require "phpmailer/PHPMailerAutoload.php";
if (isset($_POST['add'])) {
    # code...
    $event_type=$_POST['Type'];
    $event_name=$_POST['name'];
    $start_date=$_POST['sdate'];
    $end_date=$_POST['edate'];
    $description_link=$_POST['link'];
    $batch_id=$_POST['batch'];
    $subject =  $event_type.' : '.$event_name;
    $body= $event_name."<br>From ". $start_date. " To".$end_date.'<br>Event Description Link below:'; 
   
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
//$mail->addAttachment('<a href="https://$desc_link"></a>',"Description link");         // Add attachments
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
    $event_type=$_POST['Type'];
    $event_name=$_POST['name'];
    $start_date=$_POST['sdate'];
    $end_date=$_POST['edate'];
    $description_link=$_POST['link'];
    $batch_id=$_POST['batch'];
     

    $register_query = "INSERT INTO `upcoming_event`(`event_type`, `event_name`, `start_date`, `end_date`, `description_link`, `batch_id`) VALUES ('$event_type', '$event_name','$start_date','$end_date','$description_link','$batch_id')";
            try{
        $register_result = mysqli_query($conn,$register_query);
        if($register_result){
            if (mysqli_affected_rows($conn)>0) {
                # code...
              header("Location: ncevent.php");
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

    header("Location: ncevent.php");
}
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE from upcoming_event Where UCevent_id=$id"; 

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('Location: ncevent.php'); //If book.php is your main page where you list your all records
    exit;
} else {
    echo "Error deleting record";
}
    $_SESSION['message'] = "record has been deleted!";
    $_SESSION['msg_type'] = "danger";
        header("Location: ncevent.php");

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
    $result = $conn->query("SELECT * from upcoming_event Where UCevent_id=$id") or die($conn->error); 

 
if(isset($result->num_rows) && $result->num_rows > 0){
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $event_type=$row['event_type'];
    $event_name=$row['event_name'];
    $start_date=$row['start_date'];
    $end_date=$row['end_date'];
    $description_link=$row['description_link'];
    $batch_id=$row['batch_id'];

}
}
if (isset($_POST['update'])) {
    $id=$_POST['id'];
    $event_type=$_POST['Type'];
    $event_name=$_POST['name'];
    $start_date=$_POST['sdate'];
    $end_date=$_POST['edate'];
    $description_link=$_POST['link'];
    $B_ID=$_POST['batch'];

     $conn->query("UPDATE upcoming_event SET event_name= '$event_name', `start_date`= '$start_date', end_date='$end_date', description_link= '$description_link', batch_id= '$B_ID' where UCevent_id= $id") or die($conn->error); 
         $subject = 'UPDATED  '. $event_type.' : '.$event_name;
    $body= $event_name."<br>From ". $start_date. " To".$end_date.'<br>Event Description Link below:'; 
   
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
//$mail->addAttachment('<a href="https://$desc_link"></a>',"Description link");         // Add attachments
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

     header("Location: ncevent.php");

}

?>