<h1>Order Placed Successfully!</h1>

<h2>Order Details</h2>
<ul>
    <?php foreach ($orderDetails as $item): ?>
        <li>
            <h3><?php echo $item['name']; ?></h3>
            <p>Price: $<?php echo $item['price']; ?></p>
            <p>Quantity: <?php echo $item['quantity']; ?></p>
        </li>
    <?php endforeach; ?>
</ul>

<p>Total: $<?php echo $orderDetails[0]['total_amount']; ?></p>
<p>Shipping Address: <?php echo $orderDetails[0]['shipping_address']; ?></p>
