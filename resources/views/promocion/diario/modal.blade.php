<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$dia->codigo}}">


	{{Form::Open(array('action'=>array('DiarioController@destroy',$dia->codigo),'method'=>'delete'))}}

<div class="modal-dialog">
<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
      <h4 class="modal-title">Eliminar Diario</h4>
			</div>

			<div class="modal-body">
				<p>¿Seguro que quiere eliminar el diario: <strong> {{$dia->descripcion}} </strong> de codigo <strong> {{$dia->codigo}}</strong> ?</p>
				<p> También elminiaría todas las posibles relaciones de este diario con algún descuento. </p>
			</div>
			
    			<div class="modal-footer">
    				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    				<button type="submit" class="btn btn-primary">Confirmar</button>
    			</div>
    		</div>
    </div>
	{{Form::Close()}}
</div>
