<?php

class Remove
{
	protected $newCon=FALSE;

	function __construct($data,$table,$cond)
	{
		if(Main::$con==FALSE)
		{
			Main::openConnection();
			$this->newCon=TRUE;
		}
		$data=Main::escape($data);
		$query=Main::generateQuery('DELETE',$data,$table,$cond);
		if($query)
		{
			mysql_query($query) or Main::throwException('Internal Error Occured',0,'Query Failed'.mysql_error());
			//Main::displaySuccess('Removed From DataBase Successfully');
		}
	}

	function __destruct()
	{
		if($this->newCon)
		{
			if(Main::$con)
			{
				Main::closeConnection();
			}
		}
	}
}

?>