<?php

//You need this after running a SQL query that
//calls a stored procedure. For some reason, 
//procedure calls return multiple results, so the 
//extra result needs to be cleared.
//
//Example:
// $result = $conn->query("call getWeak('Ivysaur')");
// clearConnection($conn);

function clearConnection($mysql){
    while($mysql->more_results()){
       $mysql->next_result();
       $mysql->use_result();
    }
}
//helper function
function wrap($tag,$value) { //expect strings for both parameters
    return "<$tag>$value</$tag>";
}

//DB setup for this web-app
function connectToMyDatabase(){
    $user = 'CPSC2030';
    $pwd = 'CPSC2030';
    $server = 'localhost';
    $dbname = 'user_table';
 
    $conn = new mysqli($server, $user, $pwd, $dbname);
    return $conn;
}
//twig setup for this web-app
function setupMyTwigEnvironment(){
    $loader = new Twig_Loader_Filesystem('./templates'); //set to load from the ./templates directory
    $twig = new Twig_Environment($loader); 
    return $twig;  
}

function dumpErrorPage($twig){
    $template = $twig->load("error.twig.html");
    echo $template->render(array("message"=>"SQL errorm query failed"));
}
?>

