<?php echo Form::open(array('url'=>'cliente/medio','method'=>'GET','autocomplete'=>'off','role'=>'search')); ?>

<br>
<div class="form-group">
	<div class="input-group">
		<input type="text" class="form-control" name="searchText" placeholder="Buscar por cedula (natural) o por rif (juridico)..." value="<?php echo e($searchText); ?>">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-primary">Buscar</button>
		</span>
	</div>
</div>

<?php echo e(Form::close()); ?>

