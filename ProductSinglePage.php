<?php
require_once('./menubar.php');
?>
<?php
//handle item to basket
if(isset($_POST["productId"]) && isset($_POST["amount"])){
  if(session_status() != PHP_SESSION_ACTIVE){
    session_start();
  }
  
  if(!isset($_SESSION["basket"])){
    $_SESSION["basket"] = [];
  }

  $newBasketItem = array(
    "productId" => $_POST["productId"],
    "amount" => $_POST["amount"]
  );
  array_push($_SESSION["basket"], $newBasketItem);

}
$servername = "db";
$username = "root";
$password = "root";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";


//Render single product
$productId = $_GET["productId"];
$sql = "SELECT * FROM FashionStore.Products where Product_ID=".$productId;
$result = $conn->query($sql);
echo "result";
print_r($result);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $productId = $row["Product_ID"];
    echo
    "id: " . $row["Product_ID"].
    "Name: " . $row["Name"].
    "image <img src=\"". $row["Image"]."\">".
    $row["Image"]." Price " . $row["Price"].
    "description " . $row["Description"]." quantity ".
    $row["Quantity"]."<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
<form method="post" action="/ProductSinglePage.php?productId=<?php echo $productId?>"> 
  <input type="hidden" name="productId" value="<?php echo $productId?>">
  <input type="number" name="amount" />
  <button>Add to basket</button>
</form>