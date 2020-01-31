<?php
$html = "";
if ($_POST["pais"]=='ECUADOR') {
	$html = '
	<option value="PICHINCHA">PICHINCHA</option>
	<option value="GUAYAS">GUAYAS</option>
	<option value="AZUAY">AZUAY</option>
	<option value="BOLIVAR">BOLIVAR</option>
	';	
}
if ($_POST["pais"]=='ESPAÑA') {
	$html = '
	<option value="LA RIOJA">LA RIOJA</option>
	<option value="MADRID">MADRID</option>
	<option value="VALENCIA">VALENCIA</option>
	';	
}
if ($_POST["pais"]=='COLOMBIA') {
	$html = '
	<option value="CALI">CALI</option>
	<option value="BOGOTA">BOGOTA</option>
	<option value="MEDELLIN">MEDELLIN</option>
	';	
}
if ($_POST["pais"]=='OTRO') {
	$html = '
	<option value="1=OTRO">OTRO</option>
	';	
}
echo $html;	
?>