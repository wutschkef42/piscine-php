#!/usr/bin/env php

<?php
Echo "Enter a Number: ";
$number = trim(fgets(STDIN));
if (!is_numeric($number))
{
	echo "'$number' is not a number";
}
else if ($number % 2 == 0)
{
	echo "The number $number is even"; 
}
else
{
	echo "The number $number is odd";
}
?>