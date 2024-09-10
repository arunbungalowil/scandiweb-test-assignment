<?php $title = "View Products";?>
<?php require __DIR__. '/../layouts/header.php';?>

<body>
    <!-- Header Section -->
    <header class="header">
        <div id="error-message" style="color: red;"></div>
        <div class="container">
            <h1>Product List</h1>
            <div class="header-buttons">
                <a href="/addproduct"><button id="add-button">ADD</button></a>
                <button id="delete-product-btn" class="mass-delete" type="submit">MASS DELETE</button>
            </div>
        </div>
    </header>

    <!-- Main Content Section -->
    <main class="main">
        <hr>
        <section class="product-list">
            <?php foreach($products AS $product): ?>
                <div class="product-card" >
                    <input type="checkbox" class="delete-checkbox" value = "<?php echo htmlspecialchars($product->getId()); ?>">
                    <div class="product-info">
                        <p> <?php echo htmlspecialchars($product->getSku());?> </p>
                        <p> <?php echo htmlspecialchars($product->getName()); ?> </p>
                        <p> <?php echo htmlspecialchars($product->getPrice()). ' $'; ?> </p>

                        <?php if ($product->getType() === 'Book'): ?>
                            Weight: <?php echo htmlspecialchars($product->getWeight()). ' KG'; ?>
                        <?php elseif ($product->getType() === 'DVD'): ?>
                             Size: <?php echo htmlspecialchars($product->getSize()). ' MB'; ?>
                        <?php elseif ($product->getType() === 'Furniture'): ?>
                             Dimensions: <?php echo htmlspecialchars($product->getHeight()) . ' x ' .
                                         htmlspecialchars($product->getWidth()) . ' x ' .
                                         htmlspecialchars($product->getLength()); ?>
                    <?php endif; ?>
                    </div>
                 </div>
            <?php endforeach; ?>
        </section>
    </main>

    <!-- Footer Section -->
<?php
    $includeJs = false;
    $includeDeleteJs = true;
    require __DIR__ . '/../layouts/footer.php';
?>
