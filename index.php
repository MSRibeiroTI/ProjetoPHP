<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página de Login</title>
  <link rel='stylesheet' type='text/css' media='screen' href='login.css'>
    <script src='pastoral.js'></script>
    <style media="screen">
        </style>
    <title>Pastoral do Batismo</title>
</head>
<body>
<div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="login.php" method="post">
        <h2>Pastoral do Batismo</h2>
        <h4>Paróquia Nossa Senhora do Livramento</h4>
        <h4>Arcoverde - PE</h4>

        <label for="nome">Nome de Usuário</label>
        <input type="text" placeholder="Nome" name="usuario" id="nome" required>
 
        <label for="senha">Senha</label>
        <input type="password" placeholder="Senha" name="senha" id="senha" required>

        <button type="submit">Entrar</button>
        
        <div class="social">    
          <div class="in"><li><i class="fab fa-google" ></i><a href="https://www.instagram.com/paroquiadolivramento/?utm_source=ig_web_button_share_sheet&igshid=OGQ5ZDc2ODk2ZA=="></i>  Instagram </div></a></li>
          
          <div class="fb"><li><i class="fab fa-facebook"></i><a href="https://www.facebook.com/pnslivramento"></i>  Facebook</div></a></li>
          
        </div>
  </form>
</body>
</html>