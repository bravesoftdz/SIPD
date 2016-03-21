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
        <h2 style="margin-top:0px">Mreklame <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="char">Stat  <?php echo form_error('Stat_') ?></label>
            <input type="text" class="form-control" name="Stat_" id="Stat_" placeholder="Stat " value="<?php echo $Stat_; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Description <?php echo form_error('Description') ?></label>
            <input type="text" class="form-control" name="Description" id="Description" placeholder="Description" value="<?php echo $Description; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">HargaDasar <?php echo form_error('HargaDasar') ?></label>
            <input type="text" class="form-control" name="HargaDasar" id="HargaDasar" placeholder="HargaDasar" value="<?php echo $HargaDasar; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Satuan <?php echo form_error('Satuan') ?></label>
            <input type="text" class="form-control" name="Satuan" id="Satuan" placeholder="Satuan" value="<?php echo $Satuan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Keterangan <?php echo form_error('Keterangan') ?></label>
            <input type="text" class="form-control" name="Keterangan" id="Keterangan" placeholder="Keterangan" value="<?php echo $Keterangan; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">Prosentase <?php echo form_error('Prosentase') ?></label>
            <input type="text" class="form-control" name="Prosentase" id="Prosentase" placeholder="Prosentase" value="<?php echo $Prosentase; ?>" />
        </div>
	    <input type="hidden" name="No" value="<?php echo $No; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('mreklame') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>