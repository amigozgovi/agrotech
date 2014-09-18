<?php

class Details
{
	function __construct()
	{

	}

	function getDetails($table,$data='*',$cond=NULL,$list=FALSE,$exact=FALSE)
	{
		if(Main::$con==FALSE)
		{
			Main::openConnection();
			$this->newCon=TRUE;
		}
		$data=Main::escape($data);
		$query=Main::generateQuery('SELECT',$data,$table,$cond);
		//echo $query;
		if($query)
		{
			$result=mysql_query($query) or Main::throwException('Internal Error Occured',0,'Query Failed '.$query." ".mysql_error());
			if(mysql_num_rows($result)>0)
			{
				$data=array();
				while($row=mysql_fetch_assoc($result))
				{
					if(!$list)
					{
						$data[]=$row;
					}
					else
					{
						foreach($row as $key=>$value)
						{
							$data[]=$value;
						}
					}
				}
				return $data;
			}
			else
			{
				return array();
			}
		}
		else
		{
			echo "Query Not Found";
		}

	}

	function getDetailsContains($table,$data='*',$cond)
	{
			if(Main::$con==FALSE)
			{
				Main::openConnection();
				$this->newCon=TRUE;
			}
			$data=Main::escape($data);
			$query="SELECT ";
			if(is_array($data))
			{
				$i=0;
				foreach($data as $value)
				{
					if($i<1)
					{
						$query.="`$value`";
					}
					else
					{
						$query.=",`$value`";
					}
					$i++;
				}
			}
			else
			{
				if($query=='*')
				{
					$query.='*';
				}
				else
				{
					$query.="`$data`";
				}
			}
			$query.=" FROM `$table`";
			$query.=" WHERE ";
			$i=0;
			foreach($cond as $key=>$value)
			{

				if($i<1)
				{
					$query.="`$key` LIKE '%$value%'";
				}
				else
				{
					$query.="AND `$key` LIKE '%$value%'";
				}
				$i++;
			}
		$result=mysql_query($query) or die('Query Failed'.mysql_error());
		if(mysql_num_rows($result)>0)
		{
			while($row=mysql_fetch_assoc($result))
			{
				$data[]=$row;
			}
			return $data;
		}
		else
		{
			return array();
		}
	}
}

?>