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
     <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="modal fade" data-keyboard="false" id="loginModal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header modalHeader">
                                <h4 class="modal-title">Iniciar Sesion</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                            </div>
                            <div class="modal-body modalBody">
                                <?php
                                        
                                        if ( isset( $_POST['login'])){
                                            require 'connect.php';
                                            $username = $_POST['username'];
                                            $username = $_POST['password'];
                                            $result = mysqli_query($con, 'select * from usuario where username="'.$username.'" and password="'.$password.'"');
                                            if (mysqli_num_rows($result)) {
                                                session_start();
                                                $_SESSION['id']=$result->id;
                                                echo "id: ". $_SESSION['id'];
                                            }
                                            else echo "Mal";
                                        }

                                    ?>
                                <form method="post">
                                    <div class="form-group">
                                        <label for="inputUserName">Usuario</label>
                                        <input class="form-control modalForms" placeholder="Nombre de Usuario" type="text" name="username" />
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword">Contraseña</label>
                                        <input class="form-control modalForms" placeholder="Contraseña" type="password" name="password" />
                                    </div>
                                    <div class="modal-footer modalFooter">
                                        <button type="submit" value="login" name="login" class="btn modalButton">Iniciar Sesion</button>

                                        <button class="btn modalButton" data-dismiss="modal">Cerrar</button>
                                    </div>

                                </form>

                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                            <a href="index.html" class="btn font-weight-bold botonInicioSesion botonColor" data-target="#loginModal" data-toggle="modal">Login</a>
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

    <a href="diario" style="text-decoration: none;">
        <div class="customDiario">
            <div class="container">
                <div class="row" style="vertical-align: center">
                    <div class="col-md-12 text-center"><h1 style="color:#FF4876;">DIARIO DULCE</h1></div>
                </div>
            </div>
        </div> <!--La seccion donde esta el diario-->
    </a>

    <div>
        <div class="container productosDiv">
            @yield('producto')
        </div>
    </div>
   <!-- <div>
        <div class="container reviewDiv">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-4">
                                <h2>Reseñas</h2>
                            </div>
                            <div class="float-right col-sm-4 offset-4">
                                <h4>Media: </h4>
                                <span class="fa-stack fa-fw">
                                    <i class="fas fa-star fa-stack-1x checked"></i>
                                    <i class="fas fa-star-half fa-stack-1x checked" data-></i>
                                </span>
                                <span class="fa-stack fa-fw">
                                    <i class="fas fa-star fa-stack-1x checked"></i>
                                    <i class="fas fa-star-half fa-stack-1x checked"></i>
                                </span>
                                <span class="fa-stack fa-fw">
                                    <i class="fas fa-star fa-stack-1x checked"></i>
                                    <i class="fas fa-star-half fa-stack-1x checked"></i>
                                </span>
                                <span class="fa-stack fa-fw">
                                    <i class="fas fa-star fa-stack-1x"></i>
                                    <i class="fas fa-star-half fa-stack-1x checked"></i>
                                </span>
                                <span class="fa-stack fa-fw">
                                    <i class="fas fa-star fa-stack-1x"></i>
                                    <i class="fas fa-star-half fa-stack-1x"></i>
                                </span>
                                <span class="badge">45</span>
                            </div>
                        </div>
         
                    </div>
                    <div class="card-body tog">
                        <div class="media">
                            <img src="Imagenes/candyIcon.png" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px; border:2px solid #FFE5D5">
                            <div class="media-body">
                                <h4>John Doe <small><i>Posted on February 19, 2016</i></small>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x checked"></i>
                                        <i class="fas fa-star-half fa-stack-1x checked" data-></i>
                                    </span>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x checked"></i>
                                        <i class="fas fa-star-half fa-stack-1x checked"></i>
                                    </span>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x checked"></i>
                                        <i class="fas fa-star-half fa-stack-1x checked"></i>
                                    </span>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x"></i>
                                        <i class="fas fa-star-half fa-stack-1x checked"></i>
                                    </span>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x"></i>
                                        <i class="fas fa-star-half fa-stack-1x"></i>
                                    </span>
                                </h4>
                                <p>Excelente producto</p>
                            </div>
                        </div>
                        <div class="media">
                            <img src="Imagenes/candyIcon.png" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px; border:2px solid #FFE5D5">
                            <div class="media-body">
                                <h4>
                                    John Doe <small><i>Posted on February 19, 2016</i></small>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x checked"></i>
                                        <i class="fas fa-star-half fa-stack-1x checked" data-></i>
                                    </span>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x checked"></i>
                                        <i class="fas fa-star-half fa-stack-1x checked"></i>
                                    </span>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x checked"></i>
                                        <i class="fas fa-star-half fa-stack-1x checked"></i>
                                    </span>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x"></i>
                                        <i class="fas fa-star-half fa-stack-1x checked"></i>
                                    </span>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x"></i>
                                        <i class="fas fa-star-half fa-stack-1x"></i>
                                    </span>
                                </h4>
                                <p>Cambio mi forma de ver la vida</p>
                            </div>
                        </div>
                        <div class="media">
                            <img src="Imagenes/candyIcon.png" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px; border:2px solid #FFE5D5">
                            <div class="media-body">
                                <h4>
                                    John Doe <small><i>Posted on February 19, 2016</i></small>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x checked"></i>
                                        <i class="fas fa-star-half fa-stack-1x checked" data-></i>
                                    </span>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x checked"></i>
                                        <i class="fas fa-star-half fa-stack-1x checked"></i>
                                    </span>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x checked"></i>
                                        <i class="fas fa-star-half fa-stack-1x checked"></i>
                                    </span>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x"></i>
                                        <i class="fas fa-star-half fa-stack-1x checked"></i>
                                    </span>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x"></i>
                                        <i class="fas fa-star-half fa-stack-1x"></i>
                                    </span>
                                </h4>
                                <p>Excelente sabor</p>
                            </div>
                        </div>
                        <div class="media">
                            <img src="Imagenes/candyIcon.png" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px; border:2px solid #FFE5D5">
                            <div class="media-body">
                                <h4>
                                    John Doe <small><i>Posted on February 19, 2016</i></small>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x checked"></i>
                                        <i class="fas fa-star-half fa-stack-1x checked" data-></i>
                                    </span>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x checked"></i>
                                        <i class="fas fa-star-half fa-stack-1x checked"></i>
                                    </span>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x checked"></i>
                                        <i class="fas fa-star-half fa-stack-1x checked"></i>
                                    </span>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x"></i>
                                        <i class="fas fa-star-half fa-stack-1x checked"></i>
                                    </span>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x"></i>
                                        <i class="fas fa-star-half fa-stack-1x"></i>
                                    </span>
                                </h4>
                                <p>Muy recomendado, aunque es muy dulce</p>
                            </div>
                        </div>
                        <div class="media">
                            <img src="Imagenes/candyIcon.png" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px; border:2px solid #FFE5D5">
                            <div class="media-body">
                                <h4>
                                    John Doe <small><i>Posted on February 19, 2016</i></small>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x checked"></i>
                                        <i class="fas fa-star-half fa-stack-1x checked" data-></i>
                                    </span>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x checked"></i>
                                        <i class="fas fa-star-half fa-stack-1x checked"></i>
                                    </span>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x checked"></i>
                                        <i class="fas fa-star-half fa-stack-1x checked"></i>
                                    </span>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x"></i>
                                        <i class="fas fa-star-half fa-stack-1x checked"></i>
                                    </span>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x"></i>
                                        <i class="fas fa-star-half fa-stack-1x"></i>
                                    </span>
                                </h4>
                                <p>Perfecto para los amantes del chocolate</p>
                            </div>
                        </div>
                        <div class="media">
                            <img src="Imagenes/candyIcon.png" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px; border:2px solid #FFE5D5">
                            <div class="media-body">
                                <h4>
                                    John Doe <small><i>Posted on February 19, 2016</i></small>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x checked"></i>
                                        <i class="fas fa-star-half fa-stack-1x checked" data-></i>
                                    </span>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x checked"></i>
                                        <i class="fas fa-star-half fa-stack-1x checked"></i>
                                    </span>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x checked"></i>
                                        <i class="fas fa-star-half fa-stack-1x checked"></i>
                                    </span>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x"></i>
                                        <i class="fas fa-star-half fa-stack-1x checked"></i>
                                    </span>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x"></i>
                                        <i class="fas fa-star-half fa-stack-1x"></i>
                                    </span>
                                </h4>
                                <p>Compre por error 20, pero lo valio completamente</p>
                            </div>
                        </div>
                        <div class="media">
                            <img src="Imagenes/candyIcon.png" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px; border:2px solid #FFE5D5">
                            <div class="media-body">
                                <h4>
                                    John Doe <small><i>Posted on February 19, 2016</i></small>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x checked"></i>
                                        <i class="fas fa-star-half fa-stack-1x checked" data-></i>
                                    </span>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x checked"></i>
                                        <i class="fas fa-star-half fa-stack-1x checked"></i>
                                    </span>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x checked"></i>
                                        <i class="fas fa-star-half fa-stack-1x checked"></i>
                                    </span>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x"></i>
                                        <i class="fas fa-star-half fa-stack-1x checked"></i>
                                    </span>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x"></i>
                                        <i class="fas fa-star-half fa-stack-1x"></i>
                                    </span>
                                </h4>
                                <p>Lo volvere a comprar!</p>
                            </div>
                        </div>
                        <div class="media">
                            <img src="Imagenes/candyIcon.png" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px; border:2px solid #FFE5D5">
                            <div class="media-body">
                                <h4>
                                    John Doe <small><i>Posted on February 19, 2016</i></small>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x checked"></i>
                                        <i class="fas fa-star-half fa-stack-1x checked" data-></i>
                                    </span>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x checked"></i>
                                        <i class="fas fa-star-half fa-stack-1x checked"></i>
                                    </span>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x checked"></i>
                                        <i class="fas fa-star-half fa-stack-1x checked"></i>
                                    </span>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x"></i>
                                        <i class="fas fa-star-half fa-stack-1x checked"></i>
                                    </span>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x"></i>
                                        <i class="fas fa-star-half fa-stack-1x"></i>
                                    </span>
                                </h4>                                <p>Que vaina mas buena</p>
                            </div>
                        </div>
                        <div class="media">
                            <img src="Imagenes/candyIcon.png" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px; border:2px solid #FFE5D5">
                            <div class="media-body">
                                <h4>
                                    John Doe <small><i>Posted on February 19, 2016</i></small>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x checked"></i>
                                        <i class="fas fa-star-half fa-stack-1x checked" data-></i>
                                    </span>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x checked"></i>
                                        <i class="fas fa-star-half fa-stack-1x checked"></i>
                                    </span>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x checked"></i>
                                        <i class="fas fa-star-half fa-stack-1x checked"></i>
                                    </span>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x"></i>
                                        <i class="fas fa-star-half fa-stack-1x checked"></i>
                                    </span>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x"></i>
                                        <i class="fas fa-star-half fa-stack-1x"></i>
                                    </span>
                                </h4>                                <p>Regular</p>
                            </div>
                        </div>
                        <div class="media">
                            <img src="Imagenes/candyIcon.png" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px; border:2px solid #FFE5D5">
                            <div class="media-body">
                                <h4>
                                    John Doe <small><i>Posted on February 19, 2016</i></small>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x checked"></i>
                                        <i class="fas fa-star-half fa-stack-1x checked" data-></i>
                                    </span>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x checked"></i>
                                        <i class="fas fa-star-half fa-stack-1x checked"></i>
                                    </span>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x checked"></i>
                                        <i class="fas fa-star-half fa-stack-1x checked"></i>
                                    </span>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x"></i>
                                        <i class="fas fa-star-half fa-stack-1x checked"></i>
                                    </span>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x"></i>
                                        <i class="fas fa-star-half fa-stack-1x"></i>
                                    </span>
                                </h4>                                <p>Muy muy rico :-)</p>
                            </div>
                        </div>
                        <div class="media">
                            <img src="Imagenes/candyIcon.png" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px; border:2px solid #FFE5D5">
                            <div class="media-body">
                                <h4>
                                    John Doe <small><i>Posted on February 19, 2016</i></small>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x checked"></i>
                                        <i class="fas fa-star-half fa-stack-1x checked" data-></i>
                                    </span>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x checked"></i>
                                        <i class="fas fa-star-half fa-stack-1x checked"></i>
                                    </span>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x checked"></i>
                                        <i class="fas fa-star-half fa-stack-1x checked"></i>
                                    </span>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x"></i>
                                        <i class="fas fa-star-half fa-stack-1x checked"></i>
                                    </span>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x"></i>
                                        <i class="fas fa-star-half fa-stack-1x"></i>
                                    </span>
                                </h4>                                <p>Recomendado!!!</p>
                            </div>
                        </div>
                        <div class="media">
                            <img src="Imagenes/candyIcon.png" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px; border:2px solid #FFE5D5">
                            <div class="media-body">
                                <h4>
                                    John Doe <small><i>Posted on February 19, 2016</i></small>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x checked"></i>
                                        <i class="fas fa-star-half fa-stack-1x checked" data-></i>
                                    </span>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x checked"></i>
                                        <i class="fas fa-star-half fa-stack-1x checked"></i>
                                    </span>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x checked"></i>
                                        <i class="fas fa-star-half fa-stack-1x checked"></i>
                                    </span>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x"></i>
                                        <i class="fas fa-star-half fa-stack-1x checked"></i>
                                    </span>
                                    <span class="fa-stack fa-fw">
                                        <i class="fas fa-star fa-stack-1x"></i>
                                        <i class="fas fa-star-half fa-stack-1x"></i>
                                    </span>
                                </h4>                                <p>Excelente producto.</p>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <ul class="pagination justify-content-center">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul>
                    </div>
                </div>
                       </div>
    </div> POR AHORA NO-->

    <br />

    <!--<div>
        <div class="container">
            <div class="row" style="width:inherit">
                <div class="col-xs-12" style="width:inherit">
                    <div class="card cardBorder">
                        <div class="card-header panelsCarousel cardHeaderPadding"><button data-target="#relacionados" class="btn panelsCarousel" data-toggle="collapse"><h5 class="card-title"> PRODUCTOS RELACIONADOS<span class="fas fa-angle-up"></span></h5></button></div>

                        <div class="card-body panelsCarousel collapse show" id="relacionados">
                            <div class=" carousel-control-productos">
                                <a href="#carouselmejorMes" class="carousel-control-prev float-left" style="width:auto" data-slide="prev">
                                    <span class="carousel-control-prev-icon carousel-control-prev-icon-p"></span>
                                </a>
                                <a href="#carouselRelacionados" class="carousel-control-next float-right" style="width:auto" data-slide="next">
                                    <span class="carousel-control-next-icon carousel-control-prev-icon-p"></span>
                                </a>
                            </div>

                            <div id="carouselRelacionados" class="carousel slide" data-interval="0" data-ride="carousel">

                                <div class="carousel-inner" style="margin-top:10px;margin-bottom:10px">
                                    <div class="carousel-item active">
                                        <div class="row">
                                            <div class="col-sm-3 imagenMinimo">
                                                <a href="#">
                                                    <div class="productsDiv">
                                                        <img src="Imagenes/candy.png" class="align-middle" />

                                                    </div>
                                                </a>
                                                <a href="#"> <h4>Producto #1</h4></a>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x checked"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked" data-></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x checked"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked"></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x checked"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked"></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked"></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x"></i>
                                                    <i class="fas fa-star-half fa-stack-1x"></i>
                                                </span>
                                                <button class="btn botonAddToCart">ADD TO CART</button>

                                            </div>
                                            <div class="col-sm-3 imagenMinimo">
                                                <a href="#">
                                                    <div class="productsDiv">
                                                        <img src="Imagenes/sorpresa1.jpg" />
                                                    </div>
                                                </a>
                                                <a href="#"><h4>Producto #2</h4></a>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x checked"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked" data-></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x checked"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked"></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x checked"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked"></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked"></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x"></i>
                                                    <i class="fas fa-star-half fa-stack-1x"></i>
                                                </span>
                                                <button class="btn botonAddToCart">ADD TO CART</button>

                                            </div>
                                            <div class="col-sm-3 imagenMinimo">
                                                <a href="#">
                                                    <div class="productsDiv">
                                                        <img src="Imagenes/candyIcon.png" />

                                                    </div>
                                                </a>
                                                <a href="#"><h4>Producto #3</h4></a>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x checked"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked" data-></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x checked"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked"></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x checked"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked"></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked"></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x"></i>
                                                    <i class="fas fa-star-half fa-stack-1x"></i>
                                                </span>
                                                <button class="btn botonAddToCart">ADD TO CART</button>

                                            </div>
                                            <div class="col-sm-3 imagenMinimo">
                                                <a href="#">
                                                    <div class="productsDiv">
                                                        <img src="Imagenes/candy.png" />

                                                    </div>
                                                </a>
                                                <a href="#"><h4>Producto #4</h4></a>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x checked"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked" data-></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x checked"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked"></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x checked"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked"></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked"></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x"></i>
                                                    <i class="fas fa-star-half fa-stack-1x"></i>
                                                </span>
                                                <button class="btn botonAddToCart">ADD TO CART</button>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="row">
                                            <div class="col-sm-3 imagenMinimo">
                                                <a href="#">
                                                    <div class="productsDiv">
                                                        <img src="Imagenes/candy.png" class="img-fluid" />
                                                    </div>
                                                </a>

                                                <a href="#"><h4>Producto #5</h4></a>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x checked"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked" data-></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x checked"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked"></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x checked"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked"></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked"></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x"></i>
                                                    <i class="fas fa-star-half fa-stack-1x"></i>
                                                </span>
                                                <button class="btn botonAddToCart">ADD TO CART</button>

                                            </div>
                                            <div class="col-sm-3 imagenMinimo">
                                                <a href="#">
                                                    <div class="productsDiv">
                                                        <img src="Imagenes/sorpresa1.jpg" class="img-fluid" />
                                                    </div>
                                                </a>
                                                <a href="#"><h4>Producto #6</h4></a>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x checked"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked" data-></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x checked"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked"></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x checked"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked"></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked"></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x"></i>
                                                    <i class="fas fa-star-half fa-stack-1x"></i>
                                                </span>
                                                <button class="btn botonAddToCart">ADD TO CART</button>

                                            </div>
                                            <div class="col-sm-3 imagenMinimo">
                                                <a href="#">
                                                    <div class="productsDiv">
                                                        <img src="Imagenes/candy.png" class="img-fluid" />
                                                    </div>
                                                </a>
                                                <a href="#"><h4>Producto #7</h4></a>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x checked"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked" data-></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x checked"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked"></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x checked"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked"></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked"></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x"></i>
                                                    <i class="fas fa-star-half fa-stack-1x"></i>
                                                </span>
                                                <button class="btn botonAddToCart">ADD TO CART</button>

                                            </div>
                                            <div class="col-sm-3 imagenMinimo">
                                                <a href="#">
                                                    <div class="productsDiv">
                                                        <img src="Imagenes/sorpresa1.jpg" class="img-fluid" />
                                                    </div>
                                                </a>
                                                <a href="#"><h4>Producto #8</h4></a>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x checked"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked" data-></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x checked"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked"></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x checked"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked"></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked"></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x"></i>
                                                    <i class="fas fa-star-half fa-stack-1x"></i>
                                                </span>
                                                <button class="btn botonAddToCart">ADD TO CART</button>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="row">
                                            <div class="col-sm-3 imagenMinimo">
                                                <a href="#">
                                                    <div class="productsDiv">
                                                        <img src="Imagenes/candy.png" class="img-fluid" />
                                                    </div>
                                                </a>
                                                <a href="#"><h4>Producto #9</h4></a>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x checked"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked" data-></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x checked"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked"></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x checked"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked"></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked"></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x"></i>
                                                    <i class="fas fa-star-half fa-stack-1x"></i>
                                                </span>
                                                <button class="btn botonAddToCart">ADD TO CART</button>

                                            </div>
                                            <div class="col-sm-3 imagenMinimo">
                                                <a href="#">
                                                    <div class="productsDiv">
                                                        <img src="Imagenes/sorpresa1.jpg" class="img-fluid" />
                                                    </div>
                                                </a>
                                                <a href="#"><h4>Producto #10</h4></a>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x checked"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked" data-></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x checked"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked"></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x checked"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked"></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked"></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x"></i>
                                                    <i class="fas fa-star-half fa-stack-1x"></i>
                                                </span>
                                                <button class="btn botonAddToCart">ADD TO CART</button>

                                            </div>
                                            <div class="col-sm-3 imagenMinimo">
                                                <a href="#">
                                                    <div class="productsDiv">
                                                        <img src="Imagenes/candy.png" class="img-fluid" />
                                                    </div>
                                                </a>
                                                <a href="#"><h4>Producto #11</h4></a>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x checked"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked" data-></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x checked"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked"></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x checked"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked"></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked"></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x"></i>
                                                    <i class="fas fa-star-half fa-stack-1x"></i>
                                                </span>
                                                <button class="btn botonAddToCart">ADD TO CART</button>

                                            </div>
                                            <div class="col-sm-3 imagenMinimo">
                                                <a href="#">
                                                    <div class="productsDiv">
                                                        <img src="Imagenes/sorpresa1.jpg" class="img-fluid" />
                                                    </div>
                                                </a>
                                                <a href="#"><h4>Producto #12</h4></a>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x checked"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked" data-></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x checked"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked"></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x checked"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked"></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked"></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x"></i>
                                                    <i class="fas fa-star-half fa-stack-1x"></i>
                                                </span>
                                                <button class="btn botonAddToCart">ADD TO CART</button>

                                            </div>
                                        </div>
                                    </div>


                                </div>

                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div> por ahora no, RELACIONADOS-->

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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="Bootstrap/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('.collapse').on('show.bs.collapse', function () {
                $(this).parent().find('.fa-angle-down').removeClass('fa-angle-down').addClass('fa-angle-up')
            }).on('hidden.bs.collapse', function () {
                $(this).parent().find('.fa-angle-up').removeClass('fa-angle-up').addClass('fa-angle-down')
            })
        });
        $(document).ready(function () {
            $('#carouselUltimosProductos').carousel();
        });


        $(".mas").on("click", function () {

            var oldValue = $("#cantidadProductos").val();
            var newVal = parseFloat(oldValue) + 1;
            

            $("#cantidadProductos").val(newVal);

        });
        $(".menos").on("click", function () {

            var oldValue = $("#cantidadProductos").val();

          
                if (oldValue > 0) {
                    var newVal = parseFloat(oldValue) - 1;
                } else {
                    newVal = 0;
                }

                $("#cantidadProductos").val(newVal);

        });
);

  });
    </script>
</body>
</html>