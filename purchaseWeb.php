<?php

function sumar($a,$b)
{
	return $a+$b;
}

function restar($a,$b)
{
	return $a-$b;
}

function purchase($idProduct,$quantity,$porcent,$pay){
include_once './Data/purchaseData.php';
include_once './Domain/purchase.php';
$data= new purchaseData();
$purchase = new purchase();
$purchase->setIdSupplier($data->getIdSupplier($idProduct));
$purchase->setTotalPurchase($quantity);
$purchase->setNetPrice($data->getPrice($idProduct));
$purchase->setGrossPrice((int)($data->getPrice($idProduct))*(int)($porcent));
$purchase->setCanceled($pay);
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