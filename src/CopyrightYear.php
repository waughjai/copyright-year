<?php

declare( strict_types = 1 );
namespace WaughJ\CopyrightYear
{
	class CopyrightYear
	{
		public function __construct( int $initial_year, string $interval = ' &ndash; ' )
		{
			$this->initial_year = $initial_year;
			$this->interval = $interval;
		}

		public function getText() : string
		{
			$current_year = $this->getCurrentYear();
			return ( $this->initial_year === $current_year ) ? ( string )( $this->initial_year ) : "{$this->initial_year}{$this->interval}{$current_year}";
		}

		public function getInitialYear() : int
		{
			return $this->initial_year;
		}

		public function getCurrentYear() : int
		{
			return intval( date( 'Y' ) );
		}

		private $initial_year;
		private $interval;
	}
}
