<?php
session_start();
echo "Bem Vindo " . $_SESSION["usuario"];
echo date(", d/m/Y");
if (empty($_SESSION)) {
  print "<script>location.href='index.php';</script>";
}
include_once("config/config.php");

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
  <link rel='stylesheet' type='text/css' media='screen' href='css/style.css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src='js/pastoral.js'></script>
</head>

<body>
 
<?php include "menu.php";  ?>

    <div class="card">
      <div class="card-body">
        <br><br>
        <h1>Editar Cadastro</h1>
        <form action="config/updatebat.php?Id=<?php echo $row['Id']; ?>" method="POST">
          <div>
            <label for="nome-crianca">Nome da Criança:</label>
            <input type="text" id="nome-crianca" name="nome-crianca" value="<?= $row['Nome'] ?>">
          </div>
          <div>
            <label for="pai">Pai:</label>
            <input type="text" id="pai" name="pai" value="<?php echo $row['Pai']; ?>">
            <label for="Telefonte">Telefonte:</label>
            <input type="tel" id="telefone" name="telefone" value="<?php echo $row['phonepai']; ?>">
          </div>
          <div>
            <label for="mae">Mãe:</label>
            <input type="text" id="mae" name="mae" value="<?php echo $row['Mae']; ?>">
            <label for="Telefone">Telefone:</label>
            <input type="tel" id="telefone2" name="telefone2" value="<?php echo $row['phonemae']; ?>">
          </div>
          <div>
            <label for="endereço">Endereço:</label>
            <input type="text" id="endereco" name="endereco" placeholder="Rua, Bairro, Cidade" value="<?php echo $row['addres']; ?>">
          </div>
          <div>
            <label for="data-nascimento">Data de Nascimento:</label>
            <input type="date" id="data-nascimento" name="data-nascimento" value="<?php echo $row['Nascimento']; ?>" required>
          </div>
          <div>
            <label for="cert-nascimento">Certidão Nasc.:</label>
            <input type="text" id="cert-nascimento" name="cert-nascimento" value="<?php echo $row['cert_nasc']; ?>">
          </div>
          <div>
            <label for="curso">Data do Curso de Preparação:</label>
            <input type="date" name="curso" id="curso" value="<?php echo $row['curso'] ?>" required>
          </div>
          <div>
            <label for="padrinho">Nome do Padrinho:</label>
            <input type="text" id="padrinho" name="padrinho" value="<?php echo $row['Padrinho']; ?>">
          </div>
          <div>
            <label for="cursopadrinho">Já fez o curso preparatório?</label>
            <select id="fezcursopad" name="fezcursopad">
              <option value="Sim" <?php if ($row["fezcursopad"] == "Sim") {
                                    echo 'selected';
                                  } ?>>Sim</option>
              <option value="Não" <?php if ($row["fezcursopad"] == "Não") {
                                    echo 'selected';
                                  } ?>>Não</option>
            </select>
            <br>
            <div>
              <label for="cursopadrinho">Em outra paróquia?</label>
              <select id="ondepad" name="ondepad">
                <option value="Não" <?php if ($row["ondepad"] == "Não") {
                                      echo 'selected';
                                    } ?>>Não, ainda não fez</option>
                <option value="Não2" <?php if ($row["ondepad"] == "Não2") {
                                        echo 'selected';
                                      } ?>>Não, fez aqui</option>
                <option value="Sim" <?php if ($row["ondepad"] == "Sim") {
                                      echo 'selected';
                                    } ?>>Sim, fez em outa paróquia</option>
              </select>
              <br><br>
            </div>
            <div>
              <label for="madrinha">Nome da Madrinha:</label>
              <input type="text" id="madrinha" name="madrinha" value="<?php echo $row['Madrinha']; ?>">
            </div>
            <div>
            <label for="cursopadrinho">Já fez o curso preparatório?</label>
            <select id="fezcursomad" name="fezcursomad">
              <option value="Sim" <?php if ($row["fezcursomad"] == "Sim") {
                                    echo 'selected';
                                  } ?>>Sim</option>
              <option value="Não" <?php if ($row["fezcursomad"] == "Não") {
                                    echo 'selected';
                                  } ?>>Não</option>
            </select>
            <br>
            <div>
              <label for="cursopadrinho">Em outra paróquia?</label>
              <select id="ondemad" name="ondemad">
                <option value="Não" <?php if ($row["ondemad"] == "Não") {
                                      echo 'selected';
                                    } ?>>Não, ainda não fez</option>
                <option value="Não2" <?php if ($row["ondemad"] == "Não2") {
                                        echo 'selected';
                                      } ?>>Não, fez aqui</option>
                <option value="Sim" <?php if ($row["ondemad"] == "Sim") {
                                      echo 'selected';
                                    } ?>>Sim, fez em outa paróquia</option>
              </select>
              <br><br>
            </div>
            <div>
              <label for="data-batismo">Data do Batismo:</label>
              <input type="date" id="data-batismo" name="data-batismo" value="<?php echo $row['Batizado']; ?>" required>
            </div>
            <div>
              <br>
              <button type="submit">Atualizar</button>
            </div>
            <br><br>
        </form>
      </div>
    </div>

  </body>

</html>