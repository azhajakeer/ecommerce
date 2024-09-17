<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Products</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
   <!--<link href="/ecommerce/public/output.css" rel="stylesheet">-->

</head>
<body>
    <!-- Navigation Bar -->
    <nav class="bg-lime-800 bg-opacity-90 p-2 fixed top-0 left-0 w-full z-10">
            <div class="container mx-auto flex justify-between items-center">
                <div class="text-white text-lg font-bold">Logo</div>
                <ul class="hidden md:flex space-x-4">
                <li><a href="<?=BASE_URL; ?>" class="text-indigo-50">Home</a></li>
                    <li><a href="<?=BASE_URL; ?>product" class="text-indigo-50">Furniture</a></li>
                    <li><a href="<?=BASE_URL; ?>cart" class="text-indigo-50">Cart</a></li>
                    <li><a href="<?=BASE_URL; ?>login" class="text-indigo-50">Login</a></li>
                </ul>
            </div>
        </nav>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Shop Products</h1>

        <!-- Product Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php if (!empty($data['products'])) : ?>
                <?php foreach ($data['products'] as $product) : ?>
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <img src="<?= $product['image']; ?>" alt="<?= $product['name']; ?>" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-bold"><?= $product['name']; ?></h3>
                            <p class="text-gray-700 mb-2">$<?= number_format($product['price']); ?></p>
                            <p class="text-gray-600"><?= $product->description; ?></p>
                        </div>
                        <div class="p-4 border-t">
                            <a href="product_details.php?id=<?= $product['id']; ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">View Details</a>
                             <!-- Add to Cart Button -->
                             <a href="<?= BASE_URL; ?>product/add-to-cart-button<?= $product['id']; ?>" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add to Cart</a>


                             <!--<a href="<?= BASE_URL; ?>cart.php?id=<?= $product['id']; ?>" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add to Cart</a>-->
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p class="col-span-3 text-center text-gray-500"><?= $this->renderView('product/product');?></p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
