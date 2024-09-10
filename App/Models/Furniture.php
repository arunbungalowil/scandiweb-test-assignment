<?php

namespace App\Models;
// use App\Models\Product;
class Furniture extends Product
{
    protected $height;
    protected $width;
    protected $length;

    public function setSpecificData(array $data)
    {
        $this->height = $data['height'] ?? null;
        $this->width = $data['width'] ?? null;
        $this->length = $data['length'] ?? null;
    }
    public function getSpecificData()
    {
        return [
            'height' =>   $this->height,
            'width' => $this->width,
            'length' =>$this->length 
        ];
    }

    public function getHeight(){
        return $this->height;
    }
    public function getWidth(){
        return $this->width;
    }
    public function getLength(){
        return $this->length;
    }
    public function validateSpecificData(array $data, array $errors) {
        if (empty($data['height']) || !is_numeric($data['height']) || $data['height'] <= 0) {
            $errors['height'] = 'Height is required for Furniture, must be numeric and must be greater than zero';
        }
        if (empty($data['width']) || !is_numeric($data['width']) || $data['width'] <= 0) {
            $errors['width'] = 'Width is required for Furniture, must be numeric and must be greater than zero';
        }
        if (empty($data['length']) || !is_numeric($data['length']) || $data['length'] <= 0) {
            $errors['length'] = 'Length is required for Furniture, must be numeric and must be greater than zero';
        }
        return $errors;
    }

    public function saveProductToDatabase()
    {
        $query = 'INSERT INTO `products` 
                              (`sku`, `name`, `price`, `type`, `height`, `width`, `length`)     
                              VALUES (:sku, 
                                      :name,
                                      :price,
                                      :type, 
                                      :height, 
                                      :width,
                                      :length)';
        $stmt = $this->databaseConnection->prepare($query);

        $stmt->bindParam(':sku', $this->getSku());
        $stmt->bindParam(':name', $this->getName());
        $stmt->bindParam(':price', $this->getPrice());
        $stmt->bindParam(':type', $this->getType());
        $stmt->bindParam(':height', $this->getHeight());
        $stmt->bindParam(':width', $this->getWidth());
        $stmt->bindParam(':length', $this->getLength());


        if ($stmt->execute()) {
            return true; 
        } else {
            return false; 
        }
    }
}