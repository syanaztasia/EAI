<!DOCTYPE html>

<html>
<head>
<title>Cabskuy</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">

<div class="wrapper row0">
  <div id="topbar" class="hoc clear"> 
    
    <div class="fl_left">
    <?php
          $queryss = @unserialize (file_get_contents('http://ip-api.com/php/'));
          if ($queryss && $queryss['status'] == 'success') {
          }
          $json = file_get_contents("https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20weather.forecast%20where%20woeid%20in%20(select%20woeid%20from%20geo.places(1)%20where%20text%3D%22".$queryss['city']."%22)and%20u%3D%22c%22&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys");
                
          $data = json_decode($json);

          ?>
     <?php

              echo $data->query->results->channel->location->city . ", ";
              echo $data->query->results->channel->location->region. ", ";
              echo $data->query->results->channel->location->country. " -- ";

             ?>

            </td>
            <td style="padding-left: 8px;">
              Temperature :

              <?php
                echo $data->query->results->channel->item->condition->temp;
              ?>

              °
            </td>
            <td>
            Weather :

              <?php
                echo $data->query->results->channel->item->condition->text;
              ?>
            
    </div>
    <div class="fl_right">
      <ul>
        <li><a href="#"><i class="fa fa-lg fa-home"></i></a></li>
        <li><a href="login/login.php">Login</a></li>
        <li><a href="regist/daftar.php">Register</a></li>
      </ul>
    </div>
    
  </div>
</div>

<div class="wrapper row2">
  <nav id="mainav" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <ul class="clear">
      <li class="active"><a href="index.html">Home</a></li>
      <li><a class="drop" href="#">Pages</a>
        <ul>
          <li><a href="pages/gallery.html">Destination</a></li>
          <li><a href="pages/full-width.html">Attractions</a></li>
          <li><a href="pages/basic-grid.html">Event & Festival</a></li>
        </ul>
      </li>
      <li><a href="#">Most Visited</a>
      </li>
      <li class="fl_right">  <p>
      <input class="btmspace-15" type="search" value="" placeholder=" Search...." style="font-size: 15px; border-radius: 10%">
          </ul>
    <!-- ################################################################################################ -->
  </nav>
