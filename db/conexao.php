<?php

session_start();
    
    $modo = 'local';

    if($modo == 'local'){
        $servidor = 'localhost';
        $usuario = 'root';
        $senha = '';
        $banco = 'banco-rpg';
    }

    if ($modo == 'producao'){
        
    }

    try{
        $pdo = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $erro){
        echo "Falha ao se conectar com o banco!".$erro->getMessage();
    }

    function limparPost($dados){
        $dados = trim($dados);
        $dados = stripslashes($dados);
        $dados = htmlspecialchars($dados);

        return $dados;
    }
    
    function auth($tokenSessao){
    global $pdo;
    
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE token=? LIMIT 1");
    $sql->execute(array($tokenSessao));
    $usuario = $sql->fetch(PDO::FETCH_ASSOC);

    if(!$usuario){
        return false;
    }else{
        return $usuario;
    }
}
?>