<?php 

require 'db/conexao.php';

  if(!isset($_SESSION['TOKEN'])){
    header('location:/projeto/login.php');
  }

  if(!isset($_GET['personagem'])){
    header("location:selecaoPersonagem.php");
  }else{
    $personagem = $_GET['personagem'];
    $h1 = $_GET['h1'];
    $h2 = $_GET['h2'];
    $h3 = $_GET['h3'];
  }
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/jogo.css" />
    <script src="js/jogo.js" defer></script>
    <title>Sage TableTop - In game</title>
  </head>
  <body>
    <div class="box">
      <div class="areaJogo">
        <div id="player">
          <?php 
            echo "<img class='tokenPlayer' src='./assets/img/game/".$personagem.".png' width=40>";
          ?>
        </div>
        <div class="acoes">
          <div class="acoes-voltar">
            <a href="selecaoPersonagem.php">
              <img src="/Projeto/assets/img/game/seta-24.png" alt="" />
            </a>
          </div>
          <div class="acoes-chat" id="btnChat">
            <img src="assets/img/game/chat-24.png" alt="" />
          </div>
        </div>
        <div class="utilidades">
          <div class="img-perfil">
          <div class="modal-mapas oculto">
            <div class="mapa-fundo" onclick='trocaFundo("/Projeto/assets/img/game/navio.jpg")'>
              <img class="navio" src="assets/img/home/navio.png" alt="">
            </div>
            <div class="mapa-fundo" onclick='{trocaFundo("/Projeto/assets/img/game/Skellige.jpeg")}'>
              <img class="paisagem borda" src="assets/img/game/Skellige.jpeg" alt="">
            </div>
            <div class="mapa-fundo" onclick='{trocaFundo("/Projeto/assets/img/game/winter.svg")}'>
              <img class="jinn" src="assets/img/home/Jinn.png" alt="">
            </div>
            <div class="mapa-fundo" onclick='{trocaFundo("/Projeto/assets/img/game/fazenda.jpg")}'>
              <img class="fazenda borda" src="assets/img/game/fazenda.jpg" alt="">
            </div>
            <div class="mapa-fundo" onclick='{trocaFundo("/Projeto/assets/img/game/caverna.jpg")}'>
              <img class="caverna borda" src="assets/img/game/caverna.jpg" alt="">
            </div>
            <div class="mapa-fundo" onclick='{trocaFundo("/Projeto/assets/img/game/prison.jpg")}'>
              <img class="prison borda" src="assets/img/game/prison.jpg" alt="">
            </div>

            <div class="uploadImg">
              <label for="picture_input">
                <input type="file" accept="image/*" id="picture_input"></input>
                <span class="picture_image">Escolha a imagem</span>
              </label>
            </div>

          </div>

          <div class="ficha-player oculto">
              <div class="ficha">
                <p>Atributos</p>
                <div class="atributo">
                  Força: <input type="number" value="0" class="forca">
                </div>
                <div class="atributo">
                  Destreza: <input type="number" value="0" class="destreza">
                </div>
                <div class="atributo">
                  Constituição: <input type="number" value="0" class="constituicao">
                </div>
                <div class="atributo">
                  Inteligência: <input type="number" value="0" class="inteligencia">
                </div>
                <div class="atributo">
                  Sabedoria: <input type="number" value="0" class="sabedoria">
                </div>
                <div class="atributo">
                  Carisma: <input type="number" value="0" class="carisma">
                </div>
              </div>
          </div>

            <button id="trocaMapa" class="edit">MAPAS</button>

            <div class="vida">
              <input type="number" value="200">
              <span></span>
              <input type="number" value="200">
          </div>
            <button id="ficha">
              <?php
              echo "<img class='perfil' src='./assets/img/game/".$personagem.".png'>";
              ?>
            </button>
          </div>
          <div class="habilidades">
            <div class="magic">
              <a href="#" onclick="exibirHabilidade('h1')">
              <?php 
              if($h1 === 'def1'){
                echo "<img src='./assets/img/game/habilidades/".$h1.".png' width=40>";
              }else{

                echo "<img src='./assets/img/game/habilidades/".$personagem."/".$h1.".png' width=40>";
              }
                
              ?>
              </a>
            </div>
            <div class="magic">
              <a href="#" onclick="exibirHabilidade('h2')">
              <?php 
              if($h2 === 'def2'){
                echo "<img src='./assets/img/game/habilidades/".$h2.".png' width=40>";
              }else{
                echo "<img src='./assets/img/game/habilidades/".$personagem."/".$h2.".png' width=40>";
              }
              ?>
              </a>
            </div>
            <div class="magic">
              <a href="#" onclick="exibirHabilidade('h3')">
              <?php 
              if($h3 === 'def3'){
                echo "<img src='./assets/img/game/habilidades/".$h3.".png' width=40>";
              }else{
                echo "<img src='./assets/img/game/habilidades/".$personagem."/".$h3.".png' width=40>";
              }
              ?>
              </a>
            </div>
            <div class="magic"></div>
            <div class="magic"></div>
            <div class="magic"></div>
            <div class="magic"></div>
            <div class="magic"></div>
            <div class="magic"></div>
            <div class="magic"></div>
            <div class="magic"></div>
          </div>
        </div>
      </div>
      <div class="chat" id="chat">
        <div class="input">
          <div class="dado">
            <button id="btnDado" class="edit">
              <img src="assets/img/game/D20.png" alt="" />
            </button>
          </div>
          <input type="text" id="texto" autocomplete="off" />
          <button id="enviar"  class="edit">
            <img src="assets/img/game/enviar-24.png" alt="" />
          </button>
        </div>
        <div id="output">
          <div id="menuDados" class="oculto">
              <div class="dado">
                <button id="d20" class="edit"><img src="assets/img/game/dados/d20.png" alt=""></button>
                <span>D20</span>
              </div>
              <div class="dado">
                <button id="d12" class="edit"><img src="assets/img/game/dados/d12.png" alt=""></button>
                <span>D12</span>
              </div>
              <div class="dado">
                <button id="d8" class="edit"><img src="assets/img/game/dados/d8.png" alt=""></button>
                <span>D8</span>
              </div>
              <div class="dado">
                <button id="d6" class="edit"><img src="assets/img/game/dados/d6.png" alt=""></button>
                <span>D6</span>
              </div>
              <div class="dado">
                <button id="d4" class="edit"><img src="assets/img/game/dados/d4.png" alt=""></button>
                <span>D4</span>
              </div>
            </div>
        </div>
      </div>
    </div>
    
  </body>
</html>
