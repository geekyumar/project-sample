<?php

include $_SERVER['DOCUMENT_ROOT'].'/__lib/main.php';
if (session::get('session_token'))
{
    $session_token = session::get('session_token');
    $user_id = session::get('user_id');
    $auth = usersession::authorize($session_token);
    $userobj = new user($user_id);
}
else
{
    header('Location: /login');
}

if(isset($_GET['logout']))
{
    session_destroy();
    header('Location: /signout');
}

if(isset($_POST['old']) and 
isset($_POST['new']) and
isset($_POST['re_enter'])
)
{
    $old = $_POST['old'];
    $new = $_POST['new'];
    $re_enter = $_POST['re_enter'];

    if(!$conn)
    {
        $conn = database::getConnection();
    }
        $sql = "SELECT * FROM `login` WHERE `username` = '$userobj->username'";
        $result = $conn->query($sql);
        if($result)
        {
            $data = $result->fetch_assoc();
            if(password_verify($old, $data['password']) == true)
            {
                if($new == $re_enter)
                {
                    $newpass = password_hash($new, PASSWORD_BCRYPT);
                    $sql1 = "UPDATE `login` SET 
                        `password` = '$newpass'
                        WHERE `username` = '$userobj->username'";
                        $pass_success = $conn->query($sql1);
                        if($pass_success)
                        {
                            ?><script>alert('New password has been updated!')</script><?
                            $session_clear = "DELETE FROM `sessions` WHERE `username` = '$userobj->username'";
                            $conn->query($session_clear);
                            session_destroy();
                        }
                        else
                        {
                            ?><script>alert('Please try after some time!')</script><?
                        }
                }
                else{
                    ?><script>alert('New password and re-entered password does not match!')</script><?
                }
            }
            else
            {
                ?><script>alert('Old Password does not match!')</script><?
            }
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

    <title>Change Password</title>

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

        <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">

    <div class="sidebar-brand-text mx-3">Dashboard<sup></sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="/dashboard">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Interface
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link" href="/profile">
        <i class="fas fa-fw fa-cog"></i>
        <span>Profile</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="/change_password">
        <i class="fas fa-fw fa-cog"></i>
        <span>Change Password</span>
    </a>
</li>



</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>



        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->

            <!-- Nav Item - Alerts -->

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-envelope fa-fw"></i>
                    <!-- Counter - Messages -->
                    <span class="badge badge-danger badge-counter">1</span>
                </a>
                <!-- Dropdown - Messages -->
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="messagesDropdown">
                    <h6 class="dropdown-header">
                        Message Center
                    </h6>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="font-weight-bold">
                            <div class="text-truncate">Hi there, Welcome!</div>
                            <div class="small text-gray-500">Umar Farooq</div>
                        </div>
                    </a>

            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?echo $userobj->name?></span>

                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="/dashboard">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Dashboard
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/profile">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/change_password">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Change Password
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="?logout" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>

        </ul>

    </nav>
    <!-- End of Topbar -->
        <!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="?logout">Logout</a>
        </div>
    </div>
</div>
</div>

                <!-- Begin Page Content -->

<!-- Area Chart -->
<div class="col-xl-8 col-lg-7">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Change Password</h6>
        </div>
        <!-- Card Body -->
        <form method="post">
        <div class="form-group m-4">
        <h4 class="text-primary">Old Password</h4>
            <input type="password" name="old" class="form-control form-control-user"
             id="exampleInputEmail" aria-describedby="emailHelp"
            placeholder="Old Password">
    </div>

    <div class="form-group m-4">
        <h4 class="text-primary">New Password</h4>
            <input type="password" name="new" class="form-control form-control-user"
             id="exampleInputEmail" aria-describedby="emailHelp"
            placeholder="New Password">
    </div>
      
    <div class="form-group m-4">
        <h4 class="text-primary">Re-enter Password</h4>
            <input type="password" name="re_enter" class="form-control form-control-user"
             id="exampleInputEmail" aria-describedby="emailHelp"
            placeholder="Re-enter Password">
</div>
    <div class="form-group m-4">
    <button type="submit" class="text-center col-lg-4 btn btn-primary">Change Password</button>
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