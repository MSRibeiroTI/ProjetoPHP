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
    <div class="card-body"><br><br>
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
          <label for="Nível de acesso"> Nível de Acesso ao Sistema:</label>
          <select  id="nivel_acesso" name="nivel_acesso">
            <option value="1">Usuario</option>
            <option value="2">Agente</option>
            <option value="3">Administrador</option>
            </select>
            </div><br><br>
              <button type="submit">Salvar</button>
                       <br><br>
            </div>
        </form>
       
    </div>
 </div>
 </body>
</html>