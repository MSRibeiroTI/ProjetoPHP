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
  $sql = "SELECT * FROM Cad_Children WHERE Id = '$id'";
  $res = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($res);
} else {
  echo "Nenhum ID encontrado";
}
setlocale(LC_ALL, NULL);
setlocale(LC_ALL, 'pt_BR.utf8');
date_default_timezone_set('America/Sao_Paulo');

$conn->close();

use Dompdf\Dompdf;

$dompdf = new Dompdf(['enable_remote' => true]);

$html = "
 <!DOCTYPE html>
<html lang='pt-BR' xmlns='http://www.w3.org/1999/xhtml'>
<head>
 <meta http-equiv='Content-Type' content='text/html; charset=utf8' />
 <title>Impressão do Certificado</title>
 <link rel='stylesheet' type='text/css' media='screen' href='http://localhost/batismo/css/stylecertpdfbatismo.css'>
 

</head> 
";


$date = new DateTime($row['Batizado']);
$date2 = $date->format('d \d\e F \d\e Y');

$date1 = new DateTime($row['Nascimento']);
$date3 = $date1->format('d/m/Y');

$html .= "
<body class='A4'>
<section class='sheet padding-10mm'>
 
    <div class='certpai'>
    <style type='text/css'>
    @charset 'utf-8';

    @font-face {
        font-family: 'minhaFonte';
        src: url(SCRIPTBL.TTF);
        font-style: normal;

        body{
          font-family:'minhaFonte!important';
        }
  }</style>
  <br><br><br><br><br><br><br><br>
    <p>Diocese de Pesqueira<br>Paróquia Nossa Senhora do Livramento<br>Pastoral do Batismo</p>
    <h4><br>Sacramento do Batismo de</h4>
    <h3><br>$row[Nome]</h3>
    <p><br>Nascido em: $date3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CN: $row[cert_nasc]</p>
  
    <br><br><br><br>
    <h4>Arcoverde, $date2 <?php strftime($date2)?></h4>
       </div>
      
    
    </section>

    <div class='cert'>
    
    </div>

    <div class='pais'>
    <p>Pais: $row[Pai]<br>$row[Mae]</p>
    </div>
    <div class='pad'>
    Padrinhos: $row[Padrinho]<br>$row[Madrinha]</p>
    </div>
    <img src='http://localhost/batismo/img/brasao.png' alt='Logo' width='10%'/>
</body>

</html>";
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
header('Content-type: application/pdf');
$dompdf->stream('Certificado_bat_' . $row['Nome'],
array("Attachment" => true));
