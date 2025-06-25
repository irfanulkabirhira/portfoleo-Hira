<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $to = "erfanulkabirhira132@gmail.com";  // Your email address
  $name = strip_tags(trim($_POST["name"]));
  $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
  $subject = strip_tags(trim($_POST["subject"]));
  $message = trim($_POST["message"]);

  $headers = "From: $name <$email>\r\n";
  $email_content = "From: $name\nEmail: $email\n\nSubject: $subject\n\nMessage:\n$message";

  if (mail($to, $subject, $email_content, $headers)) {
    echo "Your message has been sent. Thank you!";
  } else {
    http_response_code(500);
    echo "Oops! Something went wrong and we couldn't send your message.";
  }
}
?>
