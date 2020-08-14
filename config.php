<?php
if(!session_id()){
	session_start();
}

require_once 'Facebook/autoload.php';

$app_id = '507868466373527';
$app_secret = 'ad81beb63bce3acf6f1e36442683869f';
$permissions = ['email']; // Optional permissions
$callbackUrl = 'http://localhost/EasyEquip/callback.php'; 

$fb = new Facebook\Facebook([
  'app_id' => $app_id, // Replace {app-id} with your app id
  'app_secret' => $app_secret,
  'default_graph_version' => 'v2.2'
  ]);

$helper = $fb->getRedirectLoginHelper();

$loginUrl = $helper->getLoginUrl($callbackUrl, $permissions);

?>