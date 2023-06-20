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
    $pass = $_POST['password'];
    $regid = rand(0000,9999);

    $result = user::signup($name, $username, $age, $gender, $dob, $email, $phone, $pass, $regid);

    if($result)
    {
            $success = array(
                "status" => "success"
            );
            $jsonSuccess = json_encode($success);
            echo $jsonSuccess;
    }
    else{
        $data = array(
            "status" => "Signup Failed!"
        );
        $json = json_encode($data);
        echo $json;
    }