<?php

/**
*  Contains Main Class which performs all the housekeeping jobs like query generation, file inclusion, data filtering, opening and closing mysql connection, display success and error messages and also 	throws exceptions. Also Main class collects POST data from a group or individual one.
**/

class Main
{
	public static $con=FALSE;

	function __construct()
	{
	}

	function  includeClass($class)
	{
		if(!class_exists($class))
		{
			if(file_exists($class.'.php'))
			{
				include($class.'.php');
				return TRUE;
			}
			else
			{
				self::throwException('Internal Error Occured',0,"Class $class Not Found");
			}
		}
	}

	function  escape($var)
	{
		if(empty($var) || !isset($var))
		{
			return FALSE;
		}
		else
		{
			if(!self::$con)
			{
				self::openConnection();
			}
			if(is_array($var))
			{
				foreach($var as $key=>$val)
				{
					if(is_array($val))
					{
						$val=implode('=:=',$val);
					}
						$var[$key]=mysql_real_escape_string($val);
				}
				return $var;
			}
			else
			{
				return mysql_real_escape_string($var);
			}
		}
	}

	function openConnection()
	{
		Main::includeClass('Settings');
		if(self::$con==FALSE)
		{
			self::$con=mysql_connect(Settings::HOST,Settings::USER,Settings::PASS);
			if(self::$con)
			{
				mysql_select_db(Settings::DB,self::$con) or self::throwException('Internal Error Occured',0,'Database Not Found'." ".mysql_error());
				return TRUE;
			}
			else
			{
				self::throwException('Internal Error Occured',0,'Failed To Connect To MySql Server'." ".mysql_error());
			}
		}
	}

	function closeConnection()
	{
		if(self::$con)
		{
			@mysql_close(self::$con);
			self::$con=FALSE;
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	function isAdminLoggedIn()
	{
		if(!isset($_SESSION))
		{
			session_start();
		}
		if(isset($_SESSION['admin']))
		{
			return $_SESSION['admin'];
		}
		else
		{
			return FALSE;
		}
	}

	function throwException($msg='Error Occured',$code=0,$exception='')
	{
		if(Settings::DEBUG)
		{
			$msg.=$exception;
		}
		echo json_encode(array('msg'=>$msg,'code'=>$code));
		if(!empty($exception))
		{
			throw new Exception($exception);
		}
	}

	function displayError($msg,$exception='')
	{
		self::throwException($msg,0,$exception);
	}

	function displaySuccess($msg,$exception='')
	{
		self::throwException($msg,1,$exception);
	}

	function isValidString($string,$min=6,$max=8)
	{
		if(!isset($string) || empty($string) )
		{
			return FAlSE;
		}
		$len=strlen($string);
		if($len<$min || $len>$max)
		{
			return FALSE;
		}
		return TRUE;
	}

	function generateQuery($type,$data,$table,$cond=NULL)
	{
		if(!isset($type) || empty($type)  || !isset($table) || empty($table))
		{
			return FALSE;
		}


		if(isset($cond))
		{
			if(empty($cond) || !is_array($cond))
			{
				//echo "Condition Not Found";
				return FALSE;
			}
		}

		switch($type)
		{

			case "INSERT":
				if(!is_array($data))
				{
					return FALSE;
				}
				$query=$type." INTO `$table`(";
				$i=0;
				foreach($data as $key=>$value)
				{
					if($i<1)
					{
						$query.="`$key`";
					}
					else
					{
						$query.=",`$key`";
					}
					$i++;
				}
				$query.=") VALUES(";
				$i=0;
				foreach($data as $key=>$value)
				{
					if($i<1)
					{
						$query.="'$value'";
					}
					else
					{
						$query.=",'$value'";
					}
					$i++;
				}
				$query.=")";
				return $query;
				break;

			case 'UPDATE':
				if(!is_array($data))
				{
					return FALSE;
				}
				$query="$type `$table` SET";
				$i=0;
				foreach($data as $key=>$value)
				{
					if($i<1)
					{
						$query.=" `$key`='$value'";
					}
					else
					{
						$query.=",`$key`='$value'";
					}
					$i++;
				}
				if(isset($cond))
				{
					$i=0;
					$query.=" WHERE";
					foreach($cond as $key=>$val)
					{
						if($i<1)
						{
							$query.=" `$key`='$val'";
						}
						else
						{
							$query.="AND `$key`='$val'";
						}
						$i++;
					}
				}
				return $query;
				break;

			case 'SELECT':
			case 'DELETE':
				$query="$type";
				if($type=='SELECT')
				{
					if(is_array($data))
					{
						$i=0;
						foreach($data as $value)
						{
							if($i<1)
							{
								$query.=" `$value`";
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
						if($data!=='*')
						{
							$query.=" `$data`";
						}
						else
						{
							$query.=" $data";
						}
					}
				}
				$query.=" FROM `$table`";
				if(isset($cond) && !empty($cond))
				{
					$i=0;
					$query.=" WHERE";
					foreach($cond as $key=>$val)
					{
						if($i<1)
						{
							$query.=" `$key`='$val'";
						}
						else
						{
							$query.="AND `$key`='$val'";
						}
						$i++;
					}
				}
				return $query;
			break;
		}
	}

	function generateRandom()
	{
		return str_replace('.','',microtime(TRUE));
	}

	function getPostData($fields,$req=array(),$default=NULL)
	{
		$info=array();
		//print_r($req);
		if(is_array($fields))
		{
			foreach($fields as $val)
			{
				if(isset($_POST[$val]) && !empty($_POST[$val]))
				{
					$info[$val]=$_POST[$val];
				}
				else
				{
					//echo $val,"<br />$_POST[$val]";

					if(is_array($req))
					{
						if(array_search($val,$req)!==FALSE)
						{
							self::displayError("$val is Required","Value Not Found In Post Data");
						}
						else
						{
							$info[$val]=$default;
						}
					}
					else
					{
						if($val==$req)
						{
							self::displayError("$val is Required","Value Not Found In Post Data");
						}
						else
						{
							$info[$val]=$default;
						}
					}
				}
			}
		}
		else
		{
			if(isset($_POST[$fields]) && !empty($_POST[$fields]))
			{
				$info[$fields]=$_POST[$fields];
			}
			else
			{
				if(is_array($req))
				{
					if(key_exists($fields,$req))
					{
						self::displayError("$val is Required","Value Not Found In Post Data");
					}
					else
					{
						$info[$fields]=$default;
					}
				}
				else
				{
					if($fields==$req)
					{
						self::displayError("$val is Required","Value Not Found In Post Data");
					}
					else
					{
						$info[$fields]=$default;
					}
				}
			}
		}
		return $info;
	}

	function __destruct()
	{
		if($this->con!==FALSE)
		{
			$this->closeConnection();
		}
	}
}


?>