<?php require_once("php7_mysql_shim.php");

/**
 * Created by PhpStorm.
 * User: gilsonsantos
 * Date: 19/01/16
 * Time: 15:39
 */



class LocalizacaoDAO
{
    public function listarLocalizacao() {

        $collectionLocalizacao = array();
        $i = 0;
        try {
            $db = new Conexao;
            $db->open();
            $sql = "SELECT ";
            $sql .= "codlocalizacao, ";
            $sql .= "chaveusuario, ";
            $sql .= "latitude, ";
            $sql .= "longitude, ";
            $sql .= "temproximo, ";
            $sql .= "precisao, ";
            $sql .= "FROM investigacao_tb_localizacao ";
//echo $sql;
            $rs = $db->query($sql);

            while ($dados = mysql_fetch_array($rs)) {
                $objLocalizacaoDTO = new LocalizacaoDTO();

                $objLocalizacaoDTO->setCodLocalizacao($dados["codlocalizacao"]);
                $objLocalizacaoDTO->setChaveUsuario($dados["chaveusuario"]);
                $objLocalizacaoDTO->setLatitude($dados["latitude"]);
                $objLocalizacaoDTO->setLongitude($dados["longitude"]);
                $objLocalizacaoDTO->setTemProximo($dados["temproximo"]);
                $objLocalizacaoDTO->setPrecisao($dados["precisao"]);

                array_push($collectionLocalizacao, $objLocalizacaoDTO);
            }
        }  catch(Exception $e) {
            echo $e->getMessage();
        }

        //echo "<pre>";print_r($collectionLocalizacao);
        return $collectionLocalizacao;
    }


    public function cadastrarLocalizacao($objLocalizacaoDTO){
        $msg = "erro";
        try {
            $db = new Conexao;
            $db->open();
            $sql  = "INSERT INTO investigacao_tb_localizacao ";
            $sql .= "(chaveusuario, latitude, longitude, temproximo, precisao) ";
            $sql .= "VALUES ";
            $sql .= "(";
            $sql .= "'".$objLocalizacaoDTO->getChaveUsuario()."', ";
            $sql .= "'".$objLocalizacaoDTO->getLatitude()."', ";
            $sql .= "'".$objLocalizacaoDTO->getLongitude()."', ";
            $sql .= "'".$objLocalizacaoDTO->getTemProximo()."', ";
            $sql .= "'".$objLocalizacaoDTO->getPrecisao()."'";
            $sql .= ")";
//echo $sql;exit;
            $rs = $db->query($sql);
            $msg = "sucesso";
        }  catch(Exception $e) {
            echo $e->getMessage();
        }

        return $msg;
    }

}