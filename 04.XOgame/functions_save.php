<?php
	/*function save()
	{
		saveresult();
		saveresult($_SESSION['playernames'][1]);
		saveresult($_SESSION['playernames'][2]);
		saveresult($_SESSION['playernames'][1].'-'.$_SESSION['playernames'][2]);
	}

	function saveresult($_player = null)
	{
		$_cookieprefix = 'detail_total';
		if ($_player) 
		{
			$_cookieprefix .= '_'.$_player;
		}
		$newvalue = [];
		$detail_list = ['count','win','lose','draw','resine','inprogress'];
		
		if (isset($_COOKIE[$_cookieprefix])) 
		{
			$newvalue = json_decode($_COOKIE[$_cookieprefix], true);
		}

		foreach ($detail_list as $value) 
		{
			if (!isset($newvalue[$value])) 
			{
				$newvalue[$value] = 0;
			}
		}

		$newvalue['count'] = $newvalue['count'] +1;
		$game_has_winner = checkwiner();

		if($game_has_winner && $game_has_winner == 'X wins')
		{
		$newvalue[$_SESSION['statu']] = $newvalue[$_SESSION['statu']] +1;
		}
		savecookie($_cookieprefix,$newvalue);
		
	}

	 function savecookie($_cookiename,$value)
	{
		$value = json_encode($value);
		setcookie($_cookiename,$value, time() + (86400 * 365));
	}*/
?>