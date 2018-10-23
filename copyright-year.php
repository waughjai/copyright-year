<?php
	/*
	Plugin Name:  WAJ Copyright Year
	Plugin URI:   https://github.com/waughjai/copyright-year
	Description:  Simple plugin for handling auto-updating copyright year in website footers.
	Version:      1.0.0
	Author:       Jaimeson Waugh
	Author URI:   https://www.jaimeson-waugh.com
	License:      GPL2
	License URI:  https://www.gnu.org/licenses/gpl-2.0.html
	Text Domain:  waj-copyright-year
	*/

	require_once( 'vendor/autoload.php' );

	use WaughJ\CopyrightYear\CopyrightYear;
	use function WaughJ\TestHashItem\TestHashItemExists;

	add_shortcode
	(
		'copyright-year',
		function( $atts )
		{
			if ( is_array( $atts ) )
			{
				$year = TestHashItemExists( $atts, 'start', CopyrightYear::getCurrentYear() );
				$divider = TestHashItemExists( $atts, 'divider', CopyrightYear::DEFAULT_DIVIDER );
				return ( string )( new CopyrightYear( $year, $divider ) );
			}
			return ( string )( new CopyrightYear() );
		}
	);
