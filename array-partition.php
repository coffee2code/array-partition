<?php
/**
 * Plugin Name: Array Partition
 * Version:     2.0
 * Plugin URI:  https://coffee2code.com/wp-plugins/array-partition/
 * Author:      Scott Reilly
 * Author URI:  https://coffee2code.com/
 * Requires at least: 5.0
 * Requires PHP:      7.0
 * License:     GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Description: Provides a helper function to split an array into N number of evenly distributed partitions (i.e. split a list into N columns)
 *
 * Compatible with WordPress 5.0+ through 7.1+, and PHP 7.0 through at least 8.5+.
 *
 * =>> Read the accompanying readme.txt file for instructions and documentation.
 * =>> Also, visit the plugin's homepage for additional information and updates.
 * =>> Or visit: https://wordpress.org/plugins/array-partition/
 *
 * Credit: https://www.php.net/manual/en/function.array-chunk.php#75022
 *
 * @package Array_Partition
 * @author  Scott Reilly
 * @version 2.0
*/

/*
	Copyright (c) 2008-2026 by Scott Reilly (aka coffee2code)

	This program is free software; you can redistribute it and/or
	modify it under the terms of the GNU General Public License
	as published by the Free Software Foundation; either version 2
	of the License, or (at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

defined( 'ABSPATH' ) || exit;

require_once __DIR__ . '/includes/array_partition.php';

if ( ! function_exists( 'c2c_array_partition' ) ) :
	/**
	 * Alias for `c2c_Array_Partition::partition()`.
	 *
	 * @since 1.1
	 * @since 2.0 Moved to plugin loader; now delegates to `c2c_Array_Partition::partition()`.
	 *
	 * @param array $array             Array of items to be evenly distributed into columns.
	 * @param int   $number_of_columns Number of columns to split the items contained in $array into.
	 * @return array                   An array whose elements are sub-arrays representing columns
	 *                                 containing the distributed items from $array.
	 */
	function c2c_array_partition( array $array, int $number_of_columns ) : array {
		return c2c_Array_Partition::partition( $array, $number_of_columns );
	}
endif;
