<?php

class AdminHandler
{
	protected $comp;

	function __construct($comp)
	{
		$this->comp=$comp;
		$this->handle();
	}

	function handle()
	{
		if(key_exists('CATEGORY',$this->comp))
		{
			$cat=strtolower($this->comp["CATEGORY"]);
		}
		else
		{
			$cat='home';
		}
		if(!isset($_SESSION))
		{
			session_start();
		}
		if(!isset($_SESSION['admin']))
		{
			$cat='login';
		}
		else if($cat=='login')
		{
			$cat='home';
		}

		switch($cat)
		{
			case 'add':
				Main::includeClass('AddHandler');
				$ah=new AddHandler($this->comp);
				break;
			case 'remove':
				Main::includeClass('RemoveHandler');
				$rh=new RemoveHandler($this->comp);
				break;
			case 'update':
				Main::includeClass('UpdateHandler');
				$uh=new UpdateHandler($this->comp);
				break;
			case 'login':
				Main::includeClass('LoginHandler');
				$lh=new LoginHandler();
				Main::includeClass('TemplateData');
				$td=new TemplateData($lh);
			case 'logout':
				if(Main::isAdminLoggedIn())
				{
					if(!isset($_SESSION))
					{
						@session_start();
					}
					$_SESSION['admin']=NULL;
					unset($_SESSION['admin']);
					echo header("Location: ".Settings::SITEURL."admin/");
				}
				break;
			case 'details':
				Main::includeClass('DetailsHandler');
				$dh=new DetailsHandler($this->comp);
				break;
			case 'home':
				default:
				Main::includeClass('AdminHomeData');
				$adh=new AdminHomeData();
				Main::includeClass('TemplateData');
				$td=new TemplateData($adh);
				break;
		}
	}

	function __destruct()
	{

	}

}

?>