<?php
// includes/login-system.php

// Shortcode : affiche le formulaire de connexion personnalisé
add_shortcode('connexion_utilisateur_panel', function () {
    if (is_user_logged_in()) {
        $user = wp_get_current_user();
        // Si ce n’est pas un admin, redirige vers l’espace club
        if (!in_array('administrator', $user->roles)) {
            wp_redirect(site_url('/espace-club'));
            exit;
        }
    }

    ob_start();

    // Message spécial si connecté en tant qu’admin
    if (is_user_logged_in() && current_user_can('administrator')) {
        echo '<div class="notice notice-info" style="margin: 20px 0; padding: 10px; border-left: 4px solid #00a0d2;">
        Vous êtes connecté en tant qu’administrateur. Ce formulaire s’affiche uniquement pour prévisualisation.<br>
        👉 <a href="' . esc_url(site_url('/espace-club')) . '" style="color: #0073aa;">Accéder à l’Espace Club</a>
    </div>';
    }


    $template_path = ESPACE_CLUB_DIR . 'templates/login.html';
    if (file_exists($template_path)) {
        include $template_path;
    } else {
        echo '<p>Formulaire de connexion introuvable.</p>';
    }
    return ob_get_clean();
});

// Redirige les utilisateurs connectés depuis /membres vers /espace-club
add_action('template_redirect', function () {
    if (is_page('membres') && is_user_logged_in()) {
        $user = wp_get_current_user();
        if (!in_array('administrator', $user->roles)) {
            wp_redirect(site_url('/espace-club'));
            exit;
        }
    }
});


// Traitement AJAX : Connexion d’un directeur de club
add_action('wp_ajax_nopriv_custom_director_login', 'handle_custom_director_login');

function handle_custom_director_login() {
    $creds = [
        'user_login'    => $_POST['user_login'] ?? '',
        'user_password' => $_POST['user_pass'] ?? '',
        'remember'      => true
    ];

    $user = wp_signon($creds, false);

    if (is_wp_error($user)) {
        wp_send_json_error(['message' => 'Adresse e-mail ou mot de passe incorrect']);
    }

    $roles = $user->roles;
    $type  = get_user_meta($user->ID, 'type_employe', true);

    if ($type !== 'directeur_club' && !in_array('administrator', $roles)) {
        wp_logout();
        wp_send_json_error(['message' => 'Vous n’avez pas les droits pour accéder à cet espace.']);
    }

    wp_send_json_success();
}
