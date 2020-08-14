<?php

require_once 'config.php';

try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (! isset($accessToken)) {
  if ($helper->getError()) {
    header('HTTP/1.0 401 Unauthorized');
    echo "Error: " . $helper->getError() . "\n";
    echo "Error Code: " . $helper->getErrorCode() . "\n";
    echo "Error Reason: " . $helper->getErrorReason() . "\n";
    echo "Error Description: " . $helper->getErrorDescription() . "\n";
  } else {
    header('HTTP/1.0 400 Bad Request');
    echo 'Bad request';
  }
  exit;
}

try{
	//Returning Facebook\FacebookResponse object
	$response = $fb->get('/me?fields=id,name,email, first_name, last_name,picture', $accessToken->getValue());
}catch(Facebook\Exceptions\FacebookResponseException $e){
	echo 'Graph returned an error: ' . $e->getMessage();
	exit;
}

$link = mysqli_connect("127.0.0.1", "root", "", "easyequip");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}


$fbUserData = $response->getGraphUser()->asArray();

if(!empty($fbUserData)){
	echo "Loading, please wait...";
		
	$userid=$fbUserData['id'];
	$name=$fbUserData['name'];
	$email=$fbUserData['email'];
	

	$_SESSION['id'] = $userid;
	$_SESSION['name'] = $name;

	$slct = mysqli_query($link,"SELECT * FROM `tbl_user`") or die ("Cant select data from Database".mysql_error());
	$record = mysqli_fetch_array($slct,MYSQLI_BOTH);
		 	
	
	if ($record['u_id'] != $userid){
		$qry = mysqli_query($link,"Insert into tbl_user( u_id, name, email) value('$userid','$name', '$email')");
	
		if ($qry == 1){
			header ("Refresh: 3; url = home.php");
		}
		else {
			echo 'Facebook login failed';
			header ("Refresh: 3; url = index.php");
		}	
	}
	else {
		$qry = mysqli_query($link,"UPDATE `tbl_user` SET `name`='$name',`email`='$email' WHERE `u_id`='$userid'");
	
		if ($qry == 1){
			header ("Refresh: 3; url = home.php");
		}
		else {
			echo 'Facebook login failed';
			header ("Refresh: 3; url = index.php");
		}
	}
}

else{
	echo 'Some Problem Occured';
}

// The OAuth 2.0 client handler helps us manage access tokens
$oAuth2Client = $fb->getOAuth2Client();

// Get the access token metadata from /debug_token
$tokenMetadata = $oAuth2Client->debugToken($accessToken);
//echo '<h3>Metadata</h3>';
//var_dump($tokenMetadata);

// Validation (these will throw FacebookSDKException's when they fail)
$tokenMetadata->validateAppId($app_id); // Replace {app-id} with your app id
// If you know the user ID this access token belongs to, you can validate it here
//$tokenMetadata->validateUserId('123');
$tokenMetadata->validateExpiration();

if (! $accessToken->isLongLived()) {
  // Exchanges a short-lived access token for a long-lived one
  try {
    $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
  } catch (Facebook\Exceptions\FacebookSDKException $e) {
    echo "<p>Error getting long-lived access token: " . $e->getMessage() . "</p>\n\n";
    exit;
  }

  echo '<h3>Long-lived</h3>';
  var_dump($accessToken->getValue());
}

$_SESSION['fb_access_token'] = (string) $accessToken;

// User is logged in with a long-lived access token.
// You can redirect them to a members-only page.
//header('Location: https://example.com/members.php');
//echo $output;
?>
