<!-- index.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Orders</title>
</head>

<body>
    <h1>My Orders</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Status</th>
                <th>Request Payload</th>
                <th>Response Payload</th>
                <th>Refund Payload</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?= $order['id']; ?></td>
                    <td><?= $order['status']; ?></td>
                    <td>
                        <pre><?= json_encode(json_decode($order['request_payload']), JSON_PRETTY_PRINT); ?></pre>
                    </td>
                    <td>
                        <pre><?= json_encode(json_decode($order['response_payload']), JSON_PRETTY_PRINT); ?></pre>
                    </td>
                    <td>
                        <pre><?= json_encode(json_decode($order['refund_payload']), JSON_PRETTY_PRINT); ?></pre>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="/orders/create">Create New Order</a>
</body>

</html>