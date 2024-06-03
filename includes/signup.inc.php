<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
//grab values

// echo 'hi';
$username = $_POST['username'];
$pwd = $_POST['pwd'];
$email = $_POST['email'];

try {
    require_once 'dbh.inc.php';
    require_once 'signupModel.inc.php';
    require_once 'signupControl.inc.php';
   



    //ERR HANDLERS
    $errors=[];

    if(isInputEmpty($username,$pwd,$email)){
        $errors['emptyInputs']= "Enter all inputs!";
    }
    if(!isEmailValid($email)){
        $errors['invalidEmail']= "Enter valid email!";

    }

    if(isUsernameTaken($pdo, $username)){
        $errors['usernameTaken']= "Username taken! Enter a new username!";

    }
    if(isEmailRegistered($pdo,$email)){
        $errors['registeredEmail']= "Email already registered! Sign in";

    }

    require_once 'config_session.inc.php';

    if ($errors) {
// var_dump($_SESSION);
        
        $_SESSION['errorsSignup'] = $errors;
        $signupData=[
            'username'=>$username,
            'email' => $email
        ];
        $_SESSION['sigupData']=$signupData;
        header('Location: ../index.php');
        die();

    }
    
    insertUser( $pdo,  $username,  $pwd, $email);
    header('Location: ../index.php?signup=success');
    $pdo=null;
    die();
    
    
    
} catch (PDOException $e ) {
    echo "Exception! : ".$e->getMessage();
}

} else 
{
    header('Location: ../index.php');
    die();
}

