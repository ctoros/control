<?php

include("producto.php");
//echo $_POST[""];

$idproducto = 2;
//$idproducto = $_POST["id"]; 
$product = new Producto();
$productss = Array();
$arrayProduct = Array();
$productss = $product->traerProductoId($idproducto);
//$resp = [];
//foreach($productss as $p) {
//	$arrayProduct = $p->toArray();
//	array_push($resp, $arrayProduct);
//}

header('Content-Type: application/json');
//echo json_encode($resp);
echo json_encode($productss);
?>