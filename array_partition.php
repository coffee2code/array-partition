<?php
/**
 * @package array_partition
 * @author Scott Reilly
 * @version 1.0.3
 */
/*
Plugin Name: array_partition
Version: 1.0.3
Plugin URI: http://coffee2code.com/wp-plugins/array_partition/
Author: Scott Reilly
Author URI: http://coffee2code.com
Description: Introduces function array_partition() to split an array into N number of evenly distributed partitions (useful for splitting a list into columns).

Compatible with all versions of WordPress.

=>> Read the accompanying readme.txt file for instructions and documentation.
=>> Also, visit the plugin's homepage for additional information and updates.
=>> Or visit: http://wordpress.org/extend/plugins/array_partition/

Credit:

	http://us.php.net/manual/en/function.array-chunk.php#75022
*/

/*
Copyright (c) 2008-2011 by Scott Reilly (aka coffee2code)

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation
files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy,
modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the
Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR
IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/

if ( !function_exists( 'array_partition' ) ) :
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
 * @param array $array Array of items to be evenly distributed into columns.
 * @param int $number_of_columns Number of columns to split the items contained in $array into.
 * @return array An array whose elements are sub-arrays representing columns containing the distributed items from $array.
 */
function array_partition( $array, $number_of_columns ) {
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
?>