<?php 
error_reporting(E_ALL ^ E_WARNING); 

$obst="";
$obl="";
$sel="";
$err="";
$result="";

if(!empty($_POST))
{

	
	$obst=$_POST['nameObst'];
	$obl=$_POST['nameObl'];
	$sel=$_POST['nameSel'];
	
	$server="localhost";
	$username="root";
	$password="";
	$dbname="ekatte";
	
	
	$conn=mysqli_connect($server,$username,$password,$dbname);
	  if (!$conn)
	  {
		die('Could not connect: ' . mysql_error());
	  }
	  
				
	$submitObst=$_POST['searchObst'];
    if($submitObst){
	    if(!empty($obst)){
			
		    $searchObstFromDb="SELECT * FROM ek_obst WHERE name= '$obst'";
			$resultArrayFromSelectObst=$conn->query($searchObstFromDb);
			$row = $resultArrayFromSelectObst->fetch_row();
			
			if(!empty($row)){
		      $result="Община: ".$row[0]." Eкате: ".$row[1]." Име на община: ".$row[2]." Категория : ".$row[3]." Документ: ".$row[4]." Аbc: ".$row[5]."";	
			}
			else{
			 $result="Няма намерени резултати.";
			}
			
			$searchCountObst="SELECT COUNT(DISTINCT name) FROM ek_obst";
			$countObst=$conn->query($searchCountObst);
			$row = $countObst->fetch_row();
			echo "<h3> Брой общини: ".$row[0]."</h3>";
		}
		else{
			$result="Не сте въвели стойност.";
		}
	}	
	
	
    $submitObl=$_POST['searchObl'];
    if($submitObl){
	    if(!empty($obl)){
			
		    $searchOblFromDb="SELECT * FROM ek_obl WHERE name= '$obl'";
			$resultArrayFromSelectObl=$conn->query($searchOblFromDb);
			$row = $resultArrayFromSelectObl->fetch_row();
			
			if(!empty($row)){
		      $result="Област: ".$row[0]." Eкате: ".$row[1]." Име на област: ".$row[2]." Регион : ".$row[3]." Документ: ".$row[4]." Аbc: ".$row[5]."";	
			}
			else{
			  $result="Няма намерени резултати.";
			}
			
			$searchCountObl="SELECT COUNT(DISTINCT name) FROM ek_obl";
			$countObl=$conn->query($searchCountObl);
			$row = $countObl->fetch_row();
			echo "<h3> Брой области: ".$row[0]."</h3>";
		}
		else{
			$result="Не сте въвели стойност.";
		}
	}
	
		
    $submitSel=$_POST['searchSel'];
    if($submitSel){
	    if(!empty($sel)){
			
		    $searchSelFromDb="SELECT * FROM ek_atte WHERE name= '$sel'";
			$resultArrayFromSelectSel=$conn->query($searchSelFromDb);
			$row = $resultArrayFromSelectSel->fetch_row();
			
			if(!empty($row)){
		      $result="Eкате: ".$row[0]." t_v_m: ".$row[1]." Име на селище: ".$row[2]." Област : ".$row[3]." Община: ".$row[4]." Кметство: ".$row[5]." Kind: ".$row[6]." Категория: ".$row[7]." Надморска височина: ".$row[8]." Документ: ".$row[9]." Tsb: ".$row[10]." Abc: ".$row[11]."";	
			}
			else{
			 $result="Няма намерени резултати.";
			}
			
			$searchCountSel="SELECT COUNT(DISTINCT name) FROM ek_atte";
			$countSel=$conn->query($searchCountSel);
			$row = $countSel->fetch_row();
			echo "<h3> Брой селища: ".$row[0]."</h3>";
		}
		else{
			$result="Не сте въвели стойност.";
		}
	}
	

	$conn->close();			
		
}

?>






<html>

<head>
<meta charset="UTF-8">
<title>Search data</title>

<style>

body{


background-image:url("86024cad1e83101d97359d7351051156712ddd31c6e3040c077a80c94b1647ec0BG_map1_web.jpg");
background-repeat: no-repeat;
background-size:1400px 700px;

}
h1{
text-align:center;
font-family:Ariel-Black;
font-size:40px;
}

label{
font-size:25px;
}

input{
font-size:20px;
}

#result{
	 position:absolute;
	 top:400px;
	 left:0px;
	 width:1400px;
	 height:200px;
	 font-size:15px;
	 text-align:center;
}
input[type="submit"]{
	border-style:solid;
	padding:10px;
	border-radius:30px;
}
#searchObst:hover{
	background-color:Aqua;
}
#searchObl:hover{
	background-color:Gold;
}
#searchSel:hover{
	background-color:LawnGreen;
}


</style>

</head>


<body>

<h1>Търсене на населено място в България  </h1>
 <form method="POST" action="">
  <label for="nameObst">Име на община: </label>
  <input type="text" id="nameObst" name="nameObst" value="" placeholder="Община"/>
  <input type="submit" id="searchObst" name="searchObst" value="Търси"/>
  <br>
  <br>
  <br>
  <label for="nameObl">Име на област: </label>
  <input type="text" id="nameObl" name="nameObl" value="" placeholder="Област"/>
  <input type="submit" id="searchObl" name="searchObl" value="Търси"/>
  <br>
  <br>
  <br>
  <label for="nameSel">Име на селище: </label>
  <input type="text" id="nameSel" name="nameSel" value="" placeholder="Селище"/>
  <input type="submit" id="searchSel" name="searchSel" value="Търси"/>
  
  </form>
 <input type="text" id="result" name="result" onfocus="value=''" value="<?php echo($result); ?>">
 
</body>





</html>