<?php

	define('ROOT', $_SERVER['DOCUMENT_ROOT']);
	include_once ROOT."/inc/includes.php";

	// try {
	// 	$db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
	// 	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// }
	// catch(PDOException $e)
	// {
	// 	echo $e->getMessage();
	// 	die();
	// }