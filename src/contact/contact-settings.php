<?php
return [
    'to_email' => get_option('contact_to_email', get_option('admin_email')),
    'subject'  => get_option('contact_subject', 'Pesan Baru dari Form Kontak'),
    'success'  => 'Terima kasih, pesan Anda telah dikirim!',
    'error'    => 'Maaf, terjadi kesalahan saat mengirim pesan. Silakan coba lagi nanti.',
];
