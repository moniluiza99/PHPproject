<?php
require_once('./menubar.php');
?>

<?php
$servername = "db";
$username = "root";
$password = "root";

// Create connection
$conn = new mysqli($servername, $username, $password);

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
    INSERT INTO `FashionStore`.`Products`
    (
    `Name`,
    `Price`,
    `Description`,
    `Quantity`)
    VALUES
    (
      '".$Name."',
      ".$Price.",
      '".$Description."',
      ".$Quantity."
    )";
    $result = $conn->query($sql);
    echo $sql;
    echo "
      <script>
        window.location.href='admin.php'
      </script>
    ";


}
?>
<form action="add.php" method="post">
  <input type="text" name="Name" placeholder="Name" />
  <input type="number" name="Price" placeholder="Price"/>
  <input type="text" name="Description" placeholder="Description"/>
  <input type="number" name="Quantity" placeholder="Quantity"/>
  <button>add</button>
</form>
