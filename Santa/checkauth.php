<?php 
session_start();

if ($_SESSION["PermissionLevel"] != "9"){
	
		header('Location:/index.php?error=1');
}

?>