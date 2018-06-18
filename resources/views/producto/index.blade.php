@extends("layouts.app")
@section("content")
<div class="row">
	<section class="content">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="pull-left">
						<h3>Productos</h3>
					</div>
					<div class="table-container">
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<td>Id</td>
									<td>Nombre</td>
									<td>Descripcion</td>
									<td>Codigo</td>	
									<td>Acciones</td>			
								</tr>
							</thead>
							<tbody>
							@if($producto->count())
							@foreach($producto as $prod)
								<tr>
									<td>{{$prod->id}}</td>
									<td>{{$prod->nombre}}</td>
									<td>{{$prod->descripcion}}</td>
									<td>{{$prod->codigo}}</td>
									<td>
										<a href="{{url("/producto/$prod->id")}}"class="btn btn-primary">Ver</a>
                    					<a href="{{url('/producto/'.$prod->id.'/edit')}}"class="btn btn-info">
		                	    	   	Editar
        				            	</a>
                    					@include('producto.delete',['product'=>$prod])
                    					<a href="{{url('/producto/'.$prod->id.'/delete')}}" class="btn btn-danger">Eliminar</a>
									</td>                                    			
				                </tr>
                			@endforeach
                			@else
                				<tr>
                					<td colspan="10">No hay Registros!!!</td>
                				</tr>
                			@endif
							</tbody>
						</table>
						<div class="floating">
    						<a href="{{url('/producto/create')}}" class="btn btn-primary btn-fab">
				        		<i class="material-icons">add</i>
    						</a>
						</div>			
					</div>
				</div>	
			</div>				
	</section> 		
</div>
@endsection