<?php
 /**
 *
 * @package   Evans Lake Functionality
 * @author    Ladan Vafi <l_vafi@yahoo.com>, Stan Maksarov <maksarov.s@gmail.com>, Victor Salmon <victorsalmon@hotmail.com>
 * @license   GPL-2.0+
 * @copyright 2017 Ladan Vafi, Stan Maksarov, Victor Salmon
 *
 * @wordpress-plugin
 * Plugin Name: Evans Lake Functionality
 * Description: This very important plugin contains all of the core functionality for this website so that it remains theme-independent.
 * Version:     1.0.0
 * Author:      Ladan Vafi, Stan Maksarov, Victor Salmon
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Define plugin directory
 *
 * @since 1.0.0
 */
define( 'RF_DIR', dirname( __FILE__ ) );

/**
 * General housekeeping and plugin activation tasks
 *
 * @since 1.0.0
 */
include_once( RF_DIR . '/lib/functions/general.php' );
register_activation_hook( __FILE__, array( 'RF_General', 'plugin_activation' ) );

/**
 * Post types
 *
 * @since 1.0.0
 */
include_once( RF_DIR . '/lib/functions/post-types.php' );

/**
 * Taxonomies
 *
 * @since 1.0.0
 */
include_once( RF_DIR . '/lib/functions/taxonomies.php' );
