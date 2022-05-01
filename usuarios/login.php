<?php

include_once("..//conexao.php");

$email = $_GET['email'];
$senha = $_GET['senha'];

$dados = array();

$query = $pdo->query("SELECT * from usuarios where email= '$email' and senha = '$senha'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);

for ($i=0; $i < count($res); $i++){
    foreach ($res[$i] as $key => $value){}

        $dados[] = $res;

}

if($res){
        echo(json_encode(array("code"=> 1,"result"=>$dados)));
    }else{
        echo(json_encode(array("code"=> 2,"message"=>' Dados incorretos')));
    }
?>