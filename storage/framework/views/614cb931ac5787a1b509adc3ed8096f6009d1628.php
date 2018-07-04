<?php $__env->startSection('iniciarSesion'); ?>

        <?php if(count($errors)>0): ?>
                   <div class ="alert alert-danger">
                      <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </ul>
                   </div>
                   <?php endif; ?>


	<?php echo Form::open(array('url'=>'usuario/iniciar','method'=>'POST','autocomplete'=>'off')); ?>

                    <?php echo e(Form::token()); ?>


                    <div class="form-group">
                        <h4 class="offset-1">Datos de usuario</h4>
                        <br/>
                        <div class="row">
                            <label for="username" class="col-sm-3 offset-1">Nombre de Usuario</label>
                            <div class="col-sm-6">
                                <input class="form-control" placeholder="Nombre de Usuario" name="username" type="text" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-3 offset-1">Contraseña</label>
                        <div class="col-sm-6">
                            <input class="form-control" placeholder="Contraseña" type="password" name="password" />
                        </div>
                    </div>

                    <br/>
                    <div class="form-group">
                        <button type="submit" class="btn col-sm-2 offset-9">Continuar <span class="fa fa-arrow-right"></span></button>
                    </div>
                   <?php echo Form::close(); ?>



<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.usuario.login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>