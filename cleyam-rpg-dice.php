<?php

/**
 * Plugin Name: Cleyam-RPG-Dice
 * Description: A plugin used to simulate dice rolls for roleplay games. shortcode [cleyamDice] where you want to use it !
 * Version: 1.0
 * Author: Cleyam ( Thomas Hermant )
 * Author URI: https://github.com/Cleyam
 * 
 */

// Add the custom js file into the plugin, compatible with jquery
wp_enqueue_script('cleyam-rpg-dice', plugin_dir_url(__FILE__) . 'js/cleyam-rpg-dice.js', array('jquery'), null, true);
wp_register_style('prefix_bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
wp_enqueue_style('prefix_bootstrap');
wp_register_style('custom-css', plugin_dir_url(__FILE__) . 'css/cleyam-rpg-dice.css');
wp_enqueue_style('custom-css');


// Create or delete roll history when installing or uninstalling the plugin
register_activation_hook(__FILE__, 'cleyamDice_create_table');
function cleyamDice_create_table()
{
    global $wpdb;
    $wp_track_table = $wpdb->prefix . 'cleyam_rpg_dice';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $wp_track_table ( 
        `id` int(11) NOT NULL AUTO_INCREMENT, 
        `user_id` int(11) NOT NULL,
        `time` datetime NOT NULL, 
        `diceNumber` int(11) NOT NULL, 
        `diceType` int(11) NOT NULL, 
        `result` varchar(255) NOT NULL, 
        PRIMARY KEY (id)
        ) $charset_collate;";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

register_deactivation_hook(__FILE__, 'cleyamDice_delete_table');
function cleyamDice_delete_table()
{
    global $wpdb;
    $wp_track_table = $wpdb->prefix . 'cleyam_rpg_dice';
    $wpdb->query("DROP TABLE IF EXISTS $wp_track_table");
}

// Front display
function cleyamDice()
{
    ob_start();
    require_once('html/form.html');
    $html = ob_get_clean();
    return $html;
}
add_shortcode('cleyamDice', 'cleyamDice');


// Admin display
add_action('admin_menu', 'cleyamDice_admin_menu');
function cleyamDice_admin_menu()
{
    $page_title = 'Cleyam RPG Dice Admin Menu';
    $menu_title = 'Cleyam RPG Dice';
    $capability = 'manage_options';
    $menu_slug  = 'cleyam-rpg-dice';
    $function   = 'cleyamDice_admin';
    $icon_url   = 'dashicons-list-view';
    $position   = 4;
    add_menu_page($page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position);
}

function cleyamDice_admin()
{
    ob_start();
    require_once('html/admin.html');
    $html = ob_get_clean();
    echo $html;
}
