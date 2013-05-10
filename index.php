<html>
	<head>
		<title>Generating</title>
	</head>
	<body>
<br /><br /><br />
<?php
//enviroment
ini_set('display_errors', E_ALL);
set_time_limit(0);

//Loop string to int
if (isset($_GET['search']))
	{
		$looptime = intval($_GET['search']);
	}
		else
	{
		$looptime = 100;
	}

//Static variables
$str = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
$i = 0; $hit = 0; $miss = 0;

//Start the Loop
while($i < $looptime) 
	{
		//Set the loop
		$shuffled = str_shuffle($str);
		$trimmed = substr($shuffled, -5);
		
		//Get the Header from the server
		$header = get_headers("http://i.imgur.com/" . $trimmed . ".jpg");
		
		//checks to see what imgur returned
		echo $header[8];
		if($header[8] == "Content-Length: 669")
			{
				//if a error was returned
				$miss++;
			}
				else
			{
				//if the image is good to go
				echo '<a href="http://imgur.com/' . $trimmed . '">';
				echo '<img src="http://i.imgur.com/' . $trimmed . '.jpg">';
				echo "</a><br /><br /><b>Image Info:</b><br />";
				echo "" . $header[6] . "<br />";
				echo "</pre><hr>";
				$hit++;
			} 
		//rinse, wash, repeat
		unset($trimmed, $header, $shuffled);
		$i++;
	}
?>
		<div style="position:absolute; left:0px; top:0px;">
			Attempts that passed - <?php echo $hit; ?><br />
			Attempts that failed - <?php echo $miss; ?><br />
			Hit ratio - <?php echo round($hit / $looptime * 100, 3); ?>%<br /><br />
		</div>
	</body>
</html>
