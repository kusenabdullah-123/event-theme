<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact_form'])) {

    // Load setting
    $settings = include __DIR__ . '/contact-settings.php';

    // Sanitasi input
    $name    = sanitize_text_field($_POST['name']);
    $phone   = sanitize_text_field($_POST['phone']);
    $message = sanitize_textarea_field($_POST['message']);

    // Validasi sederhana
    if (!empty($name) && !empty($phone) && !empty($message)) {

        $to      = $settings['to_email'];
        $subject = $settings['subject'];
        $headers = ['Content-Type: text/html; charset=UTF-8'];

        $body = "
            <h3>Pesan Baru dari Website</h3>
            <p><strong>Nama:</strong> {$name}</p>
            <p><strong>Nomor Telepon:</strong> {$phone}</p>
            <p><strong>Pesan:</strong><br>{$message}</p>
        ";

        // Kirim email
        if (wp_mail($to, $subject, $body, $headers)) {
            $status = 'success';
            $msg = $settings['success'];
        } else {
            $status = 'error';
            $msg = $settings['error'];
        }
    } else {
        $status = 'error';
        $msg = 'Mohon isi semua kolom.';
    }

    // Simpan status ke session (agar bisa tampil setelah reload)
    session_start();
    $_SESSION['contact_status'] = compact('status', 'msg');

    // Redirect ke halaman yang sama
    wp_redirect($_SERVER['HTTP_REFERER']);
    exit;
}
