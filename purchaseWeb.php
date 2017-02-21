<?php

function sumar($a,$b)
{
	return $a+$b;
}

function restar($a,$b)
{
	return $a-$b;
}

function purchase($description,$idProduct,$quantity){
include_once './Data/purchaseData.php';
include_once './Domain/purchase.php';
$purchase = new purchase(0,'NOW()',$description, $idProduct, $quantity);
$purchase->setIdPurchase(0);
$purchase->setIdSupplier(1);
$purchase->setDatePurchase(getdate());
$purchase->setDescriptionPurchase($description);
$purchase->setTotalPurchase($quantity);
$data= new purchaseData();
$insert=$data->insertPurchase($purchase);

if($insert){
    return "sucess";
}else
{
    return "errorSQL";
}


}
       


// turn off the wsdl cache
ini_set("soap.wsdl_cache_enabled", "0");

$server = new SoapServer("scramble.wsdl");

$server->addFunction("sumar");
$server->addFunction("restar");
$server->addFunction("purchase");

$server->handle();

?>