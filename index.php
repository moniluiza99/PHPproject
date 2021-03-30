yes<?php
$servername = "localhost";
$username = "root";
$password = "root";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$sql = "SELECT * FROM FashionStore.Products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["Product_ID"]. " - Name: " . $row["Name"]. " image <img src=\"". $row["Image"]."\">
    " . $row["Image"]." Price " . $row["Price"]. " description " . $row["Description"]." quantity " . $row["Quantity"]."
    <a href=\"ProductSinglePage.php?productId=".$row["Product_ID"]." \">show product </a>
    <br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>

http://localhost:8080/ProductSinglePage.php?productId=3 