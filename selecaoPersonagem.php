<?php

require 'db/conexao.php';

  if(!isset($_SESSION['TOKEN'])){
    header('location:/projeto/login.php');
  }

  $nome = $_SESSION['nome'];

  $sql = $pdo->prepare("SELECT nome_token FROM token_usuarios WHERE usuario_nome='$nome'");
  $sql->execute();
  $nomeToken = $sql->fetch();

  $sql= $pdo->prepare("SELECT imagem FROM token_usuarios WHERE usuario_nome='$nome'");
  $sql->execute();
  $img = $sql->fetch();

  $teste = 1;

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/selecaoPersonagem.css" />
    <script src="./js/personagem.js" defer></script>
    <title>Selecione seu personagem</title>
  </head>
  <body>
    <div class="menu">
      <div class="img">
        <img src="assets/img/home/Witcher Icon B.png" alt="" />
      </div>
      <div class="img-home">
        <a href="index.php">
          <img src="assets/img/home/Casa Icon.png" alt="" />
        </a>
      </div>
      <div class="img">
        <a href="perfil.php">
          <img src="assets/img/home/Milo Icon Barra.png" alt="" />
        </a>
      </div>
    </div>

    <div class="conteudo">
      <div class="box">
        <div class="personagem">
          <div class="gif" onclick="salvarPersonagem('Radulfr')">
            <a href="jogo.php?personagem=Radulfr&h1=hab1&h2=hab2&h3=hab3" >
              <img src="assets/img/gif/Radulfr.gif" alt="" />
            </a>
          </div>
          <p class="title">Rádúlfr</p>
          <p>
            Um bruxo da escola do griffo. Possui duas espadas e um conjunto de
            inais que o possibita uma grande versatilidade, além de ser bem
            resistente.
          </p>
        </div>
        <div class="personagem">
          <div class="gif" onclick="salvarPersonagem('Thuridan')">
            <a href="jogo.php?personagem=Thuridan&h1=hab1&h2=hab2&h3=hab3">
              <img src="assets/img/gif/Thuridan.gif" alt="" />
            </a>
          </div>
          <p class="title">Thuridan</p>
          <p>
            Um elfo aen elle, que possui grande dominio das artes mágicas. Não
            possui tanta resistência, porém compensa seu enorme dano.
          </p>
        </div>
        <div class="personagem">
          <div class="gif" onclick="salvarPersonagem('Estel')">
            <a href="jogo.php?personagem=Estel&h1=hab1&h2=hab2&h3=hab3">
              <img src="assets/img/gif/Estel.gif" alt="" />
            </a>
          </div>
          <p class="title">Estel</p>
          <p>
            Uma elfa aen seidhe, extremamente habilidosa como ladina, mas também
            é uma exímio arqueira, além de sua alta furtividade, porém peca um
            poco na resistência.
          </p>
        </div>
        <div class="personagem">
          <div class="gif" onclick="salvarPersonagem('Spec')">
            <a href="jogo.php?personagem=Spec&h1=hab1&h2=hab2&h3=hab3">
              <img src="assets/img/gif/Spec.gif" alt="" />
            </a>
          </div>
          <p class="title">Spec</p>
          <p>
            Humano, com um enorme potêncial, sendo extremamente furtivo, além de
            possuir um poder mágico oculto dentro de si, acima de tudo, muito
            carismática e inteligente.
          </p>
        </div>
        <div class="personagem">
          <div class="gif" onclick="salvarPersonagem('Azok')">
            <a href="jogo.php?personagem=Azok&h1=hab1&h2=hab2&h3=hab3">
              <img src="assets/img/gif/Azok.gif" alt="" />
            </a>
          </div>
          <p class="title">Azok</p>
          <p>
            Anão com temperamento forte, porta uma machado mágico que lhe
            permite grande causar grandes quantidades de dano além de ser o com
            maior resistência. Infelizmente decepciona na falta de inteligência.
          </p>
        </div>
        <div class="personagem">
          <div class="gif" onclick="salvarPersonagem('Allana')">
            <a href="jogo.php?personagem=Allana&h1=hab1&h2=hab2&h3=hab3">
              <img src="assets/img/gif/Allana.gif" alt="" />
            </a>
          </div>
          <p class="title">Allana</p>
          <p>
            Uma anã sacerdotisa, não porta grande dano, porém é uma excelente
            suporte junto de seu cajado, ou vara, como gosta de chama-lo, com
            grande quantidade de cura e versatilidade em ajudar seus
            companheiros.
          </p>
        </div>
        <?php if(isset($_SESSION['gerado'])){?>

        <div class="personagem">
         <?php echo "<div class='gif' onclick='salvarPersonagem(`${nomeToken[0]}`)'>"?>
            <?php echo '<a href="jogo.php?personagem='.$nomeToken[0].'&h1=def1&h2=def2&h3=def3">' ?>
              <?php echo "<img class='criado' src='assets/img/game/{$img[0]}'/>." ?>
            </a>
          </div>
          <p class="title"><?php echo $nomeToken[0]?></p>
        </div>
      </div>
      <?php } ?>
    </div>
    <?php if(!isset($_SESSION['gerado'])) {?>
        <a class="criarToken" href="criarToken.php">Criar seu Token</a>
      <?php }?>
  </body>
</html>
