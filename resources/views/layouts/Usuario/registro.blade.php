<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{asset('usuario/css/bootstrap.min.css')}}" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link href="{{asset('usuario/css/StyleSheetIndex.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="icon" href="{{asset('usuario/Imagenes/candyIcon.png')}}">


    <title>Candy Ucab</title>
</head>
<body>
    <<?php 
    session_start();     
?>
    <?php if ($_SESSION['ini']!=1) { ?>


     <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="modal fade" data-keyboard="false" id="registerModal" tabindex="-2">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header modalHeader">
                                <h4 class="modal-title">Registro</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                            </div>
                            <div class="modal-body modalBody">
                                <h4>Tipo de cliente</h4>
                            </br>
                                <div class="btn-group d-flex" role="group">
                                    <a href='registroN' class="btn modalButton w-100">Cliente natural</a>
                                    <a href='registroJ' class="btn modalButton w-100">Cliente juridico</a>
                                </div>
                                
                            </div>
                            <div class="modal-footer modalFooter">
                                <button class="btn modalButton" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="customContainerSearch" style="display:none">
        <div class="fixed-top fixedContainer">
            <div class="container" style="min-height:inherit">
                <div class="row" style="min-height:inherit">
                    <div class="col-sm-7">
                        <form class="float-right" style="width:inherit">
                            <div class="input-group" style="width:inherit">
                                <input class="form-control busqueda" placeholder="Busqueda..." type="text" id="Busqueda" />
                                <span class="input-group-btn">
                                    <button class="btn btnBusqueda"><span class="fas fa-search"></span></button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-5" style="min-height:inherit">

                        <div class="float-right">
                            <div style="display:inline-block;margin-right:5px;color:#FFE5D5">
                                <h6 class="text-justify"><small>Nombre Usuario</small></h6>
                                <h6 class="text-justify"><small>Puntos</small></h6>
                            </div>
                            <div class="btn" style="min-height:inherit">

                                <a href="/perfil.html" class="btn font-weight-bold botonIniciada" style="border-radius: 50%;margin-top:-25px; background-color: #FF4876;padding:0 2.5px 0 2.5px;"><i class="fa fa-user-circle fa-2x"></i></a>

                            </div>
                            <div class="btn" style="min-height:inherit">
                                <a href="#" class="btn font-weight-bold botonSesionIniciada botonIniciada" style="margin-top:-25px">100.502 bs <i class="fa fa-shopping-cart fa-lg float-right"></i></a>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="customContainerSearch">
        <div class="fixed-top fixedContainer">
            <div class="container" style="min-height:inherit">
                <div class="row" style="min-height:inherit">
                    <div class="col-sm-9">
                        <form class="float-right" style="width:inherit">
                            <div class="input-group" style="width:inherit">
                                <input class="form-control busqueda" placeholder="Busqueda..." type="text" id="Busqueda" />
                                <span class="input-group-btn">
                                    <button class="btn btnBusqueda"><span class="fas fa-search"></span></button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-3" style="min-height:inherit">
                        <div class="btn-group float-right" style="min-height:inherit">
                            <a href="/usuario/iniciar" class="btn font-weight-bold botonInicioSesion botonColor">Login</a>
                            <a href="index.html" class="btn font-weight-bold botonInicioSesion botonColor" data-target="#registerModal" data-toggle="modal">Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!--La barra de busqueda superior--><!--COPIAR-->

    <div class="customContainerLogo">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <a href="index"><img class="img-fluid" src="{{asset('usuario/Imagenes/candy.png')}}"></a>
                </div>
                <div class="col-sm-4"><h6 class="slogan">un dulce mundo</h6></div>
            </div>
        </div>
    </div>  <!--La seccion donde esta el logo--><!--COPIAR-->

    <div class="customContainerMenu">

        <div class="container">
            <form>
                <div class="row">
                    <div class="col-md-12 btnMenuBorde">
                        <nav class="navbar navbar-light navbar-expand-lg ">
                            <a class="navbar-brand" href="#"></a>

                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#menuToggle" aria-controls="menuToggle" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon" style="background-color: #FF4876"></span>
                            </button>

                            <div class="navbar-collapse collapse" id="menuToggle">
                                <ul class="nav  nav-pills">
                                    <li class="nav-item"> <a class="nav-link botonColor" href="index">Inicio</a></li>
                                    <li class="nav-item"> <a class="nav-link botonColor" href="#">Tienda</a></li>
                                    <li class="nav-item"> <a class="nav-link botonColor" href="#">Nosotros</a></li>
                                    <li class="nav-item"> <a class="nav-link botonColor" href="#">Contacto</a></li>
                                </ul>

                            </div>
                        </nav>

                    </div>
                </div>
            </form>

        </div>
    </div> <!--La seccion donde esta el menu--><!--COPIAR-->

    <br/>

    @yield('registrarse')

    <br/>

    <div class="bottonpage">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 bottonImg">
                    <img class="img-fluid" src="Imagenes/candy.png" />
                    <h6 class="float-right bottonSlogan">un dulce mundo</h6>
                </div>
                <div class="col-sm-4 bottonList">
                    <ul class="list-group">
                        <li class="list-group-item"><h5>Categorias</h5></li>
                        <li class="list-group-item"><a href="#"><span class="fa fa-circle"></span> Categoria 1</a></li>
                        <li class="list-group-item"><a href="#"><span class="fa fa-circle"></span> Categoria 2</a></li>
                        <li class="list-group-item"><a href="#"><span class="fa fa-circle"></span> Categoria 3</a></li>

                    </ul>
                </div>
                <div class="col-sm-4 bottonList">
                    <ul class="list-group">
                        <li class="list-group-item"><h5>Paginas</h5></li>
                        <li class="list-group-item"><a href="index"><span class="fa fa-circle"></span> Inicio</a></li>
                        <li class="list-group-item"><a href="#"><span class="fa fa-circle"></span> Tienda</a></li>
                        <li class="list-group-item"><a href="#"><span class="fa fa-circle"></span> Nosotros</a></li>
                        <li class="list-group-item"><a href="#"><span class="fa fa-circle"></span> Contacto</a></li>


                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="copyrightDiv">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <h6 class="copyright"><span class="fa fa-copyright"></span> Copyright</h6>
                </div>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div>
        <h1 style="text-align: center; margin-top: 20%;margin-bottom: 20%;">NO PUEDES ACCEDER A ESTA PAGINA</h1>
    </div>
<?php } ?>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="{{asset('usuario/Bootstrap/js/bootstrap.min.js')}}" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

    <script type="{{asset('usuario/text/javascript')}}">
        $(document).ready(function () {
            $('.collapse').on('show.bs.collapse', function () {
                $(this).parent().find('.fa-angle-down').removeClass('fa-angle-down').addClass('fa-angle-up')
            }).on('hidden.bs.collapse', function () {
                $(this).parent().find('.fa-angle-up').removeClass('fa-angle-up').addClass('fa-angle-down')
            })
        });
        $(document).ready(function () {
            $('#carouselNews').carousel();
        });
        $(document).ready(function () {
            $('#carouselUltimosProductos').carousel();
        });

        $(document).ready(function () {
            if ($('#si').is(':checked')) {
                $('#registroCarnet').prop('disabled', false);
            }
            if ($('#no').is(':checked')) {
                $('#registroCarnet').prop('disabled', true);
            }
        });
    </script>
</body>
</html>