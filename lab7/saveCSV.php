<?php

mysql_connect('localhost','pueng','12345');
mysql_select_db('dreamhome');

$result = mysql_query('SELECT client.clientno,client.fname,client.lname,viewing.propertyno,viewing.viewdate,propertyforrent.city FROM client INNER JOIN viewing INNER JOIN propertyforrent ON client.clientno=viewing.clientno and viewing.propertyno=propertyforrent.propertyno');

if (!$result) die('Couldn\'t fetch records');
$num_fields = mysql_num_fields($result);
$headers = array();
for ($i = 0; $i < $num_fields; $i++) {
    $headers[] = mysql_field_name($result , $i);
}
$fp = fopen('php://output', 'w');
if ($fp && $result) {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="lab7.csv"');
    header('Pragma: no-cache');
    header('Expires: 0');
    fputcsv($fp, $headers);
    while ($row = mysql_fetch_row($result)) {
        fputcsv($fp, array_values($row));
    }
    die;
}
?>