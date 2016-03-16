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
				        
					        <?php 
					        $attr = array("class" => "form-horizontal", "role" => "form", "id" => "form1", "name" => "form1");
					        echo form_open("user/search", $attr);?>
					            <div class="form-group">
					                <div class="col-md-6">
					                    <input class="form-control" id="user_name" name="user_name" placeholder="Search for User Name..." type="text" value="<?php echo set_value('user_name'); ?>" />
					                </div>
					                <div class="col-md-6">
					                    <input id="btn_search" name="btn_search" type="submit" class="btn btn-danger" value="Search" />
					                    <a href="<?php echo base_url('user/'); ?>" class="btn btn-primary">Show All</a>
					                </div>
					            </div>
					        
					        <?php echo form_close(); ?>

					    	<?php
					        $fsort = array("class" => "form-horizontal", "role" => "form", "id" => "list", "name" => "list");
					        echo form_open("user/sort", $fsort);
					        ?>
					        
					        <table class="table table-condensed table-hover table-bordered">
				                <tr>
									<th><button type="submit" class="btn btn-default btn-block" onclick="javascript:submitclick('list','user_id')">UserID</button></th>
									<th><button type="submit" class="btn btn-default btn-block" onclick="javascript:submitclick('list','username')">Description</button></th>
									<th>
										<a href="<?php echo base_url(); ?>user/tambah" class="btn btn-default btn-block cbuser"><i class="fa fa-user"></i>Tambah Data</i></a>
          							</th>
								</tr>
				                <tbody>
				                <?php foreach($userlist as $lihat) {?>
								<tr class="info">
									<td><?php echo $lihat->user_id; ?></td>
									<td><?php echo $lihat->username; ?></td>
									<td>
										<div class="tools">
				                        	
				                        	<a href="<?php echo base_url().'user/hapus/'.$lihat->user_id; ?>"><i class="fa fa-trash-o" title="Hapus"></i></a> | 
				                        	<a href="<?php echo base_url().'user/edit/'.$lihat->user_id; ?>"><i class="fa fa-edit" title="Edit"></i></a> |
				                        	<a href="<?php echo base_url().'user/edit/'.$lihat->user_id; ?>"><i class="fa fa-user" title="Hak Akses"></i></a> 
				                      	</div>
				                      
				                      	
				                    </td>
								</tr>					
								<?php } ?>
				                </tbody>
				            </table>
					    <div class="row">
					        <div class="col-md-8 ">
					            <?php $paging; ?>
					        </div>
					    </div>					
					    <input type="hidden" id="sorts" name="sorts">    
					    <?php echo form_close(); ?>
					     
					</div>					
					</div>				
				</div>
			</div>
		</div>
	</div>		
</div>