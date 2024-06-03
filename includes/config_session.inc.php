<?php


ini_set('session.use_only_cookies',1);
ini_set('session.use_strict_mode',1);
session_set_cookie_params([

    'lifetime'=>1800,
    'domain' => 'localhost',
    'path' => '/',
    'secure' => true,
    'httponly' => true 
]);

session_start();
// session_regenerate_id(true);

if(!isset($_SESSION['last_regeneration'])){// checking whether the varable is set

    regenerateSessionId(); 

}else{

    $interval =60* 25;//time in seconds

    if(time()-$_SESSION['last_regeneration'] >= $interval){
        regenerateSessionId();
     } 
}

function regenerateSessionId(){
    session_regenerate_id(true);  
    $_SESSION['last_regeneration']= time();//resets the variable

}