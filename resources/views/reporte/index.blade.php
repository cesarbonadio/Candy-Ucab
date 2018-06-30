@extends ('layouts.admin')
@section ('contenido')

<div class ="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Reportes</h3>
	</div>
</div>


<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover">


        <tr>
					<td> <h4>Lista de los 10 clientes con mayor cantidad de puntos &nbsp; &nbsp; </h4> </td>
					<td>
						  <a href="reporte/top10punto"><button class="btn btn-info">Ver</button></a></h4>
					</td>
				</tr>


        <tr>
					<td> <h4>  Asistencia indicando hora de entrada , hora salida, cédula del empleado,
                     nombres , apellidos y cargo &nbsp; &nbsp; </h4> </td>
					<td>
						  <a href="reporte/asistencia"><button class="btn btn-info">Ver</button></a></h4>
					</td>
				</tr>


        <tr>
          <td> <h4>  Emplados con horas trabajadas, promedio de hora de entrada, promedio de hora de salida,
                     ausencia laboral y retardo &nbsp; &nbsp; </h4> </td>
					<td>
						  <a href="reporte/empleado"><button class="btn btn-info">Ver</button></a></h4>
					</td>
				</tr>



				<tr>
          <td> <h4>  Ingrediente más usado en los productos &nbsp; &nbsp; </h4> </td>
					<td>
						  <a href="reporte/ingrediente"><button class="btn btn-info">Ver</button></a></h4>
					</td>
				</tr>



				<tr>
          <td> <h4> Marca de tarjeta de crédito más común &nbsp; &nbsp; </h4> </td>
					<td>
						  <a href="reporte/tarjeta"><button class="btn btn-info">Ver</button></a></h4>
					</td>
				</tr>


				<tr>
          <td> <h4> Facturas de compras &nbsp; &nbsp; </h4> </td>
					<td>
						  <a href="reporte/factura"><button class="btn btn-info">Ver</button></a></h4>
					</td>
				</tr>


		</div>
	</div>
</div>
@endsection
