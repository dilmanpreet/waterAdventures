<?php
session_start();
echo"heellllloooo test";
if (isset($_POST['name'])) {
        if (isset($_POST['message'])){
        $name = $_POST['name'];
        $message = $_POST['message'];
        if($name != ""){
            if($message != ""){
                division($name,$message);
            }
        }
         
    }
}

    function division($name,$usermessage) {
        $username = "123";
        $password = "123";
        $servername = "localhost";
        $dbname = "waterAdventures";
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }
        //find the weapon that's in all the orders



        $sql ="CALL submitmessage('$name','$usermessage')";

        $result = $conn->query($sql);
        
    $conn->close();
    }
    ?>