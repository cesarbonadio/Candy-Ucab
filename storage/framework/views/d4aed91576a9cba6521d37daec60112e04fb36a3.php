<?php $__env->startSection('producto'); ?>



<div class="carousel-item active">
    <div class="row">
                                            <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($pro->ranking < 5): ?>
                                            <div class="col-sm-3 imagenMinimo">
                                                 <a href="producto?prodctoId=<?php echo e($pro->codigo); ?>">
                                                    <div class="productsDiv">
                                                        <img src="Imagenes/<?php echo e($pro->foto); ?>" class="align-middle"/>

                                                    </div>
                                                </a>
                                                 <a href="producto?prodctoId=<?php echo e($pro->codigo); ?>">
                                                    <h4 style="text-transform: capitalize;"><?php echo e($pro->nombre); ?></h4>
                                                </a>
                                                <h4><?php echo e($pro->precio); ?> bs.</h4>

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
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
</div>



	<div class="carousel-item">
                                        <div class="row">
                                            
                                            <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($pro->ranking > 4 and $pro->ranking < 9): ?>
                                            <div class="col-sm-3 imagenMinimo">
                                                 <a href="producto?prodctoId=<?php echo e($pro->codigo); ?>">
                                                    <div class="productsDiv">
                                                        <img src="Imagenes/<?php echo e($pro->foto); ?>" class="align-middle"/>

                                  
                                                    </div>
                                                </a>
                                                 <a href="producto?prodctoId=<?php echo e($pro->codigo); ?>">
                                                    <h4 style="text-transform: capitalize;"><?php echo e($pro->nombre); ?></h4>
                                                </a>
                                                  <h4><?php echo e($pro->precio); ?> bs.</h4>
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
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            
                                        </div>
	</div>
	<div class="carousel-item">
                                        <div class="row">
                                            <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($pro->ranking > 8 and $pro->ranking < 13): ?>
                                            <div class="col-sm-3 imagenMinimo">
                                                 <a href="producto?prodctoId=<?php echo e($pro->codigo); ?>">
                                                    <div class="productsDiv">
                                                        <img src="Imagenes/<?php echo e($pro->foto); ?>" class="align-middle"/>

                                                    </div>
                                                </a>
                                                 <a href="producto?prodctoId=<?php echo e($pro->codigo); ?>">
                                                    <h4 style="text-transform: capitalize;"><?php echo e($pro->nombre); ?></h4>
                                                </a>
                                                  <h4><?php echo e($pro->precio); ?> bs.</h4>
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
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.usuario.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>