<?php
		
	header("Content-type: application/json");
	
    
	
	$totalBill = htmlspecialchars(isset($_GET['totalBill']));
	$tipPercent = 10; //TODO: htmlspecialchars(isset($_GET['tipPercent']));
	
	if (ctype_digit($totalBill) && ctype_digit($tipPercent) )
	{
		$tipAmount = $totalBill * $tipPercent / 100;
		$totalAmount = $totalBill + $tipAmount;
		$arr = array('tipAmount' => $tipAmount, 'totalAmount' => $totalAmount);
		print(json_encode($arr));
	}
	
	validateInputs();

?>

