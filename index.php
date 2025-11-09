<?php include('db.php'); ?>

<!DOCTYPE html>
<html>
<head>
  <title>Product Catalog</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>🛍️ E-Commerce Product Catalog</h1>

  <form method="GET" action="">
    <select name="category">
      <option value="">All Categories</option>
      <option value="Clothing">Clothing</option>
      <option value="Footwear">Footwear</option>
      <option value="Electronics">Electronics</option>
    </select>

    <input type="text" name="search" placeholder="Search products...">
    <button type="submit">Search</button>
  </form>

  <div class="product-container">
    <?php
      $category = isset($_GET['category']) ? $_GET['category'] : '';
      $search = isset($_GET['search']) ? $_GET['search'] : '';

      $sql = "SELECT * FROM products WHERE 1";

      if ($category != '') {
        $sql .= " AND category='$category'";
      }

      if ($search != '') {
        $sql .= " AND name LIKE '%$search%'";
      }

      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<div class='product'>
                  <img src='images/" . $row['image'] . "' alt='" . $row['name'] . "'>
                  <h3>" . $row['name'] . "</h3>
                  <p>₹" . $row['price'] . "</p>
                  <a href='product.php?id=" . $row['id'] . "'>View Details</a>
                </div>";
        }
      } else {
        echo "<p>No products found.</p>";
      }
    ?>
  </div>
</body>
</html>
