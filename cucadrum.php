<?php
include __DIR__ . '/config.php';

$stmt = $pdo->query("SELECT products.*, users.username FROM products JOIN users ON products.user_id = users.id");
$products = $stmt->fetchAll();
?>

<h2>Ապրանքներ</h2>
<?php foreach($products as $product): ?>
  <h3><?php echo htmlspecialchars($product['name']); ?></h3>
  <p><?php echo htmlspecialchars($product['description']); ?></p>
  <p>Գին: <?php echo $product['price']; ?></p>
  <p>Ավելացրել է: <?php echo htmlspecialchars($product['username']); ?></p>
  <hr>
<?php endforeach; ?>
