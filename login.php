<?php
   

   require_once 'sqlhelper.php';
   require_once './vendor/autoload.php';  //include the twig library.
   $loader = new Twig_Loader_Filesystem('./templates'); //set to load from the ./templates directory

    // manually delete the cache
    $twig = new Twig_Environment($loader);

    //Sql setup
    
   $conn = connectToMyDatabase();
   $result = $conn->query("call user_list()");

   
   //load a different page, if there is an error
   if($result){
      $table = $result->fetch_all(MYSQLI_ASSOC); 
      //setup twig
      $template = $twig->load('login.twig.html');
 
      //call render 
      echo $template->render(array("user"=>$table));

      $conn->close(); //clean up ,autoclose 
   }else {
    
    // full error page
    $template = $twig->load("error.twig.html");
    echo $template->render(array("message"=>"SQL error query failed"));
   }
?>

