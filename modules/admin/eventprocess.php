 <?php




include ('C:\xampp\htdocs\naturespalette\include\common/config.php');
    $event_name='';
    $event_type='';
    $start_date='';
    $end_date='';
    $desc_link='';
    $max_registration='';
    $update= false;
    $id= 0;
require "phpmailer/PHPMailerAutoload.php";

if (isset($_POST['add'])) {
    # code...
    
    $event_type=$_POST['Type'];
    $event_name=$_POST['name'];
    $start_date=$_POST['sd'];
    $end_date=$_POST['ed'];
    $desc_link=$_POST['edl'];
    $max_registration=$_POST['mor'];
    $register_query ="INSERT INTO `events`( `event_type`, `event_name`, `start_date`, `end_date`, `desc_link`, `max_registration`) VALUES ('$event_type', '$event_name','$start_date','$end_date','$desc_link','$max_registration')";
            
        $register_result = mysqli_query($conn,$register_query);
        if($register_result){
            if (mysqli_affected_rows($conn)>0) {
                $eid = $conn->insert_id;
               $reg_link="http://localhost/naturespalette/modules/admin/registeration_form.php?eid=$eid";
    $subject =  $event_type.' : '.$event_name;
    $body= $event_name."<br>From ". $start_date. " To".$end_date.'<br>Event Description Link below: <br>'. $desc_link. '<br> Register Here..'.$reg_link; 
              
                
            
       
    
    
   
//Setup   
$mail=new PHPMailer();
   $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = '';                     // SMTP username
    $mail->Password   = '';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                  
                  
//FROM email
$mail->setFrom("craghavani342@gmail.com");
//Change to from eamil
 //TOMAIL
$sql="select * from applicants where subscription=1";
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
$mail->Body    = $body;
//For client not supporting HTML rendering.
//$mail->AltBody = 'This is for non-html content';
if($mail->send())
{
    header("Location: events.php");
    echo "Success";
}
else
echo "Failure";

}
else{
    echo "no data found";
}  
}}}

if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
	$sql = "DELETE from events Where event_id=$id"; 

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('Location: events.php'); 
    exit;
} else {
    echo "Error deleting record";
}
    //$_SESSION['message'] = "record has been deleted!";
    //$_SESSION['msg_type'] = "danger";
        header("Location: events.php");

}
if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$update =true;
	$result = $conn->query("SELECT * from events Where event_id=$id") or die($conn->error); 

 
if(isset($result->num_rows) && $result->num_rows > 0){
        $row = $result->fetch_array(MYSQLI_ASSOC);

    $event_type=$row['event_type'];    
    $event_name=$row['event_name'];
    $start_date=$row['start_date'];
    $end_date=$row['end_date'];
    $desc_link=$row['desc_link'];
    $max_registration=$row['max_registration'];

}
}
if (isset($_POST['update'])) {
	$id=$_POST['id'];
        $event_type=$_POST['Type'];

	$event_name=$_POST['name'];
    $start_date=$_POST['sd'];
    $end_date=$_POST['ed'];
    $desc_link=$_POST['edl'];
    $max_registration=$_POST['mor'];

     
     $register_query ="UPDATE events SET event_type='$event_type', event_name= '$event_name', start_date= '$start_date', end_date='$end_date', desc_link= '$desc_link', max_registration= '$max_registration' where event_id= $id";
            
        $register_result = mysqli_query($conn,$register_query);
        if($register_result){
            if (mysqli_affected_rows($conn)>0) {
                $eid = $conn->insert_id;
               $reg_link="http://localhost/naturespalette/modules/admin/registeration_form.php?eid=$eid";
    $subject = 'UPDATED  '. $event_type.' : '.$event_name;
    $body= $event_name."<br>From ". $start_date. " To".$end_date.'<br>Event Description Link below: <br>'. $desc_link. '<br> Register Here..'.$reg_link; 
              
                
            
       
    
    
   
//Setup   
$mail=new PHPMailer();
   $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = '';                     // SMTP username
    $mail->Password   = '';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                  
                  
//FROM email
$mail->setFrom("craghavani342@gmail.com");
//Change to from eamil
 //TOMAIL
$sql="select * from applicants where subscription=1";
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
$mail->Body    = $body;
//For client not supporting HTML rendering.
//$mail->AltBody = 'This is for non-html content';
if($mail->send())
{
    header("Location: events.php");
    echo "Success";
}
else
echo "Failure";

}
else{
    echo "no data found";
}  
}}
     //$_SESSION['message'] = "record has been updated!";
     //$_SESSION['msg_type'] = "warning!";

     header("Location: events.php");

}

?>