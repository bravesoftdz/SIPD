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
        <h2 style="margin-top:0px">Muser <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Pass <?php echo form_error('pass') ?></label>
            <input type="text" class="form-control" name="pass" id="pass" placeholder="Pass" value="<?php echo $pass; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nm User <?php echo form_error('Nm_user') ?></label>
            <input type="text" class="form-control" name="Nm_user" id="Nm_user" placeholder="Nm User" value="<?php echo $Nm_user; ?>" />
        </div>
	    <div class="form-group">
            <label for="char">Lnoaktif <?php echo form_error('lnoaktif') ?></label>
            <input type="text" class="form-control" name="lnoaktif" id="lnoaktif" placeholder="Lnoaktif" value="<?php echo $lnoaktif; ?>" />
        </div>
	    <input type="hidden" name="userID" value="<?php echo $userID; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('muser') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>