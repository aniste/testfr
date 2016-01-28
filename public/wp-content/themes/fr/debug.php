<?php

// $felt = array();
// $input = $_GET['input'];

// foreach($input as $item) {
// 	echo $item;
// }

// $firstname = $_GET['firstname'];
// $lastname = $_GET['lastname'];

// $input = $_GET['input'];
// echo $input;


$felt = array();
foreach ( $_GET as $name => $value) { 
	$field_name = $name;
	// $field_value = $value;

	$felt[] = $value;
}

$felt_string = implode("<br>", $felt);

echo $felt_string;


?>