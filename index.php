<?php
/**
 * @package TiviClick Settings
 */
/*
Plugin Name: TiviClick
Plugin URI: http://www.tiviclick.com/addons/wordpress/tiviclick.zip
Description: Video Chat
Version: 1.0.0
Author: TiviClick <admin@tiviclick.com>
Author URI: http://www.tiviclick.com
*/

// ############ CREATING SETTING PAGES ON THE INSTALL OF THIS PLUGIN.. ############# //

define('TIVICLICK_URL', plugins_url());
define('TIVICLICK_DIR', plugin_dir_path( __FILE__ ));

include_once( TIVICLICK_DIR . 'functions.php' );