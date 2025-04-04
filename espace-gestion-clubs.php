<?php
/*
Plugin Name: Espace Gestion Clubs - Comité 91
Description: Plugin unifié pour l'espace membre du Comité Territorial 91 (dashboard, documents, billetterie, Amelia, etc).
Version: 1.0
Author: Florent Murat
*/

defined('ABSPATH') || exit;
define('ESPACE_CLUB_DIR', plugin_dir_path(__FILE__));
define('ESPACE_CLUB_URL', plugin_dir_url(__FILE__));

/*--------------------------------------------------------------
# Chargement des modules (code logique)
--------------------------------------------------------------*/
require_once ESPACE_CLUB_DIR . 'includes/dashboard.php';
require_once ESPACE_CLUB_DIR . 'includes/login-system.php';
require_once ESPACE_CLUB_DIR . 'includes/employes-panel.php';
require_once ESPACE_CLUB_DIR . 'includes/directeur-dashboard.php';
// require_once ESPACE_CLUB_DIR . 'includes/documents.php';
// require_once ESPACE_CLUB_DIR . 'includes/billetterie.php';

/*--------------------------------------------------------------
# Chargement des fichiers CSS & JS globaux
--------------------------------------------------------------*/
function espace_club_enqueue_assets() {
    wp_enqueue_style('bootstrap', ESPACE_CLUB_URL . 'assets/adminlte/plugins/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('fontawesome', ESPACE_CLUB_URL . 'assets/adminlte/plugins/fontawesome-free/css/all.min.css');
    wp_enqueue_style('adminlte', ESPACE_CLUB_URL . 'assets/adminlte/css/adminlte.min.css');
    wp_enqueue_style('espace-club-custom', ESPACE_CLUB_URL . 'assets/css/custom.css');
    wp_enqueue_style('espace-club-login-style', ESPACE_CLUB_URL . 'assets/css/style-login.css');
    wp_enqueue_style('espace-club-panel-style', ESPACE_CLUB_URL . 'assets/css/style-panel.css');

    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap-js', ESPACE_CLUB_URL . 'assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js', ['jquery'], null, true);
    wp_enqueue_script('adminlte-js', ESPACE_CLUB_URL . 'assets/adminlte/js/adminlte.min.js', ['jquery', 'bootstrap-js'], null, true);
    wp_enqueue_script('espace-club-custom-js', ESPACE_CLUB_URL . 'assets/js/custom.js', ['jquery'], null, true);
    wp_enqueue_script('espace-club-login-js', ESPACE_CLUB_URL . 'assets/js/script-login.js', ['jquery'], null, true);
    wp_enqueue_script('espace-club-dashboard-js', ESPACE_CLUB_URL . 'assets/js/dashboard.js', ['jquery'], null, true);

    wp_localize_script('espace-club-login-js', 'ameliaLogin', [
        'ajax_url' => admin_url('admin-ajax.php')
    ]);
}
add_action('wp_enqueue_scripts', 'espace_club_enqueue_assets');

/*--------------------------------------------------------------
# Création automatique de la page /espace-club à l’activation
--------------------------------------------------------------*/
function espace_club_create_page() {
    if (!get_page_by_path('espace-club')) {
        wp_insert_post([
            'post_title'     => 'Espace Club',
            'post_name'      => 'espace-club',
            'post_content'   => '[espace_club_dashboard]',
            'post_status'    => 'publish',
            'post_type'      => 'page',
        ]);
    }
}
register_activation_hook(__FILE__, 'espace_club_create_page');
