<?php

/**
 * Created by PhpStorm.
 * User: gilsonsantos
 * Date: 16/05/16
 * Time: 16:24
 */

class LocalizacaoController
{
    public function listarLocalizacao(){
        $objLocalizacaoDAO = new LocalizacaoDAO();
        return $objLocalizacaoDAO->listarLocalizacao();
    }

    public function cadastrarLocalizacao($objLocalizacaoDTO){
        $objLocalizacaoDAO = new LocalizacaoDAO();
        return $msg = $objLocalizacaoDAO->cadastrarLocalizacao($objLocalizacaoDTO);
    }

}


