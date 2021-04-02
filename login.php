<?php
  if(isset($_POST["email"]) && isset($_POST["password"])){
  
      $email = $_POST["email"];
      $userPassword = $_POST["password"];
      
      $servername = "db";
      $username = "root";
      $password = "root";
      // Create connection
      $conn = new mysqli($servername, $username, $password);
      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      $sql = "SELECT * FROM FashionStore.Users where Email=\"".$email."\" AND Password=\"".$userPassword."\"";
      $result = $conn->query($sql);
      if($result->num_rows > 0){
        if(session_status() != PHP_SESSION_ACTIVE){
          session_start();
        }
        while ($row = $result->fetch_row()) {
          $_SESSION["Email"] = $row[1];
          if($row[3] == TRUE){
              $_SESSION["Admin_Area"] = $row[3];
            }
          };
          
          header("Location: ./");
        }
        
      
  }
?>

<form action="login.php" method="post">
    <input type="text" name="email" />
    <input type="password" name="password" />
    <button>Login</button>
</form>
