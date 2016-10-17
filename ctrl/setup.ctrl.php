<?php

	define('ROOT', $_SERVER['DOCUMENT_ROOT']);
	error_reporting(0);

	$return['result'] = false;

	if (!file_exists(ROOT."/inc/config/database.php") && !file_exists(ROOT."/inc/config/site.php") &&
		isset($_POST["submit_Conf_DB"]) &&
		isset($_POST["host"]) &&
		isset($_POST["user"]) &&
		isset($_POST["pass"]) &&
		isset($_POST["database"]))
	{
		if (!empty($_POST["host"]) && !empty($_POST["user"]) && !empty($_POST["database"]))
		{
			$configDB = fopen(ROOT."/inc/config/database.php", 'x');
			$configCMS = fopen(ROOT."/inc/config/site.php", 'x');
			if ($configDB && $configCMS)
			{
				fputs($configDB, "<?php\n");
				fputs($configDB, "	\$DB_DSN = \"mysql:dbname={$_POST["database"]};host={$_POST["host"]}\";\n");
				fputs($configDB, "	\$DB_USER = \"{$_POST["user"]}\";\n");
				fputs($configDB, "	\$DB_PASSWORD = \"{$_POST["pass"]}\";\n?>");
				fclose($configDB);
				fputs($configCMS, "<?php\n");
				fputs($configCMS, "	define('SITENAME', '{$_POST["sitename"]}');\n");
				fputs($configCMS, "	define('SITEURL', '{$_POST["siteurl"]}');\n");
				fputs($configCMS, "	define('DBNAME', '{$_POST["database"]}');\n");
				fclose($configCMS);
				// try {
				// 	$db = new PDO("mysql:host={$_POST["host"]}", $_POST["user"], $_POST["pass"]);
				// 	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				// 	$db->exec("CREATE DATABASE IF NOT EXISTS ".$_POST["database"]);
				// 	$db->exec("USE ".$_POST["database"].";");
					$return['result'] = true;
				// }
				// catch(PDOException $e)
				// {
				// 	if (file_exists(ROOT."/inc/config/database.php")) unlink(ROOT."/inc/config/database.php");
				// 	if (file_exists(ROOT."/inc/config/site.php")) unlink(ROOT."/inc/config/site.php");
				// 	$return['message'] = "Les informations de connexion sont errones: ".$e->getMessage();
				// }
			}
			else
				$return['message'] = "Impossible de cree le fichier config/database.php";
		}
		else
			$return['message'] = "Merci de remplire tout les champs";
	}

	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		die(json_encode($return));
	}

	echo $return['message'] ?? "";