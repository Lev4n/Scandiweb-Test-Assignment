<?php

namespace app;

use app\models\Product;
use PDO;

class Database
{
    public $pdo = null;


    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;port=3306;dbname=product_list', 'root', '');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getProducts()
    {
        $statement = $this->pdo->prepare('SELECT * FROM products');
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSKU($sku)
    {
        $statement = $this->pdo->prepare('SELECT * FROM products WHERE sku = :sku');
        $statement->bindValue(':sku', $sku);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function createProduct(Product $product)
    {
        $statement = $this->pdo->prepare("INSERT INTO products (sku, name, price, productType, value)
                VALUES (:sku, :name, :price, :productType, :value)");

        $statement->bindValue(':sku', $product->sku);
        $statement->bindValue(':name', $product->name);
        $statement->bindValue(':price', $product->price);
        $statement->bindValue(':productType', $product->productType);
        $statement->bindValue(':value', $product->value);

        $statement->execute();
    }

    public function delete()
    {
        for ($i = 0; $i < count($_POST['checkedProducts']); $i++) {
            $delProduct = $_POST['checkedProducts'][$i];
            $statement = $this->pdo->prepare("DELETE FROM products WHERE id = '$delProduct'");
            $statement->execute();
        }
    }
}
