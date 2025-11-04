<?php
if (!defined('ABSPATH')) exit;
if (session_status() !== PHP_SESSION_ACTIVE) session_start();

add_action('wp_loaded', function() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact_form'])) {
        $settings = include get_template_directory() . '/contact/contact-settings.php';

        $name    = sanitize_text_field($_POST['name'] ?? '');
        $phone   = sanitize_text_field($_POST['phone'] ?? '');
        $message = sanitize_textarea_field($_POST['message'] ?? '');

        if ($name && $phone && $message) {
            $to       = $settings['to_email'];
            $subject  = $settings['subject'];
            $headers  = ['Content-Type: text/html; charset=UTF-8'];

            $body = "
                <h3>Pesan Baru dari Website</h3>
                <p><strong>Nama:</strong> {$name}</p>
                <p><strong>Nomor Telepon:</strong> {$phone}</p>
                <p><strong>Pesan:</strong><br>{$message}</p>
                <hr>
                <p>Email ini dikirim otomatis dari <a href='" . esc_url(home_url()) . "'>" . get_bloginfo('name') . "</a></p>
            ";

            $sent = wp_mail($to, $subject, $body, $headers);

            $_SESSION['contact_status'] = $sent
                ? ['status' => 'success', 'msg' => $settings['success']]
                : ['status' => 'error',   'msg' => $settings['error']];
        } else {
            $_SESSION['contact_status'] = ['status' => 'error', 'msg' => 'Mohon isi semua kolom.'];
        }

        wp_safe_redirect($_SERVER['HTTP_REFERER']);
        exit;
    }
});
