<?php
require 'libs/PHPMailer/src/Exception.php';
require 'libs/PHPMailer/src/PHPMailer.php';
require 'libs/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reply = htmlspecialchars($_POST["reply"]);
    $email = htmlspecialchars($_POST["email"]);
    $name = htmlspecialchars($_POST["name"]);

    $mail = new PHPMailer(true);

    try {

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'rnr.car.rental.services@gmail.com';
        $mail->Password = 'ecxxoghsnmoxjuuu';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('rnr.car.rental.services@gmail.com', 'RNR Car Rental');
        $mail->addAddress($email, $name);

        $mail->isHTML(true);
        $mail->Subject = 'RNR Car Rental Support Team';
        $mail->Body    = 'Dear ' . $name . ',<br><br>' . 'Thank you for reaching out! ' . ',<br><br>' . nl2br($reply) . ',<br><br>' . 'For more inquiries, visit our website and send another message through "Get in Touch" in our webpage. ';

        $mail->send();
        echo '<script type="text/javascript">
                alert("Email sent successfully to ' . $email . '.");
                window.location.href = "messageAdmin.php";
              </script>';
    } catch (Exception $e) {
        echo '<script type="text/javascript">
                alert("Failed to send email. Mailer Error: ' . $mail->ErrorInfo . '");
                window.location.href = "messageAdmin.php";
              </script>';
    }
} else {
    echo '<script type="text/javascript">
            alert("Invalid request.");
            window.location.href = "messageAdmin.php";
          </script>';
}
?>
