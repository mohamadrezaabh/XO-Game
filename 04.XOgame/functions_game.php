<?php
	function checkwiner()
	{
		$g = $_SESSION['cell'];
		$w = $_SESSION['current'];
		$winer = null; 
		if
		(
			($g[1] && $g[1] == $g[2] && $g[2] == $g[3] && $g[3] == 'X')
		||	($g[4] && $g[4] == $g[5] && $g[5] == $g[6] && $g[6] == 'X')
		||	($g[7] && $g[7] == $g[8] && $g[8] == $g[9] && $g[9] == 'X')

		||	($g[1] && $g[1] == $g[4] && $g[4] == $g[7] && $g[7] == 'X')
		||	($g[2] && $g[2] == $g[5] && $g[5] == $g[8] && $g[8] == 'X')
		||	($g[3] && $g[3] == $g[6] && $g[6] == $g[9] && $g[9] == 'X')

		||	($g[1] && $g[1] == $g[5] && $g[5] == $g[9] && $g[9] == 'X')
		||	($g[3] && $g[3] == $g[5] && $g[5] == $g[7] && $g[7] == 'X')
		)
		{
			$_SESSION['statu'] = "win";
			$winer = "X wins";
			$_SESSION['lastwiner'] = "X";
			return $winer;
		}		
		if
		(
			($g[1] && $g[1] == $g[2] && $g[2] == $g[3] && $g[3] == 'O')
		||	($g[4] && $g[4] == $g[5] && $g[5] == $g[6] && $g[6] == 'O')
		||	($g[7] && $g[7] == $g[8] && $g[8] == $g[9] && $g[9] == 'O')

		||	($g[1] && $g[1] == $g[4] && $g[4] == $g[7] && $g[7] == 'O')
		||	($g[2] && $g[2] == $g[5] && $g[5] == $g[8] && $g[8] == 'O')
		||	($g[3] && $g[3] == $g[6] && $g[6] == $g[9] && $g[9] == 'O')

		||	($g[1] && $g[1] == $g[5] && $g[5] == $g[9] && $g[9] == 'O')
		||	($g[3] && $g[3] == $g[5] && $g[5] == $g[7] && $g[7] == 'O')
		)
		{
			$_SESSION['statu'] = "win";
			$winer = "O wins";
			$_SESSION['lastwiner'] = "O";
			return $winer;
		}
		elseif (!in_array(null, $g))
		{
			$_SESSION['statu'] = "draw";
			$winer = "Draw";
			$_SESSION['lastwiner'] = null;	
			return $winer;
		}
	}
	
	function turner()
	{
		foreach ($_SESSION['cell'] as $cellnum => $value)
		{
			if (isset($_POST['c'.$cellnum])) 
			{
				$_SESSION['cell'] [$cellnum] = $_SESSION['current'];
				if ($_SESSION['current'] == "X") 
				{
					$_SESSION['current'] = "O";
				}
				else
				{
					$_SESSION['current'] = "X";
				}
				$user = $_SESSION['current'];
			}
		}
		if 
		(
			isset($_SESSION['lastwiner']) 
			&&
			$_SESSION['lastwiner'] == "cpuplay" 
			&& 
			$_SESSION['statu'] == 'inprogress'
			&& 
			$_SESSION['current'] == "O"
		) 
		{
			$_SESSION['cell'][playwithcpu()] = $_SESSION['current'];
			if ($_SESSION['current'] == "X") 
			{
				$_SESSION['current'] = "O";
			}
			else
			{
				$_SESSION['current'] = "X";
			}
		}
	}

	function playwithcpu()
	{
		$nullcells = null;
		foreach ($_SESSION['cell'] as $key => $value) 
		{
			if (!$value) 
			{
				$nullcells[$key] = $key;
			}
		}
		$cpumove = array_rand($nullcells,1);
		if ($cpumove != null && ($_SESSION['statu'] != 'win' || $_SESSION['statu'] != 'draw')) 
		{
			$cpumove = $nullcells[$cpumove];
			return $cpumove;
		}
	}

?>