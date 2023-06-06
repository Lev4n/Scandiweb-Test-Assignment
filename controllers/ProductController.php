<?php

namespace app\controllers;

use app\Database;
use app\models\productTypes\InvalidProduct;
use app\Router;

class ProductController
{
    public static function index(Router $router)
    {
        $products = $router->database->getProducts();
        $router->renderView('index', [
            'products' => $products
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

            $providedProduct = "app\\models\\productTypes\\".$_POST['productType'];

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

    public static function delete(Router $router)
    {
        $errors = [];
        if (!$_POST['checkedProducts']) {
            $errors = "Please select at least one prodyct!";
            header('Location: /');
        } else {
            for ($i = 0; $i < count($_POST['checkedProducts']); $i++) {
                $db = new Database();
                $db->delete();
            }
            header('Location: /');
        }
    }
}
