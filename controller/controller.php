<?php
/**
 * Created by PhpStorm.
 * User: gilsonsantos
 * Date: 19/05/16
 * Time: 13:44
 */


ob_start();
session_start();

require_once('../factory/Conexao.php');
require_once('../dto/LocalizacaoDTO.php');
require_once('LocalizacaoController.php');
require_once('../dao/LocalizacaoDAO.php');


$action = $_REQUEST['action'];

$response = array();

if($action == "cadastrarLocalizacao"){
    $objLocalizacaoDTO = new LocalizacaoDTO();

    $objLocalizacaoDTO->setTitulo($_POST['titulo']);
    $objLocalizacaoDTO->setNumSerie($_POST['numSerie']);

    $objLocalizacaoController = new LocalizacaoController();
    $msg = $objLocalizacaoController->cadastrarLocalizacao($objLocalizacaoDTO);

    $_SESSION["titulo"] = $_POST['titulo'];
    $_SESSION["numSerie"] = $_POST['numSerie'];

    if($msg == "sucesso"){
        $_SESSION["response"]["success"] = 1;
        $_SESSION["response"]["message"] = "Localizacao cadastrado com sucesso!";
        unset($_SESSION["titulo"]);
        unset($_SESSION["numSerie"]);
    }else{
        $_SESSION["response"]["success"] = 0;
        $_SESSION["response"]["message"] = "Erro ao cadastrar Localizacao!";
        $_SESSION["response"]["message"] .= "<br />$msg";
    }

    $pagina = "../action/actionLocalizacao.php";

    header("Location: $pagina");

}else if($action == "listarIngrediente"){
    $objIngredienteController = new IngredienteController();
    $objIngredienteDTO = new IngredienteDTO();

    $objIngredienteDTO = $objIngredienteController->listarIngrediente();


}elseif($action == "editarIngrediente"){
    $codigo = $_GET["codigo"];

    $objIngredienteController = new IngredienteController();
    $objIngredienteDTO = new IngredienteDTO();

    $objIngredienteDTO = $objIngredienteController->obterIngredientePorCodigo($codigo);

    $_SESSION["codIngrediente"] = $objIngredienteDTO->getCodIngrediente();
    $_SESSION["descricao"] = $objIngredienteDTO->getDescricao();

    $pagina = "../action/cadastrarIngrediente.php";

    header("Location: $pagina");


}elseif($action == "efetuaAlteracaoIngrediente") {

    $objIngredienteController = new IngredienteController();
    $objIngredienteDTO = new IngredienteDTO();

    $objIngredienteDTO->setDescricao($_POST['descricao']);
    $objIngredienteDTO->setCodIngrediente($_GET["codigo"]);

    $msg = $objIngredienteController->efetuaAlteracaoIngrediente($objIngredienteDTO);

    $_SESSION["descricao"] = $_POST['descricao'];
    $_SESSION["codIngrediente"] = $_GET["codigo"];

    if($msg == "sucesso"){
        $_SESSION["response"]["success"] = 1;
        $_SESSION["response"]["message"] = "Ingrediente alterado com sucesso!";
        unset($_SESSION["codIngrediente"]);
        unset($_SESSION["descricao"]);
    }else{
        $_SESSION["response"]["success"] = 0;
        $_SESSION["response"]["message"] = "Erro ao alterar Ingrediente!";
        $_SESSION["response"]["message"] .= "<br />$msg";
    }
    //echo "<pre>";print_r($response);
    //return $response;
    $pagina = "../action/cadastrarIngrediente.php";

    header("Location: $pagina");


}elseif($action == "excluirIngrediente"){
    $codigo = $_GET["codigo"];

    $objIngredienteController = new IngredienteController();

    $msg = $objIngredienteController->excluirIngrediente($codigo);

    $pagina = "../action/cadastrarIngrediente.php";

    header("Location: $pagina");


}else if($action == "visualizarIngrediente"){
    $codigo = $_GET["codigo"];

    $objIngredienteController = new IngredienteController();
    $objIngredienteDTO = new IngredienteDTO();

    $objIngredienteDTO = $objIngredienteController->obterIngredientePorCodigo($codigo);

    $_SESSION["codIngrediente"] = $objIngredienteDTO->getCodIngrediente();
    $_SESSION["descricaoVisualizarIngrediente"] = $objIngredienteDTO->getDescricao();

    $pagina = "../action/visualizarIngrediente.php";

    header("Location: $pagina");


}elseif($action == "cadastrarReceita"){

    $objReceitaDTO = new ReceitaDTO();

    $foto = $_FILES["urlImagem"];
    $tipoImagem = $foto['type'];
    $tipoImagem = explode("/", $tipoImagem);
    $tipoImagem = $tipoImagem[1];

    $today = date("Ymd");
    $codigoMD5 = md5("recipe_".$today);
    $contexto = $codigoMD5.".".$tipoImagem;

    $diretorio = "../resources/images/recipe/".$contexto;

    $objReceitaDTO->setTitulo($_POST['titulo']);
    $objReceitaDTO->setModoPreparo($_POST['modoPreparo']);
    $objReceitaDTO->setRendimento($_POST['rendimento']);
    $objReceitaDTO->setTempoPreparo($_POST['tempoPreparo']);
    $objReceitaDTO->setUrlImagem($contexto);
    $objReceitaDTO->setIngredientes($_POST['ingredientes']);

    $objReceitaController = new ReceitaController();

    $msg = $objReceitaController->cadastrarReceita($objReceitaDTO);
    $retorno = Upload::uploadImagem($foto, $diretorio);

    $_SESSION["titulo"] = $_POST['titulo'];
    $_SESSION["modoPreparo"] = $_POST['modoPreparo'];
    $_SESSION["rendimento"] = $_POST['rendimento'];
    $_SESSION["tempoPreparo"] = $_POST['tempoPreparo'];
    //$_SESSION["urlImagem"] = $_POST['urlImagem'];
    $_SESSION["ingredientes"] = $_POST['ingredientes'];

    if($msg == "sucesso"){
        $_SESSION["response"]["success"] = 1;
        $_SESSION["response"]["message"] = "Receita cadastrada com sucesso!";
        unset($_SESSION["titulo"]);
        unset($_SESSION["modoPreparo"]);
        unset($_SESSION["rendimento"]);
        unset($_SESSION["tempoPreparo"]);
        //unset($_SESSION["urlImagem"]);
        unset($_SESSION["ingredientes"]);
    }else{
        $_SESSION["response"]["success"] = 0;
        $_SESSION["response"]["message"] = "Erro ao cadastrar Receita!";
        $_SESSION["response"]["message"] .= "<br />$msg";
    }
    //echo "<pre>";print_r($response);
    //return $response;
    $pagina = "../action/cadastrarReceita.php";

    header("Location: $pagina");



}else if($action == "listarReceita"){
    $objReceitaController = new ReceitaController();
    $objReceitaDTO = new ReceitaDTO();

    $objReceitaDTO = $objReceitaController->listarReceita();



}elseif($action == "editarReceita"){
    $codigo = $_GET["codigo"];

    $objReceitaController = new ReceitaController();
    $objReceitaDTO = new ReceitaDTO();

    $objReceitaDTO = $objReceitaController->obterReceitaPorCodigo($codigo);

    $_SESSION["codReceita"] = $objReceitaDTO->getCodReceita();
    $_SESSION["titulo"] = $objReceitaDTO->getTitulo();
    $_SESSION["modoPreparo"] = $objReceitaDTO->getModoPreparo();
    $_SESSION["rendimento"] = $objReceitaDTO->getRendimento();
    $_SESSION["tempoPreparo"] = $objReceitaDTO->getTempoPreparo();
    $_SESSION["urlImagem"] = $objReceitaDTO->getUrlImagem();
    $_SESSION["ingredientes"] = $objReceitaDTO->getIngredientes();

    $pagina = "../action/cadastrarReceita.php";

    header("Location: $pagina");


}elseif($action == "efetuaAlteracaoReceita") {

    //echo "efetuaAlteracaoReceita - controller<br />";

    $objReceitaController = new ReceitaController();
    $objReceitaDTO = new ReceitaDTO();

    $objReceitaDTO->setCodReceita($_GET["codigo"]);
    $objReceitaDTO->setTitulo($_POST['titulo']);
    $objReceitaDTO->setModoPreparo($_POST["modoPreparo"]);
    $objReceitaDTO->setRendimento($_POST['rendimento']);
    $objReceitaDTO->setTempoPreparo($_POST['tempoPreparo']);
    $objReceitaDTO->setUrlImagem($_POST['urlImagem']);
    $objReceitaDTO->setIngredientes($_POST['ingredientes']);

    $msg = $objReceitaController->efetuaAlteracaoReceita($objReceitaDTO);

    //echo "$msg - controller<br />";

    $_SESSION["codReceita"] = $_GET["codigo"];
    $_SESSION["titulo"] = $_POST['titulo'];
    $_SESSION["modoPreparo"] = $_POST['modoPreparo'];
    $_SESSION["rendimento"] = $_POST['rendimento'];
    $_SESSION["tempoPreparo"] = $_POST['tempoPreparo'];
    $_SESSION["urlImagem"] = $_POST['urlImagem'];
    $_SESSION["ingredientes"] = $_POST['ingredientes'];

    if($msg == "sucesso"){
        $_SESSION["response"]["success"] = 1;
        $_SESSION["response"]["message"] = "Receita alterada com sucesso!";
        unset($_SESSION["codReceita"]);
        unset($_SESSION["titulo"]);
        unset($_SESSION["modoPreparo"]);
        unset($_SESSION["rendimento"]);
        unset($_SESSION["tempoPreparo"]);
        unset($_SESSION["urlImagem"]);
        unset($_SESSION["ingredientes"]);
    }else{
        $_SESSION["response"]["success"] = 0;
        $_SESSION["response"]["message"] = "Erro ao alterar Receita!";
        $_SESSION["response"]["message"] .= "<br />$msg";
    }
    //echo "<pre>";print_r($response);
    //return $response;
    $pagina = "../action/cadastrarReceita.php";

    header("Location: $pagina");


}elseif($action == "excluirReceita"){
    $codigo = $_GET["codigo"];

    $objReceitaController = new ReceitaController();

    $msg = $objReceitaController->excluirReceita($codigo);

    $pagina = "../action/cadastrarReceita.php";

    header("Location: $pagina");


}else if($action == "visualizarReceita"){
    $codigo = $_GET["codigo"];

    $objReceitaController = new ReceitaController();
    $objReceitaDTO = new ReceitaDTO();

    $objReceitaDTO = $objReceitaController->obterReceitaPorCodigo($codigo);

    //$_SESSION["codReceitaView"] = $objReceitaDTO->getCodReceita();
    //$_SESSION["descricaoReceitaView"] = $objReceitaDTO->getDescricao();
    $_SESSION["tituloView"] = $objReceitaDTO->getTitulo();
    $_SESSION["modoPreparoView"] = $objReceitaDTO->getModoPreparo();
    $_SESSION["rendimentoView"] = $objReceitaDTO->getRendimento();
    $_SESSION["tempoPreparoView"] = $objReceitaDTO->getTempoPreparo();
    $_SESSION["avaliacaoView"] = $objReceitaDTO->getAvaliacao();
    $_SESSION["urlImagemView"] = $objReceitaDTO->getUrlImagem();
    $_SESSION["ingredientesView"] = $objReceitaDTO->getIngredientes();

    echo "<pre>";print_r($_SESSION);

    $pagina = "../action/visualizarReceita.php";

    header("Location: $pagina");

}

