<h1>Checkout</h1>

<h2>Your Items</h2>
<ul>
    <?php foreach ($cartItems as $item): ?>
        <li>
            <h3><?php echo $item['name']; ?></h3>
            <p>Price: $<?php echo $item['price']; ?></p>
            <p>Quantity: <?php echo $item['quantity']; ?></p>
        </li>
    <?php endforeach; ?>
</ul>

<h2>Total: $<?php echo array_sum(array_column($cartItems, 'price')); ?></h2>

<form action="<?php echo BASE_URL . 'checkout/placeOrder'; ?>" method="post">
    <label for="shipping_address">Shipping Address</label>
    <textarea name="shipping_address" id="shipping_address" required></textarea>
    <button type="submit">Place Order</button>
</form>
