<?php
/**
 * Created by PhpStorm.
 * User: gilsonjuniorpro
 * Date: 17/02/19
 * Time: 10:05
 */
?>
<HTML>

<HEAD>
<TITLE></TITLE>
</HEAD>

<BODY>

  <FORM ACTION="http://form.ultramail.com.br/" METHOD="POST">
  <P>
<!--
Formulário do cliente.
Especifique abaixo os campos que deseja enviar para e-mail.
Caso o campo assunto não seja preenchido, o sistema irá enviar o e-mail com o assunto Formulário UltraMail
-->
Nome: <BR><INPUT TYPE="text" NAME="nome" SIZE="24"><BR>
E-Mail: <BR><INPUT TYPE="text" NAME="email" SIZE="24"><BR>
Assunto: <BR><INPUT TYPE="text" NAME="assunto" SIZE="24"><BR>
Mensagem: <BR><TEXTAREA NAME="mensagem" ROWS="8" COLS="20"></TEXTAREA>

<!--
Chave de autenticação no UltraMail para o MailBox.
Se a senha do MailBox for alterada esta chave deverá ser gerada novamente através do seu painel de controle.
-->
    <INPUT TYPE="hidden" NAME="key" VALUE="eJwBzwAw/1OaeCQEYpyHdH5xt3UqulNUbcWfflH3Af6sMufRiV8uRm9ybVVsdHJhTWFpbJH48NlvyCvJKl8vkTd/g75vW09LCy+mSLYi4viuX3mjYJYuEDk3izRQZJZz1p3PLan5uMei38vKgViAOyVxxxZDdKyiB8VkL9xn1l4+1OaOSXAP8TV6FUpJAZDHhLq2w/UPiFPCwEXYlxO3bWfRbEykCAbfBa8MjF/0xKwf9TjMI0IS80t9I+NVhHo9Hwhxuq6/lqlmBzOrvwwPrOamCPwJhTnwYqg=">

<!--
Pagina de conclusão do formulário de envio. Altere para a página desejada
-->
    <INPUT TYPE="hidden" NAME="redirect" VALUE="http://projectconnect.com.br/gilsonjuniorpro/resposta.php">

    <INPUT TYPE="submit" VALUE="Enviar">
    <INPUT TYPE="reset" VALUE="Limpar">
  </P>
  </FORM>

</BODY>
</HTML>