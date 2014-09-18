<?php
if(!class_exists('Main'))
{
	include_once('Main.php');
}
class Install
{
	function __construct()
	{
		if(Main::$con==FALSE)
		{
			Main::openConnection();
		}
		$this->doInstall();
	}

	function doInstall()
	{
		$this->addAdmin();
		$this->addAward();
		$this->addBioFert();
		$this->addContactInfo();
		$this->addCrop();
		$this->addCropDisease();
		$this->addCropInsurance();
		$this->addCropTypes();
		$this->addLinks();
		$this->addLocation();
		$this->addMagazine();
		$this->addMap();
		$this->addMessage();
		$this->addNews();
		$this->addPatent();
		$this->addPrevActivity();
		$this->addPublication();
		$this->addWork();
		$this->addPests();
	}

	function addAdmin()
	{
		$query="DROP TABLE IF EXISTS `at_admin`;";
			mysql_query($query);
		$query="CREATE TABLE `at_admin` (
  `user` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `email` text NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
";
		mysql_query($query);
	}

	function addAward()
	{
		$query="DROP TABLE IF EXISTS `at_awards`;";
		mysql_query($query);
		$query="CREATE TABLE IF NOT EXISTS `at_awards` (
  `level` int(11) NOT NULL DEFAULT '0',
  `name` text NOT NULL,
  `details` text,
  `year` varchar(150) DEFAULT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
		mysql_query($query);
	}

	function addBioFert()
	{
		$query="DROP TABLE IF EXISTS `at_bio_fert`;";
		mysql_query($query);
		$query="CREATE TABLE IF NOT EXISTS `at_bio_fert` (
  `name` varchar(150) NOT NULL,
  `details` text NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `price` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
";
		mysql_query($query);
	}

	function addContactInfo()
	{
		$query="DROP TABLE IF EXISTS `at_contact_info`;";
		mysql_query($query);
		$query="CREATE TABLE `at_contact_info` (
  `name` varchar(500) NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) DEFAULT 'Office',
  `code` varchar(10) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `district` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `URL` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
";
		mysql_query($query);
	}

	function addCrop()
	{
		$query="DROP TABLE IF EXISTS `at_crop`;";
		mysql_query($query);
		$query="CREATE TABLE `at_crop` (
  `name` varchar(150) NOT NULL,
  `sci_name` varchar(250) DEFAULT NULL,
  `climate` varchar(150) DEFAULT NULL,
  `soil` text,
  `variaties` text,
  `dur` varchar(200) DEFAULT NULL,
  `diseases` text,
  `bio_fert` text,
  `market_price` varchar(150) DEFAULT NULL,
  `details` text,
  `type` varchar(50) DEFAULT NULL,
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `image` text,
  `URL` text NOT NULL,
  `pests` text NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;
";
		mysql_query($query);
	}

	function addCropDisease()
	{
		$query="DROP TABLE IF EXISTS `at_crop_disease`;";
		mysql_query($query);
		$query="CREATE TABLE `at_crop_disease` (
  `name` varchar(150) NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `control` text,
  `URL` text NOT NULL,
  `details` text,
  PRIMARY KEY (`ID`),
  KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
		mysql_query($query);
	}

	function addCropInsurance()
	{
		$query="DROP TABLE IF EXISTS `at_crop_insurance`;";
		mysql_query($query);
		$query="CREATE TABLE `at_crop_insurance` (
  `crop` varchar(150) NOT NULL,
  `no` varchar(50) NOT NULL,
  `age` varchar(100) NOT NULL,
  `premium` float NOT NULL,
  `compensation` float NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `URL` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
		mysql_query($query);
	}

	function addPests()
	{
		$query="DROP TABLE IF EXISTS `at_crop_pests`;";
		mysql_query($query);
		$query="CREATE TABLE `at_crop_pests` (
  `URL` text NOT NULL,
  `name` varchar(150) NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `details` text,
  `control` text,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
		mysql_query($query);
	}

	function addCropTypes()
	{
		$query="DROP TABLE IF EXISTS `at_crop_types`;";
		$query="CREATE TABLE IF NOT EXISTS `at_crop_types` (
  `name` varchar(250) NOT NULL,
  `details` text,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`),
  KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
		mysql_query($query);
	}

	function addLinks()
	{
		$query="DROP TABLE IF EXISTS `at_links`;";
		mysql_query($query);
		$query="CREATE TABLE IF NOT EXISTS `at_links` (
  `name` varchar(150) NOT NULL,
  `url` text NOT NULL,
  `details` text NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
		mysql_query($query);
	}

	function addLocation()
	{
		$query="DROP TABLE IF EXISTS `at_location`;";
		mysql_query($query);
		$query="CREATE TABLE `at_location` (
  `name` varchar(150) NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `details` text,
  `cli` varchar(200) DEFAULT NULL,
  `soil` text,
  `crops` text,
  `landuse` varchar(250) DEFAULT NULL,
  `geo_area` varchar(200) DEFAULT NULL,
  `land_forest` varchar(200) DEFAULT NULL,
  `land_sown` varchar(200) DEFAULT NULL,
  `well_irrigated_area` varchar(200) DEFAULT NULL,
  `tank_irrigated_area` varchar(200) DEFAULT NULL,
  `canal_irrigated_area` varchar(200) DEFAULT NULL,
  `other_irrigated_area` varchar(200) DEFAULT NULL,
  `net_irrigated_area` varchar(200) DEFAULT NULL,
  `gross_irrigated_area` varchar(200) DEFAULT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'village',
  `URL` int(11) NOT NULL,
  `image` bigint(20) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;";
		mysql_query($query);
	}

	function addMagazine()
	{
		$query="CREATE TABLE IF NOT EXISTS `at_magazine` (
  `name` varchar(150) NOT NULL,
  `type` int(11) DEFAULT NULL,
  `annual_price` int(11) DEFAULT NULL,
  `single_price` int(11) DEFAULT NULL,
  `lifetime_price` int(11) DEFAULT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
		mysql_query($query);
	}

	function addMap()
	{
		$query="DROP TABLE IF EXISTS `at_map`;";
		$query="CREATE TABLE `at_map` (
  `type` smallint(6) NOT NULL DEFAULT '0',
  `name` varchar(150) DEFAULT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(150) NOT NULL,
  `location` varchar(200) DEFAULT NULL,
  `URL` text NOT NULL,
  `district` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
";
		mysql_query($query);
	}

	function addMessage()
	{
		$query="CREATE TABLE IF NOT EXISTS `at_message` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `from` varchar(150) NOT NULL,
  `sub` text NOT NULL,
  `msg` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
		mysql_query($query);
	}

	function addNews()
	{
		$query="DROP TABLE IF EXISTS `at_news`;";
		mysql_query($query);
		$query="CREATE TABLE `at_news` (
  `title` varchar(150) NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `news` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `URL` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
		mysql_query($query);
	}

	function addPatent()
	{
		$query="CREATE TABLE IF NOT EXISTS `at_patents` (
  `name` varchar(200) NOT NULL,
  `holders` text NOT NULL,
  `year` varchar(50) NOT NULL,
  `no` varchar(200) NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`),
  KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
		mysql_query($query);
	}

	function addPrevActivity()
	{
		$query="DROP TABLE IF EXISTS `at_prev_activity`;";
		mysql_query($query);
		$query="CREATE TABLE `at_prev_activity` (
  `year` varchar(20) NOT NULL,
  `activity` text NOT NULL,
  `location` varchar(150) NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `URL` text NOT NULL,
  `district` varchar(150) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
		mysql_query($query);
	}

	function addPublication()
	{
		$query="CREATE TABLE IF NOT EXISTS `at_publication` (
  `title` varchar(250) NOT NULL,
  `year` varchar(20) DEFAULT NULL,
  `author` varchar(150) DEFAULT NULL,
  `publisher` varchar(500) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`),
  KEY `title` (`title`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
		mysql_query($query);
	}

	function addWork()
	{
		$query="DROP TABLE IF EXISTS `at_work`;";
		mysql_query($query);
		$query="CREATE TABLE `at_work` (
  `date` date NOT NULL,
  `location` varchar(150) NOT NULL,
  `district` varchar(200) NOT NULL,
  `days` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `LOCID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
		mysql_query($query);
	}
}

try
{
	$install=new Install();
	echo "Installation Successfull";
}
catch(exception $e)
{
	echo " ".$e->getMessage();
}

?>