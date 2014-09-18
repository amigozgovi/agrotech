<?php

class SeasonCalculator
{
	function __construct()
	{
		if(isset($_POST['season']))
		{
			$this->season=$_POST['season'];
		}
		else
		{
			$this->season='';
		}
		$this->parse();
	}

	function parse()
	{
		if(!empty($this->season))
		{
			Main::includeClass('Details');
			$details=Details::getDetailsContains('at_crop',array('name','details'),array('climate'=>$this->season));
			Main::includeClass('SeasonCalculatorData');
			Main::includeClass('TemplateData');
			$scd=new SeasonCalculatorData($details,$this->season);
			$td=new TemplateData($scd);
		}
		else
		{
			Main::includeClass('SeasonCalculatorForm');
			Main::includeClass('TemplateData');
			$scf=new SeasonCalculatorForm($details);
			$td=new TemplateData($scf);
		}
	}
}

?>