<?php

if(htmlspecialchars($_SERVER['REQUEST_METHOD']) == 'POST'){
//grab values

// echo 'hi';
$username = htmlspecialchars($_POST['username']);
$enteredPwd = htmlspecialchars($_POST['pwd']);
// $email = htmlspecialchars($_POST['email']);

require_once 'dbh.inc.php';
// require_once 'pwdhash.inc.php';



$hashedPwd = hashp($enteredPwd);
$hashedEmail = dataHash($email);


$query = "select * from newusers where username=?";

try {
    
    $stmnt = $pdo->prepare($query);
    $stmnt ->execute([$username]);
    $result = $stmnt->fetchAll(PDO::FETCH_ASSOC);

    if(!empty(htmlspecialchars($result))){
          
    }

} catch (PDOException $e ) {
    die("Exception : ". $e->getMessage());
}
  



} else 
{
    header('Location: ../index.php');
}
