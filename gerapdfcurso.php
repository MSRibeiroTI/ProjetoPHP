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
  $sql = "SELECT * FROM cad_curso WHERE id = '$id'";
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
 <link rel='stylesheet' type='text/css' media='screen' href='http://localhost/batismo/css/stylecertpdfcurso.css'>
 

</head> 
";
$date = new DateTime($row['datacurso']);
$date2 = $date -> format('d/m/Y');

$html .= "
<body class='A4'>
 <section class='sheet padding-10mm'>
    <div class='certpai'>
      <img class='imagem' src='http://localhost/batismo/img/brasao.png' alt=''>
      <img src='http://localhost/batismo/img/LogoBatismo.png' alt='Logotipo da Empresa'>
      <br><br><br><br><br>
      <p>Certificamos que</p>
      <h3>$row[name]</h3>
      <p>participou do curso de 'Preparação para Pais e Padrinhos',</p>
      <p> ministrado pela Pastoral do Batismo da</p>
      <p>Paróquia Nossa Senhora do Livramento.</p>
      <h4>Arcoverde, $date2</h4>
      <p><br>_______________________________<br>Catequista</p>
            
    </div>

    </section>
</body>

</html>";
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
header('Content-type: application/pdf');
$dompdf->stream('Certificado_Curso_bat_'. $row['Nome']);
