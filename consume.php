<?php
$datos=array();
$xml = simplexml_load_file('http://www.dof.gob.mx/indicadores.xml');

$i=0;
foreach ($xml->channel->item as $row) {
    $datos[$i]['title']=$row->title;
    $datos[$i]['description']=$row->description;
    $datos[$i]['valueDate']=$row->valueDate;
    $datos[$i]['pubDate']=$row->pubDate;
    $i++;
}

echo json_encode($datos);
?>