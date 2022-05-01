<?php

include_once("..//conexao.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$senha = $_POST['senha'];
$id = $_POST['id'];



    if($nome == '' or $email == ''){
        echo(json_encode(array("message"=>'Preencha todos os campos')));
        exit();
    }

    if($id == ""){
    
    //CONSULTA PARA TRAZER O CPF E EMAIL CASO JÁ EXISTIA NO BANCO
    $res = $pdo->query("SELECT * from usuarios where email = '$email' or cpf = '$cpf'");
    
    $dados = $res->fetchAll(PDO::FETCH_ASSOC);
    $linhas = count($dados);
    if($linhas > 0){
        $email_recup = $dados[0]['email'];
        $cpf_recup = $dados[0]['cpf'];
    }
    
    if($email == @$email_recup){
        echo(json_encode(array("message"=>'Email já Cadastrado')));
        exit();
    }
    
    if($cpf == @$cpf_recup){
        echo(json_encode(array("message"=>'CPF já Cadastrado')));
        exit();
    }
    
    $res = $pdo->prepare("INSERT into usuarios (nome, cpf, telefone, email, senha, nivel) 
                                values (:nome, :cpf, :telefone, :email, :senha, :nivel)");
        
        $res->bindValue(":nome", $nome);
        $res->bindValue(":email", $email);
        $res->bindValue(":cpf", $cpf);
        $res->bindValue(":senha", $senha);
        $res->bindValue(":nivel", 'Cliente');
        $res->bindValue(":telefone", $telefone);
    
        $res->execute();
    
        if($res){
            echo(json_encode(array("message"=>'Inserido com Sucesso')));
            exit();
        }

}else{

    $res = $pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email, cpf = :cpf, senha = :senha, nivel = :nivel, telefone = :telefone
                        where id = :id");
        
        $res->bindValue(":nome", $nome);
        $res->bindValue(":email", $email);
        $res->bindValue(":cpf", $cpf);
        $res->bindValue(":senha", $senha);
        $res->bindValue(":nivel", 'Cliente');
        $res->bindValue(":telefone", $telefone);
        $res->bindValue(":id", $id);
    
        $res->execute();
    
        if($res){
            echo(json_encode(array("message"=>'Editado com Sucesso')));
            exit();
        }

}
        
?>