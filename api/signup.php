<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/__lib/main.php';

header('Content-Type: application/json');

    $name = $_POST['name'];
    $username = $_POST['username'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $regid = rand(0000,9999);

    $result = user::signup($name, $username, $age, $gender, $dob, $email, $phone, $password, $regid);

    if($result === true)
    {
            $data = array(
                "status" => "Signup Success!"
            );
            $json = json_encode($data);
            return $json;
    }
    else{
        $data = array(
            "status" => "Signup Failed!"
        );
        $json = json_encode($data);
        return $json;
    }