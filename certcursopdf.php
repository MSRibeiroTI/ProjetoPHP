<?php
session_start();
echo "Bem Vindo ".$_SESSION["usuario"];
    echo date(", d/m/Y");
    if(empty($_SESSION)){
        print "<script>location.href='index.php';</script>";
    }elseif(($_SESSION["nivel"]) =='1'){
      echo "<script>alert('Acesso Restrito!')</script>";
      print "<script>location.href='./batizadolist.php';</script>";
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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www
.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf8"/>
    <title>Impressão do Certificado</title>
    <link rel='stylesheet' type='text/css' media='screen' href='css/stylecert.css'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.3.0/paper.css" rel="stylesheet" />
<style>
  @page {
    size: A4,
    size: auto;
    margin: 25mm 25mm 25mm 25mm; 
  }
</style>

        </head>
        <body class="A4">
        <h1>Impressão dos Certificados do Curso</h1>
        <a href="batizadolist.php">Voltar</a>
        <br>
        <section class="sheet padding-10mm">
        <div class="certpai">
        <img class="imagem" src="img/brasao.png" alt="">
        <img src="img/LogoBatismo.png" alt="Logotipo da Empresa">
        <h3>Certificado do Curso de Batismo</h3>
        <p>Certifico que</p>
        <h3><?php echo $row["Pai"]; ?></h3>
        <p>participou do curso de "Preparação para pais e </p>
        <p>padrinhos", ministrado pela Pastoral do Batismo</p>
        <p>da Paróquia Nossa Senhora do Livramento.</p>
        <h4>Arcoverde, <?php echo date(" d/m/Y"); ?></h4>
        <br>
        <p>__________________________________</p>
        <p>Coordenador</p>
        <br>
        <h5>Certificado válido por 1 ano</h5>  
        </div>

        <div class="certmae">
        <img class="imagem" src="img/brasao.png" alt="">
        <img src="img/LogoBatismo.png" alt="Logotipo da Empresa">
        <h3>Certificado do Curso de Batismo</h3>
        <p>Certifico que</p>
        <h3><?php echo $row["Mae"]; ?></h3>
        <p>participou do curso de "Preparação para pais e </p>
        <p>padrinhos", ministrado pela Pastoral do Batismo</p>
        <p>da Paróquia Nossa Senhora do Livramento.</p>
        <h4>Arcoverde, <?php echo date(" d/m/Y"); ?></h4>
        <br>
        <p>__________________________________</p>
        <p>Coordenador</p>
        <br>
        <h5>Certificado válido por 1 ano</h5>  
        </div>

        <div class="certpad">
        <img class="imagem" src="img/brasao.png" alt="">
        <img src="img/LogoBatismo.png" alt="Logotipo da Empresa">
        <h3>Certificado do Curso de Batismo</h3>
        <p>Certifico que</p>
        <h3><?php echo $row["Padrinho"]; ?></h3>
        <p>participou do curso de "Preparação para pais e </p>
        <p>padrinhos", ministrado pela Pastoral do Batismo</p>
        <p>da Paróquia Nossa Senhora do Livramento.</p>
        <h4>Arcoverde, <?php echo date(" d/m/Y"); ?></h4>
        <br>
        <p>__________________________________</p>
        <p>Coordenador</p>
        <br>
        <h5>Certificado válido por 1 ano</h5>  
        </div>

        <div class="certmad">
        <img class="imagem" src="img/brasao.png" alt="">
        <img src="img/LogoBatismo.png" alt="Logotipo da Empresa">
        <h3>Certificado do Curso de Batismo</h3>
        <p>Certifico que</p>
        <h3><?php echo $row["Madrinha"]; ?></h3>
        <p>participou do curso de "Preparação para pais e </p>
        <p>padrinhos", ministrado pela Pastoral do Batismo</p>
        <p>da Paróquia Nossa Senhora do Livramento.</p>
        <h4>Arcoverde, <?php echo date(" d/m/Y"); ?></h4>
        <br>
        <p>__________________________________</p>
        <p>Coordenador</p>
        <br>
        <h5>Certificado válido por 1 ano</h5>  
        </div>
       
        </section>
        </body>
        </html>
    
        
