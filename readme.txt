=== array_partition ===
Contributors: coffee2code
Donate link: http://coffee2code.com/donate
Tags: columns, array, partitions, coffee2code
Requires at least: 1.2
Tested up to: 3.1
Stable tag: 1.1
Version: 1.1

Introduces function c2c_array_partition() to split an array into N number of evenly distributed partitions (useful for splitting a list into columns).


== Description ==

Introduces function `c2c_array_partition()` to split an array into N number of evenly distributed partitions (useful for splitting a list into columns).

This plugin provides a PHP function to split an array into any number of sub-arrays, suitable for creating evenly distributed (vertically filled) "columns".  Also known as "chunking" or "partitioning".

For example:

`$topics = array( "ant", "bear", "cat", "dog", "emu", "frog", "gnu", "hippo", "ibis", "jackal");`
`print_r(c2c_array_partition($topics, 4));`

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

Links: [Plugin Homepage]:(http://coffee2code.com/wp-plugins/array_partition/) | [Author Homepage]:(http://coffee2code.com)


== Installation ==

1. Unzip `array_partition.zip` inside the `/wp-content/plugins/` directory (or install via the built-in WordPress plugin installer)
1. Activate the plugin through the 'Plugins' admin menu in WordPress
1. Use the `c2c_array_partition()` function in your template(s) or code as desired.


== Examples ==

`<?php
  $topics = array( "ant", "bear", "cat");
  print_r(c2c_array_partition($topics, 5));
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

`array_chunk()` allows you to specify the number of elements per partition, not how many partitions you want.


== Changelog ==

= 1.1 =
* Rename `array_partition()` to `c2c_array_partition()` (but maintain a deprecated version for backwards compatibility)
* Add link to plugin homepage to description in readme.txt

= 1.0.3 =
* Note compatibility through WP 3.1+
* Update copyright date (2011)

= 1.0.2 =
* Wrap function in if (function_exists()) check
* Note compatibility with WP 3.0+
* Remove docs from top of plugin file (all that and more are in readme.txt)
* Remove trailing whitespace in header docs
* Add Upgrade Notice section to readme.txt

= 1.0.1 =
* Add PHPDoc documentation
* Note compatibility with WP 2.9+
* Update copyright date

= 1.0 =
* Initial release


== Upgrade Notice ==

= 1.1 =
Minor update: deprecated 'array_partition()' in favor of 'c2c_array_partition()'; added link to plugin homepage in readme.txt

= 1.0.3 =
Trivial update: noted compatibility through WP 3.1+ and updated copyright date

= 1.0.2 =
Minor update. Highlights: added if(function_exists()) check around array_partition(); minor text reorganization; added verified WP 3.0 compatibility.