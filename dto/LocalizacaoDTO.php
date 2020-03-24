<?php
/**
 * Created by PhpStorm.
 * User: gilsonsantos
 * Date: 16/05/16
 * Time: 16:12
 */

class LocalizacaoDTO
{
    private $codLocalizacao;
    private $chaveUsuario;
    private $latitude;
    private $longitude;
    private $temProximo;
    private $precisao;

    /**
     * @return mixed
     */
    public function getCodLocalizacao()
    {
        return $this->codLocalizacao;
    }

    /**
     * @param mixed $codLocalizacao
     */
    public function setCodLocalizacao($codLocalizacao)
    {
        $this->codLocalizacao = $codLocalizacao;
    }

    /**
     * @return mixed
     */
    public function getChaveUsuario()
    {
        return $this->chaveUsuario;
    }

    /**
     * @param mixed $chaveUsuario
     */
    public function setChaveUsuario($chaveUsuario)
    {
        $this->chaveUsuario = $chaveUsuario;
    }

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param mixed $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param mixed $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * @return mixed
     */
    public function getTemProximo()
    {
        return $this->temProximo;
    }

    /**
     * @param mixed $temProximo
     */
    public function setTemProximo($temProximo)
    {
        $this->temProximo = $temProximo;
    }

    /**
     * @return mixed
     */
    public function getPrecisao()
    {
        return $this->precisao;
    }

    /**
     * @param mixed $precisao
     */
    public function setPrecisao($precisao)
    {
        $this->precisao = $precisao;
    }


}



