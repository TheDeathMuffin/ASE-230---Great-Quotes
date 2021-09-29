<?php

#This page is supposed to have the function that appends information to the csv file. 
function readCSV($csvFile){
	$newData = $_POST;
	$csvArray = array();
	$handle = fopen($csvFile, 'r');
	while (($line = fgetcsv($handle)) !== FALSE) {
		$csvArray[] = $line;
	}
	foreach ($csvArray as $element)
	fclose($handle);
}
function createQuote($csvFile){
	
	$csvArray = array();
	$handle = fopen($csvFile, 'r');
	while (($line = fgetcsv($handle)) !== FALSE) {
		$csvArray[] = $line;
	}
	$authorHandle = fopen($"authors.csv", 'r');
	$authorArray = array();
	while (($line = fgetcsv($authorHandle)) !== FALSE) {
		$authorArray[] = $line;
	}
	$newData = $_POST;
	$csvArray[] = $newData;
	fclose($handle);
	$handle = fopen($csvFile, 'w');
	foreach ($csvArray as $line) {
		fputcsv($handle, $line);
	}
	print_r($newData);
	echo "<br>";
	echo "<br>";
	fclose($handle);
}
createQuote("quotes.csv");
/*
function addQuote($quote, $file){
	//if(!$_P)
}
var_dump($_POST);
*/
//echo $_POST['quote']." ".$_POST['author'];
?>
