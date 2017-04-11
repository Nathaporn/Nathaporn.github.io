<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
if(isset($_POST['submit'])){
$servername = "localhost";
$username = "honey";
$password = "12345";

$custom = $_POST['customerID'];
$citi = $_POST['citizenID'];
$first = $_POST['fname'];
$last = $_POST['lname'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=webtech", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
	
    $sql = "INSERT INTO Customers (CustomerID, CitizenID, Firstname, Lastname) VALUES ($custom, $citi, $first, $last)";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();    }

}
?>


<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
Customer ID <input type="text" name="customerID" required /><br><br>
Citizen ID <input type="text" name="citizenID" required /><br><br>
Firstname <input type="text" name="fname" required /><br><br>
Lastname <input type="text" name="lname" required /><br><br>
<input type="submit" name="submit" value="Submit" required />
</form>
</body>
</html>