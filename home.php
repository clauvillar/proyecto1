<?php include("templates/header.php"); ?>

<section>
<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="1000">
            <img src="img/software-libre-1200x565.jpg" height="600px" class="d-block w-100 opacity-50" alt="..." />

            <div class="container-text">
                <div class="carousel-caption d-none d-md-block">
                    <h5>INVENTARIO DE PRODUCTOS QUÍMICOS</h5>
                    <p>
                        Lleva un registro con precisión de los productos químicos utilizados
                        en tu empresa.
                    </p>
                    <p><a class="btn" href="#"><i class="fa fa-link"></i>Contáctenos</a></p>
                </div>
            </div>
        </div>
        <div class="carousel-item" data-bs-interval="10000">
            <img src="img/software-libre-1200x565.jpg" height="600px" class="d-block w-100 opacity-50" alt="..." />

            <div class="container-text">
                <div class="carousel-caption d-none d-md-block">
                    <h5>IDENTIFICACIÓN Y VALORACIÓN DE RIESGOS QUÍMICOS</h5>
                    <p>
                    Identifica con mayor facilidad la peligrosidad de las sustancias de manera integral: SALUD, SEGURIDAD Y MEDIO AMBIENTE.
                    <br>                  
                    </p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="img/software-libre-1200x565.jpg" height="600px" class="d-block w-100 opacity-50" alt="..." />
            <div class="container-text">
                <div class="carousel-caption d-none d-md-block">
                    <h5>CARACTERIZACIÓN DE TUS PRODUCTOS QUÍMICOS</h5>
                    <p>Podras tener la información en tiempo real de los productos químicos</p>
                </div>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="featurette" id="nosotros">
    <div class="row featurette">
      <div class="col-md-7">
        <h1 class="featurette-heading">Nosotros</h1><span> <br><br>Somos una empresa comprometidos con el medio ambiente.</span></h1>
        <p class="lead"> <br>Somos una empresa de desarrollo que ofrece un sistema de información de productos químicos, brindando la información necesaria
                        para atender las necesidades de nuestros clientes, además de cumplir con la normatividad legal vigente referente a sustancias químicas en el pais,
                        protegiendo la salud de sus trabajadores, el medio ambiente y la infraestructura.

                        <b>Quiero probar este parrafo</p>
      </div>
         <div class="col-md-5">
             <img src="img/hero3.png" width="500" height="500"></img>
        </div>
    </div>
</div>

  <!--container card -->

<div class="container-card" id="servicios">
    <div class="row">
    <H1>SERVICIOS</H1>
         <div class="col-4">
            <div class="card">   
                    <img src="img/card1.png" class="img-area" alt="...">      
                <div class="card-body"> 
                    <h4>Inventario de productos quimicos</h4>
                  <p class="card-text">Lleva un registro con precisión de los productos químicos utilizados en tu empresa.</p>
                </div>
            </div>
         </div>
         <div class="col-4">
            <div class="card">   
                  <img src="img/card2.png" class="img-area" alt="...">      
                <div class="card-body"> 
                    <h4>Identificación y valoración del riesgo químico  </h4>
                  <p class="card-text">Calcula y valora el riesgo para la salud humana, la infraestructura y el medio ambiente de las sustancias químicas.  </p>
                </div>
            </div>
         </div>
         <div class="col-4">
            <div class="card">   
                     <img src="img/card3.png" class="img-area" alt="...">
                <div class="card-body">
                    <h4>Asistencia técnica</h4> 
                  <p class="card-text">Ofrecemos servicios de asistencia técnica con el objetivo de solucionar cualquier tipo de duda o problema con el sistema</p>
                </div>
            </div>
         </div>
    </div>
</div>

<div class="container-card">
    <div class="row">
         <div class="col-4">
            <div class="card">   
                 <img src="img/card4.png" class="img-area" alt="...">
                <div class="card-body"> 
                    <h4>Consulta fácilmente</h4>
                  <p class="card-text">Ofrecemos un software donde podras consultar en tiempo real información del producto, como hojas de seguridad y fichas técnicas</p>
                </div>
            </div>
         </div>
         <div class="col-4">
            <div class="card">   
                     <img src="img/card5.png" class="img-area" alt="...">
                <div class="card-body"> 
                    <h4>Asesorias personalizadas</h4>
                  <p class="card-text">Contamos con profesionales idoneos para capacitar a tu personal en el manejo del software </p>
                </div>
            </div>
         </div>
         <div class="col-4">
            <div class="card">   
                    <img src="img/card.png" class="img-area" alt="...">
                <div class="card-body">
                    <h4>Cumple con la normatividad ambiental</h4> 
                  <p class="card-text">Cumple con la normatividad legal vigente en productos químicos.</p>
                </div>
            </div>
         </div>
    </div>
</div>

 
    <?php include("templates/footer.php"); ?>