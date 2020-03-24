<?php require_once("php7_mysql_shim.php");
/**
 * Created by PhpStorm.
 * User: gilsonsantos
 * Date: 14/10/15
 * Time: 13:47
 */

/*
define("DB_HOST","localhost");
define("DB_USERNAME","projectconnect");
define("DB_PASSWORD","LucidLynx765@");
define("DB_DATABASE","projectconnect");

*/
define("DB_HOST","mysql.projectconnect.com.br");
define("DB_USERNAME","projectconnect");
define("DB_PASSWORD","LucidLynx765@");
define("DB_DATABASE","projectconnect");


class Conexao {

    var $dbi;
    var $query;

    function open() {
        $this->dbi = mysql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD);
        if (!$this->dbi) {
            echo "Erro na conexao!";
        }
        if (!mysql_select_db(DB_DATABASE)) {
            echo "Erro na selecao do banco de dados!";
        }
    }

    function close() {
        mysql_close($this->dbi);
    }

    function query($sql) {
        $this->query = mysql_query($sql, $this->dbi);
        return $this->query;
    }

    function linhas() {
        return mysql_num_rows($this->query);
    }

    // retorna o conteúdo do campo e linha escolhidos
    function result($linha, $campo) {
        return mysql_result( $this->query, $linha, $campo);
    }

    // mesma coisa que o result() vou demonstrar a diferença no uso
    function retorno($linha, $campo) {
        return mysql_result($this->consulta, $linha, $campo);
    }

    // mesma coisa que o linhas() vou demonstrar a diferença
    function resultado() {
        return mysql_num_rows($this->consulta);
    }
}
