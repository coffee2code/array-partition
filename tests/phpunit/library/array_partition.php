<?php

class Array_Partition_Library_Test extends PHPUnit\Framework\TestCase {

	use Array_Partition_Test_Cases;

	protected function partition( array $array, int $number_of_columns ) : array {
		return c2c_Array_Partition::partition( $array, $number_of_columns );
	}

	public function test_class_is_defined() {
		$this->assertTrue( class_exists( 'c2c_Array_Partition' ) );
	}

	public function test_function_is_not_defined() {
		$this->assertFalse( function_exists( 'c2c_array_partition' ) );
	}
}
