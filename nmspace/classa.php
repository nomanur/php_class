<?php

use php_class\nmspace\classc;

include 'classb.php';

class classb
{
    public function name()
    {
        return $test = ['one','two'];
    }
}

$nm = new classc();

echo $nm->name();
