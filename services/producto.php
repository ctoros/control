<?php

include("connect.php");

class Producto {

    public $id = "";
    public $nombre = "";
    public $codigo = "";
    public $valor = "";

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

    function save() {
        $db = new DataBase();
        $conn = $db->connect();
        if ($conn) {
            $sql = "INSERT INTO produto (nombre, codigo, valor) VALUES ('" . $this->nombre . "', '" . $this->codigo . "', '" . $this->valor . "')";
            if ($conn->query($sql) === TRUE) {
                return array(TRUE, $this->toArray());
            } else {
                return array(FALSE, $conn->error);
            }
        }
    }

    function listProduc() {
        $productos = [];

        $db = new DataBase();
        $conn = $db->connect();
        if ($conn) {
            $sql = "SELECT id,nombre,codigo,valor FROM produto";
            if ($conn->query($sql)) {

                $rs = $conn->query($sql);
                // print_r(mysqli_fetch_assoc($rs));
                while ($fila = mysqli_fetch_assoc($rs)) {
//                 print_r($fila);
                    $p = new Producto();
                    $p->setId($fila['id']);
                    $p->setNombre($fila['nombre']);
                    $p->setValor($fila['valor']);
                    $p->setCodigo($fila['codigo']);

                    array_push($productos, $p);
                }
                return $productos;

//                return mysqli_fetch_all($rs);
            }
        }
    }
    function traerProductoId($idp) {
        $productos = [];
//        $idp  = 1;

        $db = new DataBase();
        $conn = $db->connect();
        if ($conn) {
//            $sql = "SELECT id,nombre,codigo,valor FROM produto where id = '".$idp."'";
            $sql = "SELECT id,nombre,codigo,valor FROM produto where id ='".$idp."' ";
            echo $idp;
            if ($conn->query($sql)) {

                $rs = $conn->query($sql);
                // print_r(mysqli_fetch_assoc($rs));
                while ($fila = mysqli_fetch_assoc($rs)) {
//                 print_r($fila);
                    $p = new Producto();
                    $p->setId($fila['id']);
                    $p->setNombre($fila['nombre']);
                    $p->setValor($fila['valor']);
                    $p->setCodigo($fila['codigo']);

                    array_push($productos, $p);
                }
                return $productos;

//                return mysqli_fetch_all($rs);
            }
        }
    }

    function toArray() {
        $arr = array(
            'id' => $this->id,
            'nombre' => $this->nombre,
            'codigo' => $this->codigo,
            'valor' => $this->valor
        );
        return json_encode($arr);
    }

}

?>
