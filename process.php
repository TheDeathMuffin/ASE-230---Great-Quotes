<?php

#This page is supposed to have the function that appends information to the csv file. 
require("csv_util.php");
function readCSV($csvFile){
	$newData = $_POST;
	$csvArray = array();
	$handle = fopen($csvFile, 'r');
	while (($line = fgetcsv($handle)) !== FALSE) {
		$csvArray[] = $line;
	}
	return $csvArray;
	fclose($handle);
}
function combineFormData(){
	
	$quote = $_POST['quote'];
	$authors = returnFile('authors.csv');
	$authorElement = 0;
	$newData = [];
	print_r($authors);
	for($x = 0; $x < count($authors); $x++){
		if ($authors[$x][0] == $_POST['author']){
			$authorElement = $x;
		}
	}
	$newData[] = $quote;
	$newData[] = $authorElement;
	return $newData;
}
createRow(combineFormData());
/*
function addQuote($quote, $file){
	//if(!$_P)
}
var_dump($_POST);
*/
//echo $_POST['quote']." ".$_POST['author'];
?>
