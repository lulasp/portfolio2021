<?php


// Check for empty fields
if(empty($_POST['name2'])      ||
   empty($_POST['email2'])     ||
   empty($_POST['message2']) ||
   !filter_var($_POST['email2'],FILTER_VALIDATE_EMAIL))
   {
  echo "Email mal preenchido.";
   }
  
$name = $_POST['name2'];
$email_address = $_POST['email2'];
$message = $_POST['message2'];
  
// Create the email and send the message
$to = 'lula__sp@hotmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nMessage:\n$message";
$headers = "From: contact@serpapinto.pt\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";
  
mail($to,$email_subject,$email_body,$headers);
echo "Success, the e-mail has been sent.";     
?>
 

 
 
