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

    public static function createProduct($type) 
    {
        if (!array_key_exists($type, self::$productMap)) 
        {
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
        while($row = $stmt->fetch())
        {
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

    public static function del()
    {
        ob_clean();
        header('Content-Type: application/json');

        $data = json_decode(file_get_contents('php://input'), true);
        $ids = isset($data['ids']) ? $data['ids'] : [];

        if (!empty($ids)) 
        {
            $database = new Database();
            $connection = $database->getConnection();

            $placeholders = implode(',', array_fill(0, count($ids), '?'));
            $stmt = $connection->prepare("DELETE FROM products WHERE id IN ($placeholders)");

            if ($stmt->execute($ids)) 
            {
                echo json_encode(['success' => true]);
            } else 
            {
                echo json_encode(['success' => false, 'error' => 'Failed to delete products']);
            }
        } 
        else 
        {
            echo json_encode(['success' => false, 'error' => 'No product IDs provided']);
        }
        return;
    }
}