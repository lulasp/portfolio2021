<?php
// Email Submit
// Note: filter_var() requires PHP >= 5.2.0
if ( isset($_POST['email']) && isset($_POST['name']) && isset($_POST['message']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) {
 
  // detect & prevent header injections
  $test = "/(content-type|bcc:|cc:|to:)/i";
  foreach ( $_POST as $key => $val ) {
    if ( preg_match( $test, $val ) ) {
      exit;
    }
  }

$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];
  
// Create the email and send the message
$to = 'maria.campos@viscondeapartments.pt'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Contact by:  $name";
$email_body = "Recebeu uma mensagem nova atraves do site viscondeapartments.pt.\n\n"."Aqui estão os detalhes:\n\nNome: $name\n\nEmail: $email_address\n\nMensagem:\n$message";
$headers = "From: maria.campos@viscondeapartments.pt\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";
  
mail($to,$email_subject,$email_body,$headers);
 
  //      ^
  //  Replace with your email 
}
?>