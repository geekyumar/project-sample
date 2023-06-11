<?php

class user
{

    public static function signup($name, $username, $age, $gender, $dob, $email, $phone, $password, $regid)
    {
        $conn = database::getConnection();

        $sql1 = "SET @@session.time_zone = '+05:30'";

        $sql2 = "INSERT INTO `users` (`name`,`username`, `age`, `gender`, `dob`, `email`,`phone`,`reg_id`)
    VALUES ('$name','$username', '$age','$gender','$dob','$email', $phone, '$regid'";

       

        if ($conn->query($sql1) and $conn->query($sql2) === true) {

            $sql3 = "SELECT * FROM `users` WHERE `username` = '$username'";

            $result = $conn->query($sql3);

            if($result->num_rows == 1)
            {
                $row = $result->fetch_assoc();

                $id = $row['id'];

                $sql4 = "INSERT INTO `login` (`id`,`name`, `username`, `password`) VALUES ('$id','$name', '$username', '$password')";

                $result1 = $conn->query($sql4);

                if($result1)
                {
                    return true;
                }
                else{
                    return false;
                }
            }
            return true;
        } else {
            return false;
        }

    }

    public static function login($username, $password)
    {
        $conn = database::getConnection();

        $sql = "SELECT * FROM `login` WHERE `username` = '$username'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $pass_verify = password_verify($password, $row['password']);
            if ($pass_verify === true) {
                return $row;
                return true;
            } else {
                die("Error 401: Invalid Credentials");
            }

        } else {

            die("Error 401: Invalid Credentials");

        }

    }

    public function __construct($id)
    {
        $conn = database::getConnection();
        $sql = "SELECT * FROM `users` WHERE `id` = '$id'";

        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $this->id = $row['id'];
            $this->name = $row['name'];
            $this->username = $row['username'];
            $this->age = $row['age'];
            $this->gender = $row['gender'];
            $this->dob = $row['dob'];
            $this->email = $row['email'];
            $this->phone = $row['phone'];
            $this->reg_id = $row['reg_id'];

        } else {

            die("Invalid Username");

        }
    }

    public static function no_of_users()
    {
        $conn = database::getConnection();

        $sql = "SELECT * FROM `users`";

        $result = $conn->query($sql);

        if ($result) {
            echo $result->num_rows;
        } else {
            return false;
        }
    }

    public static function signout_all($uid)
    {
        $conn = database::getConnection();
        $sql = "DELETE FROM `sessions` WHERE `uid` = '$uid'";

        $result = $conn->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }


}

