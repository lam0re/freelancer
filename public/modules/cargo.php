<?php

class cargo
{
	public function __construct()
	{
		if( !isset( $_GET['key'] ) || !isset( $_GET['id'] ) )
		{
			throw new Exception( 'Syntax error' );
		}
	}

	public function draw( $data )
	{
		$file = 'images/' . $data['image'];

		if( !file_exists( $file ) )
		{
			throw new Exception( 'Can\'t open image' );
		}

		header( 'Content-Type: image/png' );
		return file_get_contents( $file );
	}

	public function Body()
	{
		$database = mysql_connect( DB_HOST, DB_USER, DB_PASS );
		mysql_select_db( DB_NAME, $database );

		if( mysql_errno() )
		{
			throw new Exception( 'Syntax error' );
		}

		$hash = Head::singleton()->loadModule( 'security' )->hash( $_GET['key'], $_GET['id'] );
		$result = mysql_query( "SELECT id,image FROM depot WHERE hash = '" . $hash . "' AND id = '" . $_GET['id'] . "' LIMIT 1" );

		if( !$result )
		{
			throw new Exception( 'Syntax error' );
		}

		if( mysql_num_rows( $result ) === 1 )
		{
			return $this->draw( mysql_fetch_assoc( $result ) );
		}
		else
		{
			return $this->draw( array( 'image' => 'empty.png' ) );
		}
	}
}

?>
