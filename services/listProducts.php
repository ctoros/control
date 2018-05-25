<?php

include("producto.php");

$product = new Producto();
$productss = Array();
$productss = $product->listProduc();


echo json_encode($productss);
?>
