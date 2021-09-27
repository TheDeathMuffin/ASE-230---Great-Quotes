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




#Function that reads contents of CSV-formatted file into a PHP array
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
*/
/*
$array = str_getcsv(file_get_contents('data.csv'));
echo '<pre>';
print_r($array);
echo $array[4];
echo '</pre>';
*/
$masterArray = array();
$file = fopen('data.csv', 'r');
while (($line = fgetcsv($file)) !== FALSE) {
  //$line is an array of the csv elements
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
	







#Function that reads contents of CSV-formatted file and returns one element 

#Function for adding a new record in a CSV-formatted file

#Function for modifying the record on a specific line of a CSV-formatted file

#Function for empying the record on a specific line of a CSV-formatted file (removing the data, but not the entry altogether)

#Function for deleting an entire line from the file















?>