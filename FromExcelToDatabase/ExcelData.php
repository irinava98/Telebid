<?php


   
	$server="localhost";
	$username="root";
	$password="";
	$dbname="people";
	
	
	$conn=mysqli_connect($server,$username,$password,$dbname);
 
	  if (!$conn)
	  {
		die('Could not connect: ' . mysql_error());
	  }


	$loadFile="People_Data.xlsx";
	require('Classes/PHPExcel.php');
	require_once('Classes/PHPExcel/IOFactory.php');
	$objExcel=PHPExcel_IOFactory::load($loadFile);
	foreach($objExcel->getWorksheetIterator() as $worksheet){
		$highestRow=$worksheet->getHighestRow();
		for($row=2;$row<=$highestRow;$row++){
			$name=$worksheet->getCellByColumnAndRow(0,$row)->getValue();
			$last_name=$worksheet->getCellByColumnAndRow(1,$row)->getValue();
			$ucn=$worksheet->getCellByColumnAndRow(2,$row)->getValue();
			$phone_number=$worksheet->getCellByColumnAndRow(3,$row)->getValue();
			$date_of_birth=$worksheet->getCellByColumnAndRow(4,$row)->getValue();
			
			echo $name;
			echo "<br>";
			echo $last_name;
			echo "<br>";
			echo $ucn;
			echo "<br>";
			echo $phone_number;
			echo "<br>";
			echo $date_of_birth;
			echo "<br>";
			echo "<br>";
			echo "NEXT PERSON";
			echo "<br>";
			echo "<br>";
			
			    
			    $insert = "INSERT INTO people(name, last_name, ucn, phone_number, date_of_birth) VALUES('".$name."', '".$last_name."', '".$ucn."', '".$phone_number."', '".$date_of_birth."')";
			    $conn->query($insert);
				
		}
	}
	
	
	$conn->close();	
?>

