<?php 

    require './db/conexao.php';

     if(isset($_POST['nome_usuario']) && isset($_POST['email']) && isset($_POST['senha'])){
        //VERIFICAR SE TODOS CAMPOS FORAM PREENCHIDOS
        if(empty($_POST['nome_usuario']) or empty($_POST['email']) or empty($_POST['senha'])){
            $erro_geral = "Todos os campos são obrigatórios";
        }else{
            //RECEBER VALORES E LIMPAR
            $nome = limparPost($_POST['nome_usuario']);
            $email = limparPost($_POST['email']);
            $senha = limparPost($_POST['senha']);
            $senha_cript = md5($senha);

            //VERIFICAR NOME 
            if (!preg_match("/^[a-zA-Z-' ]*$/",$nome)) {
                $erro_nome = "Aceitamos apenas letras e espaços em branco!";
            }

            //VERIFICAR SE EMAIL É VÁLIDO
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $erro_email = "Formato de e-mail inválido!";
            }

            //VERIFICAR SE SENHA TEM MAIS DE 6 DIGITOS
            if(strlen($senha) < 6){
                $erro_senha = "Senha com no mínimo 6 caracteres!";
            }

            if(!isset($erro_geral) && !isset($erro_nome) && !isset($erro_email) && !isset($erro_senha)){
                //VERIFICAR SE O NICKNAME E EMAIL JÁ ESTÁ CADASTRADO NO BANCO
                $sql = $pdo->prepare("SELECT * FROM usuarios WHERE nickname=? OR email=? LIMIT 1");
                $sql->execute(array($nome, $email));

                //SE NAO EXISTIR O USUARIO ADICIONAR NO BANCO
                if(!$sql->rowCount() > 0){
                    $token= "";
                    $data_cadastro = date('d/m/Y');
                    $sql = $pdo->prepare("INSERT INTO usuarios VALUES(null,?,?,?,?,?)");
                    if($sql->execute(array($nome, $email, $senha_cript, $token, $data_cadastro))){
                        header('location:login.php?result=ok');
                    }

                }else{
                    //SE JÁ EXISTIR O USUÁRIO APRESENTAR ERRO
                    $erro_geral = "Usuário já cadastrado!";
                }
            }
        }

    } 
    
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/cadastro.css" />
    <title>Sage Tabletop</title>
  </head>
  <body>
    <main>
      <div class="logo">Sage Tabletop</div>
      <div class="container">
        <div class="div-1">
          <div><a href="cadastro.php">Cadastro</a></div>
          <div><a href="login.php">Login</a></div>
        </div>
        <div class="div-2">
          <form method="POST">

          <?php if(isset($erro_geral)){?>
              <div class="erro-geral">
              <?php  echo $erro_geral; ?>
              </div>
          <?php } ?>

                  <label>Nickname</label>
                  <input autocomplete="off" type="text" name="nome_usuario" <?php if(isset ($erro_geral) or isset($erro_nome)){echo 'class="erro-input"';}?> <?php if(isset($_POST['nome_usuario'])){echo "value=".$_POST['nome_usuario']."";}?>>
                  <?php if(isset($erro_nome)){?>
                            <div class="erro"><?php echo $erro_nome; ?></div>
                    <?php } ?>

                  <label>E-mail</label>
                    <input autocomplete="off" type="email" name="email" <?php if(isset ($erro_geral) or isset($erro_email)){echo 'class="erro-input"';}?> <?php if(isset($_POST['email'])){echo "value=".$_POST['email']."";}?>>
                    <?php if(isset($erro_email)){?>
                            <div class="erro"><?php echo $erro_email; ?></div>
                    <?php } ?>

                  <label>Senha</label>
                  <input  type="password" name="senha" <?php if(isset ($erro_geral) or isset($erro_senha)){echo 'class="erro-input"';}?> <?php if(isset($_POST['senha'])){echo "value=".$_POST['senha']."";}?>>
                  <?php if(isset($erro_senha)){?>
                            <div class="erro"><?php echo $erro_senha; ?></div>
                    <?php } ?>

              <button type="submit">Avançar</button>
          </form>
        </div>
      </div>
    </main>
            
  </body>
</html>
