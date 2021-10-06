<!DOCTYPE HTML>
<html lang="eng">
<?php

#This page is supposed to have the function that appends information to the csv file. 
require("csv_util.php");
function combineFormData(){
	
	$quote = $_POST['quote'];
	$authors = returnFile('authors.csv');
	$authorElement = 0;
	$newData = [];
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
<body>
	<h1>Quote has been Deleted</h2>
	<h3><a href="detail.php?">Detail page</a></h3>
	<h3><a href="index.php?">Back to Home</a></h3>
</body>
</html>
