<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;
use App\Http\Controllers\mssms;
include ("Conexion.php");


class WsCrudArticulo extends Controller
{
    public function store(Request $req)
    {
        $obj=new mssms();
        $var=$req->get('form');
        $con=$_POST['con'];
        $articulo=$req->get('articulo');
        $precio=$req->get('precio');
        $clasif=$req->get('clasif');
        $alto=$req->get('alto');
        $largo=$req->get('largo');
        $ancho=$req->get('ancho');
        switch($var){
            case '1':
                $sol="SELECT [id] FROM [dbo].[medida]WHERE [alto]=$alto AND [largo]=$largo AND [ancho]=$ancho";
                $idMed;
                $cuenta=0;
                //Dar de alta articulo
                try{
                    $wsd_url="http://localhost/CrudArticulo/Crudmedida.asmx?WSDL";
                    $client=new SoapClient($wsd_url);
                    $paramsCreate=array(
                        'alt'=>$alto, 'lrg'=>$largo, 'anch'=>$ancho
                    );
                    $return=$client->CreateMedida($paramsCreate);
                }catch(Exception $e){
                    echo "Expression occured".$e;
                }
                $stmt=sqlsrv_query($con, $sol);
                $row=sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
                $idMed=$row['id'];
                sqlsrv_free_stmt($stmt);
                try{
                        $wsd_url="http://localhost/CrudArticulo/CrudArticulo.asmx?WSDL";
                        $client=new SoapClient($wsd_url);
                        $paramsCreate=array(
                            'articulo'=>$articulo, 'precio'=>$precio, 'medidas'=>$idMed, 'clasif'=>$clasif
                        );
                        $return=$client->CreateArticulo($paramsCreate);
                    }catch(Exception $e){
                        echo "Expression occured".$e;
                    }
                break;
            case '2':
                $idArl=$req->get('idArl');
                $sol="SELECT dbo.medida.id FROM dbo.articulo INNER JOIN dbo.medida ON dbo.articulo.idMedida = dbo.medida.id WHERE  (dbo.articulo.id = {$idArl}) AND (dbo.medida.id = dbo.medida.id)";
                $stmt=sqlsrv_query($con, $sol);
                $row=sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
                $idMed=$row['id'];
                sqlsrv_free_stmt($stmt);
                $cuenta=0;
                //Actualizar articulo
                try{
                    $wsd_url="http://localhost/CrudArticulo/Crudmedida.asmx?WSDL";
                    $client=new SoapClient($wsd_url);
                    $paramsUpdate=array(
                        'alt'=>$alto, 'lrg'=>$largo, 'anch'=>$ancho, 'id'=>$idMed
                    );
                    $return=$client->UpdateMedida($paramsUpdate);
                }catch(Exception $e){
                    echo "Expression occured".$e;
                }

                try{
                        $wsd_url="http://localhost/CrudArticulo/CrudArticulo.asmx?WSDL";
                        $client=new SoapClient($wsd_url);
                        $paramsUpdate=array(
                            'precio'    =>$precio, 'medidas'=>$idMed, 'clasif'=>$clasif, 'id'=>$idArl
                        );
                        $return=$client->UpdateArticulo($paramsUpdate);
                    }catch(Exception $e){
                        echo "Expression occured".$e;
                    }
            break;

            case '3':
                $idArl=$req->get('idArl');
                $sol="SELECT dbo.medida.id FROM dbo.articulo INNER JOIN dbo.medida ON dbo.articulo.idMedida = dbo.medida.id WHERE  (dbo.articulo.id = {$idArl}) AND (dbo.medida.id = dbo.medida.id)";
                $stmt=sqlsrv_query($con, $sol);
                $row=sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
                $idMed=$row['id'];
                sqlsrv_free_stmt($stmt);
                $cuenta=0;
                //Eliminar articulo
                try{
                    $wsd_url="http://localhost/CrudArticulo/Crudmedida.asmx?WSDL";
                    $client=new SoapClient($wsd_url);
                    $paramsUpdate=array(
                        'id'=>$idMed
                    );
                    $return=$client->DeleteMedida($paramsUpdate);
                }catch(Exception $e){
                    echo "Expression occured".$e;
                }

                try{
                        $wsd_url="http://localhost/CrudArticulo/CrudArticulo.asmx?WSDL";
                        $client=new SoapClient($wsd_url);
                        $paramsUpdate=array(
                            'id'=>$idArl
                        );
                        $return=$client->DeleteArticulo($paramsUpdate);
                    }catch(Exception $e){
                        echo "Expression occured".$e;
                    }
            break;
        }
        $obj->conexion();
        $serverName=$_POST['servern'];
        $Database=$_POST['database'];
        $UID=$_POST['UID'];
        $PWD=$_POST['PWD'];
        $query=$_POST['query'];
        $queryArl=$_POST['queryArl'];
        $queryArlinf=$_POST['queryArlinf'];
        $queryVw=$_POST['queryVw'];
        return view('articulo', compact('serverName', 'Database','UID','PWD', 'query','queryArl', 'queryArlinf', 'queryVw'));
    }
}
