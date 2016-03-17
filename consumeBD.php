<?php
// Conectando, seleccionando la base de datos
$link = mysql_connect('localhost', 'examen', '3xamen')
    or die('No se pudo conectar: ' . mysql_error());
//echo 'Connected successfully';
mysql_select_db('examen') or die('No se pudo seleccionar la base de datos');



$q='select distinct(Date_exchange_rate) as fecha, exchange_rate as tipocambio
	from exchangerates
	order by Date_exchange_rate desc
	limit 10';
$e=mysql_query($q);
$res=array();
while($row=mysql_fetch_array($e)){
	$item=array(
		'fecha'=>$row['fecha'],
		'tipocambio'=>$row['tipocambio']
	);
	array_push($res,$item);
}

echo json_encode($res);
?>