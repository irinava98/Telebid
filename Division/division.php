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
		echo $err;
	}

	$result=round($num1/$num2,2);
}

?>

<html>
<head>

<meta charset="UTF-8">

<title>DIVISION</title>


<style>

body{

background-color:rgb(150,150,255);

}


input{
 
 width:40px;
 height:40px;

}

button{
   
   padding:15px;
   position:relative;
   left:100px;
   border-radius:10px;
   background-color:WhiteSmoke;
}

button:hover{
	background-color:SpringGreen;
}
#divide{
   width:70px;
   margin-left:20px;
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

</body>


</html>
