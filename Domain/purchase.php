<?php

/* 
 * clase que almacena el objeto compra a proveedor
 */
class purchase
{
    private $idPurchase;
    private $idSupplier;
    private $datePurchase;
    private $descriptionPurchase;
    private $idProduct;
    private $totalPurchase;
    
    function purchase( $idSupplier, $datePurchase, $descriptionPurchase, $idProduct, $totalPurchase) {
        
        $this->idSupplier = $idSupplier;
        $this->datePurchase = $datePurchase;
        $this->descriptionPurchase = $descriptionPurchase;
        $this->idProduct = $idProduct;
        $this->totalPurchase = $totalPurchase;
    }
    
    public function getIdPurchase() {
        return $this->idPurchase;
    }

    public function getIdSupplier() {
        return $this->idSupplier;
    }

    public function getDatePurchase() {
        return $this->datePurchase;
    }

    public function getDescriptionPurchase() {
        return $this->descriptionPurchase;
    }

    public function getIdProduct() {
        return $this->idProduct;
    }

    public function getTotalPurchase() {
        return $this->totalPurchase;
    }

    public function setIdPurchase($idPurchase) {
        $this->idPurchase = $idPurchase;
    }

    public function setIdSupplier($idSupplier) {
        $this->idSupplier = $idSupplier;
    }

    public function setDatePurchase($datePurchase) {
        $this->datePurchase = $datePurchase;
    }

    public function setDescriptionPurchase($descriptionPurchase) {
        $this->descriptionPurchase = $descriptionPurchase;
    }

    public function setIdProduct($idProduct) {
        $this->idProduct = $idProduct;
    }

    public function setTotalPurchase($totalPurchase) {
        $this->totalPurchase = $totalPurchase;
    }



}
