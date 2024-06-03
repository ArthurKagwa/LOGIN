<?php
declare(strict_types=1);

// model interacts with the database
function getEmail( object $pdo , string $email){
    $query = "select email from newusers where email=?;";
    $stmt = $pdo ->prepare($query);
    $stmt -> execute([$email]);
    $result = $stmt -> fetch(PDO::FETCH_ASSOC);

    return $result;  
}


function getUsername( object $pdo , string $username){
    $query = "select username from newusers where username=?;";
    $stmt = $pdo ->prepare($query);
    $stmt -> execute([$username]);
    $result = $stmt -> fetch(PDO::FETCH_ASSOC);

    return $result; 
}

function insertUser(object $pdo, string $username, string $pwd,string $email){
    
    $options=[
        'cost'=>12
    ] ;
    $hashedPassword = password_hash($pwd,PASSWORD_BCRYPT,$options);
    $query = "insert into newusers(username,pwd,email) values(?,?,?);";
    $stmt = $pdo->prepare($query);
    // echo "8gu7fy"; 

    $stmt -> execute([$username,$hashedPassword,$email]);
    // echo "8gu7fy";


    
}
