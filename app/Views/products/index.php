<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
</head>
<body>
    <h1>Products</h1>
    <ul>
        <?php foreach ($products as $product): ?>
            <li>
                <?= $product['name'] ?> - $<?= $product['price'] ?>
                <a href="/orders/create">Add to Cart</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
