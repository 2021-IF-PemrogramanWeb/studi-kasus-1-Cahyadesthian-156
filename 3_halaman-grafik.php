<?php 
session_start();

if(!isset($_SESSION['login'])) {
  header("Location: 1_halaman1-login.php");
  exit;
}
require_once 'functions.php';

$idLogin = $_SESSION["user_id"];

$yangLogin = query("SELECT * FROM user WHERE USR_ID = $idLogin");


//query 
$data1 = query("SELECT COUNT(KJD_ID) FROM kejadian WHERE USR_ID_KJD = $idLogin AND R_ID_KJD = 1");
$data2 = query("SELECT COUNT(KJD_ID) FROM kejadian WHERE USR_ID_KJD = $idLogin AND R_ID_KJD = 2");
$data3 = query("SELECT COUNT(KJD_ID) FROM kejadian WHERE USR_ID_KJD = $idLogin AND R_ID_KJD = 3");
$data4 = query("SELECT COUNT(KJD_ID) FROM kejadian WHERE USR_ID_KJD = $idLogin AND R_ID_KJD = 4");
$data5 = query("SELECT COUNT(KJD_ID) FROM kejadian WHERE USR_ID_KJD = $idLogin AND R_ID_KJD = 5");
$data6 = query("SELECT COUNT(KJD_ID) FROM kejadian WHERE USR_ID_KJD = $idLogin AND R_ID_KJD = 6");
$data7 = query("SELECT COUNT(KJD_ID) FROM kejadian WHERE USR_ID_KJD = $idLogin AND R_ID_KJD = 7");
$data8 = query("SELECT COUNT(KJD_ID) FROM kejadian WHERE USR_ID_KJD = $idLogin AND R_ID_KJD = 8");
$data9 = query("SELECT COUNT(KJD_ID) FROM kejadian WHERE USR_ID_KJD = $idLogin AND R_ID_KJD = 9");
$data10 = query("SELECT COUNT(KJD_ID) FROM kejadian WHERE USR_ID_KJD = $idLogin AND R_ID_KJD = 10");
$data11 = query("SELECT COUNT(KJD_ID) FROM kejadian WHERE USR_ID_KJD = $idLogin AND R_ID_KJD = 11");
$data12 = query("SELECT COUNT(KJD_ID) FROM kejadian WHERE USR_ID_KJD = $idLogin AND R_ID_KJD = 12");
$data13 = query("SELECT COUNT(KJD_ID) FROM kejadian WHERE USR_ID_KJD = $idLogin AND R_ID_KJD = 13");
$data14 = query("SELECT COUNT(KJD_ID) FROM kejadian WHERE USR_ID_KJD = $idLogin AND R_ID_KJD = 14");
$data15 = query("SELECT COUNT(KJD_ID) FROM kejadian WHERE USR_ID_KJD = $idLogin AND R_ID_KJD = 15");
$data16 = query("SELECT COUNT(KJD_ID) FROM kejadian WHERE USR_ID_KJD = $idLogin AND R_ID_KJD = 16");

// echo '<pre>';
// echo var_dump($data1['COUNT(KJD_ID)']) ;
// echo '<pre>'

$setData1 = $data1['COUNT(KJD_ID)'];
$setData2 = $data2['COUNT(KJD_ID)'];
$setData3 = $data3['COUNT(KJD_ID)'];
$setData4 = $data4['COUNT(KJD_ID)'];
$setData5 = $data5['COUNT(KJD_ID)'];
$setData6 = $data6['COUNT(KJD_ID)'];
$setData7 = $data7['COUNT(KJD_ID)'];
$setData8 = $data8['COUNT(KJD_ID)'];
$setData9 = $data9['COUNT(KJD_ID)'];
$setData10 = $data10['COUNT(KJD_ID)'];
$setData11 = $data11['COUNT(KJD_ID)'];
$setData12 = $data12['COUNT(KJD_ID)'];
$setData13 = $data13['COUNT(KJD_ID)'];
$setData14 = $data14['COUNT(KJD_ID)'];
$setData15 = $data15['COUNT(KJD_ID)'];
$setData16 = $data16['COUNT(KJD_ID)'];

