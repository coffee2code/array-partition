<?php

defined( 'ABSPATH' ) || exit;

class Array_Partition_Test extends WP_UnitTestCase {

	use Array_Partition_Test_Cases;

	protected function partition( array $array, int $number_of_columns ) : array {
		return c2c_array_partition( $array, $number_of_columns );
	}

	public function test_function_is_defined() {
		$this->assertTrue( function_exists( 'c2c_array_partition' ) );
	}

	public function test_wrapper_delegates_to_class() {
		$array = $this->get_test_array();

		$this->assertEquals(
			c2c_Array_Partition::partition( $array, 3 ),
			c2c_array_partition( $array, 3 )
		);
	}
}
