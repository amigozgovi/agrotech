<?php

class Select
{
	function __construct($list)
	{
		$this->data($list);
	}

	function data($list)
	{
		Main::includeClass('AdminPageData');
		$apd=new AdminPageData();
		$apd->header();
?>
				<form name="selectForm" action="" method="post">
						<legend>Select Name</legend>
						<select name="update">
						<?php
							if(empty($list))
							{
								echo "<option value=''>None</option>";
							}
							else if(is_array($list))
							{
								foreach($list as $value)
								{
									echo "<option value='$value'>$value</option>";
								}
							}
							else
							{
								echo "<option value='$list'>$list</option>";
							}
						?>
						</select><br />
						<input type="submit" name="select_action" value="Update" />
				</form>
	<?php
		$apd->content();
	}
}

?>