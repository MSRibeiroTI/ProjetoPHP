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
    <link rel='stylesheet' type='text/css' media='screen' href='style.css'>
    <script src='main.js'></script>
</head>
<div class="nav-container">
    <ul class="menu" id="menu">
        <li><a href="home.php">Home</a></li>
            <li><a href="AgentList.php">Agentes</a></li>
            <li><a href="batizadolist.php">Batizados</a></li>
            <li><a href="calendario.php">Calendário</a></li>
            <li><a href="#">Menu</a></li>
            <li><a href="user.php">Usuários</a></li>    
            <li><a href="logout.php">Sair</a></li>
    </ul>
</div>

<body>
    <script>

    </script>
 <div class="card">
    <div class="card-body">
    <h1>Editar Cadastro</h1>
     <form action="config/updatebat.php?Id=<?php echo $row['Id']; ?>" method="POST">
        <div>
          <label for="nome-crianca">Nome da Criança:</label>
          <input type="text" id="nome-crianca" name="nome-crianca" value="<?= $row['Nome'] ?>" >
        </div>
        <div>
          <label for="pai">Pai:</label>
          <input type="text" id="pai" name="pai" value="<?php echo $row['Pai']; ?>">
        </div>
        <div>
          <label for="mae">Mãe:</label>
          <input type="text" id="mae" name="mae" value="<?php echo $row['Mae']; ?>">
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
          <button type="submit">Atualizar</button>
        </div>
      </form>
    </div>
 </div>
    
</body>
</html>