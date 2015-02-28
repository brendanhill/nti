<?php  
$invalid = '';
$my_email = 'beeman@steelnerv.com'; 

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
        
    $headers = "From: $email\n";
    $headers .= "Reply-To: $email";
    mail($to, $subject, $body, $headers);  
    
    echo "<p style='margin-bottom:241px;'>Thank you for requesting the Neurodiagnostic Technology Institute 2015 Catalog.  Please feel free to contact us at your convenience.  We welcome the opportunity to answer any questions you may have about beginning a new career as a Neurodiagnostic Technologist.<br><br>Here is your <a href='2015_NTI_Student_Catalog.pdf' target='_blank'>2015 NTI Student Catalog</a>.</p>";
} else {
    echo "<p style='margin-bottom:302px;'>$invalid</p>";
}


