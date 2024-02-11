<?php

// Sertakan autoload agar kelas PHPMailer dapat dimuat
require_once __DIR__.'/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Tangani pengiriman email
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir atau variabel lain
    $to = "digmaalfasyap@gmail.com"; // Alamat email penerima
    $subject = "Subjek email"; // Subjek email
    $message = "Ini adalah isi pesan email."; // Isi pesan email

    // Buat objek PHPMailer
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
        $mail->setFrom('email', 'Digmaalfasyap@gmail.com');
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
}
