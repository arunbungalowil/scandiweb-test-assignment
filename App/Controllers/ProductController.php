<?php
namespace App\Controllers;
use App\Models\ProductFactory;
use App\Helpers\Utilities;
class ProductController
{
    // Show theproducts in the database
    public function viewProducts()
    {
        $products = ProductFactory::getAllProducts();
        require __DIR__.'/../Views/partials/ViewProducts.php';
    }
    // Product add form page.
    public function showAddProductPage()
    {
        require __DIR__.'/../Views/partials/AddProduct.php';
    }
    // Error page 
    public function showErrorPage()
    {
        require __DIR__.'/../Views/partials/404.php';
    }
    // Product field validation.
    public function saveProduct()
    {
        // Values are stored in variables. before that  we will trim and normalise the tags.
        // we are calling function bounded to the class Utilities for this purpose.

        $sku = isset($_POST['sku']) ? Utilities::escapeSpecialChars(trim($_POST['sku'])) : '';
        $name = isset($_POST['name']) ?  Utilities::escapeSpecialChars(trim($_POST['name'])) : '';
        $price = isset($_POST['price']) ? Utilities::escapeSpecialChars(trim($_POST['price'])) : '';
        $productType = isset($_POST['productType']) ? Utilities::escapeSpecialChars(trim($_POST['productType'])) : '';

        $errors = [];  // error are stored in the array.


        if (empty($sku) || !preg_match('/^[a-zA-Z0-9\-]+$/', $sku)) 
        {
            $errors['sku'] = 'SKU is required and may contain only letters,numbers, and hyphens.';
        }
        if (empty($name) || !preg_match('/^[a-zA-Z\s]+$/', $name))
        {
            $errors['name'] = 'Name is required and may contain only letters,and spaces.';
        }
        if (empty($price) || !is_numeric($price) || $price <= 0) 
        {
            $errors['price'] = 'Price is required, must be numeric and must be greater than zero';
        }
        if (empty($productType)) 
        {
            $errors['productType'] = 'Product type is required';
        }

        $product = ProductFactory::createProduct($productType);
        $product->setSpecificData($_POST);
        $getData = $product->getSpecificData();
        $validationErrors = $product->validateSpecificData($getData);
        $fieldSpecificErrors = array_merge($errors,$validationErrors);


        if (ProductFactory::skuExists($sku)) 
        {
            $fieldSpecificErrors['sku'] = 'SKU already exists';  
        }

        if (!empty($fieldSpecificErrors)) 
        {
            $_POST;
            require __DIR__ . '/../Views/partials/AddProduct.php';
            die();
        }

        $product->setSku($sku);
        $product->setName($name);
        $product->setPrice($price);
        $product->settype($productType);

        if ($product->saveProductToDatabase()) 
        {
            header('Location: /viewproducts');
        } else 
        {
            $errors['database'] = 'Failed to save product to database';
            require __DIR__ . '/../Views/partials/AddProduct.php';
        }   
    }
    public function deleteProducts()
    {
        ProductFactory::del();
    }
}