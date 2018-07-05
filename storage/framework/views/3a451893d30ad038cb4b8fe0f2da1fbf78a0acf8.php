<?php echo Form::open(array('url'=>'gestion/privilegio','method'=>'GET','autocomplete'=>'off','role'=>'search')); ?>


<div class="form-group">
	<div class="input-group">
		<input type="text" class="form-control" name="searchText" placeholder="Buscar por nombre de privilegio..." value="<?php echo e($searchText); ?>">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-primary">Buscar</button>
		</span>
	</div>
</div>

<?php echo e(Form::close()); ?>

