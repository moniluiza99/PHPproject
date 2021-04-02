<?php
  if(session_status() != PHP_SESSION_ACTIVE){
          session_start();
  }
  if(!isset($_SESSION["Admin_Area"])){
    header("Location: ./login.php");
  };
  
  if($_SESSION["Admin_Area"] != TRUE){
    header("Location: ./login.php");
  };
?>
<a href="add.php">add product</a>

<?
  $servername = "db";
  $username = "root";
  $password = "root";

  // Create connection
  $conn = new mysqli($servername, $username, $password);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  // DELETER PRODUCT
  if(isset($_GET["deleteProductId"])){

    $sql = "DELETE FROM FashionStore.Products WHERE Product_ID=".$_GET["deleteProductId"];
    $result = $conn->query($sql);

  }


  $sql = "SELECT * FROM FashionStore.Products";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "id: " . $row["Product_ID"]. " - Name: " . $row["Name"]." Price " . $row["Price"]. " description " . $row["Description"]." quantity " . $row["Quantity"]."
      <a href=\"edit.php?productId=".$row["Product_ID"]." \">edit</a>
      <a href=\"admin.php?deleteProductId=".$row["Product_ID"]." \">delete </a>
      <br>";
    }
  } else {
    echo "0 results";
  }
  $conn->close();

?>