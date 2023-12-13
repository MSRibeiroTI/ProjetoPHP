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
    <title>View</title>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/style3.css'>
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
 <div class="card">
    <div class="card-body">
      <br><br>
    <h1>Consultar Cadastro</h1>
    <form action="" method="post">
        <div class="a">
          <label for="nome-crianca">Nome da Criança:</label>
          <?= $row['Nome'] ?>
        <br><br>
          <label for="pai">Pai:</label>
          <?php echo $row['Pai']; ?><br>
         <br> <label for="Telefonte">Telefonte:</label>
          <?php echo $row['phonepai']; ?>
        <br><br>
          <label for="mae">Mãe:</label>
          <?php echo $row['Mae']; ?><br>
          <br><label for="Telefone">Telefone:</label>
          <?php echo $row['phonemae']; ?>
        <br><br>
          <label for="endereço">Endereço:</label>
          <?php echo $row['addres']; ?>
        <br><br>
          <label for="data-nascimento">Data de Nascimento:</label>
          <?php echo $row['Nascimento']; ?>
        <br><br>
          <label for="cert-nascimento">Certidão Nasc.:</label>
          <?php echo $row['cert_nasc']; ?>
        <br><br>
          <label for="curso">Data do Curso de Preparação:</label>
          <?php echo $row['curso']?>
        <br><br>
          <label for="padrinho">Nome do Padrinho:</label>
          <?php echo $row['Padrinho']; ?>
        <br><br>
        <label for="fez-curso">Já fez o curso preparatório?</label>
          <?php echo $row['']; ?>
        <br><br>
        <label for="fez-curso">Em outra paróquia?</label>
          <?php echo $row['']; ?>
        <br><br>
          <label for="madrinha">Nome da Madrinha:</label>
          <?php echo $row['Madrinha']; ?>
        <br><br>
        <label for="fez-curso">Já fez o curso preparatório?</label>
          <?php echo $row['']; ?>
        <br><br>
        <label for="fez-curso">Em outra paróquia?</label>
          <?php echo $row['']; ?>
        <br><br>
          <label for="data-batismo">Data do Batismo:</label>
         <?php echo $row['Batizado']; ?>
        </div>
        <div clas="btn">
          <br>
        <button type="submit" formaction="editabat.php?Id=<?php echo $row['Id']; ?>"><span title="Editar">Editar</span></button>
        <button type="submit" formaction="batizadolist.php"><span title="Voltar">Voltar</span></button>
        </div>
      </form>
    <br><br>    
</div>
 
</body>

</html>