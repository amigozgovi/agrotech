<?php
class Add
{
	protected $newCon=FALSE;

	function __construct($data,$table)
	{
		if(Main::$con==FALSE)
		{
			Main::openConnection();
			$this->newCon=TRUE;
		}
		$data=Main::escape($data);
		$query=Main::generateQuery('INSERT',$data,$table);
		if($query)
		{
			mysql_query($query) or Main::throwException('Internal Error Occured',0,'Query Failed'.mysql_error().$query);
			//Main::displaySuccess('Added To DataBase Successfully');
		}
		else
		{
			//Main::displayError('Failed To Add To Database');
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