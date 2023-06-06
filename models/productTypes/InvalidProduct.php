<?php

namespace app\models\productTypes;

use app\models\Product;

class InvalidProduct extends Product
{
    protected function validateValue()
    {
        return "Please select type of product!"; 
    }
}