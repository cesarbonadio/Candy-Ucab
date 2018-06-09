<div class="modal fade modal-slide-in-left" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$pro->codigo}}">


	{{Form::Open(array('action'=>array('ProductoController@destroy',$pro->codigo),'method'=>'delete'))}}

	<div class="modal-dialog">
		<div class="modal-content">


			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
      <h4 class="modal-title">Eliminar Producto</h4>
			</div>

			<div class="modal-body">
				<p>¿Seguro que quiere eliminar el artículo: <strong> {{$pro->nombre}} </strong> de código <strong> {{$pro->codigo}}</strong> ?</p>
			</div>


			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>


		</div>
	</div>
	{{Form::Close()}}

</div>
