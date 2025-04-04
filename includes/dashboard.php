<?php
/*
 * Dashboard logic pour le shortcode [espace_club_dashboard]
 * Chargement du template AdminLTE côté membres
 */

defined('ABSPATH') || exit;

define('ESPACE_CLUB_TEMPLATE_DIR', plugin_dir_path(__FILE__) . '../templates/');

function espace_club_dashboard_shortcode() {
    ob_start();
    include ESPACE_CLUB_TEMPLATE_DIR . 'dashboard.php';
    return ob_get_clean();
}
add_shortcode('espace_club_dashboard', 'espace_club_dashboard_shortcode');
