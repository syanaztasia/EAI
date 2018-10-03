<?php
require_once 'Facebook/autoload.php'; // load file autoload dari facebook

$appId     = "438439236682905"; // replace dengan app id yang kamu dapatkan di facebook developer
$appSecret = "36e328e57b0290675e7ad44a7830091c"; // replace dengan secret key yang kamu dapatkan di facebook developer

class db {

  function __construct() {
    $dbhost = "localhost"; // replace dengan database host kamu
    $dbuser = "root"; // replace dengan databae user kamu
    $dbpass = ""; // replace dengan database pass kamu
    $dbname = "cabskuy"; // replace dengan database name kamu
    $this->mysqli = new mysqli($dbhost,$dbuser,$dbpass,$dbname );
    if(mysqli_connect_error()) {
      die("Tidak Bisa Konek Ke Database Karena : ". mysqli_connect_errno());
    }
  }

  function redirect($url) {
    echo "<script type='text/javascript'>window.top.location='$url';</script>";
  }
} 