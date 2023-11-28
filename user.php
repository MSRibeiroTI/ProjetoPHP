<?php
    session_start();
    echo "Bem Vindo ".$_SESSION["usuario"];
    echo date(", d/m/Y");
    if(empty($_SESSION)){
        print "<script>location.href='index.php';</script>";
    }elseif(($_SESSION["nivel"]) !='3'){
        echo "<script>alert('Acesso Restrito!')</script>";
        print "<script>location.href='home.php';</script>";
           }
    include_once('config/config.php');
    $sql = "SELECT * FROM usuario ORDER BY nome_comp";
    $res = mysqli_query($conn, $sql);
    
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Pastoral do Batismo</title>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/style.css'>
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
            <li><a href="logout.php">Sair</a></li>
    </ul>
</div>
<h2>Usuários dos Sistema</h2>
<table>
        <tr>
            <th>Nome</th>
            <th>Login/Usuário</th>
            <th>Opções</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($res)): ?>
            <tr>
                <td><?php echo $row['nome_comp']; ?></td>
                <td><?php echo $row['nome']; ?></td>
                <td>
                    <a href="editar.php?id=<?php echo $row['id']; ?>">Editar</a>
                    <a href="deletar.php?id=<?php echo $row['id']; ?>">Deletar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
<br>
<div class="cadastro">
    <h2>Cadastrar novo Usuário:</h2>
    <line>
    <a href="caduser.php"><button>Cadastrar</button></a>
        </div>    
<?php
    mysqli_close($conn);
?>

</body>
