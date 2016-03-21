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
        <h2 style="margin-top:0px">Mreklame Read</h2>
        <table class="table">
	    <tr><td>Stat </td><td><?php echo $Stat_; ?></td></tr>
	    <tr><td>Description</td><td><?php echo $Description; ?></td></tr>
	    <tr><td>HargaDasar</td><td><?php echo $HargaDasar; ?></td></tr>
	    <tr><td>Satuan</td><td><?php echo $Satuan; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $Keterangan; ?></td></tr>
	    <tr><td>Prosentase</td><td><?php echo $Prosentase; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('mreklame') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>