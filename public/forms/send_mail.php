<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Membuat objek PHPMailer
$mail = new PHPMailer(true);

try {
    // Konfigurasi SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';  // Ganti dengan alamat SMTP server Anda
    $mail->SMTPAuth = true;
    $mail->Username = 'Digmaalfasyap@gmail.com'; // Ganti dengan username SMTP Anda
    $mail->Password = 'Digma011206'; // Ganti dengan password SMTP Anda
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587; // Ganti dengan port SMTP yang sesuai

    // Set pengirim dan penerima
    $mail->setFrom('Digmaalfasyap@gmail.com', 'Nama Anda'); // Ganti dengan alamat email dan nama Anda
    $mail->addAddress($to);

    // Set subjek dan isi pesan
    $mail->Subject = $subject;
    $mail->Body    = $message;

    // Kirim email
    $mail->send();
    echo "Email berhasil terkirim!";
} catch (Exception $e) {
    echo "Email gagal terkirim. Kesalahan: {$mail->ErrorInfo}";
}
?>
