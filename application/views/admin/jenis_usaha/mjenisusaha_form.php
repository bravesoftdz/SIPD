<div class="content-wrapper">
	<div class="container">
	    <div class="row">
	    	<div class="table-responsive">
	    	</br>
		    	<div class="col-md-8">
					<div class="panel panel-info">				
			      		<div class="panel-heading"><?php echo $button ?> Jenis Usaha</div>	      
			      		<div class="panel-body">					        
					        <form action="<?php echo $action; ?>" method="post">
					        <div class="form-group">
					            <label for="varchar">ID <?php echo form_error('JUsahaID') ?></label>
					            <input type="text" class="form-control" name="ID" id="ID" placeholder="ID Usaha" value="<?php echo $JUsahaID; ?>" />
					        </div>
						    <div class="form-group">
					            <label for="varchar">Description <?php echo form_error('Description') ?></label>
					            <input type="text" class="form-control" name="Description" id="Description" placeholder="Description" value="<?php echo $Description; ?>" />
					        </div>
						    <input type="hidden" name="JUsahaID" value="<?php echo $JUsahaID; ?>" /> 
						    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
						    <a href="<?php echo site_url('mjenisusaha') ?>" class="btn btn-default">Cancel</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>				