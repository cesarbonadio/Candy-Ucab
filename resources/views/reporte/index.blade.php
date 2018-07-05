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

				<tr>
          <td> <h4> Ingresos vs Egresos (tienda) &nbsp; &nbsp; </h4> </td>
					<td>
						  <a href="reporte/tienda_ingresos_egresos"><button class="btn btn-info">Ver</button></a></h4>
					</td>
				</tr>


				<tr>
					<td> <h4> Producto más vendido por tienda &nbsp; &nbsp; </h4> </td>
					<td>
							<a href="reporte/top_producto_tienda"><button class="btn btn-info">Ver</button></a></h4>
					</td>
				</tr>


				<tr>
					<td> <h4> Estatus que genera mas retraso en los pedidos &nbsp; &nbsp; </h4> </td>
					<td>
							<a href="reporte/top_retraso_estatus"><button class="btn btn-info">Ver</button></a></h4>
					</td>
				</tr>



				<tr>
          			<td> <h4> Metodo de pago mas usado en tiendas fisicas &nbsp; &nbsp; </h4> </td>
					<td>
						  <a href="reporte/metodo"><button class="btn btn-info">Ver</button></a></h4>
					</td>
				</tr>
				<tr>
          			<td> <h4> Producto mas vendido &nbsp; &nbsp; </h4> </td>
					<td>
						  <a href="reporte/productoGeneral"><button class="btn btn-info">Ver</button></a></h4>
					</td>
				</tr>
				<tr>
          			<td> <h4> Producto mas vendido por tienda &nbsp; &nbsp; </h4> </td>
					<td>
						  <a href="reporte/productoPorTienda"><button class="btn btn-info">Ver</button></a></h4>
					</td>
				</tr>
				<tr>
          			<td> <h4> Top 5 mejores clientes segun monto de compras por tiempo &nbsp; &nbsp; </h4> </td>
					<td>
						  <a href="reporte/top5Clientes"><button class="btn btn-info">Ver</button></a></h4>
					</td>
				</tr>


							<td> <h4> Puntos otorgados y canjeados por tienda y lugar &nbsp; &nbsp; </h4> </td>
				<td>
						<a href="reporte/balance_puntos_tienda_lugar"><button class="btn btn-info">Ver</button></a></h4>
				</td>
			</tr>


			<td> <h4> Las tiendas que más recibieron pagos con puntos &nbsp; &nbsp; </h4> </td>
			<td>
			<a href="reporte/tienda_pago_puntos"><button class="btn btn-info">Ver</button></a></h4>
			</td>
			</tr>

			<td> <h4> Ranking productos por tienda y lugar &nbsp; &nbsp; </h4> </td>
 		 <td>
 		 <a href="reporte/ranking_producto_tienda_lugar"><button class="btn btn-info">Ver</button></a></h4>
 		 </td>
 		 </tr>


			<td> <h4>Lista de los 10 clientes con mayor cantidad de Compras &nbsp; &nbsp; </h4> </td>
			<td>
				  <a href="reporte/top10compra"><button class="btn btn-info">Ver</button></a></h4>
			</td>
		</tr>

		</div>
	</div>
</div>
@endsection
