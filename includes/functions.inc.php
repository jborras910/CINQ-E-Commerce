<?php

session_start();
    $conn = mysqli_connect('localhost','root', '', 'project01');
      
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '../PhpMailer/src/Exception.php';
    require '../PhpMailer/src/PHPMailer.php';
    require '../PhpMailer/src/SMTP.php';

      
    function sendemail_verify($first_name, $email, $verify_token){

        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth= true;
        $mail->Username = 'jborras910@gmail.com';
        $mail->Password = 'gathrquaabwitxdb';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('qjaborras01@tip.edu.ph', $first_name);
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Email verification from CINQ';
        $_email_template = "
        <div style='text-align:center;'>
        <br> <br>
        <h3>Hi $first_name You have Registered with CINQ</h3>
        <h3>Your verify token is $verify_token</h3>
        <h3 style=' margin-bottom:20px;'>Please verify your email address by clicking the link below:</h3>
        <a style=' border: 1px solid aliceblue !important; background-color: #01406b !important; color: aliceblue !important; padding:10px; font-size:20px;'
            href='http://localhost/project/verify_email.php?token=$verify_token'>Activate my account</a>
        </div>
        ";
        
        $mail->Body = $_email_template;
        $mail->send();

        $_SESSION['status'] =  'Please verify your email address that you have register';
        header("location: ../signup.php?error=none");

    }



function emptyInputSignup($first_name, $last_name,$contact,$address, $email, $username, $pwd, $pwdRepeat){
    $result;
    if(empty($first_name) || empty($last_name) || empty($contact) || empty($address) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)){
        
      
        $result = true;

    }else{
        $result = false;
    }
    return $result;
}
function firstnameInvalid($first_name){
    $result;
    if (strlen($first_name) < 4){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}
function lastnameInvalid($last_name){
    $result;
    if (strlen($last_name) < 4){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function invalidUid($username) {
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username) ){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function invalidEmail($email) {
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function pwdShort($pwd){
    $result;
    if(strlen($pwd) < 7){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}


function pwdMatch($pwd, $pwdRepeat) {
    $result;
    if($pwd !== $pwdRepeat){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}




function uidExists($conn, $username, $email){
   $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
   $stmt = mysqli_stmt_init($conn);
   if(!mysqli_stmt_prepare($stmt, $sql)){
    header("location: ../signup.php?error=stmtfailed");
    exit();
   }

   mysqli_stmt_bind_param($stmt, "ss", $username, $email);
   mysqli_stmt_execute($stmt);

   $resultData = mysqli_stmt_get_result($stmt);

   if($row = mysqli_fetch_assoc($resultData)){
        return $row;
   }else{
       $result = false;
       return $result;
   }

   mysqli_stmt_close($stmt);

}


function createUser($conn, $first_name, $last_name,$contact,$address, $email, $username, $pwd, $userstype){

    $verify_token = md5(rand());

    $sql = "INSERT INTO users (first_name, last_name, Contact, Address, usersEmail, usersUid, usersPwd, userstype,verify_token) VALUES (?, ?, ?, ?, ?, ?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
     header("location: ../signup.php?error=stmtfailed");
     exit();
    }
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "sssssssss", $first_name, $last_name,$contact,$address, $email, $username, $hashedPwd, $userstype,$verify_token);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);


    sendemail_verify("$first_name", "$email","$verify_token");



 }




 function emptyInputLogin($username, $pwd){
    $result;
    if(empty($username) || empty($pwd)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $pwd){
    $uidExists = uidExists($conn, $username, $username);

    if($uidExists === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if($checkPwd == false){
        header("location: ../login.php?error=password_erorr");
        exit();
    }else if($checkPwd == true){
if($uidExists["verify_status"] == '0'){
    $_SESSION["status"] = 'Please verify your account';
    header("location: ../login.php");
}else{
    $_SESSION["verify"] =  true;
  
    if($uidExists["usersType"] == "User"){
        $_SESSION['auth_user'] = [
            'usersUid' => $uidExists["usersUid"],
            'users_Email' => $uidExists["usersEmail"],
            'first_name' => $uidExists["first_name"],
            'last_name' => $uidExists["last_name"],
            'user_contact' => $uidExists["Contact"],
            'user_Address' => $uidExists["Address"]

        ];
        header("location: ../index.php");
        exit();
    }else if ($uidExists["usersType"] == "Admin"){
        $_SESSION["Admin"] = true;
        $_SESSION['auth_user'] = [
            'usersUid' => $uidExists["usersUid"],
            'users_Email' => $uidExists["usersEmail"],
            'first_name' => $uidExists["first_name"],
            'last_name' => $uidExists["last_name"],
            'user_contact' => $uidExists["Contact"],
            'user_Address' => $uidExists["Address"],
            'Admin_img' => $uidExists["faculty_images"]

        ];

        // $_SESSION["Admin"] = $uidExists["usersType"];
        // $_SESSION["Admin_name"] = $uidExists["first_name"];
        // $_SESSION["admin_last_name"] = $uidExists["last_name"];
        // $_SESSION["Admin_img"]  = $uidExists["faculty_images"];
        header("location: ../admin");
        exit();
    }
}

      
   
    }
}
