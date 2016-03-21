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
        <h2 style="margin-top:0px">Muser Read</h2>
        <table class="table">
	    <tr><td>Pass</td><td><?php echo $pass; ?></td></tr>
	    <tr><td>Nm User</td><td><?php echo $Nm_user; ?></td></tr>
	    <tr><td>Lnoaktif</td><td><?php echo $lnoaktif; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('muser') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>