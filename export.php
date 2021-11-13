<?php
session_start();

ob_end_flush();

// echo '<pre>';
// echo var_dump($_SESSION);
// echo '</pre>';

require_once __DIR__ . '/vendor/autoload.php';

require_once 'functions.php';
$idLogged = $_SESSION["user_id"];
$kejadian = query("SELECT KJD_ID, KJD_ON, KJD_OF, KJD_ACT, KJD_DIS, R_ID_KJD, USR_ID_KJD, R_DESC 
                    FROM kejadian INNER JOIN reason ON kejadian.R_ID_KJD = reason.R_ID 
                    WHERE USR_ID_KJD=$idLogged
                    ORDER BY KJD_ID");
$someoneData = query("SELECT * FROM user WHERE USR_ID = $idLogged");

// echo '<pre>';
// echo var_dump($kejadian);
// echo '</pre>';

$mpdf = new \Mpdf\Mpdf();
$mpdf->shrink_tables_to_fit = 1;

$html = '<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Export Kejadian</title>
    <link rel="stylesheet" href="export.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  </head>
  <body>
    
    <h1 class="text-center fs-1 fw-bold"> Daftar Kejadian </h1>

    <div class="text-center"> <p>' .date("l"). ", " . date("Y/m/d").'</p>';

$html .='<img src="photo/'.$someoneData['USR_PHOTO'].'" height="50" class="rounded-circle d-inline-block align-text-top" />  
<p>' .$someoneData['USR_NAME']. '</p>  

</div>

    <div class="fortable">
    <table class="">
        <thead class="">
        <tr class="text-center">
            <th scope="col" class="text-center">No</th>
            <th scope="col" class="text-center">On</th>
            <th scope="col" class="text-center">Off</th>
            <th scope="col" class="text-center">Ack by</th>
            <th scope="col" class="text-center">Dis by</th>
            <th scope="col" class="text-center">Reason</th>
        </tr>';

        $i = 1;
        foreach ( $kejadian as $row ) {
            $html .= '<tr>
                <td>' . $i++ . '</td>
                <td>'. $row["KJD_ON"] .'</td>
                <td>'. $row["KJD_OF"] .'</td>
                <td>'. $row["KJD_ACT"] .'</td>
                <td>'. $row["KJD_DIS"] .'</td>
                <td>'. $row["R_DESC"] .'</td>
            </tr>';
        }

        

$html .= '
        </thead>
    </table>
    </div>

  </body>
</html>';


$mpdf->WriteHTML($html);
$mpdf->Output('Daftar-Kejadian.pdf','I');

