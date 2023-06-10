<?php

include $_SERVER['DOCUMENT_ROOT'].'/__lib/main.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Profile</title>

    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

       <?load_template('header')?>

                <!-- Begin Page Content -->

<!-- Area Chart -->
<div class="col-xl-8 col-lg-7">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">My Profile</h6>
        </div>
        <!-- Card Body -->
        <div class="form-group m-4">
        <h4 class="text-primary">Name</h4>
            <input type="email" class="form-control form-control-user"
             id="exampleInputEmail" aria-describedby="emailHelp"
            placeholder="Enter Email Address...">
    </div>

    <div class="form-group m-4">
        <h4 class="text-primary">Username</h4>
            <input type="email" class="form-control form-control-user"
             id="exampleInputEmail" aria-describedby="emailHelp"
            placeholder="Enter Email Address...">
    </div>
      
    <div class="form-group m-4">
        <h4 class="text-primary">Age</h4>
            <input type="email" class="form-control form-control-user"
             id="exampleInputEmail" aria-describedby="emailHelp"
            placeholder="Enter Email Address...">
    </div>
    <div class="form-group m-4">
        <h4 class="text-primary">Gender</h4>
            <input type="email" class="form-control form-control-user"
             id="exampleInputEmail" aria-describedby="emailHelp"
            placeholder="Enter Email Address...">
    </div>
    <div class="form-group m-4">
        <h4 class="text-primary">Date of Birth</h4>
            <input type="email" class="form-control form-control-user"
             id="exampleInputEmail" aria-describedby="emailHelp"
            placeholder="Enter Email Address...">
    </div>
    <div class="form-group m-4">
        <h4 class="text-primary">Email</h4>
            <input type="email" class="form-control form-control-user"
             id="exampleInputEmail" aria-describedby="emailHelp"
            placeholder="Enter Email Address...">
    </div>
    <div class="form-group m-4">
        <h4 class="text-primary">Phone</h4>
            <input type="email" class="form-control form-control-user"
             id="exampleInputEmail" aria-describedby="emailHelp"
            placeholder="Enter Email Address...">
    </div>
    <div class="form-group m-4">
        <h4 class="text-primary">Reg. ID</h4>
            <input type="email" class="form-control form-control-user"
             id="exampleInputEmail" aria-describedby="emailHelp"
            placeholder="Enter Email Address...">
            
    </div>

    <div class="form-group m-4">
    <a class=" text-center col-lg-4 btn btn-primary" href="?logout">Submit Changes</a>
    </div>
        
        </div>


            <!-- End of Main Content -->

    <?load_template('footer')?>

   
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>