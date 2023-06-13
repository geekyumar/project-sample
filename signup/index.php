<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/__lib/main.php';

if(isset($_POST['name']) and
isset($_POST['username']) and
isset($_POST['age']) and
isset($_POST['gender']) and
isset($_POST['dob']) and
isset($_POST['email']) and
isset($_POST['phone']) and
isset($_POST['password'])
     )
{

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

    if($result)
    {
        ?><script>alert('You have been successfully signed up!')</script><?
    }
    else{
        ?><script>alert('Signup failed! Please try again!')</script><?
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Signup - Sample Project</title>

    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="name" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text"  name="username" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Username">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="number"  name="age" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Age">
                                    </div>
                                    <div class="col-sm-6">
                                        <select type="text" name="gender" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Gender">
                                            <option disabled selected>Select Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="not-to-say">Prefer not to say</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="date" name="dob" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Date of Birth">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="number" name="phone"  class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Phone">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password"  class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="/forgot-password">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="/login">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/js/sb-admin-2.min.js"></script>

</body>

</html>