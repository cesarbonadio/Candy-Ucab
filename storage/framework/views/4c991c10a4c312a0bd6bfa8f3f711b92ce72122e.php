<?php echo Form::open(array('url'=>'reporte/clientes_frecuentes','method'=>'GET','autocomplete'=>'off','role'=>'search')); ?>


<div class="form-group">
	<div class="input-group">
		<h1>Antes del :</h1>
		<input type="date" class="form-control" name="searchText" placeholder="Seleccionar Fecha" value="<?php echo e($searchText); ?>">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-primary">Buscar</button>
		</span>
	</div>
</div>

<?php echo e(Form::close()); ?>

