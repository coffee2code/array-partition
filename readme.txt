=== array_partition ===
Contributors: coffee2code
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=6ARCFJ9TX3522
Tags: columns, array, partitions, layout, coffee2code
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Requires at least: 1.2
Tested up to: 4.0
Stable tag: 1.2.1

Provides a helper function to split an array into N number of evenly distributed partitions (i.e. split a list into N columns)


== Description ==

This plugin provides the PHP function `c2c_array_partition()` to split an array into any number of sub-arrays, suitable for creating evenly distributed, vertically filled "columns".  Also known as "chunking" or "partitioning".

For example:

`$topics = array( "aardvark", "bear", "cat", "dog", "emu", "fox", "gnu", "hippo", "ibis", "jackal" );`
`print_r( c2c_array_partition( $topics, 4 ) );`

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
            [2] => fox
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

Note the array elements are distributed into the requested 4 "columns" as evenly as possible.

The function will fill as many partitions as requested, as long as there are enough elements in the array to do so.  Any remaining unfilled partitions will be represented as empty arrays.

In contrast, using PHP's built-in `array_chunck()` as such:

`print_r( array_chunk( $topics, 4 ) );`

Yields:

`Array
(
    [0] => Array
        (
            [0] => aardvark
            [1] => bear
            [2] => cat
            [3] => dog
        )
    [1] => Array
        (
            [0] => emu
            [1] => fox
            [2] => gnu
            [3] => hippo
        )
    [2] => Array
        (
            [0] => ibis
            [1] => jackal
        )
)`

It can be sent an array of any data types or objects.


Links: [Plugin Homepage](http://coffee2code.com/wp-plugins/array-partition/) | [Plugin Directory Page](https://wordpress.org/plugins/array-partition/) | [Author Homepage](http://coffee2code.com)


== Installation ==

1. Unzip `array_partition.zip` inside the `/wp-content/plugins/` directory (or install via the built-in WordPress plugin installer)
1. Activate the plugin through the 'Plugins' admin menu in WordPress
1. Use the `c2c_array_partition()` function in your template(s) or code as desired.


== Examples ==

`<?php
  $topics = array( "ant", "bear", "cat" );
  print_r( c2c_array_partition( $topics, 5 ) );
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

Also see Description section for another example. Definitely check out the packaged unit test file as it contains various examples.


== Frequently Asked Questions ==

= Why not use PHP's built-in `array_chunk()`? =

`array_chunk()` allows you to specify the number of elements per partition, not how many partitions you want. (See Description.).

For an array with 12 elements, if you requested a chunk size of 2, you would get back an array of 6 sub-arrays (the original elements grouped into arrays of 2 elements). With `array_partition()`, if you requested 2 partitions, you would get back an array of 2 sub-arrays (the original elements grouped into 2 arrays).

= Does this plugin include unit tests? =

Yes.


== Changelog ==

= 1.2.1 (2014-08-25) =
* Die early if script is directly invoked
* Minor plugin header reformatting
* Change documentation links to wp.org to be https
* Note compatibility through WP 4.0+
* Add plugin icon

= 1.2 =
* Return an empty array if 0 columns are requested
* Treat $number_of_columns as absint(), permitting negative and string numerical values to work
* Add unit tests
* Note compatibility through WP 3.8+
* Update copyright date (2014)
* Change description
* Various code and documentation reformatting
* Add banner image

= 1.1.4 =
* Shortened description and extended description
* Note compatibility through WP 3.5+
* Update copyright date (2013)

= 1.1.3 =
* Re-license as GPLv2 or later (from X11)
* Add 'License' and 'License URI' header tags to readme.txt and plugin file
* Remove ending PHP close tag
* Minor formatting changes (indentation)
* Note compatibility through WP 3.4+
* Update copyright date (2012)

= 1.1.2 =
* Note compatibility through WP 3.3+
* Tweak to plugin description
* Minor additional documentation
* Minor documentation reformatting (spacing)

= 1.1.1 =
* Note compatibility through WP 3.2+
* Minor code formatting changes (spacing)
* Fix plugin homepage and author links in description in readme.txt

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

= 1.2.1 =
Trivial update: noted compatibility through WP 4.0+; minor documentation tweaks; added plugin icon

= 1.2 =
Minor update: now handle 0, negative, and string numerical values for number_of_columns argument; added unit tests; noted compatibility through WP 3.8+

= 1.1.4 =
Trivial update: noted compatibility through WP 3.5+; minor documentation tweaks

= 1.1.3 =
Trivial update: noted compatibility through WP 3.4+; explicitly stated license

= 1.1.2 =
Trivial update: noted compatibility through WP 3.3+ and minor documentation formatting changes (spacing)

= 1.1.1 =
Trivial update: noted compatibility through WP 3.2+ and minor code formatting changes (spacing)

= 1.1 =
Minor update: deprecated 'array_partition()' in favor of 'c2c_array_partition()'; added link to plugin homepage in readme.txt

= 1.0.3 =
Trivial update: noted compatibility through WP 3.1+ and updated copyright date

= 1.0.2 =
Minor update. Highlights: added if(function_exists()) check around array_partition(); minor text reorganization; added verified WP 3.0 compatibility.
