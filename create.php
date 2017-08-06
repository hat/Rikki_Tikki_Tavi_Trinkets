<?php
	function err()
	{
		echo "ERROR\n";
		exit;
	}

	if (!$_POST['submit'] || $_POST['submit'] !== "OK")
		err();
	if (!$_POST['login'] || !$_POST['passwd'])
		err();
	if (!is_dir('../private'))
		mkdir('../private/');
	$serialfile = "../private/passwd";
	$bkey = 0;
	if (file_exists($serialfile))
	{
		if (($file = file_get_contents($serialfile)) !== FALSE)
			$auth = unserialize($file);
		foreach ($auth as $key => $element)
		{
			if ($element["login"] === $_POST["login"])
				err();
			if ($key > $bkey)
				$bkey = $key;
		}
	}
	$auth[$bkey + 1]["login"] = $_POST["login"];
	$auth[$bkey + 1]["passwd"] = hash("sha256", $_POST["passwd"]);
	file_put_contents($serialfile, serialize($auth));
	echo "OK\n";
?>
