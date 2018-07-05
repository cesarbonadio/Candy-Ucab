<?php $__env->startSection('registrarse'); ?>

<div class="container">
        <div class="row registroDiv">
            <div class="col-sm-12" >
                    <br/>
                    <div><h4 style="text-align:center">Bienvenido a Candy Ucab</h4></div>
                    <br/>
                    <?php if(count($errors)>0): ?>
                   <div class ="alert alert-danger">
                      <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </ul>
                   </div>
                   <?php endif; ?>
                    <?php echo Form::open(array('url'=>'usuario/registroN','method'=>'POST','autocomplete'=>'off')); ?>

                    <?php echo e(Form::token()); ?>

                     <div class="form-group row">
                        <label for="rif" class="col-sm-3 offset-1">Cedula</label>
                        <div class="col-sm-6">
                            <input class="form-control" placeholder="Cedula" name="cedula" type="text" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="rif" class="col-sm-3 offset-1">RIF</label>
                        <div class="col-sm-6">
                            <input class="form-control" placeholder="RIF" name="rif" type="text" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="correo" class="col-sm-3 offset-1">Correo</label>
                        <div class="col-sm-6">
                            <input class="form-control" placeholder="Correo" type="text" name="correo" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pagina_web" class="col-sm-3 offset-1">Nombre Personal</label>
                        <div class="col-sm-6">
                            <input class="form-control" placeholder="Nombre" type="text" name="nombre" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pagina_web" class="col-sm-3 offset-1">Apellido</label>
                        <div class="col-sm-6">
                            <input class="form-control" placeholder="Apellido" type="text" name="apellido" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lk_lugar" class="col-sm-3 offset-1">Dirección fiscal</label>
                        <div class="col-sm-6">
                            <select name="fk_lugar_fiscal" class="form-control">
                                <option value="">...</option>
                                <?php $__currentLoopData = $lugares; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lugar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value = "<?php echo e($lugar->codigo); ?>"><?php echo e($lugar->nombre); ?> (<?php echo e($lugar->tipo); ?>)</option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lk_lugar" class="col-sm-3 offset-1">Direccion fisica</label>
                        <div class="col-sm-6">
                            <select name="fk_lugar" class="form-control">
                                <option value="">...</option>
                                <?php $__currentLoopData = $lugares; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lugar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value = "<?php echo e($lugar->codigo); ?>"><?php echo e($lugar->nombre); ?> (<?php echo e($lugar->tipo); ?>)</option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <h4 class="offset-1">Datos de telefono</h4>
                        <br/>
                        <div class="row">
                            <label for="telefono" class="col-sm-3 offset-1">Numero de telefono</label>
                            <div class="col-sm-6">
                                <input class="form-control" placeholder="Telefono" type="text" name="telefono" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                              <label class="col-sm-3 offset-1" for="tipo_telefono">Tipo de telefono</label>
                              <div class="col-sm-6"> 
                                <select name="tipo_telefono" class="form-control">
                                    <option value="">Tipo...</option>
                                    <option value="radio">radio</option>
                                    <option value="fax">fax</option>
                                    <option value="movil">movil</option>
                                    <option value="fijo">fijo</option>
                                    <option value="trabajo">trabajo</option>
                                    <option value="casa">casa</option>
                                </select>
                            </div>
                    </div>


                    <div class="form-group">
                        <h4 class="offset-1">Datos de usuario</h4>
                        <br/>
                        <div class="row">
                            <label for="user" class="col-sm-3 offset-1">Nombre de Usuario</label>
                            <div class="col-sm-6">
                                <input class="form-control" placeholder="Nombre de Usuario" name="user" type="text" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pass" class="col-sm-3 offset-1">Contraseña</label>
                        <div class="col-sm-6">
                            <input class="form-control" placeholder="Contraseña" type="text" name="pass" />
                        </div>
                    </div>
                    <br/>
                    <div class="form-group">
                        <button type="submit" class="btn col-sm-2 offset-9">Continuar <span class="fa fa-arrow-right"></span></button>
                    </div>
                   <?php echo Form::close(); ?>

            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.usuario.registro', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>