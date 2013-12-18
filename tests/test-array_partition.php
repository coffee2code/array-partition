<?php

class array_partition_Test extends WP_UnitTestCase {

	/**
	 *
	 * HELPER FUNCTIONS
	 *
	 */


	function get_test_array() {
		return array( 'aardvark', 'bear', 'cat', 'dog', 'emu', 'fox', 'gnu', 'hippo', 'ibis', 'jackal', 'kangaroo', 'lemur' );
	}

	function get_test_array_partitioned_into_3() {
		return array(
			array( 'aardvark', 'bear', 'cat', 'dog' ),
			array( 'emu', 'fox', 'gnu', 'hippo' ),
			array( 'ibis', 'jackal', 'kangaroo', 'lemur' ),
		);
	}

	function cast_to_array( $item ) {
		return array( $item );
	}


	/**
	 *
	 * TESTS
	 *
	 */


	function test_even_partitioning() {
		$this->assertEquals( $this->get_test_array_partitioned_into_3(), c2c_array_partition( $this->get_test_array(), 3 ) );
	}

	function test_uneven_partitioning() {
		$expected = array(
			array( 'aardvark', 'bear', 'cat' ),
			array( 'dog', 'emu', 'fox' ),
			array(  'gnu', 'hippo' ),
			array( 'ibis', 'jackal' ),
			array( 'kangaroo', 'lemur' ),
		);

		$this->assertEquals( $expected, c2c_array_partition( $this->get_test_array(), 5 ) );
	}

	function test_single_partitioning() {
		$this->assertEquals( array( $this->get_test_array() ), c2c_array_partition( $this->get_test_array(), 1 ) );
	}

	function test_more_partition_than_items() {
		$expected = array_map( array( $this, 'cast_to_array' ), $this->get_test_array() );
		$number_of_columns = 17;
		$extra_columns = $number_of_columns - count( $expected );
		// Each partition beyond the data array size becomes a blank array
		for ( $i = 0; $i < $extra_columns; $i++ ) {
			$expected[] = array();
		}

		$this->assertEquals( $expected, c2c_array_partition( $this->get_test_array(), $number_of_columns ) );
	}

	function test_empty_array_returned_if_zero_columns_requested() {
		$this->assertEquals( array(), c2c_array_partition( $this->get_test_array(), 0 ) );
	}

	function test_if_negative_number_of_columns_requested() {
		$this->assertEquals( $this->get_test_array_partitioned_into_3(), c2c_array_partition( $this->get_test_array(), -3 ) );
	}

	function test_if_string_numerical_number_of_columns_requested() {
		$this->assertEquals( $this->get_test_array_partitioned_into_3(), c2c_array_partition( $this->get_test_array(), '3' ) );
	}

	/**
	 * @expectedDeprecated array_partition
	 */
	function test_deprecated_function() {
		$this->assertEquals( $this->get_test_array_partitioned_into_3(), array_partition( $this->get_test_array(), 3 ) );
	}

}
