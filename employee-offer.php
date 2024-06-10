<?php
    require_once("loader.php");

    $user = new User();
    $core = new Core();
    // ... ask if we are logged in here:
    if ($user->cdp_loginCheck() == true) 
    {
       
      include('pdf/tcpdf/examples/appointment-letter.php');                

    } else{
        header("location: index.php");
        exit;       
    }
