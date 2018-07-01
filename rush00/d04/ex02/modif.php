<?php

function check_credentials($db_accounts, $login, $pw_hash) 
{
	$accounts = unserialize(file_get_contents($db_accounts));
	foreach ($accounts as $account)
	{
		if ($account['login'] === $login && $account['passwd'] === $pw_hash)
			return (1);
	}
	return (0);
}

function update_password($db_accounts, $login, $newpw)
{
	if ($newpw === "")
		return (0);
	$accounts = unserialize(file_get_contents($db_accounts));
	foreach ($accounts as &$account)	
	{
		if ($account['login'] === $login)
		{
			$account['passwd'] = hash('ripemd160', $newpw);
			break ;
		}
	}
	file_put_contents($db_accounts, serialize($accounts));
	return (1);
}


$path = "../private/";
$file = $path."passwd";
if (!$_POST['login'] || !$_POST['oldpw'] || !$_POST['newpw'] || !$_POST['submit'] || $_POST['submit'] != "OK")
{
	echo "ERROR\n";
	return ;
}
if (!check_credentials($file, $_POST['login'], hash('ripemd160', $_POST['oldpw'])))
{
	echo "ERROR\n";
	return ;
}

if (!update_password($file, $_POST['login'], $_POST['newpw']))
{
	echo "ERROR\n";
	return ;
}
echo "OK\n";
?>
