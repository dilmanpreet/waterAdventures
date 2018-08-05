<!Doctype>
<html>
<head>
    <title>Log In Page</title>
    
    <link rel="stylesheet/less"  href="styleSheet.less" />
    <script src="http://cdnjs.cloudflare.com/ajax/libs/less.js/2.7.2/less.min.js"></script>
</head>
<body>
    <div class = "login" >
        <div> Welcome to Water adventurees </div>
    
  
        <div>
        <form action="#" method="post">
            <br>
			UserName :  <input type="text" name="usernames" placeholder="UserName"><br>
			Password :  <input type="text" name = "passwords" placeholder="Password"><br>
            <input type="submit" name="login" value="Log IN" id = "Aggregationone"/>
            <input type="submit" name="CreateAccount" value="Create New Account" id = "Aggregationone"/>
        </form>
    </div>
    </div>
    
    </div>
  </div>

    <?php
    session_start();
    include "loginsuccess.php";
    $_SESSION[$loggedInKey] = false;
    if (isset($_POST['login'])) {
        if(isset($_POST['usernames'])  && $_POST['usernames'] != "")
        {   
            if( isset($_POST['passwords']) && $_POST['passwords'] != ""){
                printname($_POST['usernames'],$_POST['passwords']);
            }
            else {
                echo "<script type=\"text/javascript\">window.alert('Please fill password')";
                echo '</script>';
            }
        }
        else {
            echo "<script type=\"text/javascript\">window.alert('Please fill username')";
            echo '</script>';
        }
    }
    if (isset($_POST['CreateAccount'])) {
        if(isset($_POST['usernames'])  && $_POST['usernames'] != "")
        {   
            if( isset($_POST['passwords']) && $_POST['passwords'] != ""){
                create($_POST['usernames'],$_POST['passwords']);
            }
            else {
                echo "<script type=\"text/javascript\">window.alert('Please fill password')";
                echo '</script>';
            }
        }
        else {
            echo "<script type=\"text/javascript\">window.alert('Please fill username')";
            echo '</script>';
        }
        
    }
    function create($user, $pass){
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
            $sql = "CALL createAccount('$user','$pass')";

            $result = $conn->query($sql);
            echo "<script type=\"text/javascript\">window.alert('Your Account is created')";
            echo '</script>';
            
        $conn->close();
    }
    function printname($user, $pass){
        loginCheck($user,$pass);
    }
    ?>
</body>
</html>