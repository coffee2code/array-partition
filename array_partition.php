<?php
/**
 * Plugin Name: array_partition
 * Version:     1.3.4
 * Plugin URI:  https://coffee2code.com/wp-plugins/array-partition/
 * Author:      Scott Reilly
 * Author URI:  https://coffee2code.com/
 * Text Domain: array-partition
 * License:     GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Description: Provides a helper function to split an array into N number of evenly distributed partitions (i.e. split a list into N columns)
 *
 * Compatible with all versions of WordPress.
 *
 * =>> Read the accompanying readme.txt file for instructions and documentation.
 * =>> Also, visit the plugin's homepage for additional information and updates.
 * =>> Or visit: https://wordpress.org/plugins/array-partition/
 *
 * Credit: https://secure.php.net/manual/en/function.array-chunk.php#75022
 *
 * @package array_partition
 * @author  Scott Reilly
 * @version 1.3.4
*/

/*
	Copyright (c) 2008-2024 by Scott Reilly (aka coffee2code)

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

defined( 'ABSPATH' ) or die();

if ( ! function_exists( 'c2c_array_partition' ) ) :
	/**
	 * Splits an array into N number of evenly distributed partitions (useful for
	 * splitting a list into columns).
	 *
	 * The function will fill as many partitions as requested, as long as there are
	 * enough elements in the array to do so.  Any remaining unfilled partitions
	 * will be represented as empty arrays.
	 *
	 * It can be sent an array of any data type or object.
	 *
	 * @since 1.1
	 *
	 * @param  array $array             Array of items to be evenly distributed into columns.
	 * @param  int   $number_of_columns Number of columns to split the items contained in $array into.
	 * @return array                    An array whose elements are sub-arrays representing columns
	 *                                  containing the distributed items from $array.
	 */
	function c2c_array_partition( $array, $number_of_columns ) {
		$number_of_columns = absint( $number_of_columns );

		if ( 0 === $number_of_columns ) {
			return array();
		}

		$arraylen = count( $array );
		$partlen = floor( $arraylen / $number_of_columns );
		$partrem = $arraylen % $number_of_columns;
		$partition = array();
		$mark = 0;
		for ( $px = 0; $px < $number_of_columns; $px++ ) {
			$incr = ( $px < $partrem ) ? $partlen + 1 : $partlen;
			$partition[ $px ] = array_slice( $array, $mark, $incr );
			$mark += $incr;
		}
		return $partition;
	}
endif;