</div>
<?php
      $json = file_get_contents("https://newsapi.org/v2/everything?q=bencana&from=2018-09-01&sortBy=publishedAt&apiKey=5b125f0256bf4afab3c7d89f897e6c53");
                          
                    $data = json_decode($json);

                    $array = array("0");

                    $arrlength = count($array);
                   
                    for($x = 0; $x < $arrlength; $x++) { 
                     $sumber = print_r($data->articles[$array[$x]]->url, true);
                     $a = print_r($data->articles[$array[$x]]->urlToImage,true);
                    ?>
<div class="bgded overlay"  style="background-image:url('images/cabskuy.jpg');">
  <div id="pageintro" class="hoc clear"> 
    <div class="flexslider basicslider">
      <ul class="slides">
        <li>
          <article>
            <p><?php echo $data->articles[$array[$x]]->author ?></p>
            <h3 class="heading"><?php echo $data->articles[$array[$x]]->title ?></h3>
            
            <footer>
              <ul class="nospace inline pushright">
                <li><a class="btn" href="<?php echo $sumber ?>">Visit page</a></li>
                <li><a class="btn inverse" href="#destinasi">Scroll down</a></li>
              </ul>
              <?php }      ?>
            </footer>
          </article>
        <?php
      $json = file_get_contents("https://newsapi.org/v2/everything?q=pariwisata&from=2018-09-01&sortBy=publishedAt&apiKey=5b125f0256bf4afab3c7d89f897e6c53");
                          
                    $data = json_decode($json);

                    $array = array("0");

                    $arrlength = count($array);
                   
                    for($x = 0; $x < $arrlength; $x++) { 
                     $sumber = print_r($data->articles[$array[$x]]->url, true);
                     $a = print_r($data->articles[$array[$x]]->urlToImage,true);
                    ?>
        </li>
        <li>
          <article>
            <p><?php echo $data->articles[$array[$x]]->author ?></p>
            <h3 class="heading"><?php echo $data->articles[$array[$x]]->title ?></h3>
           
            <footer>
              <ul class="nospace inline pushright">
                <li><a class="btn" href="<?php echo $sumber ?>">Visit Page</a></li>
                <li><a class="btn inverse" href="#">Scroll down</a></li>
              </ul>
               <?php }      ?>
            </footer>
          </article>
        </li>
        <li>
          <article>
            <p>Saritem</p>
            <h3 class="heading">Most visited place by foreign tourists</h3>
            <footer>
              <ul class="nospace inline pushright">
                <li><a class="btn" href="<?php echo $sumber ?>">Visit Page</a></li>
                <li><a class="btn inverse" href="#">Scroll down</a></li>
              </ul>
            </footer>
          </article>
        </li>
      </ul>
    </div>

  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3" id="destinasi">
  <main class="hoc container clear"> 
    <ul class="nospace group services">
      <li class="one_third first">
        <article>
          <h6 class="heading font-x3">Destination Highlights</h6>
          <p>Catch a glimpse of West Java's bewitching attractions without having to put on your shoes and discover the ultimate destination that matches your soul. So go ahead and steal a glance at your ideal holiday.</p>
          <footer><a class="btn" href="#">More Destination</a></footer>
        </article>
      </li>
      <li class="one_third">
        <article class="bgded overlay" style="background-image:url('images/bandung.jpg');">
          <div class="txtwrap">
            <h6 class="heading">Bandung</h6>
            <p>The highland city of Bandung is only a short 2.5 hours' drive southeast of Jakarta via toll road, and is the overwhelming destination of choice for Jakarta residents to get [&hellip;]</p>
            <footer><a href="#">More &raquo;</a></footer>
          </div>
        </article>
      </li>
      <li class="one_third">
        <article class="bgded overlay" style="background-image:url('images/tasik.jpg');">
          <div class="txtwrap">
            <h6 class="heading">Tasikmalaya</h6>
            <p>Tasikmalaya is a city in West Java, Indonesia. The city is sometimes dubbed "the City of a Thousand Pesantrens" for its abundance of Islamic boarding schools [&hellip;]</p>
            <footer><a href="#">More &raquo;</a></footer>
          </div>
        </article>
      </li>
      <li class="one_third first">
        <article class="bgded overlay" style="background-image:url('images/garut.jpg');">
          <div class="txtwrap">
            <h6 class="heading">Garut</h6>
            <p>Garut is an Old Dutch hill station and a characteristic Sundanese town in the highlands, surrounded by mountains, volcanoes, and crystal clear lakes. Garut's Hindu temples and hot  [&hellip;]</p>
            <footer><a href="#">More &raquo;</a></footer>
          </div>
        </article>
      </li>
      <li class="one_third">
        <article class="bgded overlay" style="background-image:url('images/cirebon.jpg');">
          <div class="txtwrap">
            <h6 class="heading">Cirebon</h6>
            <p>Traveling northeast from Bandung towards the coast, the seaport of Cirebon offers a wealth of culture and history. Situated on the border of West and Central Java, it is home to a combination of [&hellip;]</p>
            <footer><a href="#">More &raquo;</a></footer>
          </div>
        </article>
      </li>
      <li class="one_third">
        <article class="bgded overlay" style="background-image:url('images/bogor.jpg');">
          <div class="txtwrap">
            <h6 class="heading">Bogor</h6>
            <p>A bit further away from Bandung about 4,5 hours drive is Bogor, also called the city of rain. Previously known as "Buitenzorg" (Sans soucis or Without worries), during the Dutch colonial era [&hellip;]</p>
            <footer><a href="#">More &raquo;</a></footer>
          </div>
        </article>
      </li>
    </ul>
    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper bgded overlay" style="background-image:url('images/angklung.jpeg');">
  <section class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="sectiontitle center">
      <h3 class="heading">Event and Festival</h3>
      <p>The Event and Festival that will be present in West Java</p>
    </div>
    <ul class="nospace group center">
      <li class="one_third first">
        <article><a href="#">
          <h6 class="heading font-x1">ASIAN GAMES 2018: KNOW THE VENUE FOR EACH SPORT COMPETITION</h6></a>
          <p>The long awaited Asian Games 2018 is set to be held in Jakarta, capital city of Indonesia, and Palembang, capital of the province of South Sumatra as co-host,  from 18 August to 2 September 2018.[&hellip;]</p>
          <footer><a href="#">Read More &raquo;</a></footer>
        </article>
      </li>
      <li class="one_third">
        <article><a href="#">
          <h6 class="heading font-x1">Thrilling Nias Pro 2018 World Surf League Qualifying Series and Incredible Ya’ahowu Festival</h6></a>
          <p>In the second part of this year, the exotic tropical island of Nias in North Sumatra will come alive with incredible excitement on the holding of not one but two really special events: The Nias Pro 2018 World Surf League Qualifying Series on August 24th to 28th 2018, and The Ya’ahowu Festival on November 16th to 20th, 2018. [&hellip;]</p>
          <footer><a href="#">Read More &raquo;</a></footer>
        </article>
      </li>
      <li class="one_third">
        <article><a href="#">
          <h6 class="heading font-x1">World’s Top Surfers Compete to Conquer Challenging Waves at West Sumbawa AMNT Pro 2018</h6></a>
          <p>The world’s top wave riders are currently in Indonesia’s West Nusa Tenggara Province to compete to be the best in conquering the most challenging waves at Yoyo’s Spot at Sekongkang Sub-district,  in the West Sumbawa AMNT Pro 2018 Surfing Competition, taking place from 8th to 12th  [&hellip;]</p>
          <footer><a href="#">Read More &raquo;</a></footer>
        </article> 
      </li>
    </ul>
    <br>
    <center>
  <a class="btn" href="#">More Events and Festivals</a>
  </center>
  </section>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->


