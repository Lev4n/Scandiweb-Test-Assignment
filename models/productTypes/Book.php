<?php

namespace app\models\productTypes;

use app\models\Product;

class Book extends Product
{
    protected function validateValue()
    {
        if (!$this->data['weight']) {
            return "Please, provide weight!";
        } else if ($this->data['weight'] < 0) {
            return "Please provide correct value!";
        } else {
            $this->value = 'Weight: ' . $this->data['weight'] . 'KG';
        }
    }
}