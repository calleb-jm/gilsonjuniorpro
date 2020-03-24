<?php

/**
 * Created by PhpStorm.
 * User: gilsonjuniorpro
 * Date: 03/02/17
 * Time: 13:28
 */
class PostDTO
{
    private $codPost;
    private $titulo;
    private $conteudo;
    private $imagem;
    private $data;

    /**
     * @return mixed
     */
    public function getCodPost()
    {
        return $this->codPost;
    }

    /**
     * @param mixed $codPost
     */
    public function setCodPost($codPost)
    {
        $this->codPost = $codPost;
    }

    /**
     * @return mixed
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @param mixed $titulo
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    /**
     * @return mixed
     */
    public function getConteudo()
    {
        return $this->conteudo;
    }

    /**
     * @param mixed $conteudo
     */
    public function setConteudo($conteudo)
    {
        $this->conteudo = $conteudo;
    }

    /**
     * @return mixed
     */
    public function getImagem()
    {
        return $this->imagem;
    }

    /**
     * @param mixed $imagem
     */
    public function setImagem($imagem)
    {
        $this->imagem = $imagem;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }


}