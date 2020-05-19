<?php

/**
 * Plugin Name: Cleyam-RPG-Dice
 * Description: A plugin used to simulate dice rolls for roleplay games. shortcode [cleyamDice] where you want to use it !
 * Version: 1.0
 * Author: Cleyam ( Thomas Hermant )
 * Author URI: https://github.com/Cleyam
 * 
 */

//  Pour hook dans la page wordpress
// add_action('HOOK', 'cleyam_dice');

// Pour gerer événements WP ( ex : template par défaut pour article )
// add_fitler('FILTER', 'cleyam_dice');

// Add the custom js file into the plugin, compatible with jquery
wp_enqueue_script('cleyam-rpg-dice', plugin_dir_url(__FILE__) . 'js/cleyam-rpg-dice.js', array('jquery'), null, true);
wp_register_style('prefix_bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
wp_enqueue_style('prefix_bootstrap');
wp_register_style('custom-css', plugin_dir_url(__FILE__) . 'css/cleyam-rpg-dice.css');
wp_enqueue_style('custom-css');

function cleyamDice()
{
    ob_start();
    require_once('form/form.html');
    $html = ob_get_clean();
    return $html;
}
add_shortcode('cleyamDice', 'cleyamDice');
