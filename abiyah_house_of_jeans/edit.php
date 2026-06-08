<?php
require "db.php";

$id = $_GET['id'];

// get product by id
$stmt = $pdo->prepare("SELECT * FROM products WHERE id = :id");
$stmt->execute([':id' => $id]);
$product = $stmt->fetch();

if(isset($_POST['update'])){

    $name = $_POST['name'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];

    $sql = "UPDATE products 
            SET product_name = :name,
                price = :price,
                quantity = :qty
            WHERE id = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':name' => $name,
        ':price' => $price,
        ':qty' => $qty,
        ':id' => $id
    ]);

    header("Location: view_products.php");
    exit;
}
?>

<h2>Edit Product</h2>

<form method="POST">
    <input type="text" name="name" value="<?= $product['product_name'] ?>"><br><br>
    <input type="number" name="price" value="<?= $product['price'] ?>"><br><br>
    <input type="number" name="qty" value="<?= $product['quantity'] ?>"><br><br>

    <button name="update">Update</button>
</form>