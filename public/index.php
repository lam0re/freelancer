<?php

/* ###                                        
    ###                                       
     ##                                       
     ##                                       
     ##       Hack.lu 2011 Freelancer v0.5    
     ##      /###   ### /### /###     /###    
     ##     / ###  / ##/ ###/ /##  / / ###  / 
     ##    /   ###/   ##  ###/ ###/ /   ###/  
     ##   ##    ##    ##   ##   ## ##    ##   
     ##   ##    ##    ##   ##   ## ##    ##   
     ##   ##    ##    ##   ##   ## ##    ##   
     ##   ##    ##    ##   ##   ## ##    ##   
     ##   ##    /#    ##   ##   ## ##    /#   
     ### / ####/ ##   ###  ###  ### ####/ ##  
      ##/   ###   ##   ###  ###  ### ###   ## 

Sources:
 Icons #1: Freelancer, Digital Anvil
 Icons #2: http://openiconlibrary.sourceforge.net/
 Background: http://gnailasil.blogspot.com/2010/04/star-trek-online-concepts.html

*/

require( './config.php' );

class Head 
{
	private static $instance;

	public static function singleton() 
	{
		if( !isset( self::$instance ) )
		{
			$c = __CLASS__;
			self::$instance = new $c;
		}

		return self::$instance;
	}

	public function __clone()
	{
		trigger_error( 'Clone is not allowed', E_USER_ERROR );
	}

	public function loadModule( $module )
	{
		if( !is_string( $module ) || !preg_match( '/^([a-zA-Z0-9]*)$/', $module ) )
			throw new Exception( 'Invalid module name' );

		if( !file_exists( './modules/' . $module . '.php' ) )
			throw new Exception( 'Module does not exist' );

		require_once( './modules/' . $module . '.php' );

		return new $module();
	}
}

try
{
	Head::singleton()->loadModule( 'security' );

	global $module;
	if( isset( $_GET['m'] ) )
	{
		$module = $_GET['m'];
	}
	else
	{
		$module = 'dealer';
	}

	exit( Head::singleton()->loadModule( $module )->Body() );
}
catch( Exception $e )
{
	exit( $e->getMessage() );
}

?>
