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
                return array(TRUE, $this->toJSON());
            } else {
                return array(FALSE, $conn->error);
            }
        }
    }
    
    
    function listProduc() {
        $db = new DataBase();
        $conn = $db->connect();
        if ($conn) {
            $sql = "SELECT id,nombre,codigo,valor FROM produto";
            if ($conn->query($sql)) {

                $rs = $conn->query($sql);
             // print_r(mysqli_fetch_assoc($rs));

                return mysqli_fetch_all($rs);
            }
        }
    }

    function toJSON() {
        $arr = array(
            'id' => "",
            'nombre' => $this->nombre,
            'codigo' => $this->codigo, 
            'valor' => $this->valor,
        );
        return json_encode($arr);
    }

}

?>
