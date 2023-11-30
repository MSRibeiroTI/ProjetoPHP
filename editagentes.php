<?php
    session_start();
    echo "Bem Vindo ".$_SESSION["usuario"];
    echo date(", d/m/Y");
       if(empty($_SESSION)){
        print "<script>location.href='index.php';</script>";
    } elseif(($_SESSION["nivel"]) !='3'){
      echo "<script>alert('Acesso Restrito!')</script>";
      print "<script>location.href='home.php';</script>";
         }
         include_once ("config/config.php");

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
    <script src='js/pastoral.js'></script>
</head>
<div class="nav-container">
    <ul class="menu" id="menu">
            <li><a href="home.php">Home</a></li>
            <li><a href="AgentList.php">Agentes</a></li>
            <li><a href="batizadolist.php">Batizados</a></li>
            <li><a href="calendario.php">Calendário</a></li>
            <li><a href="#">Menu</a></li>
            <li><a href="user.php">Usuários</a></li>    
            <li><a href="config/logout.php">Sair</a></li>
    </ul>
</div>

<body>
 <div class="card">
    <div class="card-body">
    <h1>Cadastro dos Agesntes da Pastoral</h1>
    <form action="config/editagent.php?id= <?php echo $row['id']; ?>" method="post" >
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
          <input type="text" id="phone" name="phone" value="<?= $row['phone']; ?>"required>
        </div>
            <button type="submit">Salvar</button>
                       
            </div>
        </form>
      </div>
 </div>
 </body>
</html>