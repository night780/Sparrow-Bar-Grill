<?php

function validString($string)
{
    return !empty($string);
}

function validPhone($phone) {
    $phoneOnlyNums = preg_replace("/[^0-9]/", '', $phone);
    if (strlen($phoneOnlyNums) == 11 || strlen($phoneOnlyNums) == 10) return true;
    return false;
}

function check_login($user = "", $pass = ""){
    $notvalid = false;

    if($user != "admin"){
        $notvalid = true;
    }

    if($pass != "@dm1n"){
        $notvalid = true;
    }

    return !$notvalid;
}

function check_user($user = ""){
    $notvalid = false;

    if($user != "admin"){
        $notvalid = true;
    }

    return !$notvalid;
}

function check_pass($pass = ""){
    $notvalid = false;

    if($pass != "@dm1n"){
        $notvalid = true;
    }

    return !$notvalid;
}

function check_sess($user = ""){
    $notvalid = false;

    if($user != 'admin'){
        $notvalid = true;
    }

    return !$notvalid;
}