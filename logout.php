<?php

require_once("classes/load.php");
	$login = new modelUserLogin();
	$login->logout();
	
	header("Location:index.php"); 

?>