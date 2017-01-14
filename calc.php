<!DOCTYPE html>
<html>
<head>
	<title>Tip Calculator</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <style>
    .middle {
      width: 500px;
      height: 200px;      
      top:0;
      bottom: 0;
      left: 0;
      right: 0;
      margin: auto;
    }  
  </style>


	<script
	  src="https://code.jquery.com/jquery-3.1.1.min.js"
	  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
	  crossorigin="anonymous">  	
  	</script>

  	<script>
  		function send_post_request()
  		{

  			var bill = $("#bill").val();
  			var tippercent = $("input[name='tippercent']:checked").val();
  			var dataString = 'bill=' + bill + '&tippercent=' + tippercent;
  			  			
  			$.ajax({
  				type:"post",
  				url:"calculate.php",
  				data:dataString,
  				cache:false,
  				success:function(data) {
  					$("#result").html(data);
  				}
  			});

  			return false;
  		}  		
  	</script>


</head>
<body>	
	<form class="middle">
    <h1 >Tip Calculator</h1>
		Bill Amount: $<input type="text" id="bill">
		<br /> <br />
		Tip Percentage:		
    <?php
    $radio_array_values = array(10, 15, 20);
    $radio_array_labels = array("10%", "15%", "20%");
    
    // show radio buttons using php loop
    for($counter=0; $counter <3; $counter++)
    {
      echo("<input type=\"radio\" name=\"tippercent\" value=\"$radio_array_values[$counter]\" id=\"radio$counter\"> $radio_array_labels[$counter]");      
    }
    echo "<script> document.getElementById(\"radio2\").setAttribute(\"checked\", \"checked\");</script>";
  ?>
		<br /> <br />

		<input type="submit" value="calculate!" onclick="return send_post_request();">
	</form>
	<div id="result" class="middle">
	</div>

</body>
</html>