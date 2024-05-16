<?php
  require_once("loader.php");
  $user= new User;
?>
<?php
  if ($user->logged_in)
      $user->cdp_logout();
	  
   header("location: index.php");
?>