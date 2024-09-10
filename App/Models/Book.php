<?php

namespace App\Models;
// use App\Models\Product;
class Book extends Product
{
    protected $weight;
    
    public function setSpecificData($data)
    {
        $this->weight = $data['weight'] ?? '';
    }
    public function getSpecificData()
    {
        return [
            'weight' => $this->weight
        ];
    }
    public function getWeight(){
        return $this->weight;
    }

    public function validateSpecificData(array $data ,array $errors) {
        if (empty($data['weight']) || !is_numeric($data['weight']) || $data['weight'] <= 0) {
            $errors['weight'] = 'Weight is required for Books, must be numeric and must be greater than zero';
        }
        return $errors;
    }

    public function saveProductToDatabase()
    {
        $query = 'INSERT INTO products (sku, name, price, type, weight) 
                                VALUES (:sku, 
                                        :name, 
                                        :price, 
                                        :type, 
                                        :weight)';
                                        
        $stmt = $this->databaseConnection->prepare($query);

        $stmt->bindParam(':sku', $this->getSku());
        $stmt->bindParam(':name', $this->getName());
        $stmt->bindParam(':price', $this->getPrice());
        $stmt->bindParam(':type', $this->getType());
        $stmt->bindParam(':weight', $this->getWeight());

        if ($stmt->execute()) {
            return true; 
        } else {
            return false; 
        }
    }
}