<?php

class user
{
	public function isLoggedIn()
	{
		return ( isset( $_SESSION['loggedIn'] ) && $_SESSION['loggedIn'] );
	}

	public function logIn( $password )
	{
		$database = mysql_connect( DB_HOST, DB_USER, DB_PASS );
		mysql_select_db( DB_NAME, $database );

		if( mysql_errno() )
		{
			throw new Exception( 'Syntax error' );
		}

		$result = mysql_query( "SELECT * FROM authorization WHERE password = '" . $password . "'" );
		if( !$result )
		{
			throw new Exception( 'Syntax error' );
		}

		if( mysql_num_rows( $result ) === 1 )
		{
			mysql_query( "UPDATE authorization SET lastlogin = NOW() WHERE password = '" . $password . "'" );

			$_SESSION['loggedIn'] = true;
			return true;
		}
		else
		{
			$_SESSION['loggedIn'] = false;
			return false;
		}
	}

	public function logOut()
	{
		if( !$this->isLoggedIn() )
		{
			return false;
		}

		$_SESSION['loggedIn'] = false;

		return true;
	}

	public function Body()
	{
		throw new Exception( 'Security violation' );
	}
}

?>
