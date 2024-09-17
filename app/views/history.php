<h1>Order History</h1>

<?php if (!empty($orders)): ?>
    <ul>
        <?php foreach ($orders as $order): ?>
            <li>
                <h2>Order #<?php echo $order['id']; ?></h2>
                <p>Total: $<?php echo $order['total']; ?></p>
                <p>Date: <?php echo $order['created_at']; ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No orders found.</p>
<?php endif; ?>
