<?php

	//check for vulnerability of user inputs
	if (isset($_POST['bill']))
	{
		$bill = htmlspecialchars($_POST['bill']);
	}
	if (isset($_POST['tippercent']))
	{
		$tippercent = htmlspecialchars($_POST['tippercent']);
	}
	
	$error = false;
	$tip = 0;
	$total = 0;

	validateInput($bill, $tippercent, $tip, $total, $error);	

	if($error == false)
	{
		$result = "Tip: ".$tip."<br />"."Total: ".$total;
		echo $result;
	}
	else
	{		
		$error = "<span style=\"color:red\";> Amount should be positive integer only. Please try again! </span>";
		echo $error;
	}

	//validate the input - take the inputs by reference
	function validateInput(&$bill, &$tippercent, &$tip, &$total, &$error)
	{		
		if (is_numeric($bill) and is_numeric($tippercent) and $bill > 0 and $tippercent > 0)
		{
			$tip = $bill*$tippercent/100;
			$total = $bill + $tip;
		}
		else
			$error = true;
	}
	
?>