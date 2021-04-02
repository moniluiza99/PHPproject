<?php
  if(session_status() != PHP_SESSION_ACTIVE){
    session_start();
  }
  if(isset($_GET["removeItemId"])){
    foreach($_SESSION["basket"] as $key => $basketItem){
      if($basketItem["productId"] == $_GET["removeItemId"]){
        unset($_SESSION["basket"][$key]);
      }
    }
  }
  $shoppingCardIds = "";

  // render basket
  if(isset($_SESSION["basket"]) && !empty($_SESSION["basket"])){
    foreach($_SESSION["basket"] as $basketItem){
      $shoppingCardIds = $shoppingCardIds.$basketItem["productId"].",";
    }
    $shoppingCardIds = substr($shoppingCardIds, 0, -1);
    $servername = "db";
    $username = "root";
    $password = "root";
    // Create connection
    $conn = new mysqli($servername, $username, $password);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $sql = " SELECT* FROM FashionStore.Products where Product_ID IN (".$shoppingCardIds.")";
    echo $sql;
    $result = $conn->query($sql);
    $products = [];
    while ($row = $result->fetch_row()) {
        array_push($products, $row);
    }

    echo "<ul>";
    foreach($_SESSION["basket"] as $basketItem) {
      echo "<li>";
      foreach($products as $productItem){
        //match session basket item id with database product id
        if($basketItem["productId"] == $productItem[0]){
          echo $productItem[1]. "  ";
          //multiply the total amount in session basket and the amount in the database
          echo "total: ".$productItem[3] * $basketItem["amount"];
          echo "<a href='basket.php?removeItemId=".$productItem[0]."'>remove</a>";
        };
      }
      
      echo "</li>";
    }
    echo "</ul>";

  }
?>