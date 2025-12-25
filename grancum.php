<?php
session_start();
include __DIR__ . '/config.php';

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'register'){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->execute([$username, $email, $password]);

    echo "Գրանցված է հաջողությամբ";
}
?>

<h2>Գրանցում</h2>
<form method="POST">
  <input type="hidden" name="action" value="register">
  <input type="text" name="username" placeholder="Օգտանուն" required>
  <input type="email" name="email" placeholder="Email" required>
  <input type="password" name="password" placeholder="Գաղտնաբառ" required>
  <button type="submit">Գրանցվել</button>
</form>
