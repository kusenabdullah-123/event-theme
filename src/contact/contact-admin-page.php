<?php
// ===== Halaman Setting Form Kontak & SMTP (Production) =====

add_action('admin_menu', function() {
    add_menu_page(
        'Contact Settings',
        'Contact Settings',
        'manage_options',
        'contact-settings',
        'render_contact_settings_page',
        'dashicons-email-alt',
        80
    );
});

function render_contact_settings_page() {
    if (isset($_POST['contact_settings_nonce']) && wp_verify_nonce($_POST['contact_settings_nonce'], 'save_contact_settings')) {
        update_option('contact_to_email', sanitize_email($_POST['contact_to_email']));
        update_option('contact_subject', sanitize_text_field($_POST['contact_subject']));
        update_option('smtp_host', sanitize_text_field($_POST['smtp_host']));
        update_option('smtp_port', intval($_POST['smtp_port']));
        update_option('smtp_username', sanitize_text_field($_POST['smtp_username']));
        update_option('smtp_password', sanitize_text_field($_POST['smtp_password']));
        update_option('smtp_secure', sanitize_text_field($_POST['smtp_secure']));
        update_option('smtp_from_name', sanitize_text_field($_POST['smtp_from_name']));
        echo '<div class="updated"><p><strong>Pengaturan berhasil disimpan.</strong></p></div>';
    }

    $to_email = get_option('contact_to_email', get_option('admin_email'));
    $subject  = get_option('contact_subject', 'Pesan Baru dari Form Kontak');
    $smtp_host = get_option('smtp_host', '');
    $smtp_port = get_option('smtp_port', 465);
    $smtp_username = get_option('smtp_username', '');
    $smtp_password = get_option('smtp_password', '');
    $smtp_secure = get_option('smtp_secure', 'ssl');
    $smtp_from_name = get_option('smtp_from_name', get_bloginfo('name'));
    ?>
    <div class="wrap">
        <h1>Contact & SMTP Settings</h1>
        <form method="post">
            <?php wp_nonce_field('save_contact_settings', 'contact_settings_nonce'); ?>

            <h2>📨 Email Tujuan</h2>
            <table class="form-table">
                <tr>
                    <th><label for="contact_to_email">Email Tujuan</label></th>
                    <td><input type="email" name="contact_to_email" value="<?php echo esc_attr($to_email); ?>" class="regular-text" required></td>
                </tr>
                <tr>
                    <th><label for="contact_subject">Subjek Default</label></th>
                    <td><input type="text" name="contact_subject" value="<?php echo esc_attr($subject); ?>" class="regular-text"></td>
                </tr>
            </table>

            <h2>⚙️ SMTP Configuration</h2>
            <table class="form-table">
                <tr>
                    <th><label for="smtp_host">SMTP Host</label></th>
                    <td><input type="text" name="smtp_host" value="<?php echo esc_attr($smtp_host); ?>" class="regular-text"></td>
                </tr>
                <tr>
                    <th><label for="smtp_port">SMTP Port</label></th>
                    <td><input type="number" name="smtp_port" value="<?php echo esc_attr($smtp_port); ?>" class="small-text"></td>
                </tr>
                <tr>
                    <th><label for="smtp_secure">Secure Type</label></th>
                    <td>
                        <select name="smtp_secure">
                            <option value="none" <?php selected($smtp_secure, 'none'); ?>>None</option>
                            <option value="ssl" <?php selected($smtp_secure, 'ssl'); ?>>SSL</option>
                            <option value="tls" <?php selected($smtp_secure, 'tls'); ?>>TLS</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th><label for="smtp_username">SMTP Username</label></th>
                    <td><input type="text" name="smtp_username" value="<?php echo esc_attr($smtp_username); ?>" class="regular-text"></td>
                </tr>
                <tr>
                    <th><label for="smtp_password">SMTP Password</label></th>
                    <td><input type="password" name="smtp_password" value="<?php echo esc_attr($smtp_password); ?>" class="regular-text"></td>
                </tr>
                <tr>
                    <th><label for="smtp_from_name">Nama Pengirim</label></th>
                    <td><input type="text" name="smtp_from_name" value="<?php echo esc_attr($smtp_from_name); ?>" class="regular-text"></td>
                </tr>
            </table>

            <p class="submit">
                <button type="submit" class="button-primary">Simpan Pengaturan</button>
            </p>
        </form>
    </div>
    <?php
}

// ===== Konfigurasi SMTP untuk wp_mail() (production) =====
add_action('phpmailer_init', function($phpmailer) {
    $host      = get_option('smtp_host');
    $port      = (int) get_option('smtp_port', 465);
    $user      = get_option('smtp_username');
    $pass      = get_option('smtp_password');
    $secure    = get_option('smtp_secure', 'ssl');
    $from_name = get_option('smtp_from_name', get_bloginfo('name'));

    if (empty($host) || empty($user)) return;

    $phpmailer->isSMTP();
    $phpmailer->Host        = $host;
    $phpmailer->Port        = $port;
    $phpmailer->SMTPAuth    = true;
    $phpmailer->Username    = $user;
    $phpmailer->Password    = $pass;
    $phpmailer->SMTPSecure  = ($secure === 'none' ? '' : $secure);
    $phpmailer->SMTPAutoTLS = false;

    $phpmailer->From        = $user;
    $phpmailer->FromName    = $from_name;
    $phpmailer->Sender      = $user;
    $phpmailer->Hostname    = $_SERVER['SERVER_NAME'] ?? 'localhost';
});

add_filter('wp_mail_content_type', fn() => 'text/html; charset=UTF-8');
