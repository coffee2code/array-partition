<?php
/**
 * PHPUnit bootstrap file
 *
 * @package Array_Partition
 */

// Prevent web access.
( php_sapi_name() !== 'cli' ) && exit;

define( 'ARRAY_PARTITION_PLUGIN_DIR',  dirname( __FILE__, 3 ) );
define( 'ARRAY_PARTITION_PLUGIN_FILE', ARRAY_PARTITION_PLUGIN_DIR . '/array-partition.php' );

$polyfill_path = ARRAY_PARTITION_PLUGIN_DIR . '/vendor/yoast/phpunit-polyfills/phpunitpolyfills-autoload.php';
if ( file_exists( $polyfill_path ) ) {
	require $polyfill_path;
} else {
	echo "Error: PHPUnit Polyfills dependency not found.\n";
	echo "Run: composer require --dev yoast/phpunit-polyfills:\"^2.0\"\n";
	exit( 1 );
}

! defined( 'WP_RUN_CORE_TESTS' ) && define( 'WP_RUN_CORE_TESTS', false );

ini_set( 'display_errors', 'on' );
error_reporting( E_ALL );

$_tests_dir = getenv( 'WP_TESTS_DIR' );
if ( ! $_tests_dir ) {
	$_tests_dir = '/tmp/wordpress-tests-lib';
}

// Support both the wordpress-tests-lib layout and a full wordpress-develop checkout.
$_tests_includes = null;
if ( file_exists( $_tests_dir . '/includes/functions.php' ) ) {
	$_tests_includes = $_tests_dir . '/includes';
} elseif ( file_exists( $_tests_dir . '/tests/phpunit/includes/functions.php' ) ) {
	$_tests_includes = $_tests_dir . '/tests/phpunit/includes';
} else {
	echo "Error: Could not find WordPress test library includes in {$_tests_dir}.\n";
	exit( 1 );
}

// Give access to tests_add_filter() function.
require_once $_tests_includes . '/functions.php';

require_once dirname( __FILE__ ) . '/trait-array-partition-test-cases.php';

/**
 * Manually load the plugin being tested.
 */
function _manually_load_plugin() {
	require ARRAY_PARTITION_PLUGIN_FILE;
}
tests_add_filter( 'muplugins_loaded', '_manually_load_plugin' );

// Start up the WP testing environment.
require $_tests_includes . '/bootstrap.php';
