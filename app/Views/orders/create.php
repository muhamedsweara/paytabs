<!-- create.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Order</title>
</head>
<body>
    <h1>Create New Order</h1>
    <form action="/orders/store" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>

        <h3>Select Products:</h3>
        <?php foreach ($products as $product): ?>
            <div>
                <input type="checkbox" name="products[]" value="<?= $product['id'] ?>" />
                <?= $product['name'] ?> - $<?= $product['price'] ?>
                <input type="number" name="quantities[<?= $product['id'] ?>]" min="1" value="1" />
            </div>
        <?php endforeach; ?>
        
        <button type="submit">Place Order</button>
    </form>
</body>
</html>
