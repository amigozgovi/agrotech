<?php

if(!class_exists('Settings'))
{
	include ('Settings.php');
}

set_exception_handler('setExceptionHandler');

class Index
{
	function __construct()
	{
		$uri=$_SERVER['REQUEST_URI'];
		if(!class_exists('Main'))
		{
			if(file_exists('Main.php'))
			{
				include('Main.php');
			}
			else
			{
				throw new Exception('File Not Found');
			}
		}
		Main::includeClass('RequestHandler');
		$reqHandler=new RequestHandler($uri);
	}
}

$index=new Index();

function setExceptionHandler($exception)
{
	if(empty($_SERVER['HTTP_X_REQUESTED_WITH']))
	{
		if(class_exists('Settings'))
		{
			if(Settings::DEBUG)
			{
				echo "Exception : ".$exception->getMessage();
			}
		}
	}
}

?>