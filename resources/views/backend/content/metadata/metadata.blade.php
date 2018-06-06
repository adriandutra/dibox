@extends('backend.layouts.app')

@section('htmlheader_title')
   Metadata

@endsection
@section('contentheader_title')
   Metadata
@endsection

@section('content')



<div class="row">
  <div class="col-lg-12">
	<div class="panel panel-default">
	<div class="panel-heading">
		<a class="btn btn-primary" style="" href="/user" >Nuevo</a>
				<div id="toolbar">
		            <div class="form-inline" role="form" id="actions_dropmenu">
		               		<div class="dropdown">
							    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Accciones
							    <span class="caret"></span></button>
							    <ul class="dropdown-menu drop-actions_metadata">
							      <li style="{edit_perm}"><a href="#" data-action="inactive"><i class="glyphicon glyphicon-ban-circle ban-circle" style="color:#d9534f;"></i> Desactivar seleccionado</a></li>
							      <li style="{edit_perm}"><a href="#" data-action="active"><i class="glyphicon glyphicon-ok icon-ok" style="color:#5cb85c;" ></i> Activar seleccionado</a></li>
							      <li style="{edit_perm}"><a href="#" data-action="restore"><i class="glyphicon glyphicon-repeat icon-repeat" style="color:#30a5ff;" ></i> Restaurar seleccionado</a></li>
							      <li style="{edit_perm}" class="sync_btn"><a href="#" data-action="add"><i class="glyphicon glyphicon-cloud-upload icon-cloud-upload"   style="color:#30a5ff;"></i> Subir P2P</a></li>
							      <li style="{edit_perm}" class="sync_btn"><a href="#" data-action="remove"><i class="glyphicon glyphicon-cloud-download icon-cloud-download"  style="color:#fea821;"></i> Bajar P2P</a></li>
							      <li style="{delete_perm}" ><a href="#" data-action="delete"><i class="glyphicon glyphicon-trash icon-trash" style="color:#30a5ff;"></i> Borrar seleccionado</a></li>
							    </ul>
							  </div>

				   </div>
       			 </div>
	</div>

				<div class="panel-body">
				
						<table class="table-striped" 
						data-toggle="table" 
						data-url="{{url('api/v1/content/metadata') }}"  
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
               			data-cookie-id-table="metadata"
               			data-resizable="true"
						 ><thead>
						    <tr> 
						    <!-- BEGIN list_show -->
						        <th data-checkbox="true" ></th>
						    <!-- END list_show -->
						        <th data-field="i_data"  data-sortable="true" data-align="center">ID</th>
						        
						        <th data-field="uid"  data-sortable="true" data-align="center">UID</th>
						   
						     	<th data-field="title" data-sortable="true" data-align="center">Titulo</th>
						     	
						     	<th data-field="genre" data-sortable="true" data-align="center">Genero</th>
						     	
						     	<th data-field="average_rating" data-sortable="true" data-align="center"   data-formatter="rating">Calificación</th>
						     	
						     	<th data-field="image" data-sortable="true" data-align="center" data-formatter="image">Imagen</th>
						     	
						     	<th data-field="trailer" data-sortable="true" data-align="center" data-formatter="trailer" data-events="previewTrailer">Trailer</th>
						     	
						     	<th data-field="media" data-sortable="true" data-align="center" data-events="previewVideo"  data-formatter="vod">Player</th>
						     	
						     	<th data-field="syncthing" data-sortable="true" data-align="center" data-formatter="sync">Sync</th>
						     	
						     	<th data-field="last_update" data-sortable="true" data-align="center" data-formatter="datetime">U.Edicion</th>
						     	
						     	<th data-field="expiration_date" data-sortable="true" data-align="center" data-formatter="dateexpire">Valido</th>
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
		<div class="row">
			<div class="col-lg-12">
			
			<div class="panel panel-default">
			<div class="panel-heading">
				   
				Importar Excel
			</div>
				<div class="panel-body">
					<form enctype="multipart/form-data">
						<div class="col-md-6">
									<div class="form-group">
									 <input id="file-0a" class="file" type="file"  name="file" multiple>
									 <div class="help-block with-errors"></div>
									 </div>
						</div>
					</form>
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
   
    <link href="{{ asset ('css/bootstrap-table.css')}}" rel="stylesheet">
 	<link rel="stylesheet" href="{{ asset ('/js/stars/css/star-rating.css')}}" media="all" rel="stylesheet" type="text/css"/>
    <script src="{{ asset ('js/stars/js/star-rating.js')}}" type="text/javascript"></script>

	<script>
	var url ="/metadata";

	function rating(value,row){
		return '<input id="input-21d" value="'+value+'" type="number" class="rating" min=0 max=5 step=0.3 data-size="xs" data-uid="'+row.uid+'">';
	}
	function trailer(value, row) {
	
		if(value!=0){
			html=' <a href="#" class="preview" data-action="trailer"><i class="glyphicon glyphicon-film icon-film" title="Trailer"></i></a> ';
		}else{
			html=' <i class="glyphicon glyphicon-warning-sign" title="No hay trailers asignados a este uid" style="color:#fea821;"></i>';
		}
	
		return html;
	}

	function vod(value, row) {
	
		if(value!=0){
			html=' <a href="#" class="preview" data-action="amlst"><i class="glyphicon glyphicon-film icon-film" title="Player"></i></a> ';
		}else{
			html=' <i class="glyphicon glyphicon-remove" title="No se encuentran vod clips asignados a este uid" style="color:red;"></i>';
		}
	
		return html;
	}

	function sync(value, row) {
	
		if(row.media!=0){
			if(value==0){
				html='<a href="#" class="sync" data-uid="'+row.uid+'" data-action="add"><i class="glyphicon glyphicon-cloud-upload icon-cloud-upload" title="subir P2P"></i></a>';
			}else{
				html='<a href="#" class="sync" data-uid="'+row.uid+'" data-action="remove"><i class="glyphicon glyphicon-cloud-download  icon-cloud-download" title="bajar P2P" style="color:#fea821;"></i></a>';
			}
		}else{
			html='-';
		}
	
		return html;
	}



	function vod(value, row) {
	
		if(value!=0){
			html=' <a href="#" class="preview" data-action="amlst"><i class="glyphicon glyphicon-film icon-film" title="Player"></i></a> ';
		}else{
			html=' <i class="glyphicon glyphicon-remove" title="No se encuentran vod clips asignados a este uid" style="color:red;"></i>';
		}
	
		return html;
	}

	function image(value, row) {
	
		if(value!=0){
			html=' <i class="glyphicon glyphicon-ok" title="Imagenes" style="color:green;"></i>';
		}else{
			html=' <i class="glyphicon glyphicon-warning-sign" title="No hay imagenes asignadas a este uid" style="color:#fea821;"></i>';
		}
	
		return html;
	}

	window.previewTrailer = {
			'click .preview': function (e, value, row, index) {
			
				action = $(this).data('action');
			
	 			$("#myModal").modal('show');
	 		
	 			$('#iframe_preview').attr('src','/preview/?id='+row.trailer+'&action='+action);
	 		
		 		e.preventDefault();
			}
	};

	window.previewVideo = {
			'click .preview': function (e, value, row, index) {
			
				action = $(this).data('action');
			
	 			$("#myModal").modal('show');
	 		
	 			$('#iframe_preview').attr('src','/preview/?id='+row.id+'&action='+action);
	 		
	 			e.preventDefault();
			}
	};


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
			        showPreview:false,
			        showClose:false,
			        allowedFileExtensions : ['xls'],
			        showUpload:true,
			        uploadAsync:true,
			     	showRemove:true,
			        showUploadedThumbs :false,
			        showAjaxErrorDetails:true,
			        //resizeImage: false,
			        //maxImageWidth: 200,
			        //maxImageHeight: 200,
			        minFileCount:0,
			        //maxFileCount:1,
			 		uploadExtraData:function (previewId, index) {
			            var info = {"upload":"metadata"};
			            return info;
			        },
			        uploadUrl:'/fileimport',
			 }).on('fileuploaded', function(event, data, previewId, index) {
	         
				 if(data.response.exception){
						
					 alert(data.response.exception); 
					
				 }else{
					 $("#file-0a").fileinput('clear').fileinput('refresh').fileinput('enable');
	
					
         			$('#table_data').bootstrapTable('refresh', {"silent":"true"});
				 }
				 
          });
             
			 $('#table_data').on('post-body.bs.table',function(){
				
				 $('.rating').rating({showClear: false,showCaption:false});
				 
				 $('.sync').on('click',function(e){
					 
					 uid	= [];
					 
					 uid.push($(this).data('uid'));
						 
					 action = $(this).data('action');
					 
					 $('#table_data').bootstrapTable('showLoading', true);
					 
					$.ajax({
					    "type": "POST",
					    "url":server+"/fileimport/syncthing/"+action+"/",
					    "headers": {
						    "authorization": "Basic d3BvcnRpbGxvOmRpbmdlcjEyMzQ=",
						    "cache-control": "no-cache",
						},
					    "data":{
					    	"uid":uid
					    },
					    beforeSend: function( xhr ) {
							 $('#table_data').bootstrapTable('showLoading', true);
						},
					    success: function(data) {
					   	 
							 $('#table_data').bootstrapTable('refresh', {"silent":"true"});
							 
							 $('#table_data').on('load-success.bs.table',function(e){

				        		 $('#table_data').bootstrapTable('hideLoading', true);
				        	 });
					    }
					});
					 
					 e.preventDefault();
				 });
				
				 $('.rating').on('rating.change', function(event, value, caption) {
	  					
					 uid = $(this).data('uid');
					 
					 $.ajax({
					        type: 'POST',
					        url: '/listmetadata',
					        data:{
					              uid	  		: uid,
					        	  points		: value,
					        	  method		:'set'
					              }, 
					        dataType: 'json',
					        beforeSend: function( xhr ) {
								 $('#table_data').bootstrapTable('showLoading', true);
							},
					        success : function(data) {
					        	 $('#table_data').bootstrapTable('refresh', {"silent":"true"});
								 
					        	 $('#table_data').on('load-success.bs.table',function(e){

					        		 $('#table_data').bootstrapTable('hideLoading', true);
					        	 });
								 
					        }
					    });
				});
			 });
				
			 $('.drop-actions_metadata a').on('click',function(e){
					
				 	action 	   = $(this).data('action');
				
					selections = $('#table_data').bootstrapTable('getSelections');
				
					bootbox.confirm('Está seguro que desea realizar esta accion?', function(result) {
			  		
					if(result){
		  				
						selections = $.map( selections, function( val, i ) { return val.id;});
						
						switch(action){
							case 'add':
							case 'remove':
								$.ajax({
								    "type": "POST",
								    "url":server+"/fileimport/syncthing/"+action+"/",
								    "headers": {
									    "authorization": "Basic d3BvcnRpbGxvOmRpbmdlcjEyMzQ="
									},
									beforeSend: function( xhr ) {
										 $('#table_data').bootstrapTable('showLoading', true);
									},
								    "data":{
								    	"uid":selections
								    },
								    success: function(data) {
								   	 
										 $('#table_data').bootstrapTable('refresh', {"silent":"true"});
										 
										 $('#table_data').on('load-success.bs.table',function(e){

							        		 $('#table_data').bootstrapTable('hideLoading', true);
							        	 });
								    }
								});
							break;
							default:
								$.ajax({
								    type: "POST",
								    url: document.location.href,
								    data:{
								    	action: action,
								    	id:selections
								    },
								    success: function(data) {
								   	 
										 $('#table_data').bootstrapTable('refresh', {"silent":"true"});
										 
										 $('#table_data').on('load-success.bs.table',function(e){

							        		 $('#table_data').bootstrapTable('hideLoading', true);
							        	 });
								    }
								});
							
							break;
						}
					}});
					
					e.preventDefault();
			});
	</script>
<!-- END listmetadata -->

@endsection