<div id="googleMap" style="width:100%;height:500px;"></div>

<script>
function myMap() {
var mapProp= {
    center:new google.maps.LatLng(-6.914744, 107.609810),
    zoom:10,
};
var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyANUvaKs9WmrKVO6t7jGu6Ud1bS0VYTLR8&callback=myMap"></script>
<div class="wrapper bgded overlay" style="background-image:url('images/batik.png');">
  <section class="hoc container clear"> 
  <div class="sectiontitle center">
      <h3 class="heading">News</h3>
      <p>The Event and Festival that will be present in West Java</p>
    </div>
    <?php
      $json = file_get_contents("https://newsapi.org/v2/everything?q=tarian&from=2018-09-01&sortBy=publishedAt&apiKey=5b125f0256bf4afab3c7d89f897e6c53");
                          
                    $data = json_decode($json);

                    $array = array("0","1","2");

                    $arrlength = count($array);
                   
                    for($x = 0; $x < $arrlength; $x++) { 
                     $sumber = print_r($data->articles[$array[$x]]->url, true);
                     $a = print_r($data->articles[$array[$x]]->urlToImage,true);
                    ?>

    <ul class="nospace group center">
      <li class="">
        <article><a>

          <h6 class="heading font-x1"><?php echo $data->articles[$array[$x]]->title ?></h6></a>
          <p><img class="imghover" style="width: 40%" src='<?php echo $a ?>'></p>
          <p><?php echo $data->articles[$array[$x]]->content ?></p>
          <p><a href="<?php echo $sumber ?>">Lihat Selengkapnya</a></p>
          <hr>
        </article>
      </li>

      <?php }      ?>   
</ul>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

    <!-- ################################################################################################ -->
  </section>
</div>
</div>
<div class="wrapper row3">
  <section class="hoc container clear">
    <div class="sectiontitle center">
      <h6 class="heading">Pave your way to amazing stories with us</h6>
      <p>Discover the west java with us</p>
    </div>
    <div class="group team">
      <figure class="one_quarter first"><a class="imgover" href="#"><img src="images/dito.png" alt=""></a>
        <figcaption>
          <h6 class="heading">A. Doe</h6>
          <em>Chief Executive Officer</em>
          <footer>
            <ul class="faico clear">
              <li><a class="faicon-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a class="faicon-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
              <li><a class="faicon-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
              <li><a class="faicon-vk" href="#"><i class="fa fa-vk"></i></a></li>
            </ul>
          </footer>
        </figcaption>
      </figure>
      <figure class="one_quarter"><a class="imgover" href="#"><img src="images/dito.png" alt=""></a>
        <figcaption>
          <h6 class="heading">Primadi Anindito</h6>
          <em>UI/UX Designer</em>
          <footer>
            <ul class="faico clear">
              <li><a class="faicon-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a class="faicon-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
              <li><a class="faicon-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
              <li><a class="faicon-vk" href="#"><i class="fa fa-vk"></i></a></li>
            </ul>
          </footer>
        </figcaption>
      </figure>
      <figure class="one_quarter"><a class="imgover" href="#"><img src="images/dito.png" alt=""></a>
        <figcaption>
          <h6 class="heading">C. Doe</h6>
          <em>Marketing Manager</em>
          <footer>
            <ul class="faico clear">
              <li><a class="faicon-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a class="faicon-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
              <li><a class="faicon-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
              <li><a class="faicon-vk" href="#"><i class="fa fa-vk"></i></a></li>
            </ul>
          </footer>
        </figcaption>
      </figure>
      <figure class="one_quarter"><a class="imgover" href="#"><img src="images/dito.png" alt=""></a>
        <figcaption>
          <h6 class="heading">D. Doe</h6>
          <em>Production Manager</em>
          <footer>
            <ul class="faico clear">
              <li><a class="faicon-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a class="faicon-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
              <li><a class="faicon-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
              <li><a class="faicon-vk" href="#"><i class="fa fa-vk"></i></a></li>
            </ul>
          </footer>
        </figcaption>
      </figure>
    </div>
    <!-- ################################################################################################ -->
  </section>
</div>
<div>
<div class="wrapper row4">
  <footer id="footer" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div class="one_third first">
      <h6 class="heading">Our Location</h6>
      <ul class="nospace btmspace-30 linklist contact">
        <li><i class="fa fa-map-marker"></i>
          <address>
          Perumahan Permata Buah Batu, Blok C64, Bandung, Jawa Barat
          </address>
        </li>
        <li><i class="fa fa-phone"></i> +62822 1834 7960</li>
        <li><i class="fa fa-envelope-o"></i> cabskuy@gmail.com</li>
      </ul>
      <ul class="faico clear">
        <li><a class="faicon-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
        <li><a class="faicon-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
        <li><a class="faicon-dribble" href="#"><i class="fa fa-dribbble"></i></a></li>
        <li><a class="faicon-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
        <li><a class="faicon-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
        <li><a class="faicon-vk" href="#"><i class="fa fa-vk"></i></a></li>
      </ul>
    </div>
    <div class="one_third">
      
    </div>
    <div class="one_third">
      <h6 class="heading">Call Us</h6>
      <p class="nospace btmspace-30">Enter your email address and your name to receive our information</p>
      <form method="post" action="#">
        <fieldset>
          <legend>Newsletter:</legend>
          <input class="btmspace-15" type="text" value="" placeholder="Name">
          <input class="btmspace-15" type="text" value="" placeholder="Email">
          <button type="submit" value="submit">Submit</button>
        </fieldset>
      </form>
    </div>
    <!-- ################################################################################################ -->
  </footer>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row5">
  
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<script src="layout/scripts/jquery.flexslider-min.js"></script>
</body>
</html>