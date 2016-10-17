<?php

	function securite($string, $forcestr=0)
	{
		global $mysqli;
		if($forcestr == 0 && ctype_digit($string))
		{
			$string = intval($string);
		}
		else
		{
			$string = htmlspecialchars($string);
			$string = $mysqli->real_escape_string($string);
		}
		return $string;
	}