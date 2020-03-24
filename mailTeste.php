<?php
/**
 * Created by PhpStorm.
 * User: gilsonjuniorpro
 * Date: 18/08/17
 * Time: 16:42
 */

$message = "Testando outros remetentes, para facilitar a resposta";
$headers = 'From: gilsonjuniorpro@projectconnect.com.br';  // <-- O e-mail que está configurado no .htaccess
$headers = 'Date:'.date('r');
if (mail('gilsonjuniorpro@gmail.com', 'Teste', $message, $headers)) {

    print('Funcionou');
}else{

    print('Nao Funcionou...');
};
?>