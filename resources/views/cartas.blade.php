<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .col-md-4 {
        height: auto;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    </style>
    
</head>
<body>
<br>

<div class="row borde">
    @foreach($listado as $li)
    <section class="col-lg-4 ">
    
    <article class="card mb-4" >
      
      <button class="btn btn-outline" type="submit">
          <div class="row g-0">
            <div class="col-md-4 img">
              <img src="http://localhost:8888/Arquitectura-carpinteria/example-app/resources/Images/<?php print_r ($li->NombreFoto) ?>.png" class="img-fluid rounded-start" alt="...">
                           
            </div>
            <div class="col-md-8">
              <div class="card-body text-muted">
                <h5 class="card-title">{{$li->nombreArticulo}}</h5>
                <p class="card-text">Precio ${{$li->precio}}</p>
                  <a href="">
                  <p class="card-text1"><small class="text-muted1"> Mas... </small></p>
                   </a>
              </div>
            </div>
          </div>

      </button>

    </article>
    
  </section>
  @endforeach
  
</div>
</body>
</html>