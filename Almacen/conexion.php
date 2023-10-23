<?php

$host = "localhost";
$user = "root";
$pass = "";
$bd = "almacencebag";

  $conexion = new mysqli($host, $user, $pass,$bd);
  if
    (!$conexion){
    echo "Error en la conexion.";
  } 
    
  
  ?>