<?php 
session_start();

require_once 'includes/dbh.inc.php';
require_once 'vendor/autoload.php';


// init configuration
$clientID = '403353613423-c5kliuetni2kmb1ufmg0ds85s1ltk1mt.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/project/LoginWithGoogle.php';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");



if (isset($_GET['code'])) {


    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);
    // get profile info
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();

    // echo "<pre>";
    // print_r($google_account_info);

    $userInfo = [
      'first_name' => $google_account_info['givenName'],
      'last_name' => $google_account_info['familyName'],
      'email' => $google_account_info['email'],
      'token' => $google_account_info['id']
    ];

    $sql = "SELECT * FROM users WHERE usersEmail='{$userInfo['email']}'";
    $result = mysqli_query($conn, $sql);


    if(mysqli_num_rows($result)>0){

        $row = mysqli_fetch_array($result);


if($row['verify_status'] == '0'){
    
    $_SESSION["status"] = 'Invalid Login';
    header("location: login.php?=notauthenticated");
}else{
    $_SESSION["verify"] = true;

if($row['usersType'] == 'Admin'){

    $_SESSION["Admin"] = true;
    $_SESSION['auth_user'] = [
        'Admin_img' => $row['faculty_images'],
        'usersUid' => $row['usersUid'],
        'first_name' => $row['first_name'],
        'last_name' => $row['last_name'],
        'users_Email' => $row['usersEmail'],
        'Contact' => $row['Contact'],
        'user_Address' => $row['Address']
    ];

    header("location: admin");

   

}else{
    $_SESSION['auth_user'] = [
        'usersUid' => $row['usersUid'],
        'first_name' => $row['first_name'],
        'last_name' => $row['last_name'],
        'users_Email' => $row['usersEmail'],
        'Contact' => $row['Contact'],
        'user_Address' => $row['Address']
    ];
    header("location: admin");
}

}


    }else{
        $_SESSION["status"] = 'You dont have an account';
        header("location: login.php?=asdsad");
    }



}
