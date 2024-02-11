<?php
require_once '../vendor/autoload.php';

$client = new Google\Client();
$client->setApplicationName('Nama Aplikasi Anda');
$client->setScopes(Google\Service\Gmail::GMAIL_READONLY); // Sesuaikan dengan ruang lingkup yang Anda butuhkan
$client->setClientId('777036731806-n5u5jnet3akfd12kmksuta6c5urt23c0.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('http://127.0.0.1:8000/home');

// Buat instance objek Google_Service_Gmail untuk melakukan permintaan ke API Gmail
$gmailService = new Google\Service\Gmail($client);

// Lakukan otentikasi
if (isset($_GET['code'])) {
    $client->authenticate($_GET['code']);
    $_SESSION['access_token'] = $client->getAccessToken();
    header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
    $client->setAccessToken($_SESSION['access_token']);
} else {
    $authUrl = $client->createAuthUrl();
    printf("Buka link berikut di browser Anda:\n%s\n", $authUrl);
}

// Sekarang Anda dapat menggunakan $gmailService untuk melakukan permintaan ke API Gmail
?>
