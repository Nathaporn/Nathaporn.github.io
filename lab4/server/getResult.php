<?php

$title = "";
if($_GET["gender"]==="male"){
    $title="Mr.";
}else{
    $title="Miss";
}
echo "Welcome ".$title." ".$_GET["fname"]." ".$_GET["lname"];

?>