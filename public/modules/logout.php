<?php

class logout
{
	public function __construct()
	{
		try
		{
			if( Head::singleton()->loadModule( 'user' )->logOut() )
			{
				header( 'Location: ' . HOST );
				exit();
			}
			else
			{
				header( 'Location: ' . HOST . '?m=login' );
				exit();
			}

		}
		catch( Exception $e )
		{
			throw $e;
		}
	}

	public function Body()
	{
	}
}

?>
