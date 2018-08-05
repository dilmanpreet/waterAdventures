<?php
session_start();
$local_variable = $_SESSION['lastid'];
appenddata($local_variable);
function appenddata($lastid) {
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
        $sql = "Select * from userfeed where id > '$lastid'";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            $mydata=[];
            $lastid = 0;
            while($row = $result->fetch_assoc()) {
                // creating all variables here
                $Name = $row["username"];
                $ID = $row["id"];
                $ChatTime = $row["chattime"];
                $message = $row["usermessage"];
                $lastid = $ID;
                array_push($mydata,$Name,$ID,$ChatTime,$message);
            }
            $myJSON = json_encode($mydata);
            echo $myJSON;
            $_SESSION['lastid'] = $lastid;
        }
    $conn->close();
    
}
?>