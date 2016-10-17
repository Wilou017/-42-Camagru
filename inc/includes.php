<?php

	if (!file_exists(ROOT."/inc/config/database.php") || !file_exists(ROOT."/inc/config/site.php"))
	{
		if (file_exists(ROOT."/inc/config/database.php")) unlink(ROOT."/inc/config/database.php");
		if (file_exists(ROOT."/inc/config/site.php")) unlink(ROOT."/inc/config/site.php");
		header("Location: /install");
		exit;
	}
	else
	{
		include_once ROOT."/inc/config/database.php";
		include_once ROOT."/inc/config/site.php";
	}

	include_once ROOT."/inc/function.php";

	function __autoload($classname){ include_once ROOT."/inc/class/$classname.class.php"; }
