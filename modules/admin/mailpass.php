 $id = $conn->insert_id;
   $subject ='  Your naturespalette Password';
    $body= "Your Password To Our Portal is  ".$mpass; 
   
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
$sql="select * from members_data where member_id=$id";
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