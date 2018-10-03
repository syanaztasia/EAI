<?php
session_start();
require_once 'config.php';
$fb = new Facebook\Facebook([
  'app_id' => $appId,
  'app_secret' => $appSecret,
  'default_graph_version' => 'v3.1',
]);

$helper = $fb->getRedirectLoginHelper();
$loginUrl = $helper->getLoginUrl("https://localhost/eai/proses.php",array('scope' => 'email'));
header("location: " . $loginUrl);