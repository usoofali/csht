<?php

if (!file_exists('config/config.php')){
  header("location: install");
  exit;
}

    require_once("loader.php");

    $user = new User();
    $core = new Core();
    // ... ask if we are logged in here:
    if ($user->cdp_loginCheck() == true) 
    {

      if($_SESSION['userlevel'] == 9){
         // Super
        include('views/dashboard/index.php');
   
      }else if($_SESSION['userlevel'] == 1){
         //Student
         include('views/dashboard/dashboard_student.php');
      
      }else {
         //Admin
         include('views/dashboard/dashboard_staff.php');
   
      }


    } else{
        
        header("location: home.php");
      //   header("location: login.php");
        exit;       
    }




   