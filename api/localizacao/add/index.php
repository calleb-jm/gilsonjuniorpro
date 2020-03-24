<?php
/**
 * Created by PhpStorm.
 * User: gilsonsantos
 * Date: 19/05/16
 * Time: 14:14
 */
require_once('../../../factory/Conexao.php');
require_once('../../../dto/LocalizacaoDTO.php');
require_once('../../../controller/LocalizacaoController.php');
require_once('../../../dao/LocalizacaoDAO.php');

/*
$_POST['chaveusuario'] = "nome";
$_POST['latitude'] = "33.62398";
$_POST['longitude'] = "43.62398";
*/

$objLocalizacaoDTO = new LocalizacaoDTO();

$objLocalizacaoDTO->setChaveUsuario($_POST['chaveusuario']);
$objLocalizacaoDTO->setLatitude($_POST['latitude']);
$objLocalizacaoDTO->setLongitude($_POST['longitude']);
$objLocalizacaoDTO->setTemProximo($_POST['temproximo']);
$objLocalizacaoDTO->setPrecisao($_POST['precisao']);

if($_POST['chaveusuario'] != "") {
    $objLocalizacaoController = new LocalizacaoController();
    $msg = $objLocalizacaoController->cadastrarLocalizacao($objLocalizacaoDTO);
}

$response = array();

if($msg == "sucesso"){
    $response["success"] = 1;
    $response["message"] = "localização cadastrada com sucesso!";
    echo json_encode($response);
}else{
    $response["success"] = 2;
    $response["message"] = "Erro ao cadastrar localização!";
    echo json_encode($response);
}
