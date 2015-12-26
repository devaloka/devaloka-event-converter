<?php
/*
Plugin Name: Devaloka Event Converter
Description: Interchangeably converts all WordPress action/filter to/from EventDispatcher's Event
Version: 0.5.1
Author: Whizark
Author URI: http://whizark.com
License: GPL-2.0+
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: devaloka-event-converter
Domain Path: /devaloka-event-converter/languages
Network: true
*/

if (!defined('ABSPATH')) {
    exit;
}

require WPMU_PLUGIN_DIR . '/devaloka-event-converter/devaloka-event-converter.php';
