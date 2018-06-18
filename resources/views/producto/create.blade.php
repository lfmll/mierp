@extends("layouts.app")
@section("content")
	<div class="row">
	<section class="content">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Nuevo Producto</h3>
				</div>
				<div class="panel-body">
					<div class="table-container">
						@include('producto.form',['product'=>$product,'url'=>'/producto','method'=>'POST'])			
					</div>
				</div>	
			</div>
		</div>
	</section>
    </div>    
@endsection


