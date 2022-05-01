<?php

include_once("../conexao.php");

   $nome = '%'.$_GET['nome'].'%';

$dados = array();

$query = $pdo->query("SELECT * from produtos where nome like '$nome' order by vendas limit 8");
$res = $query->fetchAll(PDO::FETCH_ASSOC);

for ($i=0; $i < count($res); $i++){
    foreach ($res[$i] as $key => $value){}

        $dados = $res;

}

echo ($res) ?
json_encode(array("code" => 1, "result"=>$dados)) :
json_encode(array("code" => 0, message=>"Dados não encontrados!"))

?>