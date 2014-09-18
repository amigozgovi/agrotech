<?php

Main::includeClass('AdminTemplate');

class LoginHandler extends AdminTemplate
{
	protected $login;
	protected $pass;
	protected $loggedIn=FALSE;

	function __construct()
	{
			//echo $_SERVER['REQUEST_URI'];
			$this->handle();
	}

	function handle()
	{
		if(isset($_POST['action']))
		{
			$login=$_POST['user'];
			$pass=$_POST['pass'];
			//echo $login;
			//echo $pass;
			//echo $login;
			//echo $pass;
			$query="SELECT * FROM `at_admin` WHERE `user`='$login' AND `pass`='$pass'";
			if(Main::$con===FALSE)
			{
				Main::openConnection();
			}
			//echo $query;
			$result=mysql_query($query) or die('Query Failed'.mysql_error());
			if($result)
			{
				if(mysql_num_rows($result)>0)
				{
					if(!isset($_SESSION))
					{
						session_start();
					}
					$_SESSION['admin']=$login;
					//echo $login;
					//echo "LOGGED IN";
					//exit();
					echo header("Location: ".Settings::SITEURL."admin/");
					exit();
				}
				else
				{
					$this->loggedIn=FALSE;
				}
			}
		}
		else
		{
			$this->loggedIn='FALSE';
		}
	}

	function display($msg='')
	{
		if(!empty($msg))
		{
			echo '<h4>'.$msg.'</h4>';
		}
	}

	function content()
	{
		if($this->loggedIn)
		{
			//echo header('Location: '.Settings::SITEURL.'admin/');
		}
		?>
		<form name='adminLogin' method='POST' action='' >

		</form>

		<div id='conctactleft'>
				<h4>Login</h4>
		<div class='success-message'>
		</div>
		<div id='maincontactform'>
			<form name='adminLogin' id='' method='post' action='<?php echo Settings::SITEURL."admin/login/"; ?>'>
				<div>
					<label for='user'>Username</label><br />
		<input type="text" id='user' name='user' class='textfield' />

		<label for='pass'>Password</label>
		<input type='password' id='pass' name='pass' class='textfield' />
		<input type='submit' name='action' value='Login' class='button' />
				</div>
			</form>
		</div>
	</div>
		<?php
	}
}

?>