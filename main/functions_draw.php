<?php
	function restart()
	{
		$player = ["O","X"];
		$radom_player = array_rand($player,1);
		$_SESSION['statu'] = "start";
		$_SESSION['play'] = 'playerplay';
		$_SESSION['cell'] = 
		[
			1 => null,
			2 => null,
			3 => null,
			4 => null,
			5 => null,
			6 => null,
			7 => null,
			8 => null,
			9 => null,
		];

		if (isset($_SESSION['lastwiner']) && $_SESSION['lastwiner'] != "cpuplay" )
		{
			$_SESSION['current']= $_SESSION['lastwiner'];
		}
		elseif (isset($_SESSION['lastwiner']) && $_SESSION['lastwiner'] == "cpuplay") 
		{
			$_SESSION['current'] = "X";	
		}
		elseif($_SESSION['play'] == 'playerplay')
		{
			$_SESSION['current']= $player[$radom_player];
		}
	}

	function tablemaker()
	{
		$element = null;		
		foreach ($_SESSION['cell'] as $cellnum => $value)
		{
			$classname = null;
			if ($value)
			{
				$classname = 'c'.$value;
			}
			$element .= "<input type='submit' class='cell $classname' value='$value' name='c$cellnum'";
			if ($value || $_SESSION['statu'] == 'win' || $_SESSION['statu'] == 'draw') 
			{
				$element .= "disabled";
			}
			$element .= ">\n";
		}
		if(isset($_POST['resine']))
		{
			$_SESSION['statu'] = "start";
		}
			
		return $element;
	}

	function usturner()
	{
		$user = $_SESSION['current'];
		if (!isset($_SESSION['playernames'])) 
		{
			$_SESSION['playernames'] = [ 1=> 'player1', 2=> 'player2'];
		}
		$player1 = $_SESSION['playernames'][1];
		$player2 = $_SESSION['playernames'][2];	
		if ($_SESSION['current'] == 'X') 
		{
			$var = "<div class='userx'>$player1 (<span class='X'>X</span>)</div>";
			$var.= "<div class='user2'>$player2 (O) </div>";
		}
		else
		{
			$var = "<div class='usero'>$player2 (<span class='O'>O</span>)</div>";
			$var .= "<div class='user1'>$player1 (X)</div>";
		}
		
		return $var;
	}

	function btnmaker()
	{
		$btnvalue = "start";
		$btn = null;
		if ($_SESSION['statu'] == 'inprogress') 
		{
			$btnvalue = "Resign";
		}
		elseif ($_SESSION['statu'] == 'win' || $_SESSION['statu'] == 'draw')
		{
			$btnvalue = "Play Again!";	
		}

		if ($btnvalue != "start")
		{
			$btn = "<button id='click' type='submit' name='resine'>$btnvalue</button>";
		}
		return $btn;
	}

	function cpupalybtn()
	{
		$btn = null;

		if ($_SESSION['play'] == 'playerplay') 
		{
			$btn = "<button type='submit' class='plcpu' name='playwithcpu'>Play with Camputer</button>";
		}
		return $btn;
	}

	function winner()
	{
		checkwiner();
		$el_changename ="<p><a href='?action=setname' class='names'>Enter your name</a></p>";
		switch (checkwiner()) 
	    {
	       case 'X wins':
	        echo "<div class='alertX'>X wins!$el_changename</div>";    
	        break;
	        case 'O wins':
	        echo "<div class='alertO'>O wins!$el_changename</div>";    
	        break;
	        case 'Draw':
	        echo "<div class='alertD'>Draw!$el_changename</div>";
	        break;
	    }
	}

	function setname()
	{
		$el = null;
		$onclick = "onclick="; 
		$swal = '"swal("Oops!", "Something went wrong on the page!", "success");"';
		$el .="
		<div class='center'>
			<div class='centerform'>
				<h1>Enter Your Names</h1>
				<div  class='nameform'>
					<input type='text' name='player1' required> 
					<span></span>
					<label>Player X</label>
				</div>
				<div class='nameform'>
					<input type='text' name='player2' required> 
					<span></span>
					<label>Player O</label>
				</div>
				<input type='submit' name='setname' value='save names'>
			</div>
		</div>";	
		return $el;
	}

	function namewithcpu()
	{
		$el = null;
		$el .="
		<div class='center'>
			<div class='centerform'>
				<h1>Enter Your Name</h1>
				<div  class='nameform'>
					<input type='text' name='player1' required> 
					<span></span>
					<label>Player X</label>
				</div>
			</div>
			<input type='submit' name='namewithcpu' value='Save'>
		</div>";	
		return $el;	
	}

?>