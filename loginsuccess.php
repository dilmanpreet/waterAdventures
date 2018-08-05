<?php
$loggedInKey = "loggedin";
include_once 'vendor/autoload.php';


function login($usr, $pwd){
    global $loggedInKey;
    $_SESSION[$loggedInKey] = false;


    $servername = "localhost";
    $username = "123";
    $password = "123";
    $dbname = "waterAdventures";
    
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if($conn->connect_errno){
        //Should log something here, haven't covered logging yet.
        $_SESSION[$loggedInKey] = false;//If I can't connect to the server, you're not logged in
    }else {
        $sql ="call checklogin('$usr','$pwd')";
        echo $sql;
        $result = $conn->query($sql);
        if($result){
            $row = $result->fetch_assoc();
            if($row["username"] ==  '123'){
                $_SESSION[$loggedInKey] = true;
                 die();
             } 
            else if($row["username"] ==  $usr){
               $_SESSION[$loggedInKey] = true;
            } 
        } else {
            echo "query failed";
        }
   }
    
    $conn->close();

}
//expected date format
function isLoggedIn(){
    global $loggedInKey;
    if(!array_key_exists($loggedInKey,$_SESSION)){
        return false;
    }

    return $_SESSION[$loggedInKey];
}
function loginRouter($doLogInCheck = "false"){
    global $loggedInKey;
    //Cached results
    if(!isLoggedIn()){
        header('location: login.php');
        echo "Login worked";
        die();
    }
    else if ($doLogInCheck == "true") {
        header('location: error404.php');
    }
}   


function loginCheck($user,$pass){
    echo " login check works ";
    global $loggedInKey;
    
        $_SESSION[$loggedInKey] = false;
        login($user, $pass);
    
    if (!array_key_exists($loggedInKey, $_SESSION)) {
        $_SESSION[$loggedInKey] = false;
    }
    loginRouter("true");
}

?>