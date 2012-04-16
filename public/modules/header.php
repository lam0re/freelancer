<?php

class header
{
	public function getHeader()
	{
		try
		{
			return '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>Freelancer - Perth Station</title><link rel="stylesheet" type="text/css" href="./styles/base.css" /></head><body><div id="outerFrame">' . Head::singleton()->loadModule( 'menu' )->getMenu() . '<div id="contentFrame">';
		}
		catch( Exception $e )
		{
			throw $e;
		}
	}

	public function getFooter()
	{
		try
		{
			return '</div></div></body></html>';
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
