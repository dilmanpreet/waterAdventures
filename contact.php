<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

       
        $mail_to = "dilmanpreet1@gmail.com";
        
        
        $subject = trim($_POST["subject"]);
        $name = str_replace(array("\r","\n"),array(" "," ") , strip_tags(trim($_POST["name"])));
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $phone = trim($_POST["phone"]);
        $message = trim($_POST["message"]);
        
      
        }
        
        
        $content = "Name: $name\n";
        $content .= "Email: $email\n\n";
        $content .= "Phone: $phone\n";
        $content .= "Message:\n$message\n";

    
        $headers = "From: $name <$email>";

        # Send the email.
        $success = mail($mail_to, $subject, $content, $headers);
        if ($success) {
                   http_response_code(200);
            echo "Thank You for the response.";
        } else {
            http_response_code(500);
            echo "Oopserror";
        }

    } else {
       
        http_response_code(403);
        echo "Problem with your submission";
    }

?>
