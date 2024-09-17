<?php
// //session_start();

// // Check if the user is logged in and has the 'admin' role
// //if //(!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
//     // Redirect to the login page if not logged in as admin
//    // header("Location: http://localhost/app/views/admin/login.php");
//    if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
//     header("Location: http://localhost/app/views/admin/dashboard.php");
//     $this->renderView('admin/dashboard');
//     exit();
// }

//    // exit();
// //}
?>



 <h1>Admin Dashboard</h1>

<!-- Add New Product Form -->
<h2>Add New Product</h2>
<form action="<?php echo BASE_URL; ?>admin/dashboard" method="post" enctype="multipart/form-data">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="description">Description:</label>
    <textarea id="description" name="description" required></textarea>

    <label for="price">Price:</label>
    <input type="text" id="price" name="price" required>

    <label for="image">Image:</label>
    <input type="file" id="image" name="image" required>

    <button type="submit">Add Product</button>
</form>

<!-- Display Existing Products -->
<h2>Product List</h2>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?php echo htmlspecialchars($product['name']); ?></td>
                    <td>$<?php echo htmlspecialchars($product['price']); ?></td>
                    <td><?php echo htmlspecialchars($product['description']); ?></td>
                    <td><img src="<?php echo BASE_URL . 'images/' . htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" width="100"></td>
                    <td>
                        <a href="<?php echo BASE_URL . 'admin/dashboard/edit/' . $product['id']; ?>">Edit</a>
                        <a href="<?php echo BASE_URL . 'admin/dashboard/delete/' . $product['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="6">No products available.</td></tr>
        <?php endif; ?>
    </tbody>
</table> 
//<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Product Management</h1>

        <!-- Add New Product Button -->
        <div class="mb-4">
            <a href="add_product.php" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                Add New Product
            </a>
        </div>

        <!-- Product Table -->
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Name</th>
                    <th class="py-2 px-4 border-b">Price</th>
                    <th class="py-2 px-4 border-b">Stock</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($data['products'])) : ?>
                    <?php foreach ($data['products'] as $product) : ?>
                        <tr>
                            <td class="py-2 px-4 border-b"><?= $product->id; ?></td>
                            <td class="py-2 px-4 border-b"><?= $product->name; ?></td>
                            <td class="py-2 px-4 border-b">$<?= number_format($product->price, 2); ?></td>
                            <td class="py-2 px-4 border-b"><?= $product->stock; ?></td>
                            <td class="py-2 px-4 border-b">
                                <a href="edit_product.php?id=<?= $product->id; ?>" class="text-blue-500 hover:text-blue-700">Edit</a> |
                                <a href="delete_product.php?id=<?= $product->id; ?>" class="text-red-500 hover:text-red-700" onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="5" class="py-2 px-4 text-center">No products found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
