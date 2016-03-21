<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Morganisasi <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">UnitDescription <?php echo form_error('UnitDescription') ?></label>
            <input type="text" class="form-control" name="UnitDescription" id="UnitDescription" placeholder="UnitDescription" value="<?php echo $UnitDescription; ?>" />
        </div>
	    <div class="form-group">
            <label for="smallint">Level <?php echo form_error('Level') ?></label>
            <input type="text" class="form-control" name="Level" id="Level" placeholder="Level" value="<?php echo $Level; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">ID <?php echo form_error('ID') ?></label>
            <input type="text" class="form-control" name="ID" id="ID" placeholder="ID" value="<?php echo $ID; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Unit <?php echo form_error('Unit') ?></label>
            <input type="text" class="form-control" name="Unit" id="Unit" placeholder="Unit" value="<?php echo $Unit; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ket <?php echo form_error('Ket') ?></label>
            <input type="text" class="form-control" name="Ket" id="Ket" placeholder="Ket" value="<?php echo $Ket; ?>" />
        </div>
	    <input type="hidden" name="Kode" value="<?php echo $Kode; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('morganisasi') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>