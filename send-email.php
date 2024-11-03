<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and collect form data
    $firstName = htmlspecialchars($_POST['first_name']);
    $lastName = htmlspecialchars($_POST['last_name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars($_POST['phone']);
    $address = htmlspecialchars($_POST['address']);
    $rooms = htmlspecialchars($_POST['rooms']);
    $service = htmlspecialchars($_POST['service']);
    
    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    // Set up email details
    $to = "youremail@example.com"; // Replace with your email
    $subject = "New Cleaning Service Booking";
    $message = "
    <html>
    <head>
        <title>New Booking Request</title>
    </head>
    <body>
        <h2>Booking Details</h2>
        <p><strong>Name:</strong> $firstName $lastName</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Phone:</strong> $phone</p>
        <p><strong>Address:</strong> $address</p>
        <p><strong>Rooms:</strong> $rooms</p>
        <p><strong>Service:</strong> $service</p>
    </body>
    </html>";

    // Set headers for HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: $email" . "\r\n";

    // Attempt to send the email
    if (mail($to, $subject, $message, $headers)) {
        echo "Thank you for your booking! We will get in touch soon.";
    } else {
        echo "Sorry, there was an issue sending your request. Please try again.";
    }
} else {
    echo "Invalid request method.";
}
?>



