<?php

namespace app\controllers;

use app\Database;
use app\models\productTypes\InvalidProduct;
use app\Router;

class ProductController
{
    public static function index(Router $router)
    {
        $database = new Database();
        $router->renderView('index', [
            'products' => $database->getProducts()
        ]);
    }

    public static function create(Router $router)
    {
        $product = new InvalidProduct([]);
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productData = [];
            foreach ($_POST as $key => $value) {
                $productData[$key] = $value;
            }

            $providedProduct = "app\\models\\productTypes\\" . $_POST['productType'];

            if (class_exists($providedProduct)) {
                $product = new $providedProduct($productData);
            } else {
                $product = new InvalidProduct($productData);
            }

            $errors = $product->validateProduct();

            if (!$errors) {
                $db = new Database();
                $db->createProduct($product);
                header('Location: /');
                exit;
            }
        }

        $router->renderView('create', [
            'errors' => $errors
        ]);
    }

    public static function delete()
    {
        if ($_POST) {
            for ($i = 0; $i < count($_POST['checkedProducts']); $i++) {
                $database = new Database();
                $database->delete();
            }
        }
        header('Location: /');
    }
}