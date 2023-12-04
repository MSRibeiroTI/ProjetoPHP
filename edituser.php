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
             $sql = "SELECT * FROM usuario WHERE id = '$id'";
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
    <h1>Atualização do Usuário do Sistema</h1>
    <form action="config/edittuser.php?id=<?php echo $row['id']; ?>" method="post" >
        <div>
          <label for="nome-agente">Nome do Agente:</label>
          <input type="text" id="nome-agente" name="nome-agente" value="<?php echo $row['nome_comp'];?>" required>
        </div>
        <div>
          <label for="login">Nome para Login:</label>
          <input type="text" id="login" value="<?=$row['nome']; ?>" name="login">
           </div>
          <div>
          <label for="senha">Senha:</label>
          <input type="password" id="senha" name="senha" required>
        </div>
        <div>
          <label for="confirmar-senha">Confirme a Senha:</label>
          <input type="password" id="confirmar-senha" name="confirmar-senha" required>
          </div>
          <div>
          <label for="Nível de acesso"> Nível de Acesso ao Sistema:</label>
          <select  id="nivel_acesso" name="nivel_acesso">
            <option value="1">Usuario</option>
            <option value="2">Agente</option>
            <option value="3">Administrador</option>
            </select>
            </div>
              <button type="submit">Salvar</button>
                       
            </div>
        </form>
       
    </div>
 </div>
 </body>
</html>