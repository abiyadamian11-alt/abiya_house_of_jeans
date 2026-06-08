<?php
require "db.php";

$totalProducts = $pdo->query("SELECT COUNT(*) FROM products")->fetchColumn();

$totalStock = $pdo->query("SELECT SUM(quantity) FROM products")->fetchColumn();
?>

<!DOCTYPE html>
<html>
<head>
<style>

/* BODY */
body{
    margin:0;
    font-family: Arial;
}

/* SIDEBAR */
.sidebar{
    width: 200px;
    height: 100vh;
    background: black;
    position: fixed;
    top: 0;
    left: 0;
    padding-top: 20px;
}

/* SIDEBAR LINKS */
.sidebar a{
    display: block;
    color: white;
    padding: 15px;
    text-decoration: none;
}

.sidebar a:hover{
    background: yellowgreen;
}

/* CONTENT SIDE */
.content{
    margin-left: 210px;
    padding: 20px;
}

</style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h3 style="color:white; text-align:center;">ADMIN</h3>

    <a href="dashboard.php">Dashboard</a>
    <a href="add_product.php">Add Product</a>
    <a href="view_products.php">View Products</a>
    <a href="logout.php">Logout</a>
</div>

<!-- CONTENT -->
<div class="content">
    <h1>Welcome Admin 👋</h1>
    <p>This is your dashboard page.</p>
</div>

</body>
</html>
