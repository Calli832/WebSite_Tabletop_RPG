<?php 
require 'db/conexao.php';

$nome = $_SESSION['nome'];

  if(isset($_POST['nomeToken']) && isset($_FILES['imagem'])){
    if(!empty($_POST['nomeToken']) && !empty($_FILES['imagem']['name'])){
      $nomeToken = $_POST['nomeToken'];
      $imagemToken = $_FILES['imagem']['name'];
      
      $dir = './assets/img/game/'; 
      move_uploaded_file($_FILES['imagem']['tmp_name'], $dir.$imagemToken);

      $sql = $pdo->prepare("INSERT INTO token_usuarios VALUES(null,?,?,?)");
      $sql->execute(array($nomeToken, $imagemToken, $nome));

      $_SESSION['gerado'] = true;

      header('location:selecaoPersonagem.php');

    }else{
      $erro_blank = 'Todos os campos são obrigatórios!';
    }
  }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/criarToken.css">
  <script src="js/criarToken.js" defer></script>
  <title>Crie seu Token</title>
</head>
<body class="container">

  <form method="POST" class="box" enctype="multipart/form-data">

    <p class="text">Crie seu Token</p>

    <?php 
    if(isset($erro_blank)){ ?>
        <div class="erro_blank msg">
          <?php echo $erro_blank ?>
        </div>
    <?php } ?>

    <div class="campo">
      <label for="nome">Digite o nome do token</label>
      <input type="text" name="nomeToken" id="nome">
    </div>
    <div class="campo">
      <label for="picture_input" class="label">
        <span class="picture_image">Escolha a imagem para o token</span> <br>
        <input type="file" accept="image/*" id="picture_input" name="imagem">
        <div class="preview"></div>
      </label>
    </div>
    
    <button type="submit">Enviar Token</button>
  </form>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <?php if(isset($erro_blank)){?>

    <script>
        setTimeout(() => {
            $('.msg').addClass('oculto');
        }, 3000);
    </script>
  <?php } ?>
</body>
</html>