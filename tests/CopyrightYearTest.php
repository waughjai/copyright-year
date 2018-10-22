<?php

use PHPUnit\Framework\TestCase;
use WaughJ\CopyrightYear\CopyrightYear;

class CopyrightYearTest extends TestCase
{
	public function testCurrentYearFunction() : void
	{
		$year = new CopyrightYear( '1888', ' ~ ' );
		$this->assertEquals( $year->getCurrentYear(), $this->getCurrentYear() );
	}

	public function testCurrentYear() : void
	{
		$year = new CopyrightYear( $this->getCurrentYear() );
		$this->assertEquals( $year->getText(), $this->getCurrentYear() );
	}

	public function testYearInterval() : void
	{
		$random_number = rand( 0, $this->getCurrentYear() - 1 );
		$year = new CopyrightYear( $random_number );
		$this->assertEquals( $year->getText(), "{$random_number} &ndash; {$this->getCurrentYear()}" );
	}

	public function testStringYear() : void
	{
		$string_year = new CopyrightYear( '1888' );
		$this->assertEquals( $string_year->getText(), "1888 &ndash; {$this->getCurrentYear()}" );
	}

	public function testInitialYear() : void
	{
		$random_number = rand( 0, $this->getCurrentYear() - 1 );
		$year = new CopyrightYear( $random_number );
		$this->assertEquals( $year->getInitialYear(), $random_number );
	}

	public function testOtherDividers() : void
	{
		$different_divider = ' | ';
		$year = new CopyrightYear( '1888', $different_divider );
		$this->assertEquals( $year->getText(), "1888{$different_divider}{$this->getCurrentYear()}" );
	}

	private function getCurrentYear() : int
	{
		return intval( date( 'Y' ) );
	}
}
