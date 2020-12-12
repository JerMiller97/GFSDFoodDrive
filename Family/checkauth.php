<?php 
session_start();

if ($_SESSION["PermissionLevel"] != "9" and $_SESSION["PermissionLevel"] != "7"){
	
		header('Location:/index.php?error=1');
}

?>