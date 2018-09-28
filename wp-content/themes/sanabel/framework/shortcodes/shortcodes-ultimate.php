<?php
/*
  Plugin Name: Shortcodes Ultimate
  Plugin URI: http://gndev.info/shortcodes-ultimate/
  Version: 4.9.3
  Author: Vladimir Anokhin
  Author URI: http://gndev.info/
  Description: Supercharge your WordPress theme with mega pack of shortcodes
  Text Domain: su
  Domain Path: /languages
  License: GPL
 */

// Define plugin constants
define( 'SU_ENABLE_CACHE', false );

// Includes
require_once 'inc/load.php';
require_once 'inc/assets.php';
require_once 'inc/shortcodes.php';
require_once 'inc/tools.php';
require_once 'inc/data.php';
require_once 'inc/generator-views.php';
require_once 'inc/generator.php';
require_once 'inc/widget.php';
