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
        <h2 style="margin-top:0px">Muserorganisasi <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <input type="hidden" name="UserID" value="<?php echo $UserID; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('muserorganisasi') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>