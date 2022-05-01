<?php

include_once("../conexao.php");

$dados = array();

$query = $pdo->query("SELECT * from categorias order by produtos desc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);

for ($i=0; $i < count($res); $i++){
    foreach ($res[$i] as $key => $value){}

        $dados = $res;
    
}

echo ($res) ?
json_encode(array("code" => 1, "result"=>$dados)) :
json_encode(array("code" => 0, message=>"Dados não encontrados!"))

?>