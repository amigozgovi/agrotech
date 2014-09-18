<?php

class DetailsHandler
{
	function __construct($comp)
	{
		switch(strtolower($comp['SECTION']))
		{
			case 'crop':
			case 'awards':
			case 'biofert':
			case 'disease':
			case 'insurance';
			case 'croptype';
			case 'links':
			case 'magazine':
			case 'news':
			case 'patents':
			case 'publication':
				if(key_exists('CATEGORY',$comp))
				{
					$comp['CATEGORY']=str_replace('%20',' ',$comp['CATEGORY']);
					Main::includeClass('SinglePage');
					$sp=new SinglePage($comp);
					Main::includeClass('TemplateData');
					$td=new TemplateData($sp);
				}
				else
				{
					Main::includeClass('ListPage');
					$lp=new ListPage($comp);
					Main::includeClass('TemplateData');
					$td=new TemplateData($lp);
				}
			break;

			case 'office':
				if(key_exists('QUERY',$comp))
				{
					Main::includeClass('SinglePage');
					$sp=new SinglePage($comp);
					Main::includeClass('TemplateData');
					$td=new TemplateData($sp);
				}
				else
				{
					Main::includeClass('ListPage');
					$lp=new ListPage($comp);
					Main::includeClass('TemplateData');
					$td=new TemplateData($lp);
				}
				break;

			case 'location':

				if(key_exists('CATEGORY',$comp))
				{
					Main::includeClass('SinglePage');
					$sp=new SinglePage($comp);
					Main::includeClass('TemplateData');
					$td=new TemplateData($sp);
				}
				else
				{
					Main::includeClass('ListPage');
					$lp=new ListPage($comp);
					Main::includeClass('TemplateData');
					$td=new TemplateData($lp);
				}
				break;

			case 'map':
				if(key_exists('QUERY',$comp))
				{
					Main::includeClass('SinglePage');
					$lp=new SinglePage($comp);
					Main::includeClass('TemplateData');
					$td=new TemplateData($lp);
				}
				else
				{
					Main::includeClass('ListPage');
					$lp=new ListPage($comp);
					Main::includeClass('TemplateData');
					$td=new TemplateData($lp);
				}
				break;

			case 'prevactivity':
				if(key_exists('SUBCATEGORY',$comp))
				{
					Main::includeClass('SinglePage');
					$sp=new SinglePage($comp);
					Main::includeClass('TemplateData');
					$td=new TemplateData($sp);
				}
				else
				{
					Main::includeClass('ListPage');
					$lp=new ListPage($comp);
					Main::includeClass('TemplateData');
					$td=new TemplateData($lp);
				}
				break;

			default:
			Main::includeClass('HomeData');
			$hpd=new HomeData();
			Main::includeClass('TemplateData');
			$td=new TemplateData($hpd);
			break;
		}
	}
}