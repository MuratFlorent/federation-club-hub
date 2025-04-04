<?php
// includes/directeur-dashboard.php

add_shortcode('espace_directeur_club', function () {
    if (!is_user_logged_in()) {
        wp_redirect(site_url('/membres'));
        exit;
    }

    $user = wp_get_current_user();
    $type = get_user_meta($user->ID, 'type_employe', true);

    if ($type !== 'directeur_club' && !in_array('administrator', $user->roles)) {
        wp_redirect(site_url('/membres'));
        exit;
    }

    ob_start();
    $template_path = ESPACE_CLUB_DIR . 'templates/dashboard.php';
    if (file_exists($template_path)) {
        include $template_path;
    } else {
        echo '<p>Dashboard introuvable.</p>';
    }
    return ob_get_clean();
});
