<?php

require __DIR__.'/models/Product.php';

$products = Product::readAll();

require __DIR__.'/views/products/browse.php';

?>