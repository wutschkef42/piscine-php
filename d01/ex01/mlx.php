#!/usr/bin/env php

<?php
$x = 1;
while ($x <= 1000) {
	echo "X";
	if ($x % 100 == 0)
		echo "\n";
	$x++;
}
?>