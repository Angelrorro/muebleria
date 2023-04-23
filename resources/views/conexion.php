
<?php

$serverName="LAPTOP-IVQI9S1A\SQLEXPRESS";
$DataBase="Muebleria";
$UID="sa";
$PWD="aaa";
//$conn= new PDO("sqlsrv:server=$serverName;database=$DataBase",$UID,$PWD);

$connectionInfo=array("DataBase"=>"Muebleria", "UID"=>"sa", "PWD"=>"aaa");
$con=sqlsrv_connect($serverName,$connectionInfo);
//$query="SELECT * FROM articulo";

if($con){
    echo"Conexion exitosa\n";
    }else{
        echo"Fallo en la conexion";
        die( print_r( sqlsrv_errors(), true));
    }
    print_r($query);
?>

