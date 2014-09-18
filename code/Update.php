<?php

class Update
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
		$query=Main::generateQuery('UPDATE',$data,$table,$cond);
		mysql_query($query) or Main::throwException('Internal Error Occured',0,'Query Failed'.mysql_error());
		//Main::displaySuccess('DataBase Updated Successfully');
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