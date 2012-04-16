<?php

class security
{
	public function __construct()
	{
		$userinput = array( &$_GET, &$_POST, &$_COOKIE );

		if( !get_magic_quotes_gpc() )
		{
			$this->enableMagicQuotes( $userinput );
		}

		$this->filterInput( $userinput );
	}

	public function escape( &$input )
	{
		if( is_array( $input ) )
		{
			array_walk_recursive( $input, array( $this, 'escape' ) );
		}
		else
		{
			$input = addslashes( $input );
		}
	}

	public function enableMagicQuotes()
	{
		if( func_num_args() > 0 )
		{
			foreach( func_get_args() as $argument )
			{
				$this->escape( $argument );
			}
		}
		else
		{
			throw new Exception( 'Syntax error' );
		}
	}

	public function filter( &$input )
	{
		if( is_array( $input ) )
		{
			array_walk_recursive( $input, array( $this, 'filter' ) );
		}
		else
		{
			if( ( preg_match( '/\/\*(.*?)\*\//is', $input ) > 0 ) 
			|| ( preg_match( '/(#|--)(.*?)\n/is', $input ) > 0 )
			|| ( preg_match( '/(and|or|if|mid|substring|between|ascii|strcmp|load_file)(\s|\()/is', $input ) > 0 )
			|| ( preg_match( '/case(.*)end/is', $input ) > 0 )
			|| ( preg_match( '/select(.*),/is', $input ) > 0 ) )
			{
				throw new Exception( 'Security violation' );
			}
		}
	}

	public function filterInput()
	{
		if( func_num_args() > 0 )
		{
			foreach( func_get_args() as $argument )
			{
				$this->filter( $argument );
			}			
		}
		else
		{
			throw new Exception( 'Syntax error' );
		}
	}

	public function hash()
	{
		if( func_num_args() > 0 )
		{
			$input = implode( func_get_args() );

			for( $i = 0; $i < 10000; $i++ )
			{
				$input = hash( 'sha512', $input, true );
			}

			$input = str_replace( '\'', '\\\'', $input );

			return $input;
		}
		else
		{
			throw new Exception( 'Syntax error' );
		}
	}

	public function Body()
	{
		throw new Exception( 'Security violation' );
	}
}

?>
