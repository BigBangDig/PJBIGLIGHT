<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer autoload file
require '/vendor/autoload.php';

// Function to sanitize input & validate email address
function clean_input($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Set recipient email address
    $to_email = "recipient@example.com"; // Ganti dengan alamat email penerima Anda

    // Sanitize data dari form
    $name = clean_input($_POST["name"]);
    $subject = clean_input($_POST["subject"]);
    $email = clean_input($_POST["email"]);
    $message = clean_input($_POST["message"]);

    // Initialize PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.example.com';                     // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'your_username@example.com';            // SMTP username
        $mail->Password   = 'your_password';                        // SMTP password
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        // Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress($to_email);                              // Add a recipient

        // Content
        $mail->isHTML(false);                                      // Set email format to plain text
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
        echo "Pesan berhasil dikirim. Terima kasih atas kontak Anda!";
    } catch (Exception $e) {
        echo "Pesan gagal dikirim. Silakan coba lagi. Error: {$mail->ErrorInfo}";
    }
}
?>
