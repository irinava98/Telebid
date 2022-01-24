<?php 


$num1=$_POST['number1'];
$num2=$_POST['number2'];

if($num2 == 0)
{
	echo "We cannot divide by zero!";
}

$result=round($num1/$num2,2);

echo "The result of the division is : ".$result;






?>