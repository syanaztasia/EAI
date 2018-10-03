<?php
session_start();
require_once 'config.php';
$fb = new Facebook\Facebook([
  'app_id' => $appId,
  'app_secret' => $appSecret,
  'default_graph_version' => 'v2.5',
]);

if(empty($_SESSION['facebook_session'])) {
  echo "

  <html>
  <head>
  <title>Belajar Login With Facebook</title>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
   <script src='https://www.google.com/recaptcha/api.js'></script>
  </head>
  <body>
  <style>
        body {
        background: url(http://il8.picdn.net/shutterstock/videos/8543482/thumb/1.jpg) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        }
        .panel-default {
        opacity: 0.9;
        margin-top:30px;
        }
        .form-group.last { margin-bottom:0px; }
  </style>
  <div class='container'>
    <div class='row'>
      <div class='col-md-12'>
        <div class='panel panel-default'>
          <div class='panel-heading'>
          <span class='glyphicon glyphicon-option-vertical'></span> BELUM LOGIN TERDETEKSI
          </div>
          <div class='panel-body' style='word-wrap: break-word;'>
           <div class='col-md-12'>
             <h1 style='text-align:center;'>Kelihatanya anda belum login, Silahkan login terlebih dahulu dengan klik tombol dibawah ini.</h1><br /><br />
             <a href='login_fb.php'><img src='login_fb.png' style='margin-left:35%;'></img></a>
         </div>
              <div class='form-group'>
                <div class='col-md-12'>
                  <hr>
                  <p style='text-align:center;'>Copyright &copy; " . date('Y') ." rizalfakhri</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  </html>

  ";
} else {
  $token    = $_SESSION['facebook_session'];
  $data     = $fb->get("/me?fields=id,name,email,picture,link,gender",$token);
  $user     = $data->getGraphUser();
  $input    = new db();
  $nama     = $user['name'];
  $email    = $user['email'];
  if($cek = $input->mysqli->query("SELECT * FROM user WHERE token = '$token' ")) {
    if($cek->num_rows < 1 ) {
      if($input->mysqli->query("INSERT INTO user(nama,email,token) VALUES('$nama','$email','$token')")) {
        $input->redirect("http://localhost/eai/index-fb.php");
      }
    }
  }
 $cek_pass = "SELECT * FROM user WHERE token = '$token' ";
  if($cek_pass = $input->mysqli->query($cek_pass)) {
    if($cek_pass->num_rows > 0 ) {
      if($data = mysqli_fetch_array($cek_pass)) {
        if($data['password'] == "") {
          $pesan = "
           <div class='col-md-12'>
            <div class='panel panel-default'>
             <div class='panel-heading'>
              <span class='glyphicon glyphicon-lock'></span>
               SET PASSWORD
             </div>
             <div class='panel-body'>
              <h1 style='text-align:center'>Tingal 1 Langkah Lagi, Silahkan Buat Password Anda :D </h1><br />
              <div class='col-md-6 col-md-offset-3'>
              <form method='post'>
              <div class='form-group'>
               <label for='password'>Password </label>
               <input type='password' class='form-control' placeholder='Password' name='password'>
              </div>
              <div class='form-group'>
               <label for='cpassword'>Confirm Password</label>
               <input type='password' class='form-control' name='cpassword' placeholder='Confirm Password'>
              </div>
               <button class='btn btn-success' style='width:100%' type='submit' name='btn-save-password'>SAVE!</button>
             </form>
            </div>
           </div>
          </div>
          ";
        }
      }
    }
  }
  ?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SICUKU - SISTEM INFORMASI CATATAN UANG KU</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/one-page-wonder.min.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">SISTEM INFORMASI CATATAN UANG KU</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="dropdown nav-item px-lg-4">
              <a  href="#" class="nav-link text-uppercase text-expanded dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $user['name']; ?><span class="caret"></span></a>
               <ul class="dropdown-menu" role="menu">
                <center><li class="nav-item px-lg-4"><a class="nav-link text-uppercase text-expanded" href="#"><?php echo "<img class='rounded-circle' width='55' height='55' src=\"{$profile['image']['url']}\">"; ?></a></li>
                <li class="nav-item px-lg-4"><a style="color: black !important;" class="nav-link text-uppercase text-expanded" href="#"><?php echo "{$profile['displayName']}";?></a></li>
                <li class="nav-item px-lg-4"><hr style="height:1px;border:none;color:#333;background-color:#333;"></li>
                <li class="nav-item px-lg-4"><a style="color: black !important;" class="nav-link text-uppercase text-expanded" href="../logout.php">Logout</a></li></center>
               </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    <header class="masthead text-center text-white">
      <div class="masthead-content">
        <div class="container">
          <!-- tabel untuk berita dan cuaca -->
          <table border="0" style="background-color: white;">
          <tr>
            <td style="width: 70%">
              <table border="0" style="width:100%;">
                <tr>
                  <td style="width:50%; color: black !important;">Berita Keuangan<br><hr style="width: 80%"></td>
                </tr>
              </table>

              <table border="0" style="width:100%;">
               
               <!--berita-->
                <?php

                  $json = file_get_contents("https://newsapi.org/v2/everything?q=bitcoin&from=2018-09-01&sortBy=publishedAt&apiKey=ca158f9697b44af285a188ffa2da7860");

                                                
                  $data = json_decode($json);

                  $array = array("0","1","2");

                  $arrlength = count($array);

                    for($x = 0; $x < $arrlength; $x++) {

                      $sumber = print_r($data->articles[$array[$x]]->url, true);

                      $gambar = print_r($data->articles[$array[$x]]->urlToImage, true);

                ?>
                
                <tr>
                  <td style="padding: 10px; font-size: 12px; width: 20%">
                    <a target="_blank" href='<?php echo "  ".$sumber ?>'>
                      <img style="width: 120px; padding-bottom: 5px" src='<?php echo $gambar ?>'>
                    </a>
                  </td>
                  <td style="width:30%; font-size: 12px; text-align: left; vertical-align: left;">
                    <a target="_blank" href='<?php echo "  ".$sumber ?>'>
                      <?php echo $data->articles[$array[$x]]->title; ?>
                    </a>
                  </td>
                </tr>

                <?php

                  } 

                ?>

              </table>
            </td>
            <td style="background-color: #42858c; border-radius: 4px;">

              <!--cuaca-->
              <div style="font-size: 14px; color: white; text-align: left; vertical-align: left; margin-left: 48px">
              
              <?php

                $queryss = @unserialize (file_get_contents('http://ip-api.com/php/'));

                $json = file_get_contents("https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20weather.forecast%20where%20woeid%20in%20(select%20woeid%20from%20geo.places(1)%20where%20text%3D%22".$queryss['city']."%22)and%20u%3D%22c%22&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys");
                        
                $data = json_decode($json);

                $image_weather = $data->query->results->channel->item->condition->text;

                $array = array("0","1","2","3","4","5");

                $arrlength = count($array);

                switch ($image_weather) {
                    case "Cloudy":
                        echo "<img src='../cuaca/con_cloudy.png' style='width:40px;height:40px;'>";
                        break;
                    case "Partly Cloudy":
                        echo "<img src='../cuaca/con_partlycloudy.png' style='width:40px;height:40px;'>";
                        break;
                    case "Sunny":
                        echo "<img src='../cuaca/con_sunny.png' style='width:40px;height:40px;'>";
                        break;
                    case "Mostly Sunny":
                        echo "<img src='../cuaca/con_mostlysunny.png' style='width:40px;height:40px;'>";
                        break;
                    case "Scattered":
                        echo "<img src='../cuaca/con_scatteredthunderstorm.png' style='width:40px;height:40px;'>";
                        break;
                    case "Thunderstorms":
                        echo "<img src='../cuaca/con_thunderstorm.png' style='width:40px;height:40px;'>";
                        break;
                    case "Showers":
                        echo "<img src='../cuaca/con_rain.png' style='width:40px;height:40px;'>";
                        break;
                    case "Rain":
                        echo "<img src='../cuaca/con_rain.png' style='width:40px;height:40px;'>";
                        break;
                    case "Windy":
                        echo "<img src='../cuaca/con_windy.png' style='width:40px;height:40px;'>";
                        break;
                    case "Mostly Cloudy":
                        echo "<img src='../cuaca/con_cloudy.png' style='width:40px;height:40px;'>";
                        break;
                    case "Breezy":
                        echo "<img src='../cuaca/con_windy.png' style='width:40px;height:40px;'>";
                        break;
                    case "Scattered Showers":
                        echo "<img src='../cuaca/con_scatteredrain.png' style='width:40px;height:40px;'>";
                        break;    
                    default:
                        echo "-";
              }

                  echo "<br>". $data->query->results->channel->location->city . ", ";
                  echo $data->query->results->channel->location->region. ", ";
                  echo $data->query->results->channel->location->country . "<br/>"  ;
                  echo $data->query->results->channel->lastBuildDate . "<br/>";
                  echo "Suhu : ". $data->query->results->channel->item->condition->temp. "°, ";
                  echo "Cuaca : ". $data->query->results->channel->item->condition->text ."<br><br>";
                  echo "Perkiraan Cuaca : <br>";

                  for($x = 1; $x < $arrlength; $x++) {

                  $image_weather = $data->query->results->channel->item->condition->text;

                  switch ($image_weather) {
                    case "Cloudy":
                        echo "<img src='../cuaca/con_cloudy.png' style='width:25px;height:25px;'>";
                        break;
                    case "Partly Cloudy":
                        echo "<img src='../cuaca/con_partlycloudy.png' style='width:25px;height:25px;'>";
                        break;
                    case "Sunny":
                        echo "<img src='../cuaca/con_sunny.png' style='width:25px;height:25px;'>";
                        break;
                    case "Mostly Sunny":
                        echo "<img src='../cuaca/con_mostlysunny.png' style='width:25px;height:25px;'>";
                        break;
                    case "Scattered":
                        echo "<img src='../cuaca/con_scatteredthunderstorm.png' style='width:25px;height:25px;'>";
                        break;
                    case "Thunderstorms":
                        echo "<img src='../cuaca/con_thunderstorm.png' style='width:25px;height:25px;'>";
                        break;
                    case "Showers":
                        echo "<img src='../cuaca/con_rain.png' style='width:25px;height:25px;'>";
                        break;
                    case "Rain":
                        echo "<img src='../cuaca/con_rain.png' style='width:25px;height:25px;'>";
                        break;
                    case "Windy":
                        echo "<img src='../cuaca/con_windy.png' style='width:25px;height:25px;'>";
                        break;
                    case "Mostly Cloudy":
                        echo "<img src='../cuaca/con_cloudy.png' style='width:25px;height:25px;'>";
                        break;
                    case "Breezy":
                        echo "<img src='../cuaca/con_windy.png' style='width:25px;height:25px;'>";
                        break;
                    case "Scattered Showers":
                        echo "<img src='../cuaca/con_scatteredrain.png' style='width:25px;height:25px;'>";
                        break;    
                    default:
                        echo "-";
                  }

                  echo $data->query->results->channel->item->forecast[$array[$x]]->day . ", ";
                  echo $data->query->results->channel->item->forecast[$array[$x]]->date . ", ";
                  echo $data->query->results->channel->item->forecast[$array[$x]]->text . "<br/>";

                }

              ?>

                </div>
            </td>
          </tr>
        </table>

          <tr> <td>
            
          </td>
        </div>
      </div>
      <div class="bg-circle-1 bg-circle"></div>
      <div class="bg-circle-2 bg-circle"></div>
      <div class="bg-circle-3 bg-circle"></div>
      <div class="bg-circle-4 bg-circle"></div>
    </header>

    <section>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 order-lg-2">
            <div class="p-5">
              <img class="img-fluid rounded-circle" src="cuaca/01.jpg" alt="">
            </div>
          </div>
          <div class="col-lg-6 order-lg-1">
            <div class="p-5">
              
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="p-5">
              <img class="img-fluid rounded-circle" src="cuaca/02.jpg" alt="">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="p-5">
              <h2 class="display-4">We salute you!</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 order-lg-2">
            <div class="p-5">
              <img class="img-fluid rounded-circle" src="cuaca/03.jpg" alt="">
            </div>
          </div>
          <div class="col-lg-6 order-lg-1">
            <div class="p-5">
              <h2 class="display-4">Let there be rock!</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="py-5 bg-black">
      <div class="container">
        <p class="m-0 text-center text-white small">Copyright &copy; SICUKU 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>

<?php
}
?>