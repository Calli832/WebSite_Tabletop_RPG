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
    <link rel="stylesheet" href="css/index.css" />
    <title>Sage Tabletop</title>
  </head>
  <body>
    <div class="menu">
      <div class="img">
        <img src="assets/img/home/Witcher Icon B.png" alt="" />
      </div>
      <div class="img-home">
        <img src="assets/img/home/Casa Icon.png" alt="" />
      </div>
      <div class="img">
        <a href="perfil.php"><img src="assets/img/home/Milo Icon Barra.png" alt="" /></a>
      </div>
    </div>
    <div class="conteudo">
      <div class="img-top">
        <img src="assets/img/home/MAPA MUNDI CAPA.png" alt="" />
        <div class="img-top-perfil">
       <?php echo $_SESSION['nome'] ?>
        </div>
      </div>

      <div class="conteudo-home">
        <div class="mapas">
          <p>Mapas:</p>
          <div class="mapas-img">
            <img src="assets/img/home/MAPA MUNDI 1.png" alt="" />
            <div>Mapa de Skellig</div>
          </div>
          <div class="mapas-img">
            <img src="assets/img/home/Paisagem.png" alt="" />
            <div>Floresta dos Grifos</div>
          </div>
          <div class="mapas-img">
            <img src="assets/img/home/Navio.png" alt="" />
            <div>Navio do Leif</div>
          </div>
          <div class="mapas-img">
            <img src="assets/img/home/Griffos 1 1.png" alt="" />
            <div>Curral do Ariminho</div>
          </div>
          <div class="mapas-img">
            <img src="assets/img/home/Jinn.png" alt="" />
            <div>Dimensão do Jinn</div>
          </div>
          <div class="mapas-img">
            <img src="assets/img/home/DESERT MURO 4X 1.png" alt="" />
            <div>Deserto</div>
          </div>
        </div>

        <div class="adicional">
          <div class="sessoes">
            <p>Últimas Sessões:</p>

            <div class="sessoes-img">
              <img src="assets/img/home/the-witcher 1.png" alt="" />
            </div>
            <div class="sessoes-img">
              <img src="assets/img/home/Final Fantasy 1.png" alt="" />
            </div>
            <div class="sessoes-img">
              <img src="assets/img/home/DS 1.png " alt="" />
            </div>

            <div class="criar-rpg">
              <a href="criarRPG.php">Crie seu RPG!</a>
            </div>
          </div>
          <div class="redes">
            <p>Redes Sociais:</p>
            <div class="redes-discord">
              <img src="assets/img/home/logo-discord.svg" alt="" />
              <a href="https://discord.gg/jNCr4Rtpqx" target="_blank"
                >discord.gg/SageVTT</a
              >
            </div>

            <div class="redes-twitch">
              <img src="assets/img/home/logo-twitch.svg" alt="" />
              <a href="https://www.twitch.tv/jcalliel" target="_blank"
                >twitch.tv/SageVTT</a
              >
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
