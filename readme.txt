=== array_partition ===
Contributors: coffee2code
Donate link: http://coffee2code.com/donate
Tags: columns, array, partitions, coffee2code
Requires at least: 1.2
Tested up to: 2.9.1
Stable tag: 1.0.1
Version: 1.0.1

Introduces function array_partition() to split an array into N number of evenly distributed partitions (useful for splitting a list into columns).

== Description ==

Introduces function array_partition() to split an array into N number of evenly distributed partitions (useful for splitting a list into columns).

This plugin provides a PHP function to split an array into any number of sub-arrays, suitable for creating evenly distributed (vertically filled) "columns".  Also known as "chunking" or "partitioning".

For example:

`$topics = array( "ant", "bear", "cat", "dog", "emu", "frog", "gnu", "hippo", "ibis", "jackal");`
`print_r(array_partition($topics, 4));`

Yields:

`Array
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
)`

The function will fill as many partitions as requested, as long as there are enough elements in the array to do so.  Any remaining unfilled partitions will be represented as empty arrays.

It can be sent an array of any data types or objects.

== Installation ==

1. Unzip `array_partition.zip` inside the `/wp-content/plugins/` directory (or install via the built-in WordPress plugin installer)
1. Activate the plugin through the 'Plugins' admin menu in WordPress
1. Use the array_partition() function in your template(s) or code as desired.

== Examples ==

`<?php
  $topics = array( "ant", "bear", "cat");
  print_r(array_columns($topics, 5));
?>`

=>

`Array
(
    [0] => Array
        (
            [0] => ant
        )

    [1] => Array
        (
            [0] => bear
        )

    [2] => Array
        (
            [0] => cat
        )

    [3] => Array
        (
        )

    [4] => Array
        (
        )

)`

== Frequently Asked Questions ==

= Why not use PHP's built-in `array_chunk()`? =

A: `array_chunk()` allows you to specify the number of elements per partition, not how many partitions you want.

== Changelog ==

= 1.0.1 =
* Add PHPDoc documentation
* Note compatibility with WP 2.9+
* Update copyright date

= 1.0 =
* Initial release
