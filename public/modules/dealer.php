<?php

class dealer
{
	public function Body()
	{
		try
		{
			$database = mysql_connect( DB_HOST, DB_USER, DB_PASS );
			mysql_select_db( DB_NAME, $database );

			if( mysql_errno() )
			{
				throw new Exception( 'Syntax error' );
			}

			$sqlWhere = "WHERE public = '1'";
			if( Head::singleton()->loadModule( 'user' )->isLoggedIn() )
			{
				$sqlWhere = '';
			}

			$result = mysql_query( "SELECT * FROM depot " . $sqlWhere . " ORDER BY name" );
			if( !$result )
			{
				throw new Exception( 'Syntax error' );
			}

			$html = Head::singleton()->loadModule( 'header' )->getHeader() . '<div id="inventory" class="background"><h1>Inventory</h1><h2>Credits $4,294,967,295</h2></div><div id="description" class="background"><h1>Welcome to the Perth Station Commodity Trader</h1><hr />If you want to buy a commodity, select it in my list. Set the quantity that you want to buy and click the Buy button.<br /><br />If you want to sell a commodity, select it in your list. Set the quantity that you want to  sell and click the Sell button.</div><div id="dealer" class="background"><h1>Dealer</h1><ul class="resources">';

			while ( $row = mysql_fetch_assoc( $result ) )
			{
				$html .= '<li class="background"><span class="image"><img src="?m=cargo&amp;key=' . htmlspecialchars( $row['key'] ) . '&amp;id=' . htmlspecialchars( $row['id'] ) . '" class="border" alt="Cargo" /></span><div class="border row"><span class="name">' . htmlspecialchars( $row['name'] ) . '</span><span class="value">$' . htmlspecialchars( $row['value'] ) . '</span></div></li>';
			}

			$html .= '</ul>';

			if( Head::singleton()->loadModule( 'user' )->isLoggedIn() )
			{
				$html .= '<h2>Key</h2><span id="secretkey">' . htmlspecialchars( SECRETKEY ) . '</span>';
			}

			return $html . '</div>' . Head::singleton()->loadModule( 'header' )->getFooter();
		}
		catch( Exception $e )
		{
			throw $e;
		}
	}
}

?>
