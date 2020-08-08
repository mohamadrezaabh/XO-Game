<?php
	session_start();

	function game_start()
	{
		$el = null;
		if (isset($_GET['action']) && $_GET['action'] == 'setname')
		{
			if (isset($_POST['setname'])) 
			{
			 	$p1 = $_POST['player1'];
			 	$p2 = $_POST['player2'];
			 	$_SESSION['playernames'] = [ 1=> $p1, 2=> $p2];
			 	header("Location: http://localhost/projects/04.XOgame/");
			}
			$el .= setname();
		}
		if (isset($_GET['action']) && $_GET['action'] == 'playwithcpu')
		{
			if(isset($_POST['namewithcpu']))
			{
				$_SESSION['play'] = 'cpuplay';
				$p1 = $_POST['player1'];
				$p2 = 'Camputer';
				$_SESSION['playernames'] = [ 1=> $p1, 2=> $p2];
				header("Location: http://localhost/projects/04.XOgame/");
			}
			$el .= namewithcpu();
		}
		
		if (!isset($_GET['action'])) 
		{
			$el .= loadpage();
			$el .= tablemaker();
	        $el .= btnmaker();
	        $el .= cpupalybtn();
	        $el .= usturner();
		}

	    return $el;
	}
	
	function loadpage()
	{
		if (!isset($_SESSION['flag']))
		{
			restart();
			$_SESSION['flag'] = 0;
		}	
		$_SESSION['flag']++;

		if (isset($_POST['resine']))
		{
			restart();
			if ($_SESSION['playernames'][2] == 'Camputer' && $_SESSION['play'] == 'playerplay')
			{
			 	$_SESSION['playernames'] = [ 1=> null, 2=> null];
			}
			$_SESSION['play'] = 'playerplay';
		}
		elseif ($_SESSION['flag'] == 1)
		{
			$_SESSION['statu'] = "start";
		}
		elseif (isset($_POST['playwithcpu']))
		{
				
			$el = "<p><a href='?action=playwithcpu' class='names'>Please enter your name to continue</a></p>";
			echo "<div class='alertC'>$el</div>";
			$_SESSION['lastwiner'] = "cpuplay";
			restart();
		}
		else
		{
			$_SESSION['statu'] = "inprogress";
		}
		turner();
		winner();
	}
?>