<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Illuminate\Support\Collection;





$collection = new Collection([
    ["Product" => "OPPO7", "price" => '20000'],
]);


var_dump($collection->all());


