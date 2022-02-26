<?php
session_start();
if(!isset($_SESSION["profesor"])){
    header('Location: index.php');
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="author" content="Juan castro">
        <meta name="generator" content="1.0.0">
        <title>Curriculum UV</title>
<!--
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
        <script type="text/javascript" src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
-->
    
    </head>
    <body style="font-family: fantasy;">

        <main class="container-main">
            <div>

            </div>
            <div style="padding: 1em 3em;">
                <div>
                    <h3>SISTEMA INTEGRAL DE INFORMACIÓN - <small class="text-muted">Panel Admin</small></h3>
                </div> 

                <div id="lista-Profesor">
                </div>

                <br>          
                <div class="bg-light p-5 rounded" style="border: 1px solid">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" type="button" role="tab" onclick="setHtmlContent('informacion_personal')">Datos personales</button>
                            <button class="nav-link disabledBtn" id="nav-infoAcademica-tab" data-bs-toggle="tab" type="button" role="tab" onclick="setHtmlContent('formacion_academica')" disabled>Formación academica</button>
                            <button class="nav-link disabledBtn" id="nav-capacitacion-tab" data-bs-toggle="tab" data-bs-target="#nav-capacitacion" type="button" role="tab" onclick="setHtmlContent('actualizacion_docente')" disabled>Actualizacion docente</button>
                            <button class="nav-link disabledBtn" id="nav-gestAcademica-tab" data-bs-toggle="tab" data-bs-target="#nav-gestAcademica" type="button" role="tab" onclick="setHtmlContent('gestion_academica')" disabled>Gestión académica</button>
                            <button class="nav-link disabledBtn" id="nav-prodAcademico-tab" data-bs-toggle="tab" data-bs-target="#nav-prodAcademico" type="button" role="tab" onclick="setHtmlContent('productos_academicos')" disabled>Producto académico</button>
                            <button class="nav-link disabledBtn" id="nav-expProfesional-tab" data-bs-toggle="tab" data-bs-target="#nav-expProfesional" type="button" role="tab" onclick="setHtmlContent('experiencia_profesional')" disabled>Experiencia profesional</button>
                            <button class="nav-link disabledBtn" id="nav-expDisenoIng-tab" data-bs-toggle="tab" data-bs-target="#nav-expDisenoIng" type="button" role="tab" onclick="setHtmlContent('experiencia_diseno_ingenieril')" disabled>Experiencia en diseño</button>
                            <button class="nav-link disabledBtn" id="nav-logProfesional-tab" data-bs-toggle="tab" data-bs-target="#nav-logProfesional" type="button" role="tab" onclick="setHtmlContent('logos_profesionales')" disabled>Logros profesionales</button>
                            <button class="nav-link disabledBtn" id="nav-participaciones-tab" data-bs-toggle="tab" data-bs-target="#nav-participaciones" type="button" role="tab" onclick="setHtmlContent('participaciones')" disabled>Participaciones</button>
                            <button class="nav-link disabledBtn" id="nav-reconocimientos-tab" data-bs-toggle="tab" data-bs-target="#nav-reconocimientos" type="button" role="tab" onclick="setHtmlContent('reconocimientos')" disabled>Reconocimientos</button>
                            <button class="nav-link disabledBtn text-danger fw-bold" id="nav-cerrar-tab" data-bs-toggle="tab" data-bs-target="#nav-cerrar" type="button" role="tab" onclick="cerrarEdit()" disabled>CERRAR</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent" style="border-radius: 0 0 20px 20px; border: 1px solid #f0f8ff; background: aliceblue; padding-bottom: inherit;">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        </div>
                    </div>


                </div>
            </div>
        </main>

        <script type="text/javascript" src="assets/dist/js/jquery-3.6.0.js"></script>
        <script type="text/javascript" src="assets/dist/js/moment.min.js"></script>
        <script type="text/javascript" src="assets/dist/js/daterangepicker.min.js"></script>

        <link rel="stylesheet" type="text/css" href="assets/dist/css/daterangepicker.css" />
        <!-- Bootstrap core CSS -->
        <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/objectProfecional.js"></script>

        <script type="text/javascript">
            $(function(){
                $("#lista-Profesor").load("profesores_admin.html"); 
                /* $("#nav-home").load("informacion_personal.html");    */             
            });

            function setHtmlContent(page){
                var htmlPage = page+".html";
                $("#nav-home").load(htmlPage);
            }

        </script>
    
    </body>
</html>
