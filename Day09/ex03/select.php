<?php

if (isset($_GET['action']) && $_GET['action'] == 'select')
	echo json_encode(select());

function select() {
	$csv = array();
	$file = fopen('list.csv', 'r');
	while (($ret = fgetcsv($file, 0, ';')) !== FALSE)
		array_push($csv, $ret);
	fclose($file);
	return $csv;
}

