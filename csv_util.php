<?php
/*
$handle = fopen("data.csv", "r");
while (!feof($handle)) {
	$line = fgets($handle);
	$line = explode(",",$line);
		print_r($line);
		echo "<br>";
	}
fclose($handle)
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
*/
//str_getcsv() --- perhaps implement.
//use file_get_contents()

#Function that reads contents of CSV-formatted file into a PHP array
/*echo "Function for reading CSV into a PHP Array:<br>";
$csvArray = array();
$file = fopen('data.csv', 'r');
while ($line = fgetcsv($file)) {
  $csvArray[] = $line;
}
print_r($csvArray);
echo "<br>";
echo "<br>";
fclose($file);
*/

#WIP - Function that reads contents of CSV-formatted file and returns one row. Do we load everything into the array then return the currect index? Or do we chech each index and return the indicated one.
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
#!!!!!!!!!!!!!!!!!!!!!!!OR IT COULD BE THIS!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$row = 4;				//This is the index that is input.
$csvArray = array();
$file = fopen('data.csv', 'r');
while (($line = fgetcsv($file)) !== FALSE) {
  $csvArray[] = $line;
}
print_r($csvArray[$row]);
fclose($file);
echo '<br>';
#!!!!!!!!!!!!!!!!!!!!OR IT COULD BE THIS!!!!!!!!!!!!!!!!!!!!!!!!!!!
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


#Function for adding a new record in a CSV-formatted file
/*echo "Function for adding a new line to a CSV file:<br>";
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
*/


#WIP - Function for modifying the record on a specific line of a CSV-formatted file
/*echo "Function for adding a new line to a CSV file:<br>";
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
*/

#OLDDDDDDDD - Function for modifying the record on a specific line of a CSV-formatted file
/*echo "Function for adding a new line to a CSV file:<br>";
$updatedData = array(000,'UPDATED',000,'UPDATED','UPDATED');
$csvArray = array();
$counter = 0;
$row = 3;				//determines which line to update
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
*/

#Function for emptying the record on a specific line of a CSV-formatted file (removing the data, but not the entry altogether)
/*echo "Function for emptying the stored values for a CSV line:<br>";
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
*/

#Function for deleting an entire line from the CSV file
/*echo "Function for deleting an entire line from the CSV file:<br>";
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