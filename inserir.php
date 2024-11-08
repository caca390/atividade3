<?php
include "conexao.php";
$codigo = $_POST['rastreio'];
$tipo = $_POST['tipos'];
$origem = $_POST['origem'];
$destino = $_POST['destino'];
$data = $_POST['data'];

$sql = "INSERT INTO tb_movimentacoes
(cod_rastreio, tipo_movimentacao, origem, destino, data_hora_movi)
VALUES ('$codigo', '$tipo', '$origem', '$destino', '$data')";

$inserir = $pdo->prepare($sql);
// 3º Passo - Tentar executar
try{
    $inserir->execute();
    echo "Cadastrado com sucesso";
} catch(PDOException $erro){
    echo "Falha ao inserir!".$erro->getMessage();
}
?>