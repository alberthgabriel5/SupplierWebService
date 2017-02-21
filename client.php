<form id="form1" name="form1" method="post" action="">
  <table width="23%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>a: </td>
      <td><input name="a" type="text" id="a" size="5" /></td>
    </tr>
    <tr>
      <td>b: </td>
      <td><input name="b" type="text" id="b" size="5" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="button" id="button" value="Submit" /></td>
    </tr>
  </table>
</form>
<?php
if(isset($_POST['a']) && isset($_POST['b']))
{
	// turn off the WSDL cache
	ini_set("soap.wsdl_cache_enabled", "0");
	
	$client = new SoapClient("http://localhost/SupplierWebService/scramble.wsdl");
	
	$a = $_POST['a'];
	$b = $_POST['b'];
	
	$resultado = $client->sumar($a,$b);
	print("La suma de los numeros : $a + $b es:  $resultado <br>");
	
	$resultado = $client->restar($a,$b);
	print("La resta de los numeros : $a - $b es: $resultado");
}

?>