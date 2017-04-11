
<?php
require('fpdf/mysql_table.php');

class PDF extends PDF_MySQL_Table
{
function Header()
{
    //Title
    $this->SetFont('Arial','',18);
    $this->Cell(0,6,'Viewing
	',0,1,'C');
    $this->Ln(10);
    //Ensure table header is output
    parent::Header();
}
}

mysql_connect('localhost','pueng','12345');
mysql_select_db('dreamhome');

$pdf=new PDF();
$pdf->AddPage();
$pdf->Table('SELECT client.clientno,client.fname,client.lname,viewing.propertyno,viewing.viewdate,propertyforrent.city FROM client INNER JOIN viewing INNER JOIN propertyforrent ON client.clientno=viewing.clientno and viewing.propertyno=propertyforrent.propertyno');
$pdf->Output();
?>

