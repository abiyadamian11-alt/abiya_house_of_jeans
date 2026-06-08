<?php
session_start();
require "db.php";

if(isset($_POST['login'])){

    $user = $_POST['username'];
    $pass = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM admin WHERE username=:u AND password=:p");

    $stmt->execute([
        ':u' => $user,
        ':p' => $pass
    ]);

    $row = $stmt->fetch();

    if($row){
        $_SESSION['user'] = $user;
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Wrong Username or Password";
    }
}
?>

<link rel="stylesheet" href="center.css">

<body class="center-page">

<div class="center-box">

<h2>Login</h2>

<form method="POST">

<input type="text" name="username" placeholder="Username"><br><br>
<input type="password" name="password" placeholder="Password"><br><br>

<button name="login">Login</button>

</form>

</div>

</body>
