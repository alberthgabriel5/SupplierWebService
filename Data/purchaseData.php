<?php

include_once 'Data.php';
include_once '../../Domain/purchase.php';
/*
 * Clase para transacciones SQL de las compras a provedor
 * 
 */

class purchaseData extends Data {

    function getIdPurchase() {
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
//Se consulta por el ultimo id registrado para generar el consecutivo
        $resultID = mysqli_query($conn, "select idPurchase from tbpurchasingsupplier order by idPurchase desc limit 1");
        $row = mysqli_fetch_array($resultID);
        if (sizeof($row) >= 1) {
            $id = $row['idPurchase'] + 1;
        } else {
            $id = 1;
        }
        return id;
    }

    function getIdOutlay() {
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
//Se consulta por el ultimo id registrado para generar el consecutivo
        $resultID = mysqli_query($conn, "select idOutlay from tboutlay order by idOutlay desc limit 1");
        $row = mysqli_fetch_array($resultID);
        if (sizeof($row) >= 1) {
            $id = $row['idOutlay'] + 1;
        } else {
            $id = 1;
        }
        return id;
    }

    /*
     * Función que permite el registro de las compras a los provedores en la base de datos
     * primero consulta el id para crear un consecutivo y luego registra el nuevo
     * @param type $purchase
     * @return boolean
     */

    function insertPurchase($purchase) {
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $id = $this->getIdPurchase();
        $bill = ((int) $id * 1000) + (int) $purchase->getIdProduct();
        $supplier = $this->getIdSupplier($purchase->getIdProduct());
        $descrition = $bill . $supplier;
        if ($purchase->getCanceled() == 1) {
            $queryInsert = mysqli_query($conn, "insert into tbpurchasingsupplier values (" .
                    $id . "," .
                    $bill . "," .
                    $purchase->getIdProduct() . "," .
                    $supplier . ",'" .
                    date('Y-m-d') . "','" .
                    $descrition . "'," .
                    $purchase->getTotalPurchase() . "," .
                    $purchase->getGrossPrice() . "," .
                    $purchase->getNetPrice() . ",0);");
        } else {
            $queryInsert = mysqli_query($conn, "insert into tbpurchasingsupplierpayable values (" .
                    $id . "," .
                    $bill . "," .
                    $purchase->getIdProduct() . "," .
                    $supplier . ",'" .
                    date('Y-m-d') . "','" .
                    $descrition . "'," .
                    $purchase->getTotalPurchase() . "," .
                    $purchase->getGrossPrice() . "," .
                    $purchase->getNetPrice() . ",0,0);");
        }
        if ($queryInsert) {
            $queryInsert2 = mysqli_query($conn, "insert into  tbOutlay values(" .
                    $this->getIdOutlay() . "," . $purchase->getCanceled() . "," .
                    $supplier . ",'" . date('Y-m-d') . "');");
            mysqli_close($conn);
            return $queryInsert2;
        } else {
            return $queryInsert;
        }
    }//fin function insertpurchase      
    function getIdSupplier($idProduct){
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select idSupplierty from tbsupplierxproduct where idProduct=".$idProduct.";");
        $consult= mysqli_fetch_assoc($result);
        $name = $consult['idSupplierty'];
        mysqli_close($conn);
        return $name;
    }
    function getNameSupplier($idSupplier){
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select nameSupplier from tbsupplier where idSupplier=".$idSupplier.";");
        $consult= mysqli_fetch_assoc($result);
        $name = $consult['nameSupplier'];
        mysqli_close($conn);
        return $name;
    }
    function getNameProduct($idProduct){
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select nameProduct from tbproduct where idProduct=".$idProduct.";");
        $consult= mysqli_fetch_assoc($result);
        $name = $consult['nameProduct'];
        mysqli_close($conn);
        return $name;
    }
    function getBrandProduct($idProduct){
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select brand from tbproduct where idProduct=".$idProduct.";");
        $consult= mysqli_fetch_assoc($result);
        $name = $consult['brand'];
        mysqli_close($conn);
        return $name;
    }
    function getModelProduct($idProduct){
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select model from tbproduct where idProduct=".$idProduct.";");
        $consult= mysqli_fetch_assoc($result);
        $name = $consult['model'];
        mysqli_close($conn);
        return $name;
    }
     function getPrice($idProduct) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select price from `tbproduct` where idProduct=".$idProduct." ;");
        $row = mysqli_fetch_assoc($result);
        $answer=$row['price']; 
        mysqli_close($conn);
        return $answer;
    }    
}

