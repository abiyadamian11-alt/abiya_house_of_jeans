<?php
require "db.php";

$id = $_GET['id'];

$sql = "DELETE FROM products WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $id]);

header("Location: view_products.php");
exit;
?>