<?php
session_start();
echo "Bem Vindo ".$_SESSION["usuario"];
    echo date(", d/m/Y");
    if(empty($_SESSION)){
        print "<script>location.href='index.php';</script>";
    }
include_once ("config/config.php");

if (isset($_GET['Id'])) {
    $id = $_GET['Id'];
    $sql = "SELECT * FROM Cad_Children WHERE id = '$id'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    

} else {
    echo "Nenhum ID encontrado";
}
$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Casdastro</title>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/style.css'>
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

<body>
    <script>

    </script>
 <div class="card">
    <div class="card-body">
      <br><br>
    <h1>Editar Cadastro</h1>
     <form action="config/updatebat.php?Id=<?php echo $row['Id']; ?>" method="POST">
        <div>
          <label for="nome-crianca">Nome da Criança:</label>
          <input type="text" id="nome-crianca" name="nome-crianca" value="<?= $row['Nome'] ?>" >
        </div>
        <div>
          <label for="pai">Pai:</label>
          <input type="text" id="pai" name="pai" value="<?php echo $row['Pai']; ?>">
          <label for="Telefonte">Telefonte:</label>
          <input type="tel" id="telefone" name="telefone" value="<?php echo $row['phonepai']; ?>">
        </div>
        <div>
          <label for="mae">Mãe:</label>
          <input type="text" id="mae" name="mae" value="<?php echo $row['Mae']; ?>">
          <label for="Telefone">Telefone:</label>
          <input type="tel" id="telefone2" name="telefone2" value="<?php echo $row['phonemae']; ?>">
        </div>
        <div>
          <label for="endereço">Endereço:</label>
          <input type="text" id="endereco" name="endereco" placeholder="Rua, Bairro, Cidade" value="<?php echo $row['addres']; ?>">
        </div>
        <div>
          <label for="data-nascimento">Data de Nascimento:</label>
          <input type="date" id="data-nascimento" name="data-nascimento" value="<?php echo $row['Nascimento']; ?>">
        </div>
        <div>
          <label for="cert-nascimento">Certidão Nasc.:</label>
          <input type="text" id="cert-nascimento" name="cert-nascimento" value="<?php echo $row['cert_nasc']; ?>">
        </div>
        <div>
          <label for="curso">Data do Curso de Preparação:</label>
          <input type="date" name="curso" id="curso" value="<?php echo $row['curso']?>">
        </div>
        <div>
          <label for="padrinho">Nome do Padrinho:</label>
          <input type="text" id="padrinho" name="padrinho" value="<?php echo $row['Padrinho']; ?>">
        </div>
        <div>
          <label for="madrinha">Nome da Madrinha:</label>
          <input type="text" id="madrinha" name="madrinha" value="<?php echo $row['Madrinha']; ?>">
        </div>
        <div>
          <label for="data-batismo">Data do Batismo:</label>
          <input type="date" id="data-batismo" name="data-batismo" value="<?php echo $row['Batizado']; ?>">
        </div>
        <div>
          <br>
          <button type="submit">Atualizar</button>
        </div>
        <br><br>
      </form>
    </div>
 </div>
    
</body>
</html>