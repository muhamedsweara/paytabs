<!-- index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
</head>
<body>
    <h1>Checkout</h1>
    <form id="checkout-form" method="post">
        <label for="shipping_address">Shipping Address:</label>
        <input type="text" name="shipping_address" required><br><br>
        <button type="button" onclick="proceedToPay()">Proceed to Pay</button>
    </form>

    <div id="paytabs-iframe-container" style="display:none;">
        <iframe id="paytabs-iframe" width="100%" height="600" src="" frameborder="0"></iframe>
    </div>

    <script>
        function proceedToPay() {
            // Ajax request to fetch payment URL and display iframe
            fetch('/checkout/process', { method: 'POST' })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('paytabs-iframe').src = data.payment_url;
                    document.getElementById('paytabs-iframe-container').style.display = 'block';
                })
                .catch(error => alert('Error: ' + error));
        }
    </script>
</body>
</html>