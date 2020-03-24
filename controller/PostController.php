<?php

/**
 * Created by PhpStorm.
 * User: gilsonjuniorpro
 * Date: 03/02/17
 * Time: 13:32
 */
class PostController
{
    public function listarPosts(){
        $objPostDAO = new PostDAO();
        return $objPostDAO->listarPosts();
    }
}