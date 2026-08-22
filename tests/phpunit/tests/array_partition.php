<?php

defined( 'ABSPATH' ) || exit;

class Array_Partition_Test extends WP_UnitTestCase {

	//
	//
	// HELPER FUNCTIONS
	//
	//


	protected function get_test_array() {
		return array( 'aardvark', 'bear', 'cat', 'dog', 'emu', 'fox', 'gnu', 'hippo', 'ibis', 'jackal', 'kangaroo', 'lemur' );
	}

	protected function get_test_array_partitioned_into_3() {
		return array(
			array( 'aardvark', 'bear', 'cat', 'dog' ),
			array( 'emu', 'fox', 'gnu', 'hippo' ),
			array( 'ibis', 'jackal', 'kangaroo', 'lemur' ),
		);
	}

	protected function cast_to_array( $item ) {
		return array( $item );
	}


	//
	//
	// TESTS
	//
	//


	public function test_even_partitioning() {
		$this->assertEquals( $this->get_test_array_partitioned_into_3(), c2c_array_partition( $this->get_test_array(), 3 ) );
	}

	public function test_uneven_partitioning() {
		$expected = array(
			array( 'aardvark', 'bear', 'cat' ),
			array( 'dog', 'emu', 'fox' ),
			array( 'gnu', 'hippo' ),
			array( 'ibis', 'jackal' ),
			array( 'kangaroo', 'lemur' ),
		);

		$this->assertEquals( $expected, c2c_array_partition( $this->get_test_array(), 5 ) );
	}

	public function test_single_partitioning() {
		$this->assertEquals( array( $this->get_test_array() ), c2c_array_partition( $this->get_test_array(), 1 ) );
	}

	public function test_more_partitions_than_items() {
		$expected = array_map( array( $this, 'cast_to_array' ), $this->get_test_array() );
		$number_of_columns = 17;
		$extra_columns = $number_of_columns - count( $expected );
		// Each partition beyond the data array size becomes a blank array.
		for ( $i = 0; $i < $extra_columns; $i++ ) {
			$expected[] = array();
		}

		$this->assertEquals( $expected, c2c_array_partition( $this->get_test_array(), $number_of_columns ) );
	}

	public function test_empty_array_returned_if_zero_columns_requested() {
		$this->assertEquals( array(), c2c_array_partition( $this->get_test_array(), 0 ) );
	}

	public function test_if_negative_number_of_columns_requested() {
		$this->assertEmpty( c2c_array_partition( $this->get_test_array(), -3 ) );
	}

	public function test_if_string_numerical_number_of_columns_requested() {
		$this->assertEquals( $this->get_test_array_partitioned_into_3(), c2c_array_partition( $this->get_test_array(), '3' ) );
	}

	public function test_if_non_integer_number_of_columns_requested() {
		$deprecationMessage = null;

		// Temporarily capture any engine deprecation notices.
		set_error_handler( function ( int $errno, string $errstr ) use ( &$deprecationMessage ) {
			if ( $errno === E_DEPRECATED ) {
				$deprecationMessage = $errstr;
				return true; // Prevents the error from propagating further
			}
			return false;
		} );

		c2c_array_partition( $this->get_test_array(), 1.5 );

		// Restore the normal error handler.
		restore_error_handler();

		$this->assertNotNull( $deprecationMessage, 'Failed asserting that an E_DEPRECATED notice was triggered.' );
		$this->assertStringContainsString( 'loses precision', $deprecationMessage );
	}

	public function test_if_non_array_requested() {
		$this->expectException( TypeError::class );
		$this->expectExceptionMessage( 'c2c_array_partition(): Argument #1 ($array) must be of type array, string given' );

		$this->assertEmpty( c2c_array_partition( 'not an array', 3 ) );
	}

	public function test_empty_array_partitioned_into_multiple_columns() {
		$expected = array( array(), array(), array() );

		$this->assertEquals( $expected, c2c_array_partition( array(), 3 ) );
	}

	public function test_empty_array_partitioned_into_single_column() {
		$this->assertEquals( array( array() ), c2c_array_partition( array(), 1 ) );
	}

	public function test_associative_array_keys_preserved_in_partitions() {
		$array = array( 'alpha' => 'a', 'beta' => 'b', 'gamma' => 'c', 'delta' => 'd' );
		$expected = array(
			array( 'alpha' => 'a', 'beta' => 'b' ),
			array( 'gamma' => 'c', 'delta' => 'd' ),
		);

		$this->assertEquals( $expected, c2c_array_partition( $array, 2 ) );
	}

	public function test_numeric_array_keys_reindexed_in_partitions() {
		$array = array( 'a', 'b', 'c', 'd' );
		$result = c2c_array_partition( $array, 2 );

		$this->assertEquals( array( 0 => 'a', 1 => 'b' ), $result[0] );
		$this->assertEquals( array( 0 => 'c', 1 => 'd' ), $result[1] );
	}

	public function test_mixed_data_types_in_array() {
		$object = new stdClass();
		$object->name = 'test';
		$array = array( 42, 'string', null, $object );
		$expected = array(
			array( 42, 'string' ),
			array( null, $object ),
		);

		$this->assertEquals( $expected, c2c_array_partition( $array, 2 ) );
	}

	public function test_function_is_defined() {
		$this->assertTrue( function_exists( 'c2c_array_partition' ) );
	}

	public function test_if_non_numeric_string_number_of_columns_requested() {
		$this->expectException( TypeError::class );

		c2c_array_partition( $this->get_test_array(), 'abc' );
	}
}
