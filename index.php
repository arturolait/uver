<?php
session_start();
if(isset($_SESSION["profesor"])){
    header('Location: home.php');
}
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="author" content="Juan castro">
        <meta name="generator" content="1.0.0">
        <title>Login UV</title>

        <!-- Bootstrap core CSS -->
        <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

        <style>
            html,
            body {
                height: 100%;
            }

            body {
                display: flex;
                align-items: center;
                padding-top: 40px;
                padding-bottom: 40px;
                background-color: #f5f5f5;
            }

            .form-signin {
                width: 100%;
                padding: 15px;
                margin: auto;
            }

            .form-signin .checkbox {
                font-weight: 400;
            }

            .form-signin .form-floating:focus-within {
                z-index: 2;
            }

            .form-signin input[type="email"] {
                margin-bottom: -1px;
                border-bottom-right-radius: 0;
                border-bottom-left-radius: 0;
            }

            .form-signin input[type="password"] {
                margin-bottom: 10px;
                border-top-left-radius: 0;
                border-top-right-radius: 0;
            }
        </style>
    </head>
    <body class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4">
                    <img class="mb-4" src="assets/img/uv_logo.png" width="100%">
                </div>
                
            </div>
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4">
                    <main class="form-signin">
                        
                        <form id="frmDataInfo">                
                            <h1 class="h3 mb-3 fw-normal">Credenciales</h1>

                            <div class="form-floating">
                                <input type="number" class="form-control" id="idProfesor"  name="idProfesor"  placeholder="ID profesor">
                                <label for="floatingInput">ID Profesor</label>
                            </div>
                            <div class="form-floating">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                                <label for="floatingPassword">Contraseña</label>
                            </div>
                            <button class="w-100 btn btn-lg btn-primary" type="submit" id="iniciaSesion">Iniciar Sesion</button>
                        </form>
                    </main>
                </div>
            </div>
        </div>

          
          <!-- Modal -->
        <div class="modal fade" id="cargando" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" >
                    <div class="modal-body">
                        Iniciando sesion....
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="assets/dist/js/jquery-3.6.0.js"></script>
        <script type="text/javascript" src="assets/dist/js/moment.min.js"></script>
        <!-- Bootstrap core CSS -->
        <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
        
        <script type="text/javascript">
            $(document).ready(function() {
                var myModal = new bootstrap.Modal(document.getElementById('cargando'), {backdrop: 'static', keyboard: false});

                $("#iniciaSesion").click(function(){
                    //myModal.show();
                    $.ajax({
                        method: "POST",
                        url: "controller/login/iniciaSesion.php",
                        data: $("#frmDataInfo").serialize()
                    })
                    .done(function( result ) {
                        if(result.status == "success"){
                            window.location.href = "home.php";
                        }else{ // si el No de trabajador ya se encuentra registrado
                            alert(result.msj)
                            console.log(result);
                        }
                    })
                    .fail(function(jqXHR, textStatus){
                        alert( "Peticion fallida failed: " + textStatus );
                    });
    
                    return false;
                });  
    
            });
        </script>


    </body>
</html>
