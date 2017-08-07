<?php
		include("auth.php");
		session_start();
		$valid = FALSE;
		if ($_GET ["login"] && $_GET["passwd"])
		{
			if (auth($_GET["login"], $_GET["passwd"]))
			{
				$_SESSION["loggued_on_user"] = $_GET["login"];
				echo "OK\n";
				$valid = TRUE;
			}
		}
		else
		{
			$_SESSION["loggued_on_user"] = "";
			echo "ERROR\n";
			$valid = FALSE;
		}
		header("Location: /login.php?validated={$valid}");
?>
