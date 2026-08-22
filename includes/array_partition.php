<?php
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
	 * @since 1.4 Added type hints to function signature.
	 *
	 * @param  array $array             Array of items to be evenly distributed into columns.
	 * @param  int   $number_of_columns Number of columns to split the items contained in $array into.
	 * @return array                    An array whose elements are sub-arrays representing columns
	 *                                  containing the distributed items from $array.
	 */
	function c2c_array_partition( array $array, int $number_of_columns ) : array {
		if ( $number_of_columns < 1 ) {
			return [];
		}

		$arraylen = count( $array );
		$partlen = intdiv( $arraylen, $number_of_columns );
		$partrem = $arraylen % $number_of_columns;
		$partition = [];
		$mark = 0;
		for ( $px = 0; $px < $number_of_columns; $px++ ) {
			$incr = ( $px < $partrem ) ? $partlen + 1 : $partlen;
			$partition[ $px ] = array_slice( $array, $mark, $incr );
			$mark += $incr;
		}
		return $partition;
	}
endif;
