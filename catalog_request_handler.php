<?php  
$invalid = '';
$my_email = 'Catalog@MyNTIcareer.com';

// Validate input:
if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone'])) {
    $invalid.= "\n All fields are required";
}

$name = strtoupper(trim($_POST['name']));
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$contactme = strtoupper(trim($_POST['contactme']));   

// Validate email:
if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $email)) {
    $invalid .= "\n Invalid email address";
}

// Send email if no errors detected:
if(empty($invalid)) {
    $to = $my_email;
    $subject = "NTI Catalog Request form submission: $name";
    
    $body = "You have received a new message. " .
    "Here are the details:\n ".
        "Name: $name \n " .
        "Email: $email\n " .
        "Phone: $phone\n " .
        "Please contact me: $contactme";
        
    //$headers = "From: $email\n";
    $headers = "From: catalog@neurodiagnostictechnologyinstitute.com\n";
    $headers .= "Reply-To: $email";
    mail($to, $subject, $body, $headers);  
    
    echo "<p style='margin-bottom:272px;'>Thank you for requesting the Neurodiagnostic Technology Institute 2015 Catalog. You should receive it in your email shortly.  We welcome the opportunity to answer any questions you may have about beginning a new career as a Neurodiagnostic Technologist.</p>";
} else {
    echo "<p style='margin-bottom:302px;'>$invalid</p>";
}


