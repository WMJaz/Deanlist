<?php

require 'vendor/autoload.php';
use Dompdf\Dompdf;

$dompdf = new DOMPDF();

$html ="
<html>
<head>
<link type='text/css' href='testing.css' />
</head>
<body>
<table style='width:100%'>
  <tr>
    <th>Firstname</th>
    <th>Lastname</th> 
    <th>Age</th>
  </tr>
  <tr>
    <td>Jill</td>
    <td>Smith</td>
    <td>50</td>
  </tr>
  <tr>
    <td>Eve</td>
    <td>Jackson</td>
    <td>94</td>
  </tr>
  <tr>
    <td>John</td>
    <td>Doe</td>
    <td>80</td>
  </tr>
</table>
</body>
</html>";

$dompdf->load_html($html);
$dompdf->render();
$dompdf->set_base_path('testing.css');
$dompdf->stream("hello.pdf");
?>


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>test</h1>
</body>
</html>