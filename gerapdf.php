<?php
session_start();

if (empty($_SESSION)) {
  print "<script>location.href='index.php';</script>";
} elseif (($_SESSION["nivel"]) == '1') {
  echo '<script>alert("Acesso Restrito!");</script>';
  echo '<script>location.href="./batizadolist.php";</script>';
}

include_once("config/config.php");
require './vendor/autoload.php';

if (isset($_GET['Id'])) {
  $id = $_GET['Id'];
  $sql = "SELECT * FROM Cad_Children WHERE id = '$id'";
  $res = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($res);
} else {
  echo "Nenhum ID encontrado";
}

$conn->close();

use Dompdf\Dompdf;

$dompdf = new Dompdf(['enable_remote' => true]);

$html = "
 <!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
 <meta http-equiv='Content-Type' content='text/html; charset=utf8' />
 <title>Impressão do Certificado</title>
 <link rel='stylesheet' type='text/css' media='screen' href='http://localhost/batismo/css/stylecertpdf.css'>
 

</head>

<body class='A4'>
 <section class='sheet padding-10mm'>
    <div class='certpai'>
      <img class='imagem' src='http://localhost/batismo/img/brasao.png' alt=''>
      <img src='http://localhost/batismo/img/LogoBatismo.png' alt='Logotipo da Empresa'>
      <h3>Certificado do Curso de Batismo</h3>
      <p>Certifico que</p>
      <h3>$row[Pai]</h3>
      <p>participou do curso de 'Preparação para pais e </p>
      <p>padrinhos', ministrado pela Pastoral do Batismo</p>
      <p>da Paróquia Nossa Senhora do Livramento.</p>
      <h4>Arcoverde, $row[curso]</h4>
      <br>
      <p>__________________________________</p>
      <p>Coordenador</p>
      <br>
      <h5>Certificado válido por 1 ano</h5>
    </div>

    <div class='certmae'>
      <img class='imagem' src='http://localhost/batismo/img/brasao.png' alt=''>
      <img src='http://localhost/batismo/img/LogoBatismo.png' alt='Logotipo da Empresa'>
      <h3>Certificado do Curso de Batismo</h3>
      <p>Certifico que</p>
      <h3>$row[Mae]</h3>
      <p>participou do curso de 'Preparação para pais e </p>
      <p>padrinhos', ministrado pela Pastoral do Batismo</p>
      <p>da Paróquia Nossa Senhora do Livramento.</p>
      <h4>Arcoverde, $row[curso]</h4>
      <br>
      <p>__________________________________</p>
      <p>Coordenador</p>
      <br>
      <h5>Certificado válido por 1 ano</h5>
    </div>

    <div class='certpad'>
      <img class='imagem' src='http://localhost/batismo/img/brasao.png' alt=''>
      <img src='http://localhost/batismo/img/LogoBatismo.png' alt='Logotipo da Empresa'>
      <h3>Certificado do Curso de Batismo</h3>
      <p>Certifico que</p>
      <h3>$row[Padrinho]</h3>
      <p>participou do curso de 'Preparação para pais e </p>
      <p>padrinhos', ministrado pela Pastoral do Batismo</p>
      <p>da Paróquia Nossa Senhora do Livramento.</p>
      <h4>Arcoverde, $row[curso]</h4>
      <br>
      <p>__________________________________</p>
      <p>Coordenador</p>
      <br>
      <h5>Certificado válido por 1 ano</h5>
    </div>

    <div class='certmad'>
      <img class='imagem' src='http://localhost/batismo/img/brasao.png' alt=''>
      <img src='http://localhost/batismo/img/LogoBatismo.png' alt='Logotipo da Empresa'>
      <h3>Certificado do Curso de Batismo</h3>
      <p>Certifico que</p>
      <h3>$row[Madrinha]</h3>
      <p>participou do curso de 'Preparação para pais e </p>
      <p>padrinhos', ministrado pela Pastoral do Batismo</p>
      <p>da Paróquia Nossa Senhora do Livramento.</p>
      <h4>Arcoverde, $row[curso]</h4>
      <br>
      <p>__________________________________</p>
      <p>Coordenador</p>
      <br>
      <h5>Certificado válido por 1 ano</h5>
    </div>

 </section>
</body>

</html>";
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
header('Content-type: application/pdf');
$dompdf->stream('Certificado_Curso_bat_'. $row['Nome']);
