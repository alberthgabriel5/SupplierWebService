<?php

function sumar($a,$b)
{
	return $a+$b;
}

function restar($a,$b)
{
	return $a-$b;
}

function purchase($idProduct, $quantity, $pay) {
    include_once './Data/purchaseData.php';
    include_once './Domain/purchase.php';
    $data = new purchaseData();
    $purchase = new purchase();
    $purchase->setIdProduct($idProduct);    
    $purchase->setTotalPurchase($quantity);
    $purchase->setNetPrice($data->getPrice($idProduct));
    $purchase->setGrossPrice((int) ($data->getPrice($idProduct)) * 7);
    $purchase->setCanceled($pay);
    $insert = $data->insertPurchase($purchase);

    if ($insert) {
        return "sucess";
    } else {
        return "errorSQL";
    }
    return "errorData";
}
function compra($idProduct, $quantity, $pay) {
    include_once './Data/purchaseData.php';
    include_once './Domain/purchase.php';
    $data = new purchaseData();
    $purchase = new purchase();
    $purchase->setIdProduct($idProduct);    
    $purchase->setTotalPurchase($quantity);
    $purchase->setNetPrice($data->getPrice($idProduct));
    $purchase->setGrossPrice((int) ($data->getPrice($idProduct)) * 7);
    $purchase->setCanceled($pay);
    $insert = $data->insertPurchase($purchase);

    if ($insert) {
        return "sucess";
    } else {
        return "errorSQL";
    }
    return "errorData";
}
       


// turn off the wsdl cache
ini_set("soap.wsdl_cache_enabled", "0");

$server = new SoapServer("scramble.wsdl");

$server->addFunction("sumar");
$server->addFunction("restar");
$server->addFunction("purchase");
$server->addFunction("compra");

$server->handle();

?>