<?php
//Once again, we use the same setup code
require_once 'sqlhelper.php';
require_once './vendor/autoload.php';  //include the twig library.
$twig = setupMyTwigEnvironment(); //moved twig setup code to it's own function, makes code more readable
$conn = connectToMyDatabase();

$store = $_GET["usersp"];
$result = $conn->query("call user_table(\"$usersp\")");

if($result){
    $catalog = $result->fetch_all(MYSQLI_ASSOC); 
    $template = $twig->load("loginsuccess.twig.html");
    echo $template->render(array("catalog"=>$catalog, "usersp"=>$userp));

} else {
    dumpErrorPage($twig);
}

?>