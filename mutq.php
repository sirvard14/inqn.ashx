<?php
session_start();
include __DIR__ . '/config.php';

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'login'){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if($user && password_verify($password, $user['password'])){
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        echo "Մուտք կատարված է";
    } else {
        echo "Սխալ email կամ գաղտնաբառ";
    }
}
?>

<h2>Մուտք</h2>
<form method="POST">
  <input type="hidden" name="action" value="login">
  <input type="email" name="email" placeholder="Email" required>
  <input type="password" name="password" placeholder="Գաղտնաբառ" required>
  <button type="submit">Մուտք գործել</button>
</form>
