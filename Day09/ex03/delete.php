<?php

function deleteContent($file) {
	fclose(fopen($file,'w'));
}
require_once('select.php');
$file = fopen('list.csv', 'a+');
$csv = select();
deleteContent('list.csv');
foreach ($csv as $val) {
	if ($val[0] != $_GET['id'])
		fputcsv($file, $val, ';');
}
fclose($file);
