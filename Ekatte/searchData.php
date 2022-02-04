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
	  
	
			$searchCountObst="SELECT COUNT(name) FROM ek_obst";
			$countObst=$conn->query($searchCountObst);
			$row = $countObst->fetch_row();
			echo "<h3> Брой общини: ".$row[0]."</h3>";
		    
			$searchCountObl="SELECT COUNT(name) FROM ek_obl";
			$countObl=$conn->query($searchCountObl);
			$row = $countObl->fetch_row();
			echo "<h3> Брой области: ".$row[0]."</h3>";
			
		
			$searchCountSel="SELECT COUNT(name) FROM ek_atte";
			$countSel=$conn->query($searchCountSel);
			$row = $countSel->fetch_row();
			echo "<h3> Брой селища: ".$row[0]."</h3>";
	
		   $submit=$_POST['searchPlace'];
		   
		if($submit){
		
		
		    
			
		
	    if(!empty($place)){
			
		    $searchObstFromDb="SELECT * FROM ek_obst WHERE name LIKE '%$place%'";
			$resultFromSelectObst=$conn->query($searchObstFromDb);

			
			
			if ($resultFromSelectObst->num_rows > 0) {
				$foundPlace=true;
				// output data of each row
				$result.="<table>";
				$result.="<tr>";
				$result.="<th> Код община </th > <th> Eкате </th> <th> Име на община </th> <th> Категория  </th> <th>Документ</th> <th>Аbc</th>";
				$result.="</tr>";
				while($row = $resultFromSelectObst->fetch_array()) {
					
					$result.="<tr>"."<td>".$row[0]."</td>"."<td>".$row[1]."</td>"."<td>".$row[2]."</td>"."<td>".$row[3]."</td>"."<td>".$row[4]."</td>"."<td>".$row[5]."</td>"."</tr>"."<br>";	
				}
				$result.="</table>";
			} 
			
			
			
			
			
			
			
			$searchOblFromDb="SELECT * FROM ek_obl WHERE name LIKE '%$place%'";
			$resultArrayFromSelectObl=$conn->query($searchOblFromDb);
			
			if ($resultArrayFromSelectObl->num_rows > 0) {
				$foundPlace=true;
				
				$result.="<table>";
				$result.="<tr>";
				$result.="<th>Код област </th > <th> Eкате </th> <th> Име на област </th> <th> Регион </th> <th> Документ </th> <th> Аbc</th>";
				$result.="</tr>";
				// output data of each row
				while($row = $resultArrayFromSelectObl->fetch_array()) {
					 $result.="<tr>"."<td>".$row[0]."</td>"."<td>".$row[1]."</td>"."<td>".$row[2]."</td>"."<td>".$row[3]."</td>"."<td>".$row[4]."</td>"."<td>".$row[5]."</td>"."</tr>"."<br>";	
				}
				$result.="</table>";
			} 
			
			
			
			
			
			$searchSelFromDb="SELECT * FROM ek_atte WHERE name LIKE '%$place%'";
			$resultArrayFromSelectSel=$conn->query($searchSelFromDb);
			
			if ($resultArrayFromSelectSel->num_rows > 0) {
				$foundPlace=true;
				
				$result.="<table>";
				$result.="<tr>";
				$result.="<th> Eкате </th > <th> t_v_m </th> <th> Име на селище </th> <th> Област </th> <th> Община  </th> <th> Кметство </th>  <th> Kind </th> <th> Категория </th> <th> Надморска височина </th> <th> Документ </th> <th>Tsb</th> <th>Abc </th>";
				// output data of each row
				while($row = $resultArrayFromSelectSel->fetch_array()) {
					if($row[3]=="BLG"){
						$row[3]="Благоевград";
					}
					elseif($row[3]=="BGS"){
						$row[3]="Бургас";
					}
					elseif($row[3]=="VAR"){
						$row[3]="Варна";
					}
					elseif($row[3]=="VTR"){
						$row[3]="Велико Търново";
					}
					elseif($row[3]=="VRC"){
						$row[3]="Враца";
					}
					elseif($row[3]=="GAB"){
						$row[3]="Габрово";
					}
					elseif($row[3]=="DOB"){
						$row[3]="Добрич";
					}
					elseif($row[3]=="KRZ"){
						$row[3]="Кърджали";
					}
					elseif($row[3]=="KNL"){
						$row[3]="Кюстендил";
					}
					elseif($row[3]=="LOV"){
						$row[3]="Ловеч";
					}
					elseif($row[3]=="MON"){
						$row[3]="Монтана";
					}
					elseif($row[3]=="PAZ"){
						$row[3]="Пазарджик";
					}
					elseif($row[3]=="PER"){
						$row[3]="Перник";
					}
					elseif($row[3]=="PVN"){
						$row[3]="Плевен";
					}
					elseif($row[3]=="PDV"){
						$row[3]="Пловдив";
					}
					elseif($row[3]=="RAZ"){
						$row[3]="Разград";
					}
					elseif($row[3]=="RSE"){
						$row[3]="Русе";
					}
					elseif($row[3]=="SLS"){
						$row[3]="Силистра";
					}
					elseif($row[3]=="SLV"){
						$row[3]="Сливен";
					}
					elseif($row[3]=="SML"){
						$row[3]="Смолян";
					}
					elseif($row[3]=="SFO"){
						$row[3]="София";
					}
					elseif($row[3]=="SOF"){
						$row[3]="София (столица)";
					}
					elseif($row[3]=="SZR"){
						$row[3]="Стара Загора";
					}
					elseif($row[3]=="TGV"){
						$row[3]="Търговище";
					}
					elseif($row[3]=="HKV"){
						$row[3]="Хасково";
					}
					elseif($row[3]=="SHU"){
						$row[3]="Шумен";
					}
					elseif($row[3]=="JAM"){
						$row[3]="Ямбол";
					}
					
					
					
					
					
					
					if(substr($row[4],0,3)=="BLG"){
						$row[4]="Благоевград";
					}
					elseif(substr($row[4],0,3)=="BGS"){
						$row[4]="Бургас";
					}
					elseif(substr($row[4],0,3)=="VAR"){
						$row[4]="Варна";
					}
					elseif(substr($row[4],0,3)=="VTR"){
						$row[4]="Велико Търново";
					}
					elseif(substr($row[4],0,3)=="VRC"){
						$row[4]="Враца";
					}
					elseif(substr($row[4],0,3)=="GAB"){
						$row[4]="Габрово";
					}
					elseif(substr($row[4],0,3)=="DOB"){
						$row[4]="Добрич";
					}
					elseif(substr($row[4],0,3)=="KRZ"){
						$row[4]="Кърджали";
					}
					elseif(substr($row[4],0,3)=="KNL"){
						$row[4]="Кюстендил";
					}
					elseif(substr($row[4],0,3)=="LOV"){
						$row[4]="Ловеч";
					}
					elseif(substr($row[4],0,3)=="MON"){
						$row[4]="Монтана";
					}
					elseif(substr($row[4],0,3)=="PAZ"){
						$row[4]="Пазарджик";
					}
					elseif(substr($row[4],0,3)=="PER"){
						$row[4]="Перник";
					}
					elseif(substr($row[4],0,3)=="PVN"){
						$row[4]="Плевен";
					}
					elseif(substr($row[4],0,3)=="PDV"){
						$row[4]="Пловдив";
					}
					elseif(substr($row[4],0,3)=="RAZ"){
						$row[4]="Разград";
					}
					elseif(substr($row[4],0,3)=="RSE"){
						$row[4]="Русе";
					}
					elseif(substr($row[4],0,3)=="SLS"){
						$row[4]="Силистра";
					}
					elseif(substr($row[4],0,3)=="SLV"){
						$row[4]="Сливен";
					}
					elseif(substr($row[4],0,3)=="SML"){
						$row[4]="Смолян";
					}
					elseif(substr($row[4],0,3)=="SFO"){
						$row[4]="София";
					}
					elseif(substr($row[4],0,3)=="SOF"){
						$row[4]="София (столица)";
					}
					elseif(substr($row[4],0,3)=="SZR"){
						$row[4]="Стара Загора";
					}
					elseif(substr($row[4],0,3)=="TGV"){
						$row[4]="Търговище";
					}
					elseif(substr($row[4],0,3)=="HKV"){
						$row[4]="Хасково";
					}
					elseif(substr($row[4],0,3)=="SHU"){
						$row[4]="Шумен";
					}
					elseif(substr($row[4],0,3)=="JAM"){
						$row[4]="Ямбол";
					}
					
					if(substr($row[5],0,3)=="BLG"){
						$row[5]="Благоевград";
					}
					elseif(substr($row[5],0,3)=="BGS"){
						$row[5]="Бургас";
					}
					elseif(substr($row[5],0,3)=="VAR"){
						$row[5]="Варна";
					}
					elseif(substr($row[5],0,3)=="VTR"){
						$row[5]="Велико Търново";
					}
					elseif(substr($row[5],0,3)=="VRC"){
						$row[5]="Враца";
					}
					elseif(substr($row[5],0,3)=="GAB"){
						$row[5]="Габрово";
					}
					elseif(substr($row[5],0,3)=="DOB"){
						$row[5]="Добрич";
					}
					elseif(substr($row[5],0,3)=="KRZ"){
						$row[5]="Кърджали";
					}
					elseif(substr($row[5],0,3)=="KNL"){
						$row[5]="Кюстендил";
					}
					elseif(substr($row[5],0,3)=="LOV"){
						$row[5]="Ловеч";
					}
					elseif(substr($row[5],0,3)=="MON"){
						$row[5]="Монтана";
					}
					elseif(substr($row[5],0,3)=="PAZ"){
						$row[5]="Пазарджик";
					}
					elseif(substr($row[5],0,3)=="PER"){
						$row[5]="Перник";
					}
					elseif(substr($row[5],0,3)=="PVN"){
						$row[5]="Плевен";
					}
					elseif(substr($row[5],0,3)=="PDV"){
						$row[5]="Пловдив";
					}
					elseif(substr($row[5],0,3)=="RAZ"){
						$row[5]="Разград";
					}
					elseif(substr($row[5],0,3)=="RSE"){
						$row[5]="Русе";
					}
					elseif(substr($row[5],0,3)=="SLS"){
						$row[5]="Силистра";
					}
					elseif(substr($row[5],0,3)=="SLV"){
						$row[5]="Сливен";
					}
					elseif(substr($row[5],0,3)=="SML"){
						$row[5]="Смолян";
					}
					elseif(substr($row[5],0,3)=="SFO"){
						$row[5]="София";
					}
					elseif(substr($row[5],0,3)=="SOF"){
						$row[5]="София (столица)";
					}
					elseif(substr($row[5],0,3)=="SZR"){
						$row[5]="Стара Загора";
					}
					elseif(substr($row[5],0,3)=="TGV"){
						$row[5]="Търговище";
					}
					elseif(substr($row[5],0,3)=="HKV"){
						$row[5]="Хасково";
					}
					elseif(substr($row[5],0,3)=="SHU"){
						$row[5]="Шумен";
					}
					elseif(substr($row[5],0,3)=="JAM"){
						$row[5]="Ямбол";
					}
					
					
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
	font-size:28px;
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
padding:7px;
}


input[type="submit"]{
	border-style:solid;
	padding:10px;
	border-radius:30px;
	
}
#searchPlace:hover{
	box-shadow: 2px 2px DimGray;
	cursor: pointer;
	background-color:DarkTurquoise;
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