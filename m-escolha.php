<?php
require_once('../conexao.php');
$postjson = json_decode(file_get_contents('php://input'), true);
file_put_contents("log.txt", print_r($postjson, true), FILE_APPEND);



$id = @$postjson['id'];
$questao = @$postjson['questao'];
$value = @$postjson['value'];
$valor = @$postjson['valor'];
$idquestao = @$postjson['idquestao'];
$selectedRadioItem = @$postjson['selectedRadioItem'];
$radioSelect = @$postjson['radioSelect'];
//  and questao = '$questao' 
//$event = @$postjson['$event'];


/* ,  resposta = '$radioValue2',  resposta = '$radioValue3' */
$res = $pdo->prepare("UPDATE checklist SET  resposta = '$value'   WHERE id_agend = '$id'  and questao = '$idquestao'  ");
 


$res->bindValue(":idquestao", $idquestao);
$res->bindValue(":selectedRadioItem", $selectedRadioItem );
//$res->bindValue(":valor", $valor );
$res->bindValue(":value", $value );
$res->bindValue(":radioSelect", $radioSelect );
// $res->bindValue(":resp", $resp );
//$res->bindValue(":selectedRadioGroup", $selectedRadioGroup );


$res->execute();
//file_put_content("log.txt", print_r($postjson, true), FILE_APPEND);

$result = json_encode(array('mensagem' => 'Salvo com Sucesso', 'ok' => true));
echo $result;
