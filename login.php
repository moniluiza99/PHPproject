<?php
    echo $_POST["email"].$_POST["password"];
    $email = "info@gmail.com";
    $userPassword = "password";
    
    $servername = "localhost";
    $username = "root";
    $password = "root";
    phpinfo();
    // Create connection
    $conn = new mysqli($servername, $username, $password);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";
    $productId = $_GET["productId"];
    $sql = "SELECT * FROM FashionStore.Users where Email=\"".$email."\" AND Password=\"".$userPassword."\"";
    $result = $conn->query($sql);

?>

<form action="login.php" method="post">
    <input type="text" name="email" />
    <input type="password" name="password" />
    <button>Login</button>
</form>
