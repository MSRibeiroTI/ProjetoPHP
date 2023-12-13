<?php
    session_start();
    echo "Bem Vindo ".$_SESSION["usuario"];
    echo date(", d/m/Y");
    if(empty($_SESSION)){
        print "<script>location.href='index.php';</script>";
    }
       
    
                         

?>

<!DOCTYPE html>
<html>
<head>
   </head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Casdastro</title>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/style.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='js/pastoral.js'></script>
 </head>
<body>
<div class="topnav" id="myTopnav">
    
    <a href="home.php" class="active">Home</a>
              <a href="AgentList.php">Agentes</a>
              <a href="batizadolist.php">Batizados</a>
              <a href="calendario.php">Calendário</a>
              <a href="curso.php">Curso</a>
              <a href="user.php">Usuários</a>  
              <a href="config/logout.php">Sair</a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <i class="fa fa-bars"></i>
    </a>
  
  </div>


 <div class="card">
    <div class="card-body">
      <br><br>
    <h1>Cadastro para Batismo</h1>
    <form action="config/addbat.php" method="POST">
    <div>
          <label for="nome-crianca">Nome da Criança:</label>
          <input type="text" id="nome-crianca" name="nome-crianca" placeholder="Nome completo do batizando" required>
        </div>
        <div>
          <label for="pai">Pai:</label>
          <input type="text" id="pai" name="pai" required>
          <label for="Telefonte">Telefonte:</label>
          <input type="tel" id="telefone" name="telefone" required>
        </div>
        <div>
          <label for="mae">Mãe:</label>
          <input type="text" id="mae" name="mae" required>
          <label for="Telefone">Telefone:</label>
          <input type="tel" id="telefone2" name="telefone2" required>
        </div>
        <div>
          <label for="endereço">Endereço *:</label>
          <input type="text" id="endereco" name="endereco" placeholder="Rua, Bairro, Cidade" required>
          <h4>*Se faz parte de outra paróquia, deve apresentar autorização do pároco e anexar à documentação.</h4>
        </div>
        <div>
          <label for="data-nascimento">Data de Nascimento:</label>
          <input type="date" id="data-nascimento" name="data-nascimento" required>
        </div>
        <div>
          <label for="cert-nascimento">Certidão Nasc.:</label>
          <input type="text" id="cert-nascimento" name="cert-nascimento" placeholder="Número, folha, livro" required>
        </div><br>
    <div class="padmad">
        <div>
          <label for="curso">Data do Curso de Preparação:</label>
          <input type="date" name="curso" id="curso" required>
        </div>
        <div>
          <label for="padrinho">Nome do Padrinho:</label>
          <input type="text" id="padrinho" name="padrinho" required><br>
          <h4>Já fez o curso preparatório?<h4>
          <select name="preparacao" id="preparacao">
            <option value="nao">Não</option>
            <option value="sim">Sim</option>
            </select>
           <h4>Em outra paróquia?</h4> 
            <select name="paroquia" id="paroquia">
              <option value="nao">Não, ainda não fez</option>
              <option value="não2">Não, fez aqui</option>
              <option value="sim">Sim, fez em outa paróquia</option>
            </select>
                  </div>
        <br>
        <div>
          <label for="madrinha">Nome da Madrinha:</label>
          <input type="text" id="madrinha" name="madrinha" required><br>
          <h4>Já fez o curso preparatório?<h4>
          <select name="preparacao" id="preparacao">
            <option value="nao">Não</option>
            <option value="sim">Sim</option>
            </select>
            <h4>Em outra paróquia?</h4>
            <select name="paroquia" id="paroquia">
              <option value="nao">Não, ainda não fez</option>
              <option value="não2">Não, fez aqui</option>
              <option value="sim">Sim, fez em outa paróquia</option>
            </select>
            <h4>Caso tenham feito em outra paróquia, devem apresentar certificado do curso dentro do prazo de validade.</h4>
        </div>
        <br>
        <div>
          <label for="data-batismo">Data do Batismo:</label>
          <input type="date" id="data-batismo" name="data-batismo" required>
        </div>
    </div>
        <div>
          <br>
          <button type="submit">Salvar</button>
        </div>
        <br><br>
      </form>
    </div>
 </div>
    
</body>
</html>