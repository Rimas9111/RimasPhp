<?php

include ('Simple_Product.php');

$product = new Simple_Product();
$product->setName('Pavadinimas1');
$product->setQty(3);

$product2 = new Simple_Product();
$product2->setName('naujas 2 produktas');
$product2->setQty(5);

echo "<pre>";

print_r($product);

print_r($product2);

?>