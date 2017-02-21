<?php

/**
 * Description of Product
 *
 * @author michael
 */
class Product {

    private $idProduct;
    private $brand;
    private $name;
    private $model;
    private $serie;
    private $price;
    private $color;
    private $description;
    private $characteristics;
    private $typeProduct;
    private $pathImages = [];

    public function Product($brand, $model, $price, $color, $description, $name,$characteristics,$serie) {
        $this->brand = $brand;
        $this->model = $model;
        $this->price = $price;
        $this->color = $color;
        $this->description = $description;
        $this->name = $name;
        $this->serie = $serie;
        $this->characteristics = $characteristics;
    }

    static function ProductInvoice($brand, $model, $price) {
        
        return new self($brand,$model,$price,"","","","","");
       
    }
    
    static function ProductCar($idProduct,$brand, $model, $serie, $price, $name) {
        
        return new self($brand,$model,$price,"",$idProduct,$name,"",$serie);
       
    }

    public function getIdProduct() {
        return $this->idProduct;
    }

    public function setIdProduct($id) {
        $this->idProduct = $id;
    }

    public function getBrand() {
        return $this->brand;
    }

    public function setBrand($brand) {
        $this->brand = $brand;
    }

    public function getModel() {
        return $this->model;
    }

    public function setModel($model) {
        $this->model = $model;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getColor() {
        return $this->color;
    }

    public function setColor($color) {
        $this->color = $color;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getTypeProduct() {
        return $this->typeProduct;
    }

    public function setTypeProduct($typeProduct) {
        $this->typeProduct = $typeProduct;
    }

    public function getName() {
        return $this->name;
    }
    public function setName($name) {
        $this->name = $name;
    }
    
    public function getSerie() {
        return $this->serie;
    }
    public function setSerie($serie) {
        $this->name = $serie;
    }

     public function setCharacteristics($characteristics) {
        $this->characteristics = $characteristics;
    }

    public function getCharacteristics() {
        return $this->characteristics;
    }
    
    
    

    public function getPathImages() {
        return $this->pathImages;
    }

    public function setPathImages($path) {
        array_push($this->pathImages, $path);
    }

    public function getPathImagesDelete() {
        $path = "";
        for ($i = 0; $i < sizeof($this->pathImages); $i++) {
            if ($i < sizeof($this->pathImages) - 1) {
                $path .= $this->pathImages[$i] . ';';
            } else {
                $path .= $this->pathImages[$i];
            }
        }
        return $path;
    }

}
