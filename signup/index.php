<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/__lib/main.php';

if(session::get('session_token'))
{
    header('Location: /load_dashboard');
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div style="width:100%;"class="col-lg-5 d-none d-lg-block">
                        <img src="/img/signup.svg" alt="signup" />
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form id="myForm" class="user" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="name" class="form-control form-control-user" id="formName"
                                            placeholder="Name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text"  name="username" class="form-control form-control-user" id="formUsername"
                                            placeholder="Username">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="number"  name="age" class="form-control form-control-user" id="formAge"
                                            placeholder="Age">
                                    </div>
                                    <div class="col-sm-6">
                                    <input type="text"  name="gender" class="form-control form-control-user" id="formGender"
                                            placeholder="Gender">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="date" name="dob" class="form-control form-control-user" id="formDob"
                                        placeholder="Date of Birth">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" id="formEmail"
                                        placeholder="Email Address">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="number" name="phone"  class="form-control form-control-user"
                                            id="formPhone" placeholder="Phone">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password"  class="form-control form-control-user"
                                            id="formPassword" placeholder="Password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                            </form>
                            <hr>

                            <div class="text-center">
                                <a class="small" href="/login">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>

    $(document).ready(function() {
  $('#myForm').submit(function(event) {
    event.preventDefault();

    var name = $('#formName').val();
    var username = $('#formUsername').val();
    var age = $('#formAge').val();
    var gender = $('#formGender').val();
    var dob = $('#formDob').val();
    var email = $('#formEmail').val();
    var phone = $('#formPhone').val();
    var password = $('#formPassword').val();

    var dataToSend = {
      name: name,
      username: username,
      age: age,
      gender: gender,
      dob: dob,
      email: email,
      phone: phone,
      password: password
    };

    $.ajax({
      type: 'POST',
      url: 'https://project-sample.umarfarooq.online/api/signup.api.php',
      dataType: 'json',
      data: dataToSend,
      
      success: function(response) {
        if(response.status == 'success')
        {
            alert('Signup Success!')
        }
        else{
            alert('Signup Failed!')
        }
    },
      error: function(xhr, status, error) {
        if(xhr.status == 500)
        {
            alert("Username, email or phone already registered. Please use different data.")
        }
       
      }
    });
  });
});

</script>


    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/js/sb-admin-2.min.js"></script>

</body>

</html>