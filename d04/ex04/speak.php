<?php
session_start();
if (!$_SESSION['logged_on_user'])
{
	echo "ERROR\n";
	header('Location: index.html');
}

$chat = unserialize(file_get_contents("../private/chat"));
if (!file_exists("../private"))
	mkdir("../private");
if (!file_exists("../private/chat"))
	file_put_contents("../private/chat", null);
$fd = fopen("../private/chat", "w");
flock($fd, LOCK_EX);
if ($_POST['msg'])
	$chat[] = array('login' => $_SESSION['logged_on_user'], 'time' => time(), 'msg' => $_POST['msg']);
file_put_contents("../private/chat", serialize($chat));
fclose($fd);
?>
<html>
<body>
	<form action="speak.php" method="POST">
		<input type="text" name="msg" value="">
		<input type="submit" name="submit" value="Send">
	</form>
</body>
</html>
