<?php

require 'db/conexao.php';

  if(!isset($_SESSION['TOKEN'])){
    header('location:/projeto/login.php');
  }

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/criarRPG.css" />

    <title>Sage Tabletop | Criar RPG</title>
  </head>
  <body>
    <div class="menu">
    <div class="img">
            <img src="assets/img/home/Witcher Icon B.png" alt="" />
         </div>
         <div class="img-home">
            <a href="index.php"><img src="assets/img/home/Casa Icon.png" alt="" /></a>
         </div>
         <div class="img">
            <a href="#"
               ><img src="assets/img/home/Milo Icon Barra.png" alt=""
               /></a>
         </div>
    </div>

    <div class="conteudo oculto">
      <div class="banner">
        <div class="banner-img">
          <div class="banner-img-info">
            <p>Upe sua capa, medida</p>
            <p>recomendada: 1280x220</p>
          </div>
        </div>
        <div class="banner-info">
          <p>Nome do RPG</p>
        </div>
      </div>

      <div class="container">
        <div class="nomePersonagem">
          <div class="nome">
            <?php echo $_SESSION['nome'] ?>
            <p class="data"></p>
          </div>
        </div>
        <div class="atividade">
          <p>Criou o RPG no dia <span class="data"></span>, vamos a batalha!</p>
        </div>
        <div class="config">
          <div class="config-entrar">
            <button class="entrar">Entrar</button>
          </div>
        </div>
      </div>
    </div>

    <div class="criarRPG">
      <div class="nome">
        <p>Digite o nome do RPG!</p>
      </div>
      <div class="input">
        <input type="text" class="inputText"/>
      </div>
      <div class="botoes">
        <button class="">
          <a href="index.php"><img src="assets/img/criarRPG/cancelar.svg" alt="" /></a>
        </button>
        <button class="btnMoldal">
          <img src="assets/img/criarRPG/ok.svg" alt="" />
        </button>
      </div>
    </div>
  </body>
  <script src="js/criarRPG.js"></script>
</html>
