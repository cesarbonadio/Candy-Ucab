<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$jur->rif}}">


	{{Form::Open(array('action'=>array('JuridicoController@destroy',$jur->rif),'method'=>'delete'))}}

<div class="modal-dialog">
<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
      <h4 class="modal-title">Eliminar Cliente Juridico</h4>
			</div>

			<div class="modal-body">
				<p>¿Seguro que quiere eliminar el cliente: <strong> {{$jur->d_social}} </strong> de rif <strong> {{$jur->rif}}</strong> ?</p>
				<p>También se eliminarán todos los teléfonos asociados.</p>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>

		</div>
</div>
	{{Form::Close()}}
</div>
