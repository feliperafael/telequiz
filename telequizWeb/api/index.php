<?php
include_once("../classes/load.php");

	if(isset($_GET['MAC'])){
		$dao = userDAO::getInstance();
		$api = new modelApi();
		if($api->checkMacAdress($_GET['MAC'])){
            if(isset($_GET['pontos'])){
                $scoreDao = scoreMacDAO::getInstance();
               if($scoreDao->savePoints($_GET['pontos'],$_GET['MAC']))
                  echo "</br>"."Pontos salvos";
            }
        }
	}

?>

