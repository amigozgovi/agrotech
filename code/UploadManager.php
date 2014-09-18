<?php
class UploadManager
{
	protected $fileName;
	protected $fileExtension;
	protected $location;
	function __construct($name,$ext='',$location='external_images')
	{
		$this->fileName=$name;
		$this->ext=$ext;
		$this->location=$location;
		$this->upload();
	}

	function upload()
	{
		if($_FILES["file"]["error"]>0)
		{
			throw new Exception('Failed Due To Error'.$_FILES['file']['error']);
		}
		else
		{
			@move_uploaded_file($_FILES['file']["tmp_name"],$this->location."\\".$this->fileName.$this->ext);
		}
	}

}

?>