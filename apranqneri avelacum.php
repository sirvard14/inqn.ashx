<?php
session_start();
include __DIR__ . '/config.php';

// Մուտք պետք է լինի
if(!isset($_SESSION['user_id'])){
    die("Գրանցվեք կամ մուտք գործեք՝ ապրանք ավելացնելու համար");
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $user_id = $_SESSION['user_id'];

    $stmt = $pdo->prepare("INSERT INTO products (name, description, price, user_id) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $description, $price, $user_id]);

    echo "Ապրանքը ավելացվել է հաջողությամբ";
}
?>

<h2>Ավելացնել ապրանք</h2>
<form method="POST">
  <input type="text" name="name" placeholder="Ապրանքի անուն" required>
  <textarea name="description" placeholder="Նկարագրություն"></textarea>
  <input type="number" step="0.01" name="price" placeholder="Գին" required>
  <button type="submit">Ավելացնել ապրանք</button>
</form>
