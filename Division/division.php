<?php 

$num1="";
$num2="";
$result="";
$err="";

if(!empty($_POST))
{

	
	$num1=$_POST['number1'];
	$num2=$_POST['number2'];
	if($num2 == 0)
	{
		$err="We cannot divide by zero";
		
	}

	$result=round($num1/$num2,2);
	
	$server="localhost";
	$username="root";
	$password="";
	$dbname="division";
	$success="";
	
	$conn=mysqli_connect($server,$username,$password,$dbname);
	  if (!$conn)
	  {
		die('Could not connect: ' . mysql_error());
	  }
	  $sql = "INSERT INTO numbers(number1, number2, result)
				VALUES ($num1,$num2,$result)";
				
	 if ($conn->query($sql) === TRUE){
	  $success="Added new record successfully.";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();			
		
}

?>

<html>
<head>

<meta charset="UTF-8">

<title>DIVISION</title>


<style>

body{

font-size:25px;
text-align:center;
background-color:rgb(150,200,255);

}


input{
 
 width:50px;
 height:50px;
 font-size:15px;

}


#divide:hover{
	background-color:Cyan;
}
#divide{
   width:80px;
   margin-left:20px;
   position:relative;
   position:relative;
   background-color:WhiteSmoke;
}

#success{
	position:relative;
	top:400px;
}

</style>




</head>



<body>
  
  <h1>Division of two numbers</h1>
  
  <form method="POST" action="">
  <label for="number1">First Number: </label>
  <input type="text" id="number1" name="number1" value="<?php echo($num1); ?>">
  /
  <label for="number2">Second Number: </label>
  <input type="text" id="number2" name="number2" value="<?php echo($num2); ?>">
  =
  <label for="result">Result: </label>
  <input type="text" id="result" name="result" value="<?php echo($result); ?>">

  <input type="submit" id="divide" name="divide" value="DEVIDE">
  </form>
 <p id="success"><?php echo($success); ?></p>
</body>


</html>