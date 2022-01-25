<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>
   <div class="w3-orange w3-padding-64" style="width:50%;margin: 0 auto;padding: 10px 0;">
				  
				   <div class="w3-conatiner w3-center">
<?php
if(isset($_POST['save']))
{ 

            $my = $_POST['birth_day'];
			date_default_timezone_set('Asia/Calcutta');
			
			function findage($dob)
			{
				
				$localtime = getdate();
				$today = $localtime['mday']."-".$localtime['mon']."-".$localtime['year'];
				$dob_a = explode("-", $dob);
				$today_a = explode("-", $today);
				$dob_d = $dob_a[0];$dob_m = $dob_a[1];$dob_y = $dob_a[2];
				$today_d = $today_a[0];$today_m = $today_a[1];$today_y = $today_a[2];
				$years = $today_y - $dob_y;
				$months = $today_m - $dob_m;
				$days=$today_d - $dob_d;
				if ($today_m.$today_d < $dob_m.$dob_d) 
				{
					$years--;
					$months = 12 + $today_m - $dob_m;
					
				}

				if ($today_d < $dob_d) 
				{
					$months--;
				}

				$firstMonths=array(1,3,5,7,8,10,12);
				$secondMonths=array(4,6,9,11);
				$thirdMonths=array(2);

				if($today_m - $dob_m == 1) 
				{
					if(in_array($dob_m, $firstMonths)) 
					{
						array_push($firstMonths, 0);
					}
					elseif(in_array($dob_m, $secondMonths)) 
					{
						array_push($secondMonths, 0);
					}elseif(in_array($dob_m, $thirdMonths)) 
					{
						array_push($thirdMonths, 0);
					}
				}

				
				echo "<h3 class='w3-text-white' align='center'><strong> Age is $years years $months months $days Days.</strong></h3>";
			}

           
			
            findage("$my"); //put date in the dd-mm-yyyy format
}
?>
    <form method="post">
	    <P align="center"><input type="text" class="w3-input w3-border" name="birth_day" placeholder="Your Birth Date (dd-mm-yyyy)" style="width:50%"></p>
		<P align="center"> <input type="submit" class="w3-btn w3-brown w3-round" name="save" value="Know your age"></p>
	</form>
</div>
</body>
</html>