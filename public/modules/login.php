<?php

class login
{
	public function __construct()
	{
		try
		{
			if( Head::singleton()->loadModule( 'user' )->isLoggedIn() )
			{
				header( 'Location: ' . HOST );
				exit();
			}
			else if( isset( $_POST['password'] ) )
			{
				if( Head::singleton()->loadModule( 'user' )->logIn( $_POST['password'] ) )
				{
					header( 'Location: ' . HOST );
					exit();
				}
			}
		}
		catch( Exception $e )
		{
			throw $e;
		}
	}

	public function Body()
	{
		try
		{
			return Head::singleton()->loadModule( 'header' )->getHeader() . '<div id="login" class="background"><h1>Authenticate</h1><form method="post"><input name="password" type="password" id="password" /><input type="submit" value="Submit" id="submit" /></form></div>' . Head::singleton()->loadModule( 'header' )->getFooter();
		}
		catch( Exception $e )
		{
			throw $e;
		}
	}
}

?>
