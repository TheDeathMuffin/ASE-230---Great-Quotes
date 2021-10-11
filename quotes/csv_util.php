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
function returnRow($index, $csvFile = "authors.csv") {
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

#The OLD work-in-progress clearRow functions:
/*echo "Function for emptying the stored values for a CSV line:<br>";
$updatedData = array();
$csvArray = array();
$counter = 0;
$index = 3;				//determines which line to update
$file = fopen('data.csv', 'r+');
while (($line = fgetcsv($file)) !== FALSE) {
  $csvArray[] = $line;
}
print_r($csvArray);
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
echo '<br>';
echo '<br>';
echo '<br>';
print_r($csvArray);
fclose($file);
echo "<br>";
echo "<br>";
|||||||||||||||
echo "Function for emptying the stored values for a CSV line:<br>";
$csvArray = array();
$counter = 0;
$index = 2;		//determines which line to nullify
$file = fopen('data.csv', 'r+');
while (($line = fgetcsv($file)) !== FALSE) {
  $csvArray[] = $line;
}
rewind($file);
foreach ($csvArray as $line) {
	if ($counter == $index) {
		foreach ($line as $key => $value) {
			$line[$key] = "";
		}
	}
	fputcsv($file, $line);		
	$counter++;
}
print_r($csvArray);
echo "<br>";
echo "<br>";
fclose($file);
*/
































/*
$handle = fopen("data.csv", "r");
while (!feof($handle)) {
	$line = fgets($handle);
	print($line);
	$line = explode(",",$line);
	print_r($line);
	echo "<br>";
}
fclose($handle)
||||||||||
$array = str_getcsv(file_get_contents('data.csv'));
echo '<pre>';
print_r($array);
echo $array[4];
echo '</pre>';
||||||||||
$masterArray = array();
$file = fopen('data.csv', 'r');
while (($line = fgetcsv($file)) !== FALSE) {
  //$line is an array of the csv rows
  print_r($line);
  $masterArray[] = $line;
}
echo "<br>";
echo "<br>";
print_r($masterArray);
echo "<br>";
echo "<br>";
echo $masterArray[1][1];
fclose($file);
||||||||||
$id = 003;
$file = fopen('data.csv', 'r');
while (($line = fgetcsv($file)) !== FALSE) {
	if ($line[0] == $id) {	
		print_r($line);
		echo "<br>";
		echo "<br>";
		break;
	}
}
fclose($file);
||||||||||
$id = 003;				//This is the index that is input.
$csvArray = array();
$file = fopen('data.csv', 'r');
while (($line = fgetcsv($file)) !== FALSE) {
  $csvArray[] = $line;
}
foreach ($csvArray as $line) {
	if ($line[0] == $id) {
		print_r($line);
		echo '<br>';
		echo '<br>';
		break;
	}
}
fclose($file);
||||||||
$newData = array('999','Tea',12,'Apple','Steve');
$csvArray = array();
$file = fopen('data.csv', 'r+');
while (($line = fgetcsv($file)) !== FALSE) {
  $csvArray[] = $line;
}
$csvArray[] = $newData;
print_r($csvArray);
fputcsv($file, $csvArray);
echo "<br>";
echo "<br>";
echo "<br>";
fclose($file);
||||||||
$row = 4;				//This is the index that is input.
$csvArray = array();
$file = fopen('data.csv', 'r');
while (($line = fgetcsv($file)) !== FALSE) {
  $csvArray[] = $line;
}
print_r($csvArray[$row]);
fclose($file);
echo '<br>';
||||||||
echo "Function for reading CSV a single line from a CSV file depending on the index number specified:<br>";
$row = 3;				//This is the index that is input.
$counter = 0;
$file = fopen('data.csv', 'r');
while (($line = fgetcsv($file)) !== FALSE) {
	if ($counter == $row) {
		print_r($line);
		echo '<br>';
		break;
	}
	$counter ++;
}
fclose($file);
|||||||||||
echo "Function for returning a specified line <br>";
$row = 5;
$counter = 0;
$file = fopen('data.csv', 'r');
while ($counter <= $row) {
	$line = fgets($file);
	$counter++;
}
echo $line;
fclose($file);
echo '<br>';
echo '<br>';
||||||||||
echo "Function for adding a new line to a CSV file:<br>";
$newData = array(999,'NEW',999,'NEW','NEW');
$csvArray = array();
$file = fopen('data.csv', 'r');
while (($line = fgetcsv($file)) !== FALSE) {
  $csvArray[] = $line;
}
$csvArray[] = $newData;
fclose($file);
$file = fopen('data.csv', 'w');
foreach ($csvArray as $line) {
	fputcsv($file, $line);
}
print_r($csvArray);
echo "<br>";
echo "<br>";
fclose($file);
|||||||||||
echo "Function for updating a line in a CSV file:<br>";
$updatedData = "000,'UPDATED',000,'UPDATED','UPDATED'";
$csvArray = array();
$counter = 0;
$row = 3;
$file = fopen('data.csv', 'r+');
while ($row + 1 != $counter) {
	$line = fgets($file);
	$counter++;
}
var_dump($line);
fputs($file,$updatedData);
fclose($file);
echo "<br>";
echo "<br>";
|||||||||||
echo "Function for adding a new line to a CSV file:<br>";
$updatedData = array(000,'UPDATED',000,'UPDATED','UPDATED');
$csvArray = array();
$counter = 0;
$row = 9;				//determines which line to update
$file = fopen('data.csv', 'r');
while (($line = fgetcsv($file)) !== FALSE) {
  $csvArray[] = $line;
}
fclose($file);
$file = fopen('data.csv', 'w');
foreach ($csvArray as $line) {
	if ($counter == $row) {
			fputcsv($file, $updatedData);
	}
	else {
		fputcsv($file, $line);		
	}
	$counter++;
}
print_r($csvArray);
echo "<br>";
echo "<br>";
fclose($file);
||||||||||||
echo "Function for emptying the stored values for a CSV line:<br>";
$csvArray = array();
$counter = 0;
$row = 2;		//determines which line to nullify
$file = fopen('data.csv', 'r');
while (($line = fgetcsv($file)) !== FALSE) {
  $csvArray[] = $line;
}
fclose($file);
$file = fopen('data.csv', 'w');
foreach ($csvArray as $line) {
	if ($counter == $row) {
		foreach ($line as $key => $value)
			$line[$key] = "";
	}
	fputcsv($file, $line);		
	$counter++;
}
print_r($csvArray);
echo "<br>";
echo "<br>";
fclose($file);
|||||||||
echo "Function for deleting an entire line from the CSV file:<br>";
$csvArray = array();
$counter = 0;
$row = 5;		//determines which line to nullify
$file = fopen('data.csv', 'r');
while (($line = fgetcsv($file)) !== FALSE) {
  $csvArray[] = $line;
}
fclose($file);
$file = fopen('data.csv', 'w');
foreach ($csvArray as $line) {
	if ($counter == $row) {
		$counter++;
		continue;
	}
	fputcsv($file, $line);		
	$counter++;
}
print_r($csvArray);
echo "<br>";
echo "<br>";
fclose($file);
*/
?>