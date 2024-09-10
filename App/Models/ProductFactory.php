<?php
namespace App\Models;
use InvalidArgumentException;  

class ProductFactory
{
    protected static $productMap = [
        'DVD' => DVD::class,
        'Book' => Book::class,
        'Furniture' => Furniture::class
    ];

    public static function createProduct($type) {
        if (!array_key_exists($type, self::$productMap)) {
            throw new InvalidArgumentException("Invalid product type: $type");
        }

        $productClass = self::$productMap[$type];
        return new $productClass();
    }
    public static function skuExists($sku)
    {
        $database = new Database();
        $connection = $database->getConnection();
        
        $stmt = $connection->prepare("SELECT COUNT(*) FROM products WHERE sku = :sku");
        $stmt->bindValue(':sku', $sku);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    public static function getAllProducts()
    {
        $database = new Database();
        $connection = $database->getConnection();

        $query = 'SELECT * FROM products';
        $stmt = $connection->prepare($query);
        $stmt->execute();
        $products = [];
        while($row = $stmt->fetch()){
            $product = ProductFactory::createProduct($row['type']);
            $product->setId($row['id']);
            $product->setSku($row['sku']);
            $product->setName($row['name']);
            $product->setPrice($row['price']);
            $product->setType($row['type']);
            $product->setSpecificData($row);
            $products[] = $product;
        }
        return $products;
    }
}