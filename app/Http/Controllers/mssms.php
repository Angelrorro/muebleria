<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mssms extends Controller
{
    public function conexion(){
        $serverName="LAPTOP-IVQI9S1A\SQLEXPRESS";
        $_POST['servern']=$serverName;

        $Database="Muebleria";
        $_POST['database']=$Database;

        $UID="sa";
        $_POST['UID']=$UID;

        $PWD="aaa";
        $_POST['PWD']=$PWD;

        $connectionInfo=array("Database"=>"Muebleria", "UID"=>"sa", "PWD"=>"aaa");
        $con=sqlsrv_connect($serverName,$connectionInfo);

        $query="SELECT [id] ,[clasificacion]FROM [dbo].[clasificacion]";
        $_POST['query']=$query;

        $queryArl="SELECT [id], [nombreArticulo], [precio], [idMedida], [IdClasificacion] FROM [dbo].[articulo]";
        $_POST['queryArl']=$queryArl;

        $queryArlinf="SELECT [id], [nombreArticulo],[precio], [idMedida], [IdClasificacion] FROM [dbo].[articulo] WHERE [id]=";
        $_POST['queryArlinf']=$queryArlinf;

        $queryVw="SELECT dbo.medida.alto, dbo.medida.largo, dbo.medida.ancho FROM dbo.articulo INNER JOIN dbo.medida ON dbo.articulo.idMedida = dbo.medida.id WHERE dbo.articulo.id = ";
        $_POST['queryVw']=$queryVw;

        return view('header').view('articulo', compact('serverName', 'Database','UID','PWD', 'query','queryArl', 'queryArlinf', 'queryVw'));
    }
}
