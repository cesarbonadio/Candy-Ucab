@extends ('layouts.admin')
@section ('contenido')

<form>
          				<input type="date" name="fechaini">
          				<input type="date" name="fechafin">
          				  <input class="btn btn-info" type="submit" formaction="/reporte/top5Clientes?fechaini=fechaini?fechafin=fechafin'" value="Submit to another page">

					
          			</form>

@endsection
