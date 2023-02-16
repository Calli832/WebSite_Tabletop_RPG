<?php 

require './db/conexao.php';

  if(!isset($_SESSION['TOKEN'])){
    header('location:/projeto/login.php');
  }


  //ALTERAR NICKNAME
  if(isset($_POST['nicknameAtual']) && isset($_POST['novoNickname'])){
      if(!empty($_POST['nicknameAtual']) && !empty($_POST['novoNickname'])){
         $nickAtual = $_POST['nicknameAtual'];
         $novoNick = $_POST['novoNickname'];

         $sql = $pdo->prepare("SELECT * FROM usuarios WHERE nickname='$nickAtual'");
         $sql->execute();

         if($sql->rowCount() > 0){

            if($nickAtual == $_SESSION['nome']){
               if($nickAtual != $novoNick){
                  $sql = $pdo->prepare("UPDATE usuarios SET nickname='$novoNick' WHERE nickname='$nickAtual'");
                  $sql->execute();
   
                  $nickAlterado = 'Nickname alterado com sucesso!';   
                  
                  $_SESSION['nome'] = $novoNick;
               }else{
                  $nickIgual = 'Os nicknames são iguais!';
               }
            }else{
               $nickErrado = 'Digite o seu nickname atual!';
            }

         }else{
            $nickNaoEncontrado = 'Nickname não encontrado!';
         }

      }else{
         $erro_blank = 'Todos os campos são obrigatórios!';
      }
  }

  //ALTERAR E-MAIL
  if(isset($_POST['emailAtual']) && isset($_POST['novoEmail'])){
      if(!empty($_POST['emailAtual']) && !empty($_POST['novoEmail'])){
         $emailAtual = $_POST['emailAtual'];
         $novoEmail = $_POST['novoEmail'];

         $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email='$emailAtual'");
         $sql->execute();

         $erro = 'nao';

         if (!filter_var($novoEmail, FILTER_VALIDATE_EMAIL)) {
            $erro_email = "Novo e-mail com formato inválido!";
            $erro = 'sim';
         }

         if($sql->rowCount() > 0) {
            if($emailAtual != $novoEmail && $erro === 'nao'){
               $sql = $pdo->prepare("UPDATE usuarios SET email='$novoEmail' WHERE email='$emailAtual'");
               $sql->execute();

               $emailAlterado = 'E-mail alterado com sucesso!';   
               
            }else{
               $emailIgual = 'Os e-mails são iguais!';
            }
         }else{
            $emailNaoEncontrado = 'E-mail não encontrado!';
         }

      }else{
         $erro_blank = 'Todos os campos são obrigatórios!';
      }
   }

   //ALTERAR SENHA   
   if(isset($_POST['senha']) && isset($_POST['novaSenha']) && isset($_POST['emailSenha'])){

      if(!empty($_POST['senha']) && !empty($_POST['novaSenha']) && !empty($_POST['emailSenha'])){
         $senhaAtual = $_POST['senha'];
         $novaSenha = $_POST['novaSenha'];
         $emailSenha = $_POST['emailSenha'];
   
   
         $sql = "SELECT senha FROM usuarios WHERE email='$emailSenha'";
         
         $stmt = $pdo->prepare($sql);
         
         $stmt->execute();
   
         $result = $stmt->fetchAll();
   
         $erro = 'nao';
   
         if(strlen($novaSenha) < 6){
            $erro_senha = "Senha com no mínimo 6 caracteres!";
            $erro = 'sim';
        }
   
         if(count($result) > 0){

            if($senhaAtual != $novaSenha && $erro === 'nao'){
   
               $novaSenhaCript = md5($novaSenha);
   
               $sql = "UPDATE usuarios SET senha='$novaSenhaCript' WHERE email='$emailSenha'";
   
               $stmt = $pdo->prepare($sql);
         
               $stmt->execute();
   
               $senhaAlterada = "Senha alterada com sucesso!";
            }
   
            if($senhaAtual === $novaSenha && $erro === 'nao'){
               $senhaIgual = "As senhas são iguais!";
            }
         }else{
            $emailNaoEncontrado = 'E-mail não encontrado!';
         }

      }else{
         $erro_blank = 'Todos os campos são obrigatórios!';
      }

   }
?>

<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="stylesheet" href="css/perfil.css" />
      <script src="js/perfil.js" defer></script>
      <title>Sage TableTop | Perfil de Jogador</title>
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
      <div class="conteudo-cabecalho">
         <div class="img-top">
            <img src="assets/img/home/MAPA MUNDI CAPA.png" alt="" />
            <div class="img-top-perfil">
               <?php echo $_SESSION['nome'] ?>
            </div>
         </div>

         <!-- NICKNAME -->
         <?php if(isset($nickAlterado)){?>
              <div class="alterado time"><?php echo $nickAlterado; ?></div>
         <?php } ?>

         <?php if(isset($nickIgual)){?>
              <div class="igual time"><?php echo $nickIgual; ?></div>
         <?php } ?>

         <?php if(isset($nickNaoEncontrado)){?>
              <div class="naoEncontrado time"><?php echo $nickNaoEncontrado; ?></div>
         <?php } ?>

         <!-- EMAIL  -->
         <?php if(isset($emailAlterado)){?>
              <div class="alterado time"><?php echo $emailAlterado; ?></div>
         <?php } ?>

         <?php if(isset($emailIgual)){?>
              <div class="igual time"><?php echo $emailIgual; ?></div>
         <?php } ?>

         <?php if(isset($emailNaoEncontrado)){?>
              <div class="naoEncontrado time"><?php echo $emailNaoEncontrado; ?></div>
         <?php } ?>

         <?php if(isset($erro_email)){?>
              <div class="erro time"><?php echo $erro_email; ?></div>
         <?php } ?>

         <!-- SENHA -->
         <?php if(isset($senhaAlterada)){?>
              <div class="alterado time"><?php echo $senhaAlterada; ?></div>
         <?php } ?>

         <?php if(isset($senhaIgual)){?>
              <div class="igual time"><?php echo $senhaIgual; ?></div>
         <?php } ?>

         <?php if(isset($senhaNaoEncontrada)){?>
              <div class="naoEncontrado time"><?php echo $senhaNaoEncontrada; ?></div>
         <?php } ?>

         <?php if(isset($erro_senha)){?>
              <div class="erro time"><?php echo $erro_senha; ?></div>
         <?php } ?>

         <?php if(isset($erro_blank)){?>
              <div class="erro time"><?php echo $erro_blank; ?></div>
         <?php } ?>

         <?php if(isset($nickErrado)){?>
              <div class="erro time"><?php echo $nickErrado; ?></div>
         <?php } ?>

         <div class="container">
            <div class="conta">
               <div class="conta-titulo">
                  <p>Editar Conta</p>
               </div>
               <div class="conta-opcao">
                  <button onclick="{escolha('nickname')}">Mudar Nickname</button>
               </div>
               <div class="conta-opcao">
                  <button onclick="{escolha('email')}">Mudar E-mail</button>
               </div>
               <div class="conta-opcao">
                  <button onclick="{escolha('senha')}">Mudar Senha</button>
               </div>
            </div>

            <div class="forms">
              <div class="form-nickname oculto">
                <form method="POST">

                  <label for="nickname-atual">Nickname Atual</label>
                  <input type="text" name="nicknameAtual" id="nickname-atual" autocomplete="off">

                  <label for="novo-nickname">Novo Nickname</label>
                  <input type="text" name="novoNickname" id="novo-nickname" autocomplete="off">

                  <button type="submit">Atualizar Nickname</button>
                </form>
              </div>
              <div class="form-email oculto">
               <form method="POST">
                  <label for="email-atual">E-mail Atual</label>
                  <input type="text" name="emailAtual" id="email-atual" autocomplete="off">

                  <label for="novo-email">Novo E-mail</label>
                  <input type="text" name="novoEmail" id="novo-email" autocomplete="off">

                  <button type="submit">Atualizar E-mail</button>
               </form>
               </div>
              <div class="form-senha oculto">
              <form method="POST">
                  <label for="email">E-mail Atual</label>
                  <input type="text" name="emailSenha" id="email" autocomplete="off">
                  
                  <label for="senha-atual">Senha Atual</label>
                  <input type="text" name="senha" id="senha-atual" autocomplete="off">

                  <label for="novo-senha">Nova Senha</label>
                  <input type="text" name="novaSenha" id="novo-senha" autocomplete="off">

                  <button type="submit">Atualizar Senha</button>
               </form>
              </div>
            </div>

            <div class="sair">
               <button><a href="logout.php">Logout</a></button>
            </div>
         </div>
      </div>
  </body>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
              
   <?php if (isset($nickIgual) || isset($nickAlterado) || isset($nickNaoEncontrado) || isset($emailIgual) || isset($emailAlterado) || isset($emailNaoEncontrado) || isset($erro_email) || isset($senhaIgual) || isset($senhaAlterada) || isset($senhaNaoEncontrada) || isset($erro_senha) || isset($erro_blank) || isset($nickErrado)) { ?>
      <script>
            setTimeout(() => {
               $('.time').addClass('oculto');
            }, 4000);
      </script>
   <?php } ?>
</html>