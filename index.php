<?php
    require_once 'includes/signupView.inc.php';

    require_once 'includes/config_session.inc.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login/signup</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/reset.css">
</head>
<body>

    <div class="login">
        <h1>LOGIN</h1>
        <br>
        <form action="">
            <fieldset>
                <label for="username">username</label><br>
                <input type="text" id="username" name="username" placeholder="Arthur Kagwa"><br><br>
                <label for="pwd">Password</label><br>
                <input type="text" name="pwd" id="pwd" placeholder="Password"><br><br>
                <input type="submit" value="LOGIN">

            </fieldset>

        </form>
    </div>

    <div class="login">
        <h1>SIGNUP</h1>
        <br>
        <form action="includes/signup.inc.php" method='post'>
            <fieldset>
                <?php signupInputs();?>
                <input type="submit" value="SIGNUP">
            </fieldset>

            
        </form>
        <?php
                // echo "ufy";
                checkSignupErrors();
        ?>



    </div>
    
</body>
</html>