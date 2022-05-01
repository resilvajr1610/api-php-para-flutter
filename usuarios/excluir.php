<?php

include_once("..//conexao.php");

$id = $_GET['id'];

$dados = array();

$query = $pdo->query("DELETE FROM usuarios where id= '$id'");

if($query){
        echo(json_encode(array("code"=> 1,"result"=>"Excluído com Sucesso")));
    }else{
        echo(json_encode(array("code"=> 2,"result"=>"Erro ao Excluir")));
    }
?>