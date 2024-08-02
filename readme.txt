=== array_partition ===
Contributors: coffee2code
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=6ARCFJ9TX3522
Tags: columns, array, partition, chunk, coffee2code
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Requires at least: 1.2
Tested up to: 6.6
Stable tag: 1.3.4

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

In contrast, using PHP's built-in `array_chunk()` as such:

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


Links: [Plugin Homepage](https://coffee2code.com/wp-plugins/array-partition/) | [Plugin Directory Page](https://wordpress.org/plugins/array-partition/) | [GitHub](https://github.com/coffee2code/array-partition/) | [Author Homepage](https://coffee2code.com)


== Installation ==

1. Install via the built-in WordPress plugin installer. Or download and unzip `array-partition.zip` inside the plugins directory for your site (typically `wp-content/plugins/`)
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

Phrased another way, with `array_chunk()` you tell it how many elements max should be in a partition and it gives you as many partitions as necessary. With `c2c_array_partition()`, you tell it how many partitions you want, and it'll evenly split the elements into those partitions as evenly as possible.

= Does this plugin include unit tests? =

Yes. The tests are not packaged in the release .zip file or included in plugins.svn.wordpress.org, but can be found in the [plugin's GitHub repository](https://github.com/coffee2code/array-partition/).


== Changelog ==

= 1.3.4 (2024-08-02) =
* Change: Note compatibility through WP 6.6+
* Change: Update copyright date (2024)
* New: Add `.gitignore` file
* Change: Reduce number of 'Tags' from `readme.txt`
* Change: Remove development and testing-related files from release packaging
* Unit tests:
    * Hardening: Prevent direct web access to `bootstrap.php`
    * Allow tests to run against current versions of WordPress
    * New: Add `composer.json` for PHPUnit Polyfill dependency
    * Change: In bootstrap, store path to plugin directory in a constant

= 1.3.3 (2023-05-21) =
* Change: Note compatibility through WP 6.3+
* Change: Update copyright date (2023)

= 1.3.2 (2021-09-25) =
* Change: Note compatibility through WP 5.8+
* Unit tests:
    * Change: Restructure unit test directories
        * Change: Move `phpunit/` into `tests/phpunit/`
        * Change: Move `phpunit/bin/` into `tests/`
    * Change: Remove 'test-' prefix from unit test file
    * Change: In bootstrap, store path to plugin file constant
    * Change: In bootstrap, add backcompat for PHPUnit pre-v6.0

_Full changelog is available in [CHANGELOG.md](https://github.com/coffee2code/array-partition/blob/master/CHANGELOG.md)._


== Upgrade Notice ==

= 1.3.4 =
Trivial update: noted compatibility through WP 6.6+, removed unit tests from release packaging, and updated copyright date (2024)

= 1.3.3 =
Trivial update: noted compatibility through WP 6.3+ and updated copyright date (2023)

= 1.3.2 =
Trivial update: noted compatibility through WP 5.8+ and minor reorganization and tweaks to unit tests

= 1.3.1 =
Trivial update: noted compatibility through WP 5.7+ and updated copyright date (2021)

= 1.3 =
Minor update: Removed long-deprecated function `array_partition()`, restructured unit test file structure, and noted compatibility through WP 5.5+.

= 1.2.9 =
Trivial update: Updated a few URLs to be HTTPS and noted compatibility through WP 5.4+.

= 1.2.8 =
Trivial update: noted compatibility through WP 5.3+ and updated copyright date (2020)

= 1.2.7 =
Trivial update: modernized unit tests and noted compatibility through WP 5.2+

= 1.2.6 =
Trivial update: created CHANGELOG.md to store changelog outside of readme.txt, noted compatibility through WP 5.1+, and updated copyright date (2019)

= 1.2.5 =
Trivial update: noted compatibility through WP 4.9+, added README.md for GitHub, and updated copyright date (2018)

= 1.2.4 =
Trivial update: updated unit test bootstrap file, noted compatibility through WP 4.7+, and updated copyright date

= 1.2.3 =
Trivial update: noted compatibility through WP 4.4+ and updated copyright date

= 1.2.2 =
Trivial update: noted compatibility through WP 4.1+ and updated copyright date

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
Minor update: deprecated `array_partition()` in favor of `c2c_array_partition()`; added link to plugin homepage in readme.txt

= 1.0.3 =
Trivial update: noted compatibility through WP 3.1+ and updated copyright date

= 1.0.2 =
Minor update. Highlights: added `if(function_exists())` check around `array_partition()`; minor text reorganization; added verified WP 3.0 compatibility.
