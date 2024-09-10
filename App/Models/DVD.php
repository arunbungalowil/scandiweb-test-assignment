<?php

namespace App\Models;
// use App\Models\Product;

class DVD extends Product
{
    protected $size;
    public function setSpecificData($data)
    {
        $this->size = $data['size'] ?? '';
    }
    public function getSpecificData()
    {
        return [
            'size' => $this->size
        ];
    }
    public function getSize()
    {
        return $this->size;
    }
    public function validateSpecificData(array $data) 
    {
        $errors = [];
        if (empty($data['size']) || !is_numeric($data['size']) || $data['size'] <= 0) 
        {
            $errors['size'] = 'Size is required for DVDs, must be numeric and must be greater than zero';
        }
        return $errors;
    }
    public function saveProductToDatabase()
    {
        $query = 'INSERT INTO products (sku, name, price, type, size) 
                                VALUES (:sku, 
                                        :name,
                                        :price, 
                                        :type, 
                                        :size)';
                                        
        $stmt = $this->databaseConnection->prepare($query);

        $stmt->bindParam(':sku', $this->getSku());
        $stmt->bindParam(':name', $this->getName());
        $stmt->bindParam(':price', $this->getPrice());
        $stmt->bindParam(':type', $this->getType());
        $stmt->bindParam(':size', $this->getSize());

        if ($stmt->execute()) 
        {
            return true; 
        } else 
        {
            return false; 
        }
    }
}