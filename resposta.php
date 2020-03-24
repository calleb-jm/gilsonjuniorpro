<?php
/**
 * Created by PhpStorm.
 * User: gilsonjuniorpro
 * Date: 17/02/19
 * Time: 10:12
 */

ini_set('display_errors', 1);

error_reporting(E_ALL);

$from = "gilsonjuniorpro=projectconnect.com.br";

$to = "gilsonjuniorpro@gmail.com";

$subject = "Verificando o correio do PHP";

$message = "O correio do PHP funciona bem";

$headers = "De:". $from;

mail($to, $subject, $message, $headers);

echo "A mensagem de e-mail foi enviada.";
