<?php
    $obstacles;
    
?>
<!doctype html>
<html>
<head>
	<title>Awesome Spaceships Battles - Game</title>
	<link href="./assets/css/style.css" type="text/css" rel="stylesheet">
</head>
<body id="game_grid">
    <div class="ship_p1"></div>
    <?php
        $pos_x = 200;
        $pos_y = 300;
        echo "<div class='asteroid' style='top:".$pos_x."px;left:".$pos_y."px;'></>";
    ?>
</body>
</html>