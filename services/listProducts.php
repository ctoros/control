<?php

include("producto.php");

$product = new Producto();
$productss = Array();
$arrayProduct = Array();
$productss = $product->listProduc();
//$resp = [];
//foreach($productss as $p) {
//	$arrayProduct = $p->toArray();
//	array_push($resp, $arrayProduct);
//}

header('Content-Type: application/json');
//echo json_encode($resp);
echo json_encode($productss);
?>
