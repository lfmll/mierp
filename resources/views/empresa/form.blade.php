{!! Form::open(['url' => $url, 'method' => $method, 'files'=>true ])!!}
<div class="form-group">
    {{Form::text('nombre',$empresa->nombre,['class'=>'form-control','placeholder'=>'nombre'])}}
</div>
<div class="form-group">
	{{Form::text('rubro',$empresa->rubro,['class'=>'form-control','placeholder'=>'rubro empresarial'])}}
</div>
<div class="form-group">
	{{Form::email('correo',$empresa->correo,['class'=>'form-control','placeholder'=>'correo: example@correo.com'])}}
</div>
<div class="form-group">
	{{Form::label('logo','Logo')}}
	{{Form::file('cover')}}
</div>


<!--Agencia (Detalle Maestro)-->
<div class="row">
	<div class="panel panel-primary">
		<div class="panel-body">
			<div class="col-lg-3 col-md-3 col-xs-12">
				<div class="form-group">
					{{Form::label('title','nombre')}}
					{{Form::text('nombre_agencia')}}
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-xs-12">
				<div class="form-group">
					{{Form::label('title','direccion')}}
					{{Form::text('direccion')}}
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-xs-12">	
				<div class="form-group">
					{{Form::label('title','telefono')}}
					{{Form::text('telefono')}}
				</div>
			</div>
			<div class="col-lg-3 col-sm-3 col-md-2 col-xs-12">
                <div class="form-group">
                    <button type="button" id="btn_add" class="btn btn-primary">Agregar</button>
                    
				</div>
			</div>
			</div>
		</div>
	</div>


<div class="row">
    <div class="panel panel-primary">
        <div class="panel panel-body">
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                    <thead style="background-color: #2ab27b">
                        <th>Opciones</th>
                        <th>Nombre</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        
                    </thead>
                    <tfoot>                        
                        <th></th>
                        <th></th>                
                        <th></th>
                        <th></th>
                    </tfoot>
                    <tbody>
                
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div id="guardar" class="col-log-6 col-sm-6 col-md-6 col-xs-12">
    <div class="form-group">
        <input name="_token" value="{{ csrf_token() }}" type="hidden"></imput>
        <button class="btn btn-primary" type="submit">Guardar</button>        
    </div>
</div>
{!!Form::close()!!}
@push ('scripts')
<script>
    $(document).ready(function(){
        $('#btn_add').onClick(function(){
            alert("dfdfd");
           agregar(); 
        });
    });
    var cont=0;
    $("#guardar").hide();

    function agregar(){
        nombre_agencia=$("#nombre_agencia").val();
        direccion=$("#direccion").val();
        telefono=$("#telefono").val();
        
        
        if (nombre_agencia!="" && direccion!="" && telefono!="") {
            
            
            var fila='<tr class="selectd" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="nombre_agencia[]" value="'+nombre_agencia+'"></td><td><input type="text" name="direccion[]" value="'+direccion+'"></td><td><input type="text" name="telefono[]" value="'+telefono+'"></td></tr>';
            cont++;
            limpiar();
            
            
            $('#detalles').append(fila);
        }else{
            alert("Error al ingresar al detalle de ingreso");
        }       
    }

    function limpiar(){
        $(#nombre_agencia).val("");
        $(#direccion).val("");
        $(#telefono).val("");
    }
    
    function eliminar(index){
        
        $("#fila"+ index).remove();
        evaluar();
    }
    
</script>
@endpush