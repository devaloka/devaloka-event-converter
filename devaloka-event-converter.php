<?php
/*
Plugin Name: Devaloka Event Converter
Description: Interchangeably converts all WordPress action/filter to/from EventDispatcher's Event
Version: 0.5.2
Author: Whizark
Author URI: http://whizark.com
License: GPL-2.0+
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: devaloka-event-converter
Domain Path: /languages
Network: true
*/

if (!defined('ABSPATH')) {
    exit;
}

use Devaloka\EventConverter\Provider\EventConverterProvider;

/** @var Devaloka\Devaloka $devaloka */
call_user_func(
    function () use ($devaloka) {
        $container = $devaloka->getContainer();

        /** @var Composer\Autoload\ClassLoader $loader */
        $loader = $container->get('loader');

        $loader->addPsr4('Devaloka\\EventConverter\\', __DIR__ . '/src/', true);

        $devaloka->register(new EventConverterProvider());
    }
);
