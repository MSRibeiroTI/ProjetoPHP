<?php
    session_start();
    echo "Bem Vindo ".$_SESSION["usuario"];
    echo date(", d/m/Y");
    if(empty($_SESSION)){
        print "<script>location.href='index.php';</script>";
    }
    include_once('config/config.php');
    
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Pastoral do Batismo</title>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/style2.css'>
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

<div class="cadastro">
         </div>
        <h2>Cadastro para Curso de Batismo</h2>
        <h3>(Batizado será em outra paróquia)</h3>
        <form action="" method="POST">
        <div class="busca">
          <div>
                <label class="control-label">Pesquisar por nome:</label>
                <input type="text" name="busca1" placeholder="Search">
                </div>
          <div>
                <label class="control-label">Pesquisar por data do curso:</label>
                <input type="date" name="data">
            </div>
            <button type="submit" value="a" name="listar">Listar todos</button>
            <button type="submit" formaction="cadastrocurso.php">Cadastrar</button>
            <button type="submit">Pesquisar</button>
           
        </form>
        </div>
        <?php
        $busca = $_POST['busca1'];
        $data = $_POST['data'];
        $todos = $_POST['listar'];
        if($todos != ""){
            $sql = "SELECT * FROM cad_curso";
            $res = mysqli_query($conn, $sql);
            $registros = mysqli_num_rows($res);
        }elseif ($data != "") {
            $sql2 = "SELECT * FROM cad_curso WHERE datacurso = '$data'";
            $res = mysqli_query($conn, $sql2);
            $registros = mysqli_num_rows($res);
        }elseif($busca != ""){
            $sql1 = "SELECT * FROM cad_curso WHERE name LIKE '%$busca%'";
            $res = mysqli_query($conn, $sql1);
            $registros = mysqli_num_rows($res);
        }
       
          
        ?>
       
        
    <div class="tabela">
        <table>
        <tr>
            <th>Nome</th>
            <th>Endereço</th>
            <th>Telefone</th>
            <th>Data do Curso</th>
            <th>Editar</th>
            <th>Certificados</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($res)): ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['addres']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['datacurso']; ?></td>
                <td><a href="editcurso.php?Id=<?php echo $row['Id']; ?>"><span title="Editar"><img src="img/edit.png"></span></a></td>
                <td><a  href="certcursopdf.php?Id=<?php echo $row['Id']; ?>">(Curso)</a></td>
            </tr>
        <?php endwhile; ?>
    </table>
            <br>
           <td>Número de Registros: <?php echo "$registros"; ?></td>
           
    </div>
<br>
    
<?php
    mysqli_close($conn);
?>

</body>
