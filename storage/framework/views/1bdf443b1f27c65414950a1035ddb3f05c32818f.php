

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="<?php echo e(asset('usuario/css/bootstrap.min.css')); ?>" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link href="<?php echo e(asset('usuario/css/StyleSheetIndex.css')); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="icon" href="<?php echo e(asset('usuario/Imagenes/candyIcon.png')); ?>">


    <title>Candy Ucab</title>
</head>
<body>
    <?php 
    session_start();     
    if(!isset($_SESSION['ini'])){
        $_SESSION['ini']=0;

    }
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

    <div class="customContainerSearch">
        <div class="fixed-top fixedContainer">
            <div class="container" style="min-height:inherit">
                <div class="row" style="min-height:inherit">

                    <div class="col-sm-3 offset-9" style="min-height:inherit">
                        <div class="btn-group float-right" style="min-height:inherit">
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
                    <a href="index"><img class="img-fluid" src="<?php echo e(asset('usuario/Imagenes/candy.png')); ?>"></a>
                </div>
                <div class="col-sm-4"><h6 class="slogan">un dulce mundo</h6></div>
            </div>
        </div>
    </div>  <!--La seccion donde esta el logo--><!--COPIAR-->

    <div class="">

        <div class="container">
            <?php echo $__env->yieldContent('iniciarSesion'); ?>

        </div>
    </div>
<?php } else { ?>
    <div>
        <h1 style="text-align: center; margin-top: 20%;margin-bottom: 20%;">NO PUEDES ACCEDER A ESTA PAGINA</h1>
    </div>
<?php } ?>

    <footer class="copyrightDiv fixed-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <h6 class="copyright"><span class="fa fa-copyright"></span> Copyright Candy Ucab</h6>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="<?php echo e(asset('usuario/Bootstrap/js/bootstrap.min.js')); ?>" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</body>
</html>