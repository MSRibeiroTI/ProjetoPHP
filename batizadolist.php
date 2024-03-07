<?php
session_start();
echo "Bem Vindo " . $_SESSION["usuario"];
echo date(", d/m/Y");
if (empty($_SESSION)) {
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
    <script src='js/pastoral.js'></script>
</head>

<body>

    <?php $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT); ?>
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
    <h2>Lista de Batizados</h2>
    <form action="" method="POST">
        <?php
        $text_search = "";
        if (isset($dados['busca1'])) {
            $text_search = $dados['busca1'];
        }
        ?>

        <div class="busca">
            <div>
                <label class="control-label">Pesquisar por nome da criança</label>
                <input type="text" name="busca1" placeholder="Buscar" value="<?php echo $text_search; ?>">
            </div>
            <div>
                <label class="control-label">Pesquisar por data do batismo</label>
                <input type="date" name="data" id="data">
            </div>
            <button type="submit" value="1" name="listar">Pesquisar</button>
            <button type="submit" formaction="cadastro.php">Cadastrar</button>

    </form>
    </div>


    <?php
    $busca = $_POST['busca1'] ?? '';
    $data = $_POST['data'] ?? '';
    //Se a busca for vazia, listamos todos os registros
    if ($busca == '' && $data == '') {
        include "listaTodosBatizados.php";
    } elseif ($data != '') { //Senão se é uma pesquisa por data
        include "pesquisaDataBatizados.php";
    } else { //senão lista somente o que foi digitado na barra de pesquisa
        include "pesquisaNomeBatizados.php";
    }
  
  ?>

    <?php
    mysqli_close($conn);
    ?>

</body>

</html>