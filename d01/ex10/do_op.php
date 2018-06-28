#!/usr/bin/env php
<?php
if ($argc != 4)
{
	echo "Incorrect Parameters";
	return ;
}
$operand_a = trim($argv[1]);
$operand_b = trim($argv[3]);
$operator = trim($argv[2]);

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
