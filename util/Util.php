<?php

/**
 * Created by PhpStorm.
 * User: gilsonjuniorpro
 * Date: 03/02/17
 * Time: 14:46
 */
class Util
{
    public function formataData($dataHora){
        $dataBruta = explode(" ", $dataHora);
        $d = explode(" ", $dataBruta);

        $dataFormatada = $d[2]."/".$d[1]."/".$d[0];

        return $dataFormatada;
    }
}