<?php
/**
 * @package array_partition
 * @author Scott Reilly
 * @version 1.1.4
 */
/*
Plugin Name: array_partition
Version: 1.1.4
Plugin URI: http://coffee2code.com/wp-plugins/array_partition/
Author: Scott Reilly
Author URI: http://coffee2code.com/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Description: Adds function c2c_array_partition() to split an array into N number of evenly distributed partitions (i.e. split a list into N columns)

Compatible with all versions of WordPress.

=>> Read the accompanying readme.txt file for instructions and documentation.
=>> Also, visit the plugin's homepage for additional information and updates.
=>> Or visit: http://wordpress.org/extend/plugins/array_partition/

Credit: http://us.php.net/manual/en/function.array-chunk.php#75022
*/

/*
	Copyright (c) 2008-2013 by Scott Reilly (aka coffee2code)

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

if ( ! function_exists( 'c2c_array_partition' ) ) :
	/**
	 * Splits an array into N number of evenly distributed partitions (useful for
	 * splitting a list into columns).
	 *
	 * The function will fill as many partitions as requested, as long as there are
	 * enough elements in the array to do so.  Any remaining unfilled partitions
	 * will be represented as empty arrays.
	 *
	 * It can be sent an array of any data types or objects.
	 *
	 * @since 1.1
	 *
	 * @param array $array Array of items to be evenly distributed into columns.
	 * @param int $number_of_columns Number of columns to split the items contained in $array into.
	 * @return array An array whose elements are sub-arrays representing columns containing the distributed items from $array.
	 */
	function c2c_array_partition( $array, $number_of_columns ) {
		$number_of_columns = (int) $number_of_columns;
		$arraylen = count( $array );
		$partlen = floor( $arraylen / $number_of_columns );
		$partrem = $arraylen % $number_of_columns;
		$partition = array();
		$mark = 0;
		for ( $px = 0; $px < $number_of_columns; $px++ ) {
			$incr = ($px < $partrem) ? $partlen + 1 : $partlen;
			$partition[$px] = array_slice( $array, $mark, $incr );
			$mark += $incr;
		}
		return $partition;
	}
endif;

if ( ! function_exists( 'array_partition' ) ) :
	/**
	 * Splits an array into N number of evenly distributed partitions (useful for
	 * splitting a list into columns).
	 *
	 * @since 1.0
	 * @deprecated 1.1 Use c2c_array_partition() instead
	 */
	function array_partition( $array, $number_of_columns ) {
		_deprecated_function( 'array_partition', '1.1', 'c2c_array_partition' );
		return c2c_array_partition( $array, $number_of_columns );
	}
endif;
