<?php $__env->startSection('carrito'); ?>



<br/>

  <div class="row">

		<div class="col-sm-12">
					<?php echo Form::open(array('url'=>'usuario/registroN','method'=>'POST','autocomplete'=>'off')); ?>

                    <?php echo e(Form::token()); ?>

					<div class="form-group">
                        <h4 class="offset-1">Seleccione su metodo de pago</h4>
                        <br/>
                        <div class="form-group row">
                              <label class="col-sm-3 offset-1" for="metodo">Metodo</label>
                              <div class="col-sm-6"> 
                                <select name="metodo" class="form-control">
                                    <option value="">Tipo...</option>
                                    <option value="Credito visa">Credito visa</option>
                                    <option value="Credito master card">Credito master card</option>
                                    <option value="Credito american express">Credito american express</option>
                                    <option value="Credito otro">Credito otro</option>
                                    <option value="Cheque">Cheque</option>
                                </select>
                            </div>
                    	</div>
                    </div>
                    <div class="form-group row">
                        <label for="pass" class="col-sm-3 offset-1">Numeros</label>
                        <div class="col-sm-6">
                            <input class="form-control" placeholder="numero" type="text" name="numero" />
                        </div>
                    </div>
                    <br/>
                    <div class="form-group">
                        <button type="submit" class="btn col-sm-2 offset-9 botonAddToCart">Continuar <span class="fa fa-arrow-right"></span></button>
                    </div>
                    <?php echo Form::close(); ?>


        </div>
  </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.usuario.carrito', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>