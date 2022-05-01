<?php

include_once("../conexao.php");

$nome = '%'.$_GET['nome'].'%';
$idcat = $_GET['idcat'];

$dados = array();

if($idcat ==''){
    $query = $pdo->query("SELECT * from produtos where nome like '$nome' order by vendas");
}else{
    $query = $pdo->query("SELECT * from produtos where categoria = '$idcat' order by vendas");
}

$res = $query->fetchAll(PDO::FETCH_ASSOC);

for ($i=0; $i < count($res); $i++){
    foreach ($res[$i] as $key => $value){}

        $dados = $res;

}

echo ($res) ?
json_encode(array("code" => 1, "result"=>$dados)) :
json_encode(array("code" => 0, "result"=>"Dados não encontrados!"))

?>