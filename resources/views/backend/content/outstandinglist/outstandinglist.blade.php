@extends('backend.layouts.app')

@section('htmlheader_title')
   Outstanding

@endsection
@section('contentheader_title')
   Outstanding
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
						data-url="{{url('api/v1/content/outstandinglist') }}"  
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
               			data-cookie-id-table="outstandinglist"
               			data-resizable="true"
						 ><thead>
						    <tr> 
						    <!-- BEGIN list_show -->
						        <th data-checkbox="false" ></th>
						    <!-- END list_show -->
						        <th data-field="id"  data-sortable="true" data-align="center">ID</th>
						        
						        <th data-field="uid"  data-sortable="true" data-align="center">UID</th>

						        <th data-field="title"  data-sortable="true" data-align="center">Titulo</th>
						        						     
						     	<th data-field="directors" data-sortable="true" data-align="center">Directores</th>
						     	
						     	<th data-field="actors" data-sortable="true" data-align="center">Actores</th>


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

	var url ="/advertising";

	function file(value,row){
	
		return '<img src="data:image/jpeg;base64,'+value+'" style="max-width:100px; max-height:100px;"/>';	
	}

	function actionicons(value, row) {
		
			html ='';
			
			display='display:none;'
			
	
			if(row.trash=='1'){
				display='';
		
				html+=' <a href="#" class="delete" data-action="restore" data-id="'+row.id+'" style="{delete_perm}"><i class="glyphicon glyphicon-repeat icon-repeat" title="Restaurar"></i></a> ';
		
			}else{
				html+=' <a href="#" class="delete" data-action="delete" data-id="'+row.id+'" style="{delete_perm}"><i class="glyphicon glyphicon-trash icon-trash" title="Enviar a papelera"></i></a> ';
			}
			
		 	html+=' <a href="#" class="delete totalremove" data-action="totalremove" data-id="'+row.id+'" style="'+display+' {delete_perm}"><i class="glyphicon glyphicon-remove icon-repeat" title="Eliminar"></i></a> ';
		
		 	return html;
	}



	$('.drop-actions a').on('click',function(e){
	
		action 	   = $(this).data('action');

		selections = $('#table_data').bootstrapTable('getSelections');

		bootbox.confirm('Est� seguro que desea realizar esta accion?', function(result) {
		
		if(result){
			
			selections = $.map( selections, function( val, i ) {
				
				return val.id;
			
			});

			 $.ajax({
			    type: "POST",
		    	url: document.location.href,
		    	data:{
		    		action: action,
		    		id:selections
		    	},
		    	success: function(data) {
		    		$('#table_data').bootstrapTable('refresh'); 
		    	}
			});
	
			}});
	
		e.preventDefault();
	});
							    


	function datelabel(value,row){

		if(typeof(value)!="undefined"){
	
		if(value !='0000-00-00 00:00:00'){
	
			var dateParts = value.split("-");
		
			var date = new Date(dateParts[0], dateParts[1] - 1, dateParts[2].substr(0,2));
		
		
			return '<span class="label label-warning">'+date.getDate()+'/'+(date.getMonth()+1)+'/'+date.getFullYear()+'</span>';

			}
	
		}
	}


	function activeicon(value, row) {

		if(row.active==1){
			return '<span class="actiona label label-success"  data-action="inactive" data-id="'+row.uid+'"  style="cursor:pointer;"><i class="glyphicon glyphicon-ok"></i></span>';
		}else{
				return '<span class="actiona label label-danger"  data-action="active" data-id="'+row.uid+'" style="cursor:pointer;"><i class="glyphicon glyphicon-ban-circle"></i></span>';
		}	
	}

	window.activeEvents = {
	'click .actiona': function (e, value, row, index) {
      
		action = $(this).data('action');

	  	$.ajax({
	    	type: "POST",
	    	url: document.location.href,
	    	data: $(this).data(),
	    	success: function(data) {

	    	},
	 	});
	 
	  	if(action=='inactive'){
	    
	   	    $(this).removeClass('label-success')
	 
	    	$(this).toggleClass('label-danger');
	    
	    	$(this).data('action','active');
	    
	    	$(this).html('<i class="glyphicon glyphicon-ban-circle"></i>');
	  
	  	}else{
	    		$(this).removeClass('label-danger')
	 
	    		$(this).toggleClass('label-success');
	    
	    		$(this).data('action','inactive');
	    
	    		$(this).html('<i class="glyphicon glyphicon-ok"></i>');
	  		}
		},

	};

	window.actionEvents = {
		'click .preview': function (e, value, row, index) {
		
			action = $(this).data('action');
		
 			$("#myModal").modal('show');
 		
 			$('#iframe_preview').attr('src','/preview/?id='+row.id+'&action='+action);
 		
 			e.preventDefault();
	
		},
		'click .delete': function (e, value, row, index) {
	 	
			action = $(this).data('action');
		
			switch(action){
				case 'delete':
			  	
  			  	self = this;
  		
  				
	  			$.ajax({
					    type: "POST",
					    url: document.location.href,
					    data: $(self).data(),
					    success: function(data) {

					    },
				});
  			   
  			   
  			 	$(self).children().removeClass('glyphicon glyphicon-trash icon-trash');
	  			
	 	 		$(self).children().toggleClass('glyphicon glyphicon-repeat icon-repeat');
	 	
	  			$(self).data('action','restore');
	  		 
	  			$(self).children().attr('title','Restaurar');
	  			
	  			$(self).parent().children('.totalremove').show();
  			break;
	  		case 'totalremove':
		  	
		  		self = this;
		  		
		  		bootbox.confirm('Est� seguro que desea borrar permanentemente?', function(result) {
		  		
		  			if(result){
		  				
		  				data = $(self).data();
		  				
		  				data.action ='delete';
		  				
		  				$.ajax({
							    type: "POST",
							    url: document.location.href,
							    data: data,
							    success: function(data) {
							    	$('#table_data').bootstrapTable('refresh');
							    },
						});
		  			  
		  			 	$('[data-id='+row.id+']').parents('tr').remove();
		  			}
		  		}); 
		  		
		  	break;
		  	case 'restore':
		  		
				self = this;
				
				$.ajax({
				    type: "POST",
				    url: document.location.href,
				    data: $(self).data(),
				    success: function(data) {

				    },
				});
	  			
	  			$(self).children().removeClass('glyphicon glyphicon-repeat icon-repeat');
	 	
	  		 	$(self).children().toggleClass('glyphicon glyphicon-trash icon-trash');
	  		
	  		 	$(self).data('action','delete')
	  		 
	  		 	$(self).children().attr('title','Enviar a papelera');
	  		 	
	  		 	$(self).parent().children('.totalremove').hide();
	  		 	
	  		break;
		  }
		
	  	 e.preventDefault();
	}
}	

	</script>
	<script src="{{ asset ('js/table.control.js')}}"></script>

@endsection


