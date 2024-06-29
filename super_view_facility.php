<?php
    require_once("loader.php");

    $user = new User();
    $core = new Core();
    // ... ask if we are logged in here:
    if ($user->cdp_loginCheck() == true) 
    {

       
      include('views/super/super_view_facility.php');     
           

    } else{
        
        header("location: index.php");
        exit;       
    }