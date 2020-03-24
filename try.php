<?php
/**
 * Created by PhpStorm.
 * User: gilsonjuniorpro
 * Date: 15/03/19
 * Time: 19:38
 */
$content = trim(file_get_contents("php://input"));

//Attempt to decode the incoming RAW post data from JSON.
$decoded = json_decode($content, true);

//echo "<pre>";print_r($decoded);

$response = array();
$response["idpost"] = $_GET['idpost'];
$response["iduser"] = $_GET['iduser'];

$idpost = $_GET['idpost'];
$iduser = $_GET['iduser'];

//echo json_encode($response);
?>
<html>
<h1>
<?php
    echo '<a href="carrotapp.scheme://carrotapp/idpost-'.$idpost.'/iduser-'.$iduser.'">teste</a>';
?>
</h1>
</html>
