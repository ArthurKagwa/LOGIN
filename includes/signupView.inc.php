<?php
declare(strict_types=1);


function signupInputs(){
    if(isset($_SESSION['sigupData']['username']) && !isset($_SESSION['errorsSignup']['usernameTaken'])){
        echo '<label for="username">username</label><br>';
        echo '<input type="text" id="username" name="username" placeholder="Arthur Kagwa"value="';
        echo $_SESSION["sigupData"]["username"];
        echo '"><br><br>';
    unset($_SESSION['sigupData']);


        
    }else{
        echo '<label for="username">username</label><br>';
        echo '<input type="text" id="username" name="username" placeholder="Arthur Kagwa"><br><br>';
        
    }
    echo '<label for="pwd">Password</label><br>';
    echo '<input type="text" name="pwd" id="pwd" placeholder="Password"><br><br>';
    if(isset($_SESSION['sigupData']['email']) && !isset($_SESSION['errorsSignup']['registeredEmail']) && !isset($_SESSION['errorsSignup']['invalidEmail'])){

        echo '<label for="pwd">Email</label><br>';
        echo '<input type="text" name="email" id="email" placeholder="E-mail" value="';
        echo $_SESSION["sigupData"]["email"];
        echo '"><br><br>';
    unset($_SESSION['sigupData']);

    }else{
        echo '<label for="pwd">Email</label><br>';
        echo '<input type="text" name="email" id="email" placeholder="E-mail"><br><br>';
    }
}
function checkSignupErrors(){
    if(isset($_SESSION['errorsSignup'])){

        $errors = $_SESSION['errorsSignup'];

        foreach ($errors as $error => $errorMessage) {
            echo "<p class='form-error'>$errorMessage</p>";
        }
        unset($_SESSION['errorsSignup']);

    }else{
        if(isset($_GET['signup']) && $_GET['signup']=='success'){
            echo "<p> Successfull signup</p>";
            unset($_GET['signup']);
        }
    }
    
    
} 