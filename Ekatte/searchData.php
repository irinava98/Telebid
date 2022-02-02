<?php 
error_reporting(E_ALL ^ E_WARNING); 

$obst="";
$obl="";
$sel="";
$err="";
$result="";

if(!empty($_POST))
{

	
	$place=$_POST['namePlace'];
	
	
	$server="localhost";
	$username="root";
	$password="";
	$dbname="ekatte";
	$foundPlace=false;
	
	$conn=mysqli_connect($server,$username,$password,$dbname);
	  if (!$conn)
	  {
		die('Could not connect: ' . mysql_error());
	  }
	  
	
			$searchCountObst="SELECT COUNT(DISTINCT name) FROM ek_obst";
			$countObst=$conn->query($searchCountObst);
			$row = $countObst->fetch_row();
			echo "<h3> Брой общини: ".$row[0]."</h3>";
		    
			$searchCountObl="SELECT COUNT(DISTINCT name) FROM ek_obl";
			$countObl=$conn->query($searchCountObl);
			$row = $countObl->fetch_row();
			echo "<h3> Брой области: ".$row[0]."</h3>";
			
		
			$searchCountSel="SELECT COUNT(DISTINCT name) FROM ek_atte";
			$countSel=$conn->query($searchCountSel);
			$row = $countSel->fetch_row();
			echo "<h3> Брой селища: ".$row[0]."</h3>";
	
		   $submit=$_POST['searchPlace'];
		   
		if($submit){
		
		
		    
			
		
	    if(!empty($place)){
			
		    $searchObstFromDb="SELECT * FROM ek_obst WHERE name LIKE '$place%'";
			$resultFromSelectObst=$conn->query($searchObstFromDb);

			
			
			if ($resultFromSelectObst->num_rows > 0) {
				$foundPlace=true;
				// output data of each row
				$result.="<table>";
				$result.="<tr>";
				$result.="<th> Община </th > <th> Eкате </th> <th> Име на община </th> <th> Категория  </th> <th>Документ</th> <th>Аbc</th>";
				$result.="</tr>";
				while($row = $resultFromSelectObst->fetch_array()) {
					
					$result.="<tr>"."<td>".$row[0]."</td>"."<td>".$row[1]."</td>"."<td>".$row[2]."</td>"."<td>".$row[3]."</td>"."<td>".$row[4]."</td>"."<td>".$row[5]."</td>"."</tr>"."<br>";	
				}
				$result.="</table>";
			} 
			
			
			
			
			
			
			
			$searchOblFromDb="SELECT * FROM ek_obl WHERE name LIKE '$place%'";
			$resultArrayFromSelectObl=$conn->query($searchOblFromDb);
			
			if ($resultArrayFromSelectObl->num_rows > 0) {
				$foundPlace=true;
				
				$result.="<table>";
				$result.="<tr>";
				$result.="<th> Област </th > <th> Eкате </th> <th> Име на област </th> <th> Регион </th> <th> Документ </th> <th> Аbc</th>";
				$result.="</tr>";
				// output data of each row
				while($row = $resultArrayFromSelectObl->fetch_array()) {
					 $result.="<tr>"."<td>".$row[0]."</td>"."<td>".$row[1]."</td>"."<td>".$row[2]."</td>"."<td>".$row[3]."</td>"."<td>".$row[4]."</td>"."<td>".$row[5]."</td>"."</tr>"."<br>";	
				}
				$result.="</table>";
			} 
			
			
			
			
			
			$searchSelFromDb="SELECT * FROM ek_atte WHERE name LIKE '$place%'";
			$resultArrayFromSelectSel=$conn->query($searchSelFromDb);
			
			if ($resultArrayFromSelectSel->num_rows > 0) {
				$foundPlace=true;
				
				$result.="<table>";
				$result.="<tr>";
				$result.="<th> Eкате </th > <th> t_v_m </th> <th> Име на селище </th> <th> Област </th> <th> Община  </th> <th> Кметство </th>  <th> Kind </th> <th> Категория </th> <th> Надморска височина </th> <th> Документ </th> <th>Tsb</th> <th>Abc </th>";
				// output data of each row
				while($row = $resultArrayFromSelectSel->fetch_array()) {
					$result.="<tr>"."<td>".$row[0]."</td>"."<td>".$row[1]."</td>"."<td>".$row[2]."</td>"."<td>".$row[3]."</td>"."<td>".$row[4]."</td>"."<td>".$row[5]."</td>"."<td>".$row[6]."</td>"."<td>".$row[7]."</td>"."<td>".$row[8]."</td>"."<td>".$row[9]."</td>"."<td>".$row[10]."</td>"."<td>".$row[11]."</td>"."</tr>"."<br>";	
				}
				$result.="</table>";
			} 
			
		
			if($foundPlace==false){
				$result="Няма намерени резултати.";
			}
			
		}
		else{
			$result="Не сте въвели място.";
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

form{
	position:absolute;
	top:150px;
	left:350px;
}

label{
	font-size:25px;
}
body{


background-image:url("86024cad1e83101d97359d7351051156712ddd31c6e3040c077a80c94b1647ec0BG_map1_web.jpg");
background-repeat: no-repeat;
background-size:1400px 700px;

}
h1{
position:absolute;
top:0px;
left:280px;
text-align:center;
font-family:Ariel-Black;
font-size:40px;
}
table, th, td {
  border:1px solid black;
}

label{
font-size:25px;
}

input{
	
font-size:20px;
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

#result{
	text-align:center;
	background-color:White;
	font-size:18px;
	position:absolute;
	top:450px;
	left:10px;
	padding:20px;
}


</style>

</head>


<body>

<h1>Търсене на населено място в България  </h1>
 <form method="POST" action="">
  <label for="namePlace">Име на населено място: </label>
  <input type="text" id="namePlace" name="namePlace" value="" placeholder="Населено място"/>
  <input type="submit" id="searchPlace" name="searchPlace" value="Търси"/>
 
  
  </form>
  
  <div id="result"><?php echo($result); ?></div>
 
 
 
</body>





</html>