<?php
require_once('./menubar.php');
?>
<?php
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
//handle editing product
if(
  isset($_POST["Name"])&&
  isset($_POST["Price"])&&
  isset($_POST["Description"])&&
  isset($_POST["Quantity"])
){
  $Name = $_POST["Name"];
  $Price = $_POST["Price"];
  $Description = $_POST["Description"];
  $Quantity = $_POST["Quantity"];
  $sql = "
    UPDATE FashionStore.Products
    SET 
      Name='".$Name."',
      Price=".$Price.",
      Description='".$Description."',
      Quantity=".$Quantity."
    WHERE Product_ID=".$_GET["productId"];
    $result = $conn->query($sql);
    echo "
      <script>
        window.location.href='admin.php'
      </script>
    ";

}


$sql = "SELECT * FROM FashionStore.Products where Product_ID=".$_GET["productId"];
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    ?>
    
    <form action="edit.php?productId=<?php echo $row["Product_ID"]?>" method="post">
      <input type="text" name="Name" value="<?php echo $row["Name"]?>"/>
      <input type="number" name="Price" value="<?php echo $row["Price"]?>"/>
      <input type="text" name="Description" value="<?php echo $row["Description"]?>"/>
      <input type="number" name="Quantity" value="<?php echo $row["Quantity"]?>"/>
      <button>edit</button>
    </form>
    <?php
  }
} else {
  echo "0 results";
}
$conn->close();
?>
