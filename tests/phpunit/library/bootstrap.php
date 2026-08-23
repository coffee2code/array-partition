<?php
/**
 * PHPUnit bootstrap file for library-only tests.
 *
 * @package Array_Partition
 */

// Prevent web access.
( php_sapi_name() !== 'cli' ) && exit;

define( 'ARRAY_PARTITION_PLUGIN_DIR', dirname( __FILE__, 4 ) );

$polyfill_path = ARRAY_PARTITION_PLUGIN_DIR . '/vendor/yoast/phpunit-polyfills/phpunitpolyfills-autoload.php';
if ( file_exists( $polyfill_path ) ) {
	require $polyfill_path;
} else {
	echo "Error: PHPUnit Polyfills dependency not found.\n";
	echo "Run: composer require --dev yoast/phpunit-polyfills:\"^2.0\"\n";
	exit( 1 );
}

require_once ARRAY_PARTITION_PLUGIN_DIR . '/includes/array_partition.php';
require_once dirname( __DIR__ ) . '/trait-array-partition-test-cases.php';
