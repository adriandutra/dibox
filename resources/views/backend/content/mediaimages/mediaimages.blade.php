@extends('backend.layouts.app')

@section('htmlheader_title')
   Im&aacute;genes

@endsection
@section('contentheader_title')
   Im&aacute;genes
@endsection

@section('content')

		<div class="row">
			<div class="col-lg-12">
			
			<div class="panel panel-default">
				<div class="panel-heading">
					<a class="btn btn-primary" data-toggle="collapse" data-target="#panel-upload">Cargar imagenes</a>
				</div>
				
				<div class="panel-body collapse" id="panel-upload">
					<form enctype="multipart/form-data">
							<div class="col-md-6">
								<div class="form-group">
										<label for="i_type" class="control-label">Tipo de imagen<strong class="r-asterisk">*</strong></label>
										<select id="i_type" name="i_type" class="form-control file" data-error="Por favor, seleccione una de estas opciones." >
											<option value="">Seleccione</option>
											<option value="primary">Primaria</option>
											<option value="secondary">Secundaria</option>
										</select>
										<div class="help-block with-errors"></div>
							</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
										<label for="uid" class="control-label">UID</label>
										<select id="uid" name="uid" class="form-control file" data-error="Por favor, seleccione una de estas opciones." >
											<option value="">Seleccione</option>
											
										</select>
										<div class="help-block with-errors"></div>
							</div>
							<style>
							.select2-container{
							width: 100% !important;
							}
							</style>
							</div>
							<div class="col-lg-12">
								<input id="file-0a" class="file" type="file"  name="file" multiple>
							</div>
						
					</form>
					</div>
				</div>
			</div>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
				<div class="panel-heading">
				<div id="toolbar">
		            <div class="form-inline" role="form" id="actions_dropmenu">
		               		<div class="dropdown">
							    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Accciones
							    <span class="caret"></span></button>
							    <ul class="dropdown-menu drop-actions">
							      <li style="{edit_perm}"><a href="#" data-action="inactive"><i class="glyphicon glyphicon-ban-circle ban-circle" style="color:#d9534f;"></i> Desactivar seleccionado</a></li>
							      <li style="{edit_perm}"><a href="#" data-action="active"><i class="glyphicon glyphicon-ok icon-ok" style="color:#5cb85c;" ></i> Activar seleccionado</a></li>
							        <li style="{edit_perm}"><a href="#" data-action="restore"><i class="glyphicon glyphicon-repeat icon-repeat" style="color:#30a5ff;" ></i> Restaurar seleccionado</a></li>
							      <li style="{delete_perm}"><a href="#" data-action="delete"><i class="glyphicon glyphicon-trash icon-trash" style="color:#30a5ff;"></i> Borrar seleccionado</a></li>
							    </ul>
							  </div>
				   </div>
       			 </div>
				</div>
				<div class="panel-body">
				
						<table class="table-striped" 
						data-toggle="table" 
						data-url="{{url('api/v1/content/mediaimages') }}"  
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
               			data-cookie-id-table="mediaimages"
               			data-resizable="true"
               			 ><thead>
						    <tr> 
						    <!-- BEGIN list_show -->
						        <th data-checkbox="true" ></th>
						    <!-- END list_show -->
						        <th data-field="id"  data-sortable="true" data-align="center">ID</th>
						        
						        <th data-field="uid"  data-sortable="true" data-align="center">UID</th>
						      
						       <th data-field="title"  data-sortable="true" data-align="center">Titulo</th>
						      
						       <th data-field="name"  data-sortable="true" data-align="center">Filename</th>
						       
						     	<th data-field="type" data-sortable="true" data-align="center">Tipo</th>
						     	
						     	<th data-field="file"  data-align="center"  data-searchable="false">Imagen</th>
						     	
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

@endsection
@section('custom-scripts')


	<script>
	
	var url ="/mediaimage";

	function actionicons(value, row) {
		
		html ='';
		
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
		
	<link href="{{ asset ('js/kartikfileinput/css/fileinput.css')}}" media="all" rel="stylesheet" type="text/css" />
	<script src="{{ asset ('js/kartikfileinput/js/fileinput.js')}}" type="text/javascript"></script>
	<script src="{{ asset ('js/kartikfileinput/js/fileinput_locale_es.js')}}" type="text/javascript"></script>
	<script type="text/javascript">
	
	$("#file-0a").fileinput({
				 	language: 'es',
			        showPreview:true,
			        showClose:true,
			        allowedFileExtensions : ['jpeg','jpg','png'],
			        showUpload:true,
			        uploadAsync:true,
			     	showRemove:true,
			     	showUploadedThumbs :false,
			        //resizeImage: false,
			        //maxImageWidth: 200,
			        //maxImageHeight: 200,
			        minFileCount:0,
			        //maxFileCount:1,
			 		uploadExtraData:function (previewId, index) {
			            var info = {"upload":"image",'i_type':$('#i_type').val(),'uid':$('#uid').val()};
			            return info;
			         },
			 		 uploadUrl:'/fileimport'
			 }).on('fileuploaded', function(event, data, previewId, index) {
            	
            		$('#table_data').bootstrapTable('refresh', {"silent":"true"});
            		
             }).on('filepreupload', function(event, data, previewId, index, jqXHR) {
            
				 i_type = $('#i_type').val();
				
				 if (i_type=='') {
                   
					 return {
                        message: 'Debe seleccionar un tipo de imagen',
                        data: {key1: 'Key 1', detail1: 'Detail 1'}
                    
					 };
                }
          	});
 </script>
 	<div tabindex="-1" class="modal fade" id="myModal" role="dialog">
  	<div class="modal-dialog">
	  	<div class="modal-content">
   			 <div class="modal-header">
				<button class="close" type="button" data-dismiss="modal">×</button>
				<h3 class="modal-title">Heading</h3>
			</div>
		<div class="modal-body">
		
		</div>
		<div class="modal-footer">
			<button class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
   		</div>
  	</div>
	</div>
<!-- END mediaimages -->

@endsection


