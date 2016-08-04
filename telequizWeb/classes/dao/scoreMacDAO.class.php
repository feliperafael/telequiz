<?php
/**
 * Created by PhpStorm.
 * User: Principal
 * Date: 10/07/2016
 * Time: 17:26
 */

class scoreMacDAO {
    public static $instance;
    private $tabela = "score_table";
    private function __construct() { //
    }
    public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new scoreMacDAO();
        return self::$instance;
    }
    //salva os pontos do usuário
    public function savePoints($score, $mac){
        $sql = conexao::getInstance()->prepare("INSERT INTO `score_table`(`score`, `mac`)
																VALUES (:score, :mac)");
        $sql->bindValue(':score', $score);
        $sql->bindValue(':mac', $mac);
        if($sql->execute()){
            //echo 'Pontos salvos';
            return true;
        }
    }
    public function getPoints($id){
        $sql = conexao::getInstance()->prepare("SELECT SUM(score_table.score) AS POINTS  FROM user INNER JOIN mac_user
 ON (mac_user.user_id = user.id_user) INNER  JOIN score_table ON (score_table.mac = mac_user.mac ) WHERE user.id_user =:id");
        $sql->bindValue(':id', $id);
        if($sql->execute()){
            $points = $sql->fetch(PDO::FETCH_ASSOC);
            return $points;
        }else{
            echo $sql->errorCode();
            return null;
        }



    }

}