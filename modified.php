<?php

require('csv_util.php');

function combineFormData(){
	
	$quote = $_POST['quote'];
	$authors = returnFile('authors.csv');
	$authorElement = 0;
	$newData = [];
	print_r($authors);
	//loop to find the index for a specific author's name
	for($x = 0; $x < count($authors); $x++){
		if ($authors[$x][0] == $_POST['author']){
			$authorElement = $x;
		}
	}
	$newData[] = $quote;
	$newData[] = $authorElement;
	return $newData;
}

modifyRow($_GET['quoteIndex'], combineFormData());
?>