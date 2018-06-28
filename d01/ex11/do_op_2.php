#!/usr/bin/env php
<?php

function is_operator(string $c)
{
	if ($c === "+" ||
		$c === "-" ||
		$c === "*" ||
		$c === "/" ||
		$c === "%")
	{
		return (1);
	}
		
	return (0);
}

if ($argc != 2)
{
	echo "Incorrect Parameters";
	return ;
}

/* 
state 0 -> start reading first operand
state 1 -> reading first operand
state 2 -> skip whitespace before operator
state 3 -> read operator
state 4 -> skip whitespace before second operand
state 5 -> read second operand
*/

$state = 0;
$operand_a = "";
$operand_b = "";
$operator = "";
$input_chars = str_split(trim($argv[1]));
foreach ($input_chars as $c)
{
	if ($state == 0)
	{
		if (!is_numeric($c))
		{
			echo "Syntax Error";
			return ;
		}
		else
		{
			$state = 1;
			$operand_a = $operand_a.$c;
		}
	}
	else if ($state == 1)
	{
		if (is_numeric($c))
			$operand_a = $operand_a.$c;
		else if ($c === " ")
		{
			$state = 2;
		}
		else if (is_operator($c))
		{
			$operator = $operator.$c;
			$state = 3;
		}
		else
		{
			echo "Syntax Error";
			return ;
		}
	}
	else if ($state == 2)
	{
		if (is_operator($c))
		{
			$state = 3;
			$operator = $operator.$c;
		}
		else if ($c === " ")
		{
			continue ;
		}
		else
		{
			echo "Syntax Error";
			return ;
		}
	}
	else if ($state == 3)
	{
		if ($c === " ")
		{
			$state = 4;
		}
		else if (is_numeric($c))
		{
			$state = 5;
			$operand_b = $operand_b.$c;
		}
		else
		{
			print_r($c);
			echo "Syntax Error";
			return ;
		}
	}
	else if ($state == 4)
	{
		if ($c === " ")
			continue ;
		else if (is_numeric($c))
		{
			$state = 5;
			$operand_b = $operand_b.$c;
		}
		else
		{
			echo "Syntax Error";
			return ;
		}
	}
	else if ($state == 5)
	{
		if (is_numeric($c))
		{
			$operand_b = $operand_b.$c;
		}
		else
		{
			echo "Syntax Error";
			return ;
		}
	}
}


if ($operator === "+")
	echo ($operand_a + $operand_b);
else if ($operator === "-")
	echo ($operand_a - $operand_b);
else if ($operator === "*")
	echo ($operand_a * $operand_b);
else if ($operator === "/" && $operand_b)
	echo ($operand_a / $operand_b);
else if ($operator === "%")
	echo ($operand_a % $operand_b);


