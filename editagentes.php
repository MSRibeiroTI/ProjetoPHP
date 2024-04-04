<?php
session_start();
echo "Bem Vindo " . $_SESSION["usuario"];
echo date(", d/m/Y");
if (empty($_SESSION)) {
  print "<script>location.href='index.php';</script>";
} elseif (($_SESSION["nivel"]) != '3') {
  echo "<script>alert('Acesso Restrito!')</script>";
  print "<script>location.href='home.php';</script>";
}
include_once("config/config.php");

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM agentes WHERE id = '$id'";
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
 
<?php include "menu.php";  ?>

     <div class="card">
      <div class="card-body">
        <br><br>
        <h1>Atualização do Cadastro</h1>
        <form action="config/editagent.php?id= <?php echo $row['id']; ?>" method="post">
          <div>
            <label for="agente">Nome:</label>
            <input type="text" id="agente" name="agente" VALUE="<?= $row['name']; ?>" required>
          </div>
          <div>
            <label for="address">Endereço</label>
            <input type="text" id="address" name="address" value="<?= $row['address']; ?>">
          </div>
          <div>
            <label for="phone">Telefone:</label>
            <input type="text" id="phone" name="phone" value="<?= $row['phone']; ?>" required>
          </div><br><br>
          <button type="submit">Salvar</button>
          <br><br>

      </div>
      </form>
    </div>
    </div>
  </body>

</html>