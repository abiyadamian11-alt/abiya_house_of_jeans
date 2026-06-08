<?php
require "db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save'])) {
    $name = trim($_POST['name'] ?? '');
    $price = trim($_POST['price'] ?? '');
    $qty = trim($_POST['qty'] ?? '');

    if ($name === '' || $price === '' || $qty === '') {
        $message = 'Please fill in all fields.';
    } else {
        $sql = "INSERT INTO products (product_name, price, quantity) VALUES (:name, :price, :qty)";
        $stmt = $pdo->prepare($sql);

        try {
            $stmt->execute([
                ':name' => $name,
                ':price' => $price,
                ':qty' => $qty,
            ]);
            $message = 'Product Added Successfully';
        } catch (PDOException $e) {
            $message = 'Error adding product: ' . $e->getMessage();
        }
    }
}

if (!empty($message)) {
    echo '<p>' . htmlspecialchars($message) . '</p>';
}
?>


<html>
<head>
<link rel="stylesheet" href="center.css">
</head>

<body class="center-page">

<div class="center-box">

<h2>Add Product</h2>

<form method="POST">

<input type="text" name="name" placeholder="Product Name"><br><br>
<input type="number" name="price" placeholder="Price"><br><br>
<input type="number" name="qty" placeholder="Quantity"><br><br>

<button name="save">Save</button>

</form>

</div>

</body>
</html>