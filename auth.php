<?php
	function auth($login, $passwd)
	{
		if (!($file = @file_get_contents("../private/passwd")))
			return FALSE;
		$auth = unserialize($file);
		$hash = hash("sha256", $passwd);
		foreach ($auth as $element)
		{
			if ($element['login'] === $login && $element['passwd'] === $hash)
				return TRUE;
		}
		return FALSE;
	}
?>
