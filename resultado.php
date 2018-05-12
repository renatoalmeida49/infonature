<?php
require("conexao.php");

function parseToXML($htmlStr){
	$xmlStr=str_replace('<','&lt;',$htmlStr);
	$xmlStr=str_replace('>','&gt;',$xmlStr);
	$xmlStr=str_replace('"','&quot;',$xmlStr);
	$xmlStr=str_replace("'",'&#39;',$xmlStr);
	$xmlStr=str_replace("&",'&amp;',$xmlStr);
	return $xmlStr;
}

// Select all the rows in the markers table
$result_markers = "SELECT * FROM denuncias";
$resultado_markers = mysqli_query($conn, $result_markers);

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';

// Iterate through the rows, printing XML nodes for each
while ($row_markers = mysqli_fetch_assoc($resultado_markers)){
  // Add to XML document node
  echo '<marker ';
  echo 'nomeRua="' . parseToXML($row_markers['nomeRua']) . '" ';
  echo 'numero="' . parseToXML($row_markers['numero']) . '" ';
  echo 'cep="' . parseToXML($row_markers['cep']) . '" ';
  echo 'bairro="' . parseToXML($row_markers['bairro']) . '" ';
  echo 'cidade="' . parseToXML($row_markers['cidade']) . '" ';
  echo 'estado="' . parseToXML($row_markers['estado']) . '" ';
  echo 'lat="' . $row_markers['lat'] . '" ';
  echo 'lng="' . $row_markers['lng'] . '" ';
  echo 'descricao="' . parseToXML($row_markers['descricao']) . '" ';
  echo '/>';
}

// End XML file
echo '</markers>';
