<?php include('db.php'); ?>

<!DOCTYPE html>
<html>
<head>
  <title>Product Details</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <a href="index.php">⬅ Back to Catalog</a>

  <?php
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      echo "<div class='product-detail'>
              <img src='images/" . $row['image'] . "' alt='" . $row['name'] . "'>
              <h2>" . $row['name'] . "</h2>
              <p><b>Category:</b> " . $row['category'] . "</p>
              <p><b>Price:</b> ₹" . $row['price'] . "</p>
              <p><b>Description:</b> " . $row['description'] . "</p>
            </div>";
    } else {
      echo "<p>Product not found.</p>";
    }
  } else {
    echo "<p>Invalid product ID.</p>";
  }
  ?>
</body>
</html>