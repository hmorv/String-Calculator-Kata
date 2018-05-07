<?php

require '../vendor/autoload.php';

use App\StringCalculator;
use PHPUnit\Framework\TestCase;

class StringCalculatorTest extends TestCase
{
	public function test_it_translates_an_empty_string_into_zero()
	{
		$c = new StringCalculator();

		$this->assertEquals(0, $c->add(''));
	}

	public function test_it_finds_the_sum_of_one_number()
	{
		$c = new StringCalculator();

		$this->assertEquals(5, $c->add('5'));	
	}

	public function test_it_finds_the_sum_of_two_numbers()
	{
		$c = new StringCalculator();

		$this->assertEquals(3, $c->add('1,2'));	
	}

	public function test_it_finds_the_sum_of_any_amount_of_numbers()
	{
		$c = new StringCalculator();

		$this->assertEquals(15, $c->add('1,2,3,4,5'));	
	}

	public function test_it_disallows_negative_numbers()
    {
    	$c = new StringCalculator();

    	$this->expectException(InvalidArgumentException::class);

		$c->add('3,-2');
    }

    public function test_it_ignores_any_number_that_is_one_thousand_or_greater()
    {
        $c = new StringCalculator();

		$this->assertEquals(4, $c->add('2,2,1000'));	
    }

    public function test_it_allows_for_new_line_delimiters()
    {
    	$c = new StringCalculator();

		$this->assertEquals(6, $c->add('2,2,\n2'));	
    }
}