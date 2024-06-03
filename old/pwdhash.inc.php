<?php

function hashp($pwd){

    $options = [
        'cost' => 12
    ];
    return password_hash($pwd,PASSWORD_BCRYPT,$options);
}

function verifyp($enterdPwd,$savedPwd){
   return password_verify($enterdPwd,$savedPwd);
}

function dataHash($data){
    $salt = bin2hex(random_bytes(16));
    $pepper = "YooIGotPepper";

    $toHash= $data.$salt.$pepper;
   
    return hash("sha256",$toHash);
}

// echo dataHash("yugfw");