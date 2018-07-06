<?php $__env->startSection('producto'); ?>





			<div class="row">
                <div class="col-sm-6">
                    <img class="img-fluid" src="Imagenes/<?php echo e($productos[0]->foto); ?>"/>
                </div>
                <div class="col-sm-6">
                    <h3 style="text-transform: capitalize;"><?php echo e($productos[0]->nombre); ?></h3>
                    <p class="text-justify" style="text-transform: uppercase;"><?php echo e($productos[0]->descripcion); ?></p>
                    <h3><?php echo e($productos[0]->precio); ?> bs.</h3>
                    <form action="" style="margin-left:30px">
                        <!--<button class="menos"><span class="fa fa-minus"></span></button>-->
                        <label style="font-weight:bold">Cantidad:   </label>
                        <input type="number" name="cantidadProductos" id="cantidadProductos" class="cantidad" min="0" value="1"/> 
                        <!--<button class="mas"><span class="fa fa-plus"></span></button>-->
                    </form>
                    <button style="margin-left:20px;margin-top:20px" class="btn botonAddToCart" type="submit">ADD TO CART</button>

                </div>
            </div>

	

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.usuario.producto', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>