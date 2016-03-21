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
        <h2 style="margin-top:0px">Morganisasi Read</h2>
        <table class="table">
	    <tr><td>UnitDescription</td><td><?php echo $UnitDescription; ?></td></tr>
	    <tr><td>Level</td><td><?php echo $Level; ?></td></tr>
	    <tr><td>ID</td><td><?php echo $ID; ?></td></tr>
	    <tr><td>Unit</td><td><?php echo $Unit; ?></td></tr>
	    <tr><td>Ket</td><td><?php echo $Ket; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('morganisasi') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>