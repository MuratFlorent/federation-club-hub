<?php
// includes/employes-panel.php

// Ajoute une page admin sous l’onglet “Utilisateurs”
add_action('admin_menu', function () {
    add_users_page(
        'Type Employé',
        'Type Employé',
        'edit_users',
        'type-employe',
        'page_type_employe_admin'
    );
});

// Callback pour la page admin
function page_type_employe_admin() {
    $types_disponibles = ['directeur_club', 'coach', 'secretaire'];

    if (!empty($_POST['type_employe_update']) && !empty($_POST['type_employe'])) {
        foreach ($_POST['type_employe'] as $user_id => $valeur) {
            update_user_meta($user_id, 'type_employe', sanitize_text_field($valeur));
        }
        echo '<div class="notice updated"><p>Types employés mis à jour !</p></div>';
    }

    $all_users = get_users(['number' => -1]);
    $employees = array_filter($all_users, function ($user) {
        return in_array('wpamelia-provider', $user->roles);
    });

    $template_path = ESPACE_CLUB_DIR . 'templates/amelia-gestion.html';
    if (file_exists($template_path)) {
        include $template_path;
    } else {
        echo '<div class="notice notice-error"><p>Template HTML amelia-gestion.html introuvable.</p></div>';
    }
}

// Donne un type automatiquement aux employés lors de l'inscription/mise à jour
add_action('user_register', 'assigner_type_employe_auto', 20);
add_action('profile_update', 'assigner_type_employe_auto', 20);

function assigner_type_employe_auto($user_id) {
    $user = get_userdata($user_id);
    if (in_array('wpamelia-provider', $user->roles)) {
        if (!get_user_meta($user_id, 'type_employe', true)) {
            update_user_meta($user_id, 'type_employe', 'directeur_club');
        }
    }
}

// Colonne personnalisée dans la liste des utilisateurs WP
add_filter('manage_users_columns', function ($columns) {
    $columns['type_employe'] = 'Type Employé';
    return $columns;
});

add_filter('manage_users_custom_column', function ($value, $column_name, $user_id) {
    if ($column_name === 'type_employe') {
        return get_user_meta($user_id, 'type_employe', true);
    }
    return $value;
}, 10, 3);
