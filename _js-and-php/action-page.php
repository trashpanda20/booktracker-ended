<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['fullname'];
    $email = $_POST['emailaddress'];
    $reason = $_POST['reason'];
    $message = $_POST['subject'];

    // Validate and sanitize the data (optional but recommended)
    $name = htmlspecialchars($name);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $reason = htmlspecialchars($reason);
    $message = htmlspecialchars($message);

    // Check if the email is valid (optional but recommended)
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //adding it sends to email
        $to = "swoodall121@gmail.com";
        $subject = "Contact Form Submission"
        $headers = "From: $email" . "\r\n" . 
                    "X-Mailer: PHP/" . phpversion();
        // Process the data (e.g., save to database, send email, etc.)
        $email_body = "Name: " . $name . "<br>";
        $email_body .= "Email: " . $email . "<br>";
        $email_body .= "Reason for Contact: " . $reason . "<br>";
        $email_body .= "Message: " . $message . "<br>";

        if (mail($to, $subject, $email_body, $headers)) {
            echo "Thank you for your message. I will get back with you in a timely manner!"
        } else {
            echo "There was an error sending. Please try again."
        }
    } else {
        echo "Invalid email format";
    }
} else {
    echo "Form was not submitted";
}
?>
