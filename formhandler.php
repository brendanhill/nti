<?php  
$invalid = '';
$my_email = 'Info@MyNTIcareer.com'; 

// Validate input:
if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message']) || empty($_POST['enquiry'])) {
    $invalid.= "\n All fields are required";
}

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$enquiry = trim($_POST['enquiry']);
$message = trim($_POST['message']);   

// Validate email:
if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $email)) {
    $invalid .= "\n Invalid email address";
}

// Send email if no errors detected:
if(empty($invalid)) {
    $to = $my_email;
    $subject = "NTI Contact form submission: $name";
    
    $body = "You have received a new message. " .
    "Here are the details:\n ".
        "Name: $name \n " .
        "Email: $email\n " .
        "Enquiry Type: $enquiry\n " .
        "Message:\n $message";
        
    //$headers = "From: $email\n";
    $headers = "From: contact@neurodiagnostictechnologyinstitute.com\n";
    $headers .= "Reply-To: $email";
    mail($to, $subject, $body, $headers);  
}
