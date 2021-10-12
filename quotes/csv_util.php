<?php
//place data file as parameter for functions.

#ALL WORKING FUNCTIONS

#Function that reads contents of CSV-formatted file into a PHP array.
function returnFile($csvFile) {
	$csvArray = array();
	$file = fopen($csvFile, 'r');
	while ($line = fgetcsv($file)) {
	  $csvArray[] = $line;
	}
	return $csvArray;
	fclose($file);
}

#Function that reads contents of CSV-formatted file and returns specified row.
function returnRow($index, $csvFile = "../authors/authors.csv") {
	$counter = 0;
	$csvArray = array();
	$file = fopen($csvFile, 'r');
	while ($line = fgetcsv($file)) {
	  $csvArray[] = $line;
		if ($counter == $index) { $returnRow = $line; }
	  $counter++;
	}
	fclose($file);
	return $returnRow;
}

#Function for adding a new record in a CSV-formatted file
function createRow($newData, $csvFile = 'quotes.csv') {
	$file = fopen($csvFile, 'a');
	fputcsv($file, $newData);
	fclose($file);
}

#(Works)Function for modifying the record on a specific row of a CSV-formatted file.
function modifyRow($index, $updatedData, $csvFile = 'quotes.csv') {
	$csvArray = array();
	$x = 0;
	$handle = fopen($csvFile, 'r');
	while (!feof($handle)) {
	  $line = fgetcsv($handle,1000,",");
	  //conditional checks if the current line is empty
	  if($line == "")
		  break;
	  $csvArray[] = $line;
	}
	fclose($handle);
	//Conditional statement used to modify data in csvArray
	if($index == 0){
		array_splice($csvArray[$index], 0, count($csvArray[$index]), $updatedData);
	} else {
		array_splice($csvArray[$index], 0, count($csvArray[$index]), $updatedData);
	}
	
	$handle2 = fopen('quotes.csv', 'w');
	for($i = 0; $i < count($csvArray); $i++){
		fputcsv($handle2, $csvArray[$i]);
	}
	fclose($handle2);
}

#(Works Properly)Function for deleting an entire line from the CSV file
function deleteRow($index, $csvFile) {
	$updatedData = array();
	$csvArray = array();
	$x = 0;
	$handle = fopen($csvFile, 'r');
	while (!feof($handle)) {
	  $line = fgetcsv($handle,1000,",");
	  //conditional checks if the current line is empty
	  if($line == "")
		  break;
	  $csvArray[] = $line;
	}
	fclose($handle);
	$handle2 = fopen($csvFile, 'w');
	if($index == 0){
		array_splice($csvArray, $index, $index+1);
	} else {
		array_splice($csvArray, $index, $index);
	}
	
	for($i = 0; $i < count($csvArray); $i++){
		fputcsv($handle2, $csvArray[$i]);
	}
	fclose($handle2);
}

#Function for emptying record on a specific Line of a CSV-Formatted File (Leaves an empty line)
function clearRow($index, $csvFile = 'quotes.csv'){
	$handle = fopen($csvFile, 'r+');
	$temp = fopen('temp.csv', 'w+');
	$counter = 0;
	while (!feof($handle)){
		$line = fgets($handle);
		if($counter == $index){
			fputs($temp, PHP_EOL);
		} else {
			fputs($temp, $line);
		}	
		$counter++;
	}
	fclose($handle);
	fclose($temp);
	rename('temp.csv',$csvFile);
}




#ALL OUTDATED OR BROKEN FUNCTIONS

#(Broken)Function for modifying the record on a specific row of a CSV-formatted file.
function modifyRowBroken($index, $updatedData) {
	$csvArray = array();
	$counter = 0;
	$file = fopen('quotes.csv', 'r+');
	while (($line = fgetcsv($file)) !== FALSE) {
	  $csvArray[] = $line;
	}
	rewind($file);
	foreach ($csvArray as $line) {
		if ($counter == $index) {
				fputcsv($file, $updatedData);
		}
		else {
			fputcsv($file, $line);		
		}
		$counter++;
	}
	fclose($file);
}

#(Doesn't Work)Function for deleting an entire line from the CSV file
function deleteRowBroken($index) {
	$updatedData = array();
	$csvArray = array();
	$counter = 0;
	$file = fopen('quotes.csv', 'r+');
	while (($line = fgetcsv($file)) !== FALSE) {
	  $csvArray[] = $line;
	}
	rewind($file);
	foreach ($csvArray as $line) {
		if ($counter == $index) {
				$counter++;
				continue;
		}
		else {
			fputcsv($file, $line);		
		}
		$counter++;
	}
	fclose($file);
}

#(Works but could be better)Function for emptying the record on a specific line of a CSV-formatted file (leaves an empty line)
function outdatedClearRow($index) {
	$csvArray = array();
	$counter = 0;
	$handle = fopen('quotes.csv', 'r+');
	while (($line = fgets($handle)) !== FALSE) {
	  $csvArray[] = $line;
	}
	fclose($handle);
	foreach ($csvArray as $line) {
		if ($counter == $index) {
				$csvArray[$counter] = PHP_EOL;
		}
		$counter++;
	}
	$handle = fopen('quotes.csv', 'w+');
	foreach ($csvArray as $line){
		fputs($handle, $line);
	}
	fclose($handle);
}
?>