<?php
require "db.php";

$search = "";

if(isset($_GET['search'])){
    $search = $_GET['search'];

    $stmt = $pdo->prepare("
        SELECT * FROM products 
        WHERE product_name LIKE :search
    ");

    $stmt->execute([
        ':search' => "%$search%"
    ]);

} else {
    $stmt = $pdo->query("SELECT * FROM products");
}

$products = $stmt->fetchAll();
?>

<form method="GET" class="search-box">
    <input type="text" name="search" placeholder="🔍 Search product..." value="<?= $search ?>">
    <button type="submit">Search</button>
</form>
<table border="1">
<tr>
    <th>ID</th>
    <th>Product Name</th>
    <th>Price</th>
    <th>Quantity</th>
</tr>

<?php foreach($products as $p){ ?>
<tr>
    <td><?= $p['id'] ?></td>
    <td><?= $p['product_name'] ?></td>
    <td><?= $p['price'] ?></td>
    <td><?= $p['quantity'] ?></td>
</tr>
<?php } ?>
</table>

<h2>All Products</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Quantity</th>
    </tr>

    <?php foreach($products as $p){ ?>
    <tr>
        <td><?= $p['id'] ?></td>
        <td><?= $p['product_name'] ?></td>
        <td><?= $p['price'] ?></td>
        <td><?= $p['quantity'] ?></td>
    </tr>
    <td>
    <a href="delete.php?id=<?= $p['id'] ?>">Delete</a>
</td>
<a href="edit.php?id=<?= $p['id'] ?>">Edit</a>
    <?php } ?>

</table>