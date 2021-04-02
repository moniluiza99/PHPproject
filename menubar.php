<?php
  if(session_status() != 2){
    session_start();
  }
?>
<header>
<div>menubar</div>
<?php
    if(isset($_SESSION["Email"])){
      echo "
        <a href=\"logoutHandler.php\">Logout</a>
        ";
    }else{
      echo "
        <a href=\"login.php\">Login</a>
      ";
    }
    
    if(isset($_SESSION["Admin_Area"]) && $_SESSION["Admin_Area"] == TRUE){
      echo "<a href=\"admin.php\">Admin</a>";
    }

  
?>
<a href="/basket.php">Basket</a>
</header>