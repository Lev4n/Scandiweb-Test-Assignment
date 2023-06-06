<?php

namespace app\models\productTypes;

use app\models\Product;

class DVD extends Product
{
    protected function validateValue()
    {
        if (!$this->data['size']) {
            return "Please, provide size!";
        } else if ($this->data['size'] <= 0) {
            return "Please provide correct value!";
        } else {
            $this->value = 'Size: ' . $this->data['size'] . ' MB';
        }
    }
}