<?php


   
	$server="localhost";
	$username="root";
	$password="";
	$dbname="ekatte";
	
	
	$conn=mysqli_connect($server,$username,$password,$dbname);
 
	  if (!$conn)
	  {
		die('Could not connect: ' . mysql_error());
	  }


	$loadFile="Ek_obst.xlsx";
	require('Classes/PHPExcel.php');
	require_once('Classes/PHPExcel/IOFactory.php');
	$objExcel=PHPExcel_IOFactory::load($loadFile);
	foreach($objExcel->getWorksheetIterator() as $worksheet){
		$highestRow=$worksheet->getHighestRow();
		for($row=2;$row<=$highestRow;$row++){
			$obstina=$worksheet->getCellByColumnAndRow(0,$row)->getValue();
			$ekatte=$worksheet->getCellByColumnAndRow(1,$row)->getValue();
			$name=$worksheet->getCellByColumnAndRow(2,$row)->getValue();
			$category=$worksheet->getCellByColumnAndRow(3,$row)->getValue();
			$document=$worksheet->getCellByColumnAndRow(4,$row)->getValue();
			$abc=$worksheet->getCellByColumnAndRow(5,$row)->getValue();
			
			echo $obstina;
			echo "<br>";
			echo $ekatte;
			echo "<br>";
			echo $name;
			echo "<br>";
			echo $category;
			echo "<br>";
			echo $document;
			echo "<br>";
			echo $abc;
			echo "<br>";
			echo "<br>";
			echo "NEXT ROW";
			echo "<br>";
			echo "<br>";
			
			    
			    $insert = "INSERT INTO ek_obst(obstina, ekatte, name, category, document, abc) VALUES('".$obstina."', '".$ekatte."', '".$name."', '".$category."', '".$document."', '".$abc."')";
			    $conn->query($insert);
				
		}
	}
	
	$loadFile="Ek_obl.xlsx";
	$objExcel=PHPExcel_IOFactory::load($loadFile);
	foreach($objExcel->getWorksheetIterator() as $worksheet){
		$highestRow=$worksheet->getHighestRow();
		for($row=2;$row<=$highestRow;$row++){
			$oblast=$worksheet->getCellByColumnAndRow(0,$row)->getValue();
			$ekatte=$worksheet->getCellByColumnAndRow(1,$row)->getValue();
			$name=$worksheet->getCellByColumnAndRow(2,$row)->getValue();
			$region=$worksheet->getCellByColumnAndRow(3,$row)->getValue();
			$document=$worksheet->getCellByColumnAndRow(4,$row)->getValue();
			$abc=$worksheet->getCellByColumnAndRow(5,$row)->getValue();
			
			echo $obstina;
			echo "<br>";
			echo $ekatte;
			echo "<br>";
			echo $name;
			echo "<br>";
			echo $category;
			echo "<br>";
			echo $document;
			echo "<br>";
			echo $abc;
			echo "<br>";
			echo "<br>";
			echo "NEXT ROW";
			echo "<br>";
			echo "<br>";
			
			    
			    $insert = "INSERT INTO ek_obl(oblast, ekatte, name, region, document, abc) VALUES('".$oblast."', '".$ekatte."', '".$name."', '".$region."', '".$document."', '".$abc."')";
			    $conn->query($insert);
				
		}
	}
	
	
	
	$loadFile="Ek_atte.xlsx";
	$objExcel=PHPExcel_IOFactory::load($loadFile);
	foreach($objExcel->getWorksheetIterator() as $worksheet){
		$highestRow=$worksheet->getHighestRow();
		for($row=3;$row<=$highestRow;$row++){
			$ekatte=$worksheet->getCellByColumnAndRow(0,$row)->getValue();
			$t_v_m=$worksheet->getCellByColumnAndRow(1,$row)->getValue();
			$name=$worksheet->getCellByColumnAndRow(2,$row)->getValue();
			$oblast=$worksheet->getCellByColumnAndRow(3,$row)->getValue();
			$obstina=$worksheet->getCellByColumnAndRow(4,$row)->getValue();
			$kmetstvo=$worksheet->getCellByColumnAndRow(5,$row)->getValue();
			$kind=$worksheet->getCellByColumnAndRow(6,$row)->getValue();
			$category=$worksheet->getCellByColumnAndRow(7,$row)->getValue();
			$altitude=$worksheet->getCellByColumnAndRow(8,$row)->getValue();
			$document=$worksheet->getCellByColumnAndRow(9,$row)->getValue();
			$tsb=$worksheet->getCellByColumnAndRow(10,$row)->getValue();
			$abc=$worksheet->getCellByColumnAndRow(11,$row)->getValue();
			
			echo $ekatte;
			echo "<br>";
			echo $t_v_m;
			echo "<br>";
			echo $name;
			echo "<br>";
			echo $oblast;
			echo "<br>";
			echo $obstina;
			echo "<br>";
			echo $kmetstvo;
			echo "<br>";
			echo $kind;
			echo "<br>";
			echo $category;
			echo "<br>";
			echo $altitude;
			echo "<br>";
			echo $document;
			echo "<br>";
			echo $tsb;
			echo "<br>";
			echo $abc;
			echo "<br>";
			echo "<br>";
			echo "NEXT ROW";
			echo "<br>";
			echo "<br>";
			
			    
			    $insert = "INSERT INTO ek_atte(ekatte, t_v_m, name, oblast, obstina, kmetstvo, kind, category, altitude, document, tsb, abc) VALUES('".$ekatte."', '".$t_v_m."', '".$name."', '".$oblast."', '".$obstina."', '".$kmetstvo."', '".$kind."', '".$category."', '".$altitude."', '".$document."','".$tsb."', '".$abc."')";
			    $conn->query($insert);
				
		}
	}
    
	
	
	
	$conn->close();	
?>

