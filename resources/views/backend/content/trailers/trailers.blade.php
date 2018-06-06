@extends('backend.layouts.app')

@section('htmlheader_title')
   Vod Externos
   
@endsection
@section('contentheader_title')
   Vod Trailers
@endsection

@section('content')


<div class="row">
  <div class="col-lg-12">
	<div class="panel panel-default">
	<div class="panel-heading">
		<a class="btn btn-primary" style="" href="/user" >Nuevo</a>
  <div id="toolbar">
	<div class="form-inline" role="form" id="actions_dropmenu">
		<div class="dropdown" style="">
			<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Accciones
			<span class="caret"></span></button>
			<ul class="dropdown-menu drop-actions">
				<li style=""><a href="#" data-action="inactive"><i class="glyphicon glyphicon-ban-circle ban-circle" style="color:#d9534f;"></i> Desactivar seleccionado</a></li>
				<li style=""><a href="#" data-action="active"><i class="glyphicon glyphicon-ok icon-ok" style="color:#5cb85c;" ></i> Activar seleccionado</a></li>
				<li style=""><a href="#" data-action="restore"><i class="glyphicon glyphicon-repeat icon-repeat" style="color:#30a5ff;" ></i> Restaurar seleccionado</a></li>
				<li style=""><a href="#" data-action="delete"><i class="glyphicon glyphicon-trash icon-trash" style="color:#30a5ff;"></i> Borrar seleccionado</a></li>
			</ul>		
		</div>
	 </div>
	</div>
</div>

				<div class="panel-body">
				
						<table class="table-striped" 
						data-toggle="table" 
						data-url="{{url('api/v1/content/trailers') }}"  
						data-show-refresh="true" 
						data-show-toggle="true" 
						data-show-columns="true" 
						data-search="true" 
						data-pagination="true" 
						
						data-page-number="1"  
						data-toolbar="#toolbar"
						data-detail-view="false"
						data-mobile-responsive="true"
						data-advanced-search="true"
						data-id-table="advancedTable"
						data-reorderable-columns="true"
						data-show-export="{export_perm}"
						id="table_data"
						data-click-to-select="false"
						data-cookie="true"
               			data-cookie-id-table="trailers"
               			data-resizable="true"
						 ><thead>
						    <tr> 
						    <!-- BEGIN list_show -->
						        <th data-checkbox="true" ></th>
						    <!-- END list_show -->
						        <th data-field="id"  data-sortable="true" data-align="center">ID</th>
						        
						        <th data-field="uid"  data-sortable="true" data-align="center">UID</th>
						     
						     	<th data-field="name" data-sortable="true" data-align="center">Nombre</th>
						     	
						     	<th data-field="hls" data-sortable="true" data-align="center">Uri</th>
						   
						        <!-- BEGIN edit_show -->
						        	<th  data-events="activeEvents" data-field="active" data-sortable="true" data-formatter="activeicon" data-align="center">Activo</th>
								<!-- END edit_show -->
								<!-- BEGIN action_show -->
							    	<th  data-events="actionEvents" data-formatter="actionicons" data-searchable="false" data-switchable="false" data-align="center">Acciones</th>
						     	<!-- END action_show -->
						    </tr>
						    </thead>
						</table>
					</div>
	  </div>
	 </div>
</div><!--/.row-->
 <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
		  <div class="modal-dialog">
		    <div class="modal-content">
		          <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			       	 <h4 class="modal-title">Reproductor</h4>
			      </div>
			      <div class="modal-body">
			   	     <iframe id="iframe_preview" src="" frameborder="0" allowtransparency="true" style="width: 100%; height:350px"></iframe>
			 	</div>
			</div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

@endsection
@section('custom-scripts')


	<script>
	
	var url ="/trailer";
	
	function actionicons(value, row) {
	
	html=' <a href="#" class="preview" data-action="trailer"><i class="glyphicon glyphicon-film icon-film" title="Player"></i></a> ';

	display='display:none;'
		
	html+='<a href="'+url+'/'+row.id+'" title="Editar"><i class="glyphicon glyphicon-pencil icon-pencil" style="{edit_perm}"></i></a> ';
	
	
	if(row.trash=='1'){
		display='';
	
		html+=' <a href="#" class="delete" data-action="restore" data-id="'+row.id+'" style="{delete_perm}"><i class="glyphicon glyphicon-repeat icon-repeat" title="Restaurar"></i></a> ';
	
	}else{
		html+=' <a href="#" class="delete" data-action="delete" data-id="'+row.id+'" style="{delete_perm}"><i class="glyphicon glyphicon-trash icon-trash" title="Enviar a papelera"></i></a> ';
	}
		
	 html+=' <a href="#" class="delete totalremove" data-action="totalremove" data-id="'+row.id+'" style="'+display+' {delete_perm}"><i class="glyphicon glyphicon-remove icon-repeat" title="Eliminar"></i></a> ';
	
	 return html;
	}
	</script>
	<script src="{{ asset ('js/table.control.js')}}"></script>

@endsection


