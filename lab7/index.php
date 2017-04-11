<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lab7 No.22</title>
</head>

<body>
<!-- No.22 -->
<?php
$servername = "localhost";
$username = "pueng";
$password = "12345";
$dbname = "dreamhome";
if(isset($_POST["save"])){
	if($_POST["type"]==="pdf"){
		header("Location:savePHP.php");
	}
	
	else if($_POST["type"]==="excel"){
		header("Location:saveExcel.php");
	}
	
	else if($_POST["type"]==="csv"){
		header("Location:saveCSV.php");
	}
}
?>

<?php
echo "<table style='border: solid 1px black;'>";
echo "<tr>
		<th>Client No.</th>
		<th>Firstname</th>
		<th>Lastname</th>
		<th>Property No.</th>
		<th>View Date</th>
		<th>City</th>
	</tr>";

class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
} 

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT client.clientno,client.fname,client.lname,viewing.propertyno,viewing.viewdate,propertyforrent.city FROM client INNER JOIN viewing INNER JOIN propertyforrent ON client.clientno=viewing.clientno and viewing.propertyno=propertyforrent.propertyno"); 
    $stmt->execute();

	$output = '';
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
		$output .= $v;
    }
	
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

	<select name="type">
	  <option value="pdf">PDF</option>
      <option value="excel">Excel</option>
      <option value="csv">CSV</option>
	</select>
	<input type="submit" name="save" value="Save"/>
</form>
</body>
</html>