<?php

$server='localhost';
$bduser='robertogm_robertogm';
$bdpass='R0b3rt0GM';
$bdname='robertogm_Kiosco';
$bdmotor = new mysqli($server,$bduser,$bdpass,$bdname);
if($bdmotor->connect_errno)
{
	die("Error de SQL: ".$bdmotor->connect_errno);
}
?>