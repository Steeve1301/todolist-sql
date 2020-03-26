<?php
include('connect.php');

/* Chaîne complexe */
$string = "<script>alert('ok');</script>";

print "Chaîne non échappée : $string\n";


$newstring=filter_var($string, FILTER_SANITIZE_STRING);


print "Chaîne échappée : " . $newstring . "\n";

?>