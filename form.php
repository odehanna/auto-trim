<?php

error_reporting(-1);
ini_set('display_errors', 'on');

    $name = $_POST['name'];
    $email = $_POST['email'];
    $text = $_POST['text'];
    $from = "From: $name <$email>";
    $to = 'mike_atd@rogers.com';
    $subject = 'Website Form';

    $body = "From: $name\n E-Mail: $email\n Message:\n $text";
/*
if ($_POST['submit']) {
           if (mail ($to, $subject, $body, $from)) {
            header('Location: /thank-you/');
            exit;
           } else {
           echo '<p>Ah! Try again, please?</p>';
           }
       }*/

$errors = '';

if(empty($_POST['name'])  ||
   empty($_POST['email']) ||
   empty($_POST['text']))
{
    $errors .= "\n Error: all fields are required";
}

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
$email))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{

mail($to,$subject,$body,$from);

//redirect to the 'thank you' page
header('Location: http://salon-mona.com/thank-you/');
exit;

} else {
  echo "Not valid: $errors";
}

