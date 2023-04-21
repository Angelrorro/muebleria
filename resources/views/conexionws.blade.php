<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
try{
    $wsd_url="http://localhost/CRUDconBusqueda/CRUD/WSCRUD.asmx?WSDL";
    $client=new SoapClient($wsd_url);

    $params=array (
    'id'=>'1',
    'buscar'=>'nombre'
    );

    $params1=array (
        'id'=>'1',
        'buscar'=>'apellido'
    );

    $return=$client->GetData($params);
    $return1=$client->GetData($params1);

    }catch(Exception $e){
    echo "Expression occured".$e;
}
?>


        <div class="col-sm-3 "align="center">
            <div class="card mb-6" style="max-width: 600px;">
                <button class="btn btn-outline-light" type="submit">
                    <div class="row g-0">
                        <div class="col-md-4 ">
                            <br></br>
                        <img src="" class="img-fluid rounded-start" >
                        </div>
                        <div class="col-md-8">
                        <div class="card-body text-muted">
                            <h5 class="card-title"> <?php print_r ($return);?></h5>
                            <p class="card-text"><?php print_r ($return1);?></p>
                            <p class="card-text"><small class="text-muted">Red: </small></p>
                        </div>
                        </div>
                    </div>
                </button>
            </div>
        </div>

</body>