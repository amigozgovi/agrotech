<?php

class RequestHandler
{
	protected $uri;
	protected $query;

	function __construct($uri)
	{
		$this->uri=$uri;
		$this->parse();
	}

	function parse()
	{
		$uri=$this->uri;
		$parts=array("SECTION","CATEGORY","SUBCATEGORY","QUERY","SUBQUERY");
		$components=array();
		if(!empty($uri) && $uri!=='/')
		{
			$uri=str_replace(array('.php','.html','.htm'),"",$uri);
			$url_parts=explode('/',$uri);
			$length=count($url_parts);
			if($length>1)
			{
				for($i=1,$j=0;$i<=5;$i++)
				{
					if(!empty($url_parts[$i]) && strcmp($url_parts[$i],'index')!=0)
					{
						$components[$parts[$j]]=$url_parts[$i];
						$j++;
					}
				}
				if($length>5)
				{
					$this->query=$url_parts[6];
					for($i=7;$i<$length;$i++)
					{
						$this->query.="&".$url_parts[$i];
					}
					echo $this->query;
				}
				if(empty($components))
				{
					$components['SECTION']='Home';
				}
			}
			else if($length==1)
			{
				if($url_parts[0]=='')
				{
					$components['SECTION']='Home';
				}
				else
				{
					$components['SECTION']=$url_parts[0];
				}
			}
			else
			{
				$components['SECTION']='Home';
			}
		}
		else
		{
			$components['SECTION']='Home';
		}
		$this->handle($components);
	}

	function handle($components)
	{
		switch(strtolower($components['SECTION']))
		{
			case 'admin':
				Main::includeClass('AdminHandler');
				$ah=new AdminHandler($components);
				break;

			case 'crop':
			case 'croptype':
			case 'biofert':
			case 'awards':
			case 'office':
			case 'disease':
			case 'insurance':
			case 'links':
			case 'location':
			case 'magazine':
			case 'map':
			case 'message':
			case 'news':
			case 'patents':
			case 'prevactivity':
			case 'publication':
			case 'pests':
			case 'books':
				Main::includeClass('DetailsHandler');
				$dh=new DetailsHandler($components);
				break;

			case 'about':
				Main::includeClass('About');
				$ab=new About();
				Main::includeClass('TemplateData');
				$td=new TemplateData($ab);
				break;

			case 'ecology':
				Main::includeClass('Ecology');
				$ec=new Ecology();
				Main::includeClass('TemplateData');
				$td=new TemplateData($ec);
				break;

			case 'forestry':
				Main::includeClass('Forestry');
				$fo=new Forestry();
				Main::includeClass('TemplateData');
				$td=new TemplateData($fo);
				break;

			case 'seasoncalc':
				Main::includeClass('SeasonCalculator');
				$sc=new SeasonCalculator();
				break;

			case 'contact':
				include('Contact.php');
				break;

			case 'search':
				Main::includeClass('Search');
				if(isset($_GET['s']))
				{
					$query=$_GET['s'];
				}
				else
				{
					$query='';
				}
				if(isset($_GET['section']))
				{
					$sec=$_GET['section'];
				}
				else
				{
					$sec='crop';
				}
				$dh=new Search($query,$sec);
				break;
			case 'faq':
				Main::includeClass('FAQ');
				$faq=new FAQ();
				Main::includeClass('TemplateData');
				$td=new TemplateData($faq);
				break;

			case 'index':
			case 'home':
			default:
				Main::includeClass('HomeData');
				$hpd=new HomeData();
				Main::includeClass('TemplateData');
				$td=new TemplateData($hpd);
				break;
		}
	}

	function __destruct()
	{

	}
}

?>