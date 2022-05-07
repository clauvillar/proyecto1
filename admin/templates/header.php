<?php $url="http://".$_SERVER['HTTP_HOST']."/proyecto" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario quimicos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo $url; ?>./css/style.css">   
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b996cfcf64.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class=container>
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
           <img src="<?php echo $url;?>/img/logo1.png" class="img-fluid" alt="" width="150" height="150">
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation"></button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $url;?>/home.php">inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $url;?>/admin/section/inventario.php">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $url;?>/admin/section/logout.php">Cerrar sesion</a>
                    </li>              
                </ul>
            </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">