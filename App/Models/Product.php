<?php
namespace App\Models;
abstract class Product
{
    protected $id;
    protected $sku;
    protected $name;
    protected $price;
    protected $type;
    private $databaseObject;  
    protected $databaseConnection;

    abstract public function setSpecificData(array $data);
    abstract public function getSpecificData();
    abstract public function validateSpecificData(array $data);
    abstract public function saveProductToDatabase();

    public function __construct()
    {
       $this->databaseObject = new Database();
       $this->databaseConnection = $this->databaseObject->getConnection();
    }

    public function setId($id)
    {
        $this->id = $id;
    }
 
    public function setSku($sku)
    {
        $this->sku = $sku;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setType($type)
    {
        $this->type = $type;
    }
    public function getId()
    {
        return $this->id;
    } 
   public function getSku()
   {
        return $this->sku;
    } 
    public function getName()
    {
        return $this->name;
    } 
    public function getPrice()
    {
        return $this->price;
    } 
    public function getType()
    {
        return $this->type;
    } 

}