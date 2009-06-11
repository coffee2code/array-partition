<?php
/*
Plugin Name: array_partition
Version: 1.0
Plugin URI: http://coffee2code.com/wp-plugins/array_partition
Author: Scott Reilly
Author URI: http://coffee2code.com
Description: Introduces function array_partition() to split an array into N number of evenly distributed partitions (useful for splitting a list into columns).

This plugin provides a PHP function to split an array into any number of sub-arrays, suitable for creating evenly
distributed (vertically filled) "columns".  Also known as "chunking" or "partitioning".

For example:

$topics = array( "ant", "bear", "cat", "dog", "emu", "frog", "gnu", "hippo", "ibis", "jackal");
print_r(array_partition($topics, 4));

Yields:

Array
(
    [0] => Array
        (
            [0] => ant
            [1] => bear
            [2] => cat
        )

    [1] => Array
        (
            [0] => dog
            [1] => emu
            [2] => frog
        )

    [2] => Array
        (
            [0] => gnu
            [1] => hippo
        )

    [3] => Array
        (
            [0] => ibis
            [1] => jackal
        )

)

The plugin will fill as many partitions as requested, as long as there are enough elements in the array to do so.  Any
remaining unfilled partitions will be represented as empty arrays.

Why not use PHP's built-in array_chunk()?  array_chunk() allows you to specify the number of elements per partition,
not how many partitions you want.

It can be sent an array of any data types or objects.

Compatible with all versions of WordPress.

=>> Read the accompanying readme.txt file for more information.  Also, visit the plugin's homepage
=>> for more information and the latest updates

Installation:

1. Download the file http://coffee2code.com/wp-plugins/array_partitions.zip and unzip it into your 
/wp-content/plugins/ directory.
2. Activate the plugin through the 'Plugins' admin menu in WordPress
3. Use the array_partition() function in your template(s) or code as desired.

Credit:

	http://us.php.net/manual/en/function.array-chunk.php#75022

*/

/*
Copyright (c) 2008 by Scott Reilly (aka coffee2code)

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

function array_partition( $array, $number_of_columns ) {
    $arraylen = count( $array );
    $partlen = floor( $arraylen / $number_of_columns );
    $partrem = $arraylen % $number_of_columns;
    $partition = array();
    $mark = 0;
    for ($px = 0; $px < $number_of_columns; $px++) {
        $incr = ($px < $partrem) ? $partlen + 1 : $partlen;
        $partition[$px] = array_slice( $array, $mark, $incr );
        $mark += $incr;
    }
    return $partition;
}
?>