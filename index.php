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
      
      }else if($_SESSION['userlevel'] == 2){
         //Admin
         include('views/dashboard/dashboard_admin.php');
   
      }else if($_SESSION['userlevel'] == 3){
         //Exam
         include('views/dashboard/dashboard_exam.php');
   
      }else if($_SESSION['userlevel'] == 4){
         //Hod   
         include('views/dashboard/dashboard_hod.php');
   
      }else if($_SESSION['userlevel'] == 5){
         //Cashier
         include('views/dashboard/dashboard_cashier.php');
   
      }else if($_SESSION['userlevel'] == 6){
         //Registrar      
         include('views/dashboard/dashboard_registrar.php');
   
      }else if($_SESSION['userlevel'] == 7){
         //Lecturer
        include('views/dashboard/dashboard_lecturer.php');
   
      }else if($_SESSION['userlevel'] == 8){
         //Provost      
         include('views/dashboard/dashboard_provost.php');
      
      }


    } else{
        
        header("location: home.php");
      //   header("location: login.php");
        exit;       
    }




   