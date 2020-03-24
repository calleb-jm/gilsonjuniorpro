<?php require_once("php7_mysql_shim.php");

/**
 * Created by PhpStorm.
 * User: gilsonjuniorpro
 * Date: 03/02/17
 * Time: 13:23
 */
class PostDAO
{
    public function listarPosts() {

        $collectionPost = array();
        $i = 0;
        try {
            $db = new Conexao;
            $db->open();
            $sql = "SELECT ";
            $sql .= "codpost, ";
            $sql .= "titulo, ";
            $sql .= "conteudo, ";
            $sql .= "imagem, ";
            $sql .= "data ";
            $sql .= "FROM gj_tb_post order by codpost DESC";
//echo $sql;exit;
            $rs = $db->query($sql);

            while ($dados = mysql_fetch_array($rs)) {
                $objPostDTO = new PostDTO();

                $objPostDTO->setCodPost($dados["codpost"]);
                $objPostDTO->setTitulo($dados["titulo"]);
                $objPostDTO->setConteudo($dados["conteudo"]);
                $objPostDTO->setImagem($dados["imagem"]);
                $objPostDTO->setData($dados["data"]);

                array_push($collectionPost, $objPostDTO);
            }
        }  catch(Exception $e) {
            echo $e->getMessage();
        }

        //echo "<pre>";print_r($collectionPost);
        return $collectionPost;
    }
}