<html>
<head>
<title>php post get</title>
</head>
<body>
<?php 

echo "PHP Example: Receiving SensorLog data via HTTP GET/POST and save it to a file<br>\n";
$line = array();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$line[] = "HTTP:POST";
    foreach($_POST as $key=>$value) { 
    	$line[] = "$key:$value";
    }
} 
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	$line[] = "HTTP:GET";
    foreach($_REQUEST as $key=>$value) { 
    	$line[] = "$key:$value";
    }
}
if (count($line) > 1) {
    $myfile = fopen("SensorLog.txt", "a") or die("Unable to open file!");
    $line = implode(",",$line);
    $line .= "\n";
    fwrite($myfile,$line);
	fclose($myfile);
} else { 
echo "<h3>Logged Data</h3>";
$myfile = fopen("SensorLog.txt", "r") or die("Unable to open file!");
while(!feof($myfile)) {
  echo fgets($myfile) . "<br>";
}
fclose($myfile);
}

?>
</body>
</html>