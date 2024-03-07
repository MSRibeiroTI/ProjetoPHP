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

if (isset($_GET['Batizado'])) {
    $data = $_GET['Batizado'];
    $sql = "SELECT * FROM Cad_Children WHERE Batizado = '$data'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    $registros = mysqli_num_rows($res);
  } else {
    echo "Nenhum ID encontrado";
  }


$conn->close();

use Dompdf\Dompdf;

$dompdf = new Dompdf(['enable_remote' => true]);

$date = new DateTime($row['Batizado']);
$date2 = $date -> format('d/m/Y');

$html = "
 <!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
 <meta http-equiv='Content-Type' content='text/html; charset=utf8' />
 <title>Impressão do Certificado</title>
 <link rel='stylesheet' type='text/css' media='screen' href='http://localhost/batismo/css/stylecert.css'>
</head>
<body>
<img src='http://localhost/batismo/img/LogoBatismo.png' alt='Logotipo da Empresa'>
<h1>Lista de Frequência, $date2</h1>
<table>
<tr>
    <th>Criança</th>
    <th>Presença</th>
<tr>
";

if ($res > 0) {
    foreach ($res as $row) {
        $html .= "<tr><td>$row[Nome]</td>";
        $html .= "<td><img src='http://localhost/batismo/img/chekbox.png'></td></tr>";
    }
}

$html .= "
<br><br>
<p>Quantidade de Batizados: $registros</p>

</body>
</html>";
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
header('Content-type: application/pdf');
$dompdf->stream('Lista_de_Frequência_'. $data);
?>