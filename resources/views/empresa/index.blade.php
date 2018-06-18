@extends("layouts.app")
@section("content")
<div class="row">
	<section class="content">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="pull-left">
						<h3>Empresa</h3>
					</div>
					<div class="table-container">
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<td>Id</td>
									<td>Nombre</td>
									<td>Rubro</td>
									<td>Correo</td>	
									<td>Acciones</td>			
								</tr>
							</thead>
							<tbody>
							@if($empresa->count())
							@foreach($empresa as $emp)
								<tr>
									<td>{{$emp->id}}</td>
									<td>{{$emp->nombre}}</td>
									<td>{{$emp->rubro}}</td>
									<td>{{$emp->correo}}</td>
									<td>
										<a href="{{url("/empresa/$emp->id")}}"class="btn btn-primary">Ver</a>
                    					<a href="{{url('/empresa/'.$emp->id.'/edit')}}"class="btn btn-info">
		                	    	   	Editar
        				            	</a>                    					
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
    						<a href="{{url('/empresa/create')}}" class="btn btn-primary btn-fab">				        		
    						</a>
						</div>			
					</div>
				</div>	
			</div>				
	</section> 		
</div>
@endsection