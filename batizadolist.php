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
    <script src='pastoral.js'></script>
    
 </head>
<body>
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

<div class="cadastro">
         </div>
        <h2>Lista de Batizados</h2>
        <form action="" method="POST">
        <div class="busca">
          <div>
                <label class="control-label">Pesquisar por nome da criança</label>
                <input type="text" name="busca1" placeholder="Search">
                </div>
          <div>
                <label class="control-label">Pesquisar por data do batismo</label>
                <input type="date" name="data">
            </div>
            <button type="submit" value="a" name="listar">Listar todos</button>
            <button type="submit" formaction="cadastro.php">Cadastrar</button>
            <button type="submit">Pesquisar</button>
           
        </form>
        </div>
        <?php
        $busca = $_POST['busca1'];
        $data = $_POST['data'];
        $todos = $_POST['listar'];
        if($todos != ""){
            $sql = "SELECT * FROM Cad_Children";
            $res = mysqli_query($conn, $sql);
            $registros = mysqli_num_rows($res);
        }elseif ($data != "") {
            $sql2 = "SELECT * FROM Cad_Children WHERE Batizado = '$data'";
            $res = mysqli_query($conn, $sql2);
            $registros = mysqli_num_rows($res);
        }elseif($busca != ""){
            $sql1 = "SELECT * FROM Cad_Children WHERE Nome LIKE '%$busca%'";
            $res = mysqli_query($conn, $sql1);
            $registros = mysqli_num_rows($res);
        }
       
          
        ?>
       
        
    <div class="tabela">
        <table>
        <tr>
            <th>Criança</th>
            <th>Nascimento</th>
            <th>Cert. Nasc.</th>
            <th>Data do Curso</th>
            <th>Data de Batismo</th>
            <th>Cadastro</th>
            <th>Certificados</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($res)): ?>
            <tr>
                <td><?php echo $row['Nome']; ?></td>
                <td><?php echo $row['Nascimento']; ?></td>
                <td><?php echo $row['cert_nasc']; ?></td>
                <td><?php echo $row['curso']; ?></td>
                <td><?php echo $row['Batizado']; ?></td>
                <td>
                    <a href="visualizarDados.php?Id=<?php echo $row['Id']?>"><span title="Visualizar"><img src="img/view.png"></span></a>
                    <a href="editabat.php?Id=<?php echo $row['Id']; ?>"><span title="Editar"><img src="img/edit.png"></span></a>
                </td>
                <td>
                    <a  href="certcursopdf.php?Id=<?php echo $row['Id']; ?>">(Curso)</a>
                    <a href="certbatismo.php?Id=<?php echo $row['Id']; ?>">(Batismo)</a>
                </td>
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
