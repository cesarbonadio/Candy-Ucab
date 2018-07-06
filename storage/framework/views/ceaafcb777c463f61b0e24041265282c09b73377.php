<?php $__env->startSection('producto'); ?>

    <div>
        <div class="container perfilDiv">
            <div class="row">
                <div class="col-sm-5 divFotoPerfil">
                    <div class="circularImg">
                        <img src="Imagenes/sorpresa1.jpg" />
                    </div>
                    <a href="#"><span class="fa fa-image fa-2x"></span></a>

                </div>
                <div class="col-sm-7 divInfoPerfil">
                    <h4>Datos del perfil</h4>
                    <div id="personaNatural" style="display:none">
                        <h6>Usuario: </h6> <h6 id="nombreUsuario"><?php echo e($_SESSION['username']); ?></h6><br />
                        <h6>Correo: </h6> <h6 id="correoUsuario">Placeholder</h6><br />
                        <h6>Nombre: </h6> <h6 id="nombrePersonal">Placeholder</h6><br />
                        <h6>Apellido: </h6> <h6 id="apellidoPersonal">Placeholder</h6><br />
                        <h6>Cedula: </h6> <h6 id="cedulaPersonal">Placeholder</h6><br />
                        <h6>RIF: </h6> <h6 id="rifPersonal">Placeholder</h6><br />
                        <h6>Telefono: </h6> <h6 id="telefonoUsuario">Placeholder</h6><br />
                        <h6>Direccion: </h6> <h6 id="direccionUsuario">Placeholder, placeholder, placeholder</h6><br />
                        <div id="tieneCarnet"><h6>Carnet: </h6> <h6 id="carnetUsuario">Placeholder</h6><br /></div>
                        <div id="noTieneCarnet" style="display:none"><form class="form-inline"><input type="text"/></form><button class="btn">Añadir Carnet</button></div>

                    </div>
                    <div id="personaJuridica">
                        <h6>Usuario: </h6> <h6 id="nombreUsuario">Placeholder</h6><br />
                        <h6>Correo: </h6> <h6 id="correoUsuario">Placeholder</h6><br />
                        <h6>Direccion Social: </h6> <h6 id="dSocial">Placeholder</h6><br />
                        <h6>Razon Social: </h6> <h6 id="rSocial">Placeholder</h6><br />
                        <h6>Pagina web: </h6> <h6 id="paginaWeb">Placeholder</h6><br />
                        <h6>RIF: </h6> <h6 id="rifPersonal">Placeholder</h6><br />
                        <h6>Telefono: </h6> <h6 id="telefonoUsuario">Placeholder</h6><br />
                        <h6>Direccion: </h6> <h6 id="direccionUsuario">Placeholder, placeholder, placeholder</h6><br />
                        <h6>Direccion fiscal: </h6> <h6 id="direccionFiscalUsuario">Placeholder, placeholder, placeholder</h6><br />
                        <h6>Capital registrado: </h6> <h6 id="capitalUsuario">Placeholder</h6><br />

                        <div id="tieneCarnet"><h6>Carnet: </h6> <h6 id="carnetUsuario">Placeholder</h6><br /></div>
                        <div id="noTieneCarnet" style="display:none"><form class="form-inline"><input type="text" /></form><button class="btn">Añadir Carnet</button></div>

                    </div>
                </div>

            </div>
        </div>
    </div>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.usuario.producto', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>