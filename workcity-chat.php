<?php
/**
 * Plugin Name: Workcity Chat
 * Description: Adds chat sessions, shortcode for widget, and REST API integration.
 * Version: 1.0
 * Author: Obitope Eniola Nathaniel
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// Load includes
require_once plugin_dir_path( __FILE__ ) . 'includes/cpt.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/shortcode.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/rest-api.php';
