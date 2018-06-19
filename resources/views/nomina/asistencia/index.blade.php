@extends ('layouts.admin')
@section ('contenido')


{!!Form::open(array('route'=>'asistencia.import','method'=>'POST','files'=>'true'))!!}

<div class="row">
	<div class="col-xs-10 col-sm-10 col-md-10">
		@if (Session::has('succes'))
		<div class="alert alert-succes">{{Session::get('message')}} hola</div>
		@endif

		@if (Session::has('warning'))
		<div class="alert alert-warning">{{Session::get('message')}} chao</div>
		@endif
    
		<div class="form-group">
			{!!Form::label('sample_file','Selecionar archivo a importar',['class'=>'col-md-3'])!!}
			<div class="col-md-9">
				{!! Form::file('asistencia',array('class'=>'form-control')) !!}
				{!! $errors->first('asistencia','<p class="alert alert-danger">:message</p>')!!}
			</div>
		</div>
	</div>
	<div class="col-xs-2 col-sm-2 col-md-2 text-center">
		{!! Form::submit('Importar',['class'=>'btn btn-succes']) !!}
	</div>
</div>
{!! Form::close() !!}


@endsection
