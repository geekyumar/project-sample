<?php

class user
{

    public static function signup($name, $username, $regno, $section, $staff,$dob , $email, $phone, $password, $tc)
    {
        $conn = \student\database::getConnection();

        $sql1 = "SET @@session.time_zone = '+05:30'";

        $sql2 = "INSERT INTO `users` (`name`,`username`, `reg_no`, `email`, `phone`, `t&c_accepted?`,`signup_time`,`staff_incharge`,`section`,`about`,`dob`,`role`,`fb_link`,`insta_link`,`twitter_link`,`linkedin_link`,`last_updated_profile`)
    VALUES ('$name','$username', '$regno','$email','$phone','$tc', now(), '$staff','$section', '','$dob', '', '', '', '', '', now())";

       

        if ($conn->query($sql1) and $conn->query($sql2) === true) {

            $sql3 = "SELECT * FROM `users` WHERE `name` = '$name'";

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
        $conn = \student\database::getConnection();

        $sql = "SELECT * FROM `login` WHERE `username` = '$username'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $pass_verify = password_verify($password, $row['password']);
            if ($pass_verify === true) {
                return $row;
                return true;
            } else {
                load_template_student("login_fail");
                die("Error 401: Invalid Credentials");
            }

        } else {

            load_template_student("login_fail");
            die("Error 401: Invalid Credentials");

        }

    }

    public function __construct($id)
    {
        $conn = \student\database::getConnection();
        $sql = "SELECT * FROM `users` WHERE `id` = '$id'";

        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $this->id = $row['id'];
            $this->name = $row['name'];
            $this->username = $row['username'];
            $this->regno = $row['reg_no'];
            $this->incharge = $row['staff_incharge'];
            $this->section = $row['section'];
            $this->email = $row['email'];
            $this->phone = $row['phone'];
            $this->tc = $row['t&c_accepted?'];
            $this->signup_datetime = $row['signup_time'];
            $this->about = $row['about'];
            $this->dob = $row['dob'];
            $this->role = $row['role'];
            $this->fb_link = $row['fb_link'];
            $this->twitter_link = $row['twitter_link'];
            $this->insta_link = $row['insta_link'];
            $this->linkedin_link = $row['linkedin_link'];

        } else {

            die("Invalid Username");

        }
    }

    public static function edit_users($username, $regno, $email, $phone, $about, $dob, $role, $fb_link, $insta_link, $twitter_link, $linkedin_link)
    {
        $conn = \student\database::getConnection();

        $sql = "UPDATE`users` SET (`username`,`reg_no`, `email`, `phone`,`fb_link`, `insta_link`,`twitter_link`, `linkedin_link`)
        VALUES ('$username','$regno','$email','$phone','$fb_link', '$insta_link', '$twitter_link', '$linkedin_link') WHERE `username` = '$username'";

        $result = $conn->query($sql);

        if ($result) {
            echo "<script>alert('Profile Details updated!')";
        } else {
            echo "<script>alert('Profile details updation failed!, please contact admin.')";

        }
    }

    public static function no_of_users()
    {
        $conn = \student\database::getConnection();

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
        $conn = \student\database::getConnection();
        $sql = "DELETE FROM `sessions` WHERE `uid` = '$uid'";

        $result = $conn->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }


    public function sendMessage($message, $php_date_time)
    {
        $conn = \student\database::getConnection();

        $sql = "INSERT INTO `chatbox` (`id`, `name`, `username`, `message`, `date_time`)
        VALUES ('$this->id', '$this->name', '$this->username', '$message', '$php_date_time')";

        $result = $conn->query($sql);

        if($result)
        {
            return true;
        }

        else{
            return false;
        }
    }

    public function changePass($old_password, $new_password, $re_enter_pass)
    {
        if($new_password == $re_enter_pass)
        {
            $conn = \student\database::getConnection();

            $sql = "SELECT * FROM `login` WHERE `id` = '$this->id'";

            $result = $conn->query($sql);

            if($result->num_rows == 1)
            {
                $row = $result->fetch_assoc();

                $pass = $row['password'];

                $pass_verify = password_verify($old_password, $pass);

                if($pass_verify === true)

                {
                $newpass = password_hash($new_password, PASSWORD_BCRYPT);

                $sql1 = "UPDATE `login` SET 
                `password` = '$newpass'

                WHERE `id` = '$this->id';";

                $result1 = $conn->query($sql1);

                if($result1)
                {
                    return true;
                }

                else{
                    return false;

                }


            }
            else{
                die("Invalid user");
            }

        }
        else
        {
            die("Invalid user");
        }
    }
    else
    {
        ?><script>alert("New password and Re-entered password does not match. try again.")</script><?

    }

}

}

