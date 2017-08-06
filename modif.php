<?php
	function err()
	{
		echo "ERROR\n";
		exit;
	}
	if (!$_POST['submit'] || $_POST['submit'] !== "OK")
		err();
	if (!$_POST["login"] || !$_POST["oldpw"] || !$_POST["newpw"])
		err();
	if (!is_dir('../private'))
		mkdir('../private/');
	$serialfile = "../private/passwd";
	if (file_exists($serialfile))
	{
		if (($file = file_get_contents($serialfile)) !== FALSE)
			$auth = unserialize($file);
		foreach ($auth as $key => $element)
		{
			if ($element["login"] === $_POST["login"])
			{
				$authIndex = $key;
				break;
			}
		}
	}
	if (!isset($authIndex) || $auth[$authIndex]['passwd'] !== hash("sha256", $_POST["oldpw"]))
		err();
	$auth[$authIndex]["passwd"] = hash("sha256", $_POST["newpw"]);
	file_put_contents($serialfile, serialize($auth));
	echo "OK\n";
?>
