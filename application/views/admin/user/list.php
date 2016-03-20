<script type="text/javascript">
	function submitclick(form,validation) {			
		if (validation!="") {						
			sorts(validation)
		}		
	}
	
	function sorts(id) {		
		document.getElementById("sorts").value = id;
		return true;
	}
</script>
<div class="content-wrapper">
	<div class="container">
	    <div class="row">
	    	<div class="table-responsive">
	    	</br>
		    	<div class="col-md-8">
					<div class="panel panel-info">				
			      		<div class="panel-heading">Browse Users</div>	      
			      		<div class="panel-body">
			      			<?php echo $output; ?>				        
						</div>
					</div>				
				</div>
			</div>
		</div>
	</div>		
</div>