<?php $__env->startSection('contenido'); ?>

<form>
          				<input type="date" name="fechaini">
          				<input type="date" name="fechafin">
          				  <input class="btn btn-info" type="submit" formaction="/reporte/top5Clientes?fechaini=fechaini?fechafin=fechafin'" value="Submit to another page">

					
          			</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>