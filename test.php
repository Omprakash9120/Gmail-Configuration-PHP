<?php
include('smtp/PHPMailerAutoload.php');

if (isset( $_POST['submit'])) {
    $to = $_POST['email'];
    $subject = $_POST['subject'];
    $msg = $_POST['msg'];

    echo "$to";
    echo "$subject";
    echo "$msg";
    
echo smtp_mailer($to,$subject,$msg);
}



function smtp_mailer($to, $subject, $msg) {
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    // $mail->SMTPDebug = 2; // Uncomment for debugging SMTP issues
    $mail->Username = "prakashtech9120@gmail.com";
    $mail->Password = "jflfttxeqwjjkmqp"; // Replace with your SMTP app password
    $mail->SetFrom("prakashtech9120@gmail.com");
    $mail->Subject = $subject;
    $mail->Body = $msg;
    $mail->AddAddress($to);
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    if (!$mail->Send()) {
        return "Mailer Error: " . $mail->ErrorInfo;
    } else {
        return "Email Sent Successfully!";
    }
}
?>
