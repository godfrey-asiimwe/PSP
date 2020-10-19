<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        # FIX: Replace this email with recipient email
        $mail_to = "acemu.nmm@gmail.com";


        $subject ="Add Me to the weekly digest";
        
        # Sender Data
        $email = $_POST["email"];
      
        # Mail Content
        $content = "Email: $email\n\n";

        # email headers.
        $headers = "From: <$email>";

        # Send the email.
        $success = mail($mail_to, $subject, $content, $headers);
        if ($success) {
            # Set a 200 (okay) response code.
            http_response_code(200);
            echo "Thank You! You have subscribed to a weekly digest.";
        } else {
            # Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "Oops! Something went wrong, we couldn't send your message.";
        }

    } else {
        # Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }

?>
