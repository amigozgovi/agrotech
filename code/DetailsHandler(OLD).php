<?php

class DetailsHandler
{
	function __construct($comp)
	{
		switch(strtolower($comp['SECTION']))
		{
			case 'crop':
			case 'awards':
			case 'bio-fert':
			case 'disease':
			case 'insurance';
			case 'crop-types';
			case 'links':
			case 'location':
			case 'magazine':
			case 'map':
			case 'news':
			case 'patents':
			case 'publication':
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
					$lp=new ListPage($comp['SECTION']);
					Main::includeClass('TemplateData');
					$td=new TemplateData($lp);
				}
				//Main::includeClass('Details');
				//Main::includeClass('DetailsData');
				//if(key_exists('CATEGORY',$comp))
				//{
				//	$det=Details::getDetails('at_crop','*',array('name'=>$comp['CATEGORY']));
				//	$dd=new DetailsData($det,'crop');
				//	$dd->single();
			//	}
			//	else
			//	{
			//		$det=Details::getDetails('at_crop',array('URL','name','details','image'));
			////		$dd=new DetailsData($det,'crop');
			//		$dd->printList();
			//	}
			//	if(empty($det))
			///	{
			//		$det=array('No Data Found');
			//	}
			break;

				case 'contact':
					break;

				case 'location':
					break;

				case 'map':
					break;

				case 'prevactivity':
					break;

			/*
			case 'awards':
				if(key_exists('CATEGORY',$comp))
				{
					Main::includeClass('SinglePage');
					$sp=new SinglePage('awards',$comp['CATEGORY']);
					Main::includeClass('TemplateData');
					$td=new TemplateData($sp);
				}
				else
				{
					Main::includeClass('ListPage');
					$lp=new ListPage('awards');
					Main::includeClass('TemplateData');
					$td=new TemplateData($lp);
				}
			break;

			case 'bio-fert':
				if(key_exists('CATEGORY',$comp))
				{
					Main::includeClass('SinglePage');
					$sp=new SinglePage('bio-fert',$comp['CATEGORY']);
					Main::includeClass('TemplateData');
					$td=new TemplateData($lp);
				}
				else
				{
					Main::includeClass('ListPage');
					$lp=new ListPage('bio-fert');
					Main::includeClass('TemplateData');
					$td=new TemplateData($lp);
				}
			break;

			case 'contact':
				if(key_exists('CATEGORY',$comp))
				{
					Main::includeClass('SinglePage');
					$sp=new SinglePage('contact',$comp['CATEGORY']);
					Main::includeClass('TemplateData');
					$td=new TemplateData($lp);
				}
				else
				{
					Main::includeClass('ListPage');
					$lp=new ListPage('contact');
					Main::includeClass('contact');
					$td=new TemplateData($lp);
				}
				break;

			case 'disease':
				if(key_exists('CATEGORY',$comp))
				{
					Main::includeClass('SinglePage');
					$sp=new SinglePage('disease',$comp['CATEGORY']);
					Main::includeClass('TemplateData');
					$td=new TemplateData($lp);
				}
			else
			{
				Main::includeClass('ListPage');
				$lp=new ListPage('disease');
				Main::includeClass('TemplateData');
				$td=new TemplateData($lp);
			}
			break;

			case 'insurance':
				if(key_exists('CATEGORY',$comp))
				{
					Main::includeClass('SinglePage');
					$sp=new SinglePage('insurance',$comp['CATEGORY']);
					Main::includeClass('TemplateData');
					$td=new TemplateData($lp);
				}
				else
				{
					Main::includeClass('ListPage');
					$lp=new ListPage('insurance');
					Main::includeClass('TemplateData');
					$td=new TemplateData($lp);
				}
			break;
			*/
		}
	}
}