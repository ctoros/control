<?php

include("producto.php");

$method = $_SERVER['REQUEST_METHOD'];
if ($method == "POST") {
    $product = new Producto();
    $product->setNombre($_POST["nombre"]);
    $product->setCodigo($_POST["codigo"]);
    $product->setValor($_POST["valor"]);
    $resp = $product->save();
    if ($resp[0]) {
        http_response_code(200);
    } else {
        http_response_code(400);
    }
    echo $resp[1];
}
?>
