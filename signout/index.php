<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/__lib/main.php';
if(session::get('session_token'))
{
    header('Location: /load_dashboard');
}
?>
<!DOCTYPE html>
<title>Loading...</title>
<link href="/assets/img/favicon3.png" rel="icon">
  <link href="/assets/img/favicon3.png" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<link href= "/css/preloader.css" rel="stylesheet">
<link href="/css/sb-admin-2.css" rel="stylesheet">

<body>

<meta http-equiv="refresh" content="3;url=/login" />

<div class="loader">
</div>

      <h1> You are being signed out. Please do not press back or refresh button..</h1>

</body>
</html>