<?php
// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
   
// Create the email and send the message
$to = 'stalfach@vp.pl'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Formularz kontaktowy na stronie Exclusive:  $name";
$email_body = "Otrzymałeś nową wiadomość z formularza kontaktowego na stronie.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nTelefon: $phone\n\nWiadomość:\n$message";
$headers = "Od: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Odpowiedz do: $email_address";   
mail($to,$email_subject,$email_body,$headers);
return true;         
?>