$buatLabel = query("SELECT R_DESC FROM reason ");
$label1Temp = ($buatLabel[0]);
$labelData1 = $label1Temp['R_DESC'];
//echo $labelData1;
$label2Temp = ($buatLabel[1]);
$labelData2 = $label2Temp['R_DESC'];

$label3Temp = ($buatLabel[2]);
$labelData3 = $label3Temp['R_DESC'];

$label4Temp = ($buatLabel[3]);
$labelData4 = $label4Temp['R_DESC'];

$label5Temp = ($buatLabel[4]);
$labelData5 = $label5Temp['R_DESC'];

$label6Temp = ($buatLabel[5]);
$labelData6 = $label6Temp['R_DESC'];

$label7Temp = ($buatLabel[6]);
$labelData7 = $label7Temp['R_DESC'];

$label8Temp = ($buatLabel[7]);
$labelData8 = $label8Temp['R_DESC'];

$label9Temp = ($buatLabel[8]);
$labelData9 = $label9Temp['R_DESC'];

$label10Temp = ($buatLabel[9]);
$labelData10 = $label10Temp['R_DESC'];

$label11Temp = ($buatLabel[10]);
$labelData11 = $label11Temp['R_DESC'];

$label12Temp = ($buatLabel[11]);
$labelData12 = $label12Temp['R_DESC'];

$label13Temp = ($buatLabel[12]);
$labelData13 = $label13Temp['R_DESC'];

$label14Temp = ($buatLabel[13]);
$labelData14 = $label14Temp['R_DESC'];

$label15Temp = ($buatLabel[14]);
$labelData15 = $label15Temp['R_DESC'];

$label16Temp = ($buatLabel[15]);
$labelData16 = $label16Temp['R_DESC'];

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halaman 3 Grafik</title>

    <!-- chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">

  </head>
  <body>

     <!-- Navbar -->
    <nav class="shadow navbar fixed-top navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="wolf-icon.png" alt="" width="30" class="d-inline-block align-text-top" />
        </a>
        <?php echo date("l"). ", " . date("Y/m/d") . " | " . $yangLogin['USR_NAME']; ?>
        

        <div class="">
          <div class="navbar-nav ms-auto container-fluid">
            <a href="">
              <img src="photo/<?= $yangLogin['USR_PHOTO']; ?>" height="30" class="rounded-circle d-inline-block align-text-top" />
            </a>
          </div>
        </div>
      </div>
    </nav>
    <!-- Closing Navbar -->

    <!-- Container Chart -->
    <div class="container" style="padding-top: 86px;">
      <canvas id="myChart"></canvas>
    </div>

    <div class="container my-5">
    <a href="2_halaman-tabel.php" type="button" class="btn btn-warning"><i class="bi bi-table"></i> Table</a>
    <a href="logout.php" type="button" class="btn btn-danger"><i class="bi bi-box-arrow-left"></i> Logout</a>
    </div>

    <script>
      let myChart = document.getElementById("myChart").getContext("2d");

      let massPopChart = new Chart(myChart, {
        type: "bar",
        data: {
          // labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16"],
          labels: [ <?php echo '"'.$labelData1.'",' . '"'.$labelData2. '",'. '"'.$labelData3. '",'. '"'.$labelData4. '",'. '"'.$labelData5. '",'. '"'.$labelData6. '",'. '"'.$labelData7. '",'. '"'.$labelData8. '",'. '"'.$labelData9. '",'. '"'.$labelData10. '",'. '"'.$labelData11. '",'. '"'.$labelData12. '",'. '"'.$labelData13. '",'. '"'.$labelData14. '",'. '"'.$labelData15. '",'. '"'.$labelData16. '"'; ?> ],
          datasets: [
            {
              label: "Trend Reason",
              data: [<?php echo '"'.$setData1.'",' . '"'.$setData2. '",'. '"'.$setData3. '",'. '"'.$setData4. '",'. '"'.$setData5. '",'. '"'.$setData6. '",'. '"'.$setData7. '",'. '"'.$setData8. '",'. '"'.$setData9. '",'. '"'.$setData10. '",'. '"'.$setData11. '",'. '"'.$setData12. '",'. '"'.$setData13. '",'. '"'.$setData14. '",'. '"'.$setData15. '",'. '"'.$setData16. '"'; ?>],          
              backgroundColor: "blue",
            },
          ],
        },
        options: {},
      });
    </script>

    <!-- Bootstrap bundle -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
