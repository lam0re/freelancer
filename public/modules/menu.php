<?php

class menu
{
	public function getMenu()
	{
		try
		{
			$html = '<div id="menuFrame" class="background"><ul id="menu"><li><a href="' . HOST . '"><img src="images/dealer.png" alt="Dealer" /></a></li>';

			if( !Head::singleton()->loadModule( 'user' )->isLoggedIn() )
			{
				$html .= '<li><a href="' . HOST . '?m=login"><img src="images/loggedout.png" alt="Login" /></a></li>';
			}
			else
			{
				$html .= '<li><a href="' . HOST . '?m=logout"><img src="images/loggedin.png" alt="Logout" /></a></li>';
			}

			return $html . '</ul></div>';
		}
		catch( Exception $e )
		{
			throw $e;
		}
	}

	public function Body()
	{
		throw new Exception( 'Security violation' );
	}
}

?>
