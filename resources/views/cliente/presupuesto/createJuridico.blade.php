@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Nuevo Presupuesto (Jurídico)</h3>

		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif
  </div>
</div>

          {!! Form::open(array('url'=>'cliente/presupuesto','method'=>'POST','autocomplete'=>'off')) !!}
          {{Form::token()}}

          <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
             <label>Rif del Jurídico</label>
              <input type="text" name="fk_juridico" class="form-control" placeholder="Rif..." value="{{old('fk_juridico')}}">
            </div>
           </div>

           <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
             <div class="form-group">
             <label>Tienda donde se realiza la compra</label>
             <select name="fk_tienda_compra" class="form-control">
               @foreach ($tienda as $t)
               <option value="{{$t->codigo}}"> {{$t->nombre}} ({{($t->tipo)}})</option>
               @endforeach
             </select>
            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
               <label>Producto (1)</label>
                <input type="text" name="producto1" class="form-control" placeholder="Código..." value="{{old('producto1')}}">
              </div>
             </div>

             <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
               <div class="form-group">
                <label>Cantidad (1)</label>
                 <input type="number" name="cantidad1" class="form-control" placeholder="Cantidad..." value="{{old('cantidad1')}}">
               </div>
              </div>

              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                 <label>Producto (2)</label>
                  <input type="text" name="producto2" class="form-control" placeholder="Código..." value="{{old('producto2')}}">
                </div>
               </div>

               <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                 <div class="form-group">
                  <label>Cantidad (2)</label>
                   <input type="number" name="cantidad2" class="form-control" placeholder="Cantidad..." value="{{old('cantidad2')}}">
                 </div>
                </div>

              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                 <label>Producto (3)</label>
                  <input type="text" name="producto3" class="form-control" placeholder="Código..." value="{{old('producto3')}}">
                </div>
               </div>

               <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                 <div class="form-group">
                  <label>Cantidad (3)</label>
                   <input type="number" name="cantidad3" class="form-control" placeholder="Cantidad..." value="{{old('cantidad3')}}">
                 </div>
                </div>


                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                   <label>Producto (4)</label>
                    <input type="text" name="producto4" class="form-control" placeholder="Código..." value="{{old('producto4')}}">
                  </div>
                 </div>

                 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                   <div class="form-group">
                    <label>Cantidad (4)</label>
                     <input type="number" name="cantidad4" class="form-control" placeholder="Cantidad..." value="{{old('cantidad4')}}">
                   </div>
                  </div>



                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                     <label>Producto (5)</label>
                      <input type="text" name="producto5" class="form-control" placeholder="Código..." value="{{old('producto5')}}">
                    </div>
                   </div>

                   <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                     <div class="form-group">
                      <label>Cantidad (5)</label>
                       <input type="number" name="cantidad5" class="form-control" placeholder="Cantidad..." value="{{old('cantidad5')}}">
                     </div>
                    </div>




             <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
             <div class="form-group">
							 <br>
             	<button class="btn btn-primary" type="submit">Guardar</button>
             	<button class="btn btn-danger" type="reset"><a href="../presupuesto" style="color: inherit;">Cancelar</a></button>
             	</div>
             </div>

          {!!Form::close()!!}

@stop
