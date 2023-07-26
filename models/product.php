<?php

namespace app\models;

use app\Database;

abstract class Product
{
    public string $sku;
    public string $name;
    public float $price;
    public string $productType;
    public string $value;
    public array $data;


    public function __construct($input)
    {
        $this->data = $input;
    }

    public function validateProduct()
    {
        $errors = [];
        if ($this->validateSKU()) {
            $errors[] = $this->validateSKU();
        }
        if ($this->validateName()) {
            $errors[] = $this->validateName();
        }
        if ($this->validatePrice()) {
            $errors[] = $this->validatePrice();
        }
        if ($this->validateProductType()) {
            $errors[] = $this->validateProductType();
        }
        if ($this->validateValue()) {
            $errors[] = $this->validateValue();
        }

        return $errors;
    }

    private function validateSKU()
    {
        if (!$this->data['sku']) {
            return "Product SKU is required!";
        } else {
            $this->sku = $this->data['sku'];
        }

        $database = new Database();
        if ($database->getSKU($this->data['sku'])) {
            return "SKU already exists";
        }
    }

    private function validateName()
    {
        if (!$this->data['name']) {
            return "Product name is required!";
        } else if (is_numeric($this->data['name'])) {
            return "Please, provide the data of indicated type";
        } else {
            $this->name = $this->data['name'];
        }
    }

    private function validatePrice()
    {
        if (!$this->data['price']) {
            return "Product price is required!";
        } else if ($this->data['price'] < 0) {
            return "Please provide correct price";
        } else {
            $this->price = floatval($this->data['price']);
        }
    }

    private function validateProductType()
    {
        if (!$this->data['productType']) {
            return "Please provide product details!";
        }
        $this->productType = $this->data['productType'];
    }

    abstract protected function validateValue();
}
