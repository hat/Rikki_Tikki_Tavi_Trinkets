<?php
		include("auth.php");
		session_start();
		$valid = "0";
		if ($_GET ["login"] && $_GET["passwd"])
		{
			if (auth($_GET["login"], $_GET["passwd"]))
			{
				$_SESSION["loggued_on_user"] = $_GET["login"];
				echo "OK\n";
				$valid = "1";
			}
		}
		else
		{
			$_SESSION["loggued_on_user"] = "";
			echo "ERROR\n";
			$valid = "0";
		}
		header("Location: /login.php?validated={$valid}");
?>
