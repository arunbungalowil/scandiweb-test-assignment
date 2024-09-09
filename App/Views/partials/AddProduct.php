<?php $title = "Add Product";?>
<?php require __DIR__. '/../layouts/header.php';?>

<body>
    <!-- Header Section -->
    <header class="header">
        <div class="container">
            <h1>Product Add</h1>
            <div class="header-buttons">
                <button id="save-button" type="submit" form="product_form">Save</button>
                <a href="/viewproducts"><button id="cancel-button" type="button">Cancel</button></a>
            </div>
        </div>
    </header>

    <!-- Main Content Section -->
    <main class="main">
         <hr>
        <form id="product_form" action="/save" method="POST">

            <div class="form-group">
                <div class="form-field">
                    <label for="sku">SKU:</label>
                    <input type="text" id="sku" name="sku" placeholder = "Please provide sku">
                </div>
                <div class="error-class">
                    <span class="error" id="sku-error" >Please, submit required data</span>
                    <?php if(!empty($errors['sku'])) {echo $errors['sku']; } ?>
                </div>
            </div>
            <?php $errors['database']?? ''; ?>
            <div class="form-group">
                <div class="form-field">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" placeholder="Please provide name">
                </div>
                <div class="error-class">
                    <span class="error" id="name-error">Please, submit required data</span> 
                    <?php if(!empty($errors['name'])) {echo $errors['name']; } ?>
                </div>
            </div>

            <div class="form-group">
                <div class="form-field">
                    <label for="price">Price ($):</label>
                    <input type="number" id="price" name="price" placeholder="Please provide price in number" >
                </div>
                <div class="error-class">
                    <span class="error" id="price-error">Please, submit required data</span> 
                    <?php if(!empty($errors['price'])) {echo $errors['price']; } ?>
                </div>
            </div>

            <div class="form-group">
                <div class="form-field">
                    <label for="productType">Type Switcher:</label>
                    <select id="productType" name="productType" >
                        <option value="">Type Switcher</option>
                        <option value="DVD" id="DVD">DVD</option>
                        <option value="Book" id="Book">Book</option>
                        <option value="Furniture" id="Furniture">Furniture</option>
                    </select>
                </div>
                <div class="error-class">
                    <span class="error" id="productType-error">Product type is required</span>
                    <?php if(!empty($errors['productType'])) {echo $errors['productType']; } ?>
                </div>
            </div>

            <!-- Dynamic Section Based on Product Type -->
            <section id="product-specific">
                <!-- Product-specific fields will be dynamically injected here -->
            </section>
        </form>
    </main>

    <!-- Footer Section -->
<?php
    $includeJs = true;
    $includeDeleteJs = false;
    require __DIR__ . '/../layouts/footer.php';
?>