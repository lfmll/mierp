{!! Form::open(['url' => $url, 'method' => $method, 'files'=>true ])!!}
<div class="form-group">
    {{Form::text('nombre',$product->nombre,['class'=>'form-control','placeholder'=>'nombre'])}}
</div>
<div class="form-group">
    {{Form::textarea('descripcion',$product->descripcion,['class'=>'form-control','placeholder'=>'descripcion del producto'])}}
</div>
<div class="form-group">
    {{Form::file('cover') }}
</div>
<div class="form-group">
	{{Form::text('codigo',$product->codigo,['class'=>'form-control','placeholder'=>'codigo de producto'])}}
</div>
<div class="form-group text-right">
    <a href="{{url('/producto')}}"> Regresar al listado producto
    </a>
    <input type="submit" value="Enviar" class="btn btn-sucess">
</div>
{!!Form::close()!!}