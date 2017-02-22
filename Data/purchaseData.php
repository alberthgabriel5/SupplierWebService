<?php
include_once 'Data.php';
include_once '../../Domain/purchase.php';
/* 
 * Clase para transacciones SQL de las compras a provedor
 * 
 */
class purchaseData extends Data
{
    /*
     * Función que permite el registro de las compras a los provedores en la base de datos
     * primero consulta el id para crear un consecutivo y luego registra el nuevo
     * @param type $purchase
     * @return boolean
     */
    function insertPurchase($purchase) {
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
//Se consulta por el ultimo id registrado para generar el consecutivo
        $resultID = mysqli_query($conn, "select idPurchases from tbpurchasingsupplier order by idPurchases desc limit 1");
        $row = mysqli_fetch_array($resultID);
        if (sizeof($row) >= 1) {
            $id = $row['idPurchases'] + 1;
        } else {
            $id = 1;
        }
        $queryInsert = mysqli_query($conn, "insert into tbpurchasingsupplier values (" .
                $id . ",'" .
                $purchase->getIdSupplier() . "','".
                date('Y-m-d')."','" .
                $purchase->getDescriptionPurchase() . "'," .
                $purchase->getIdProduct() . "," .
                $purchase->getTotalPurchase() .");");
            
        mysqli_close($conn);
        return $queryInsert;
        
    }//fin function insertsupplier      
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
}

