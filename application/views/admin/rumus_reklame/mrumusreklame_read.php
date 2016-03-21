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
        <h2 style="margin-top:0px">Mrumusreklame Read</h2>
        <table class="table">
	    <tr><td>Thn </td><td><?php echo $Thn_; ?></td></tr>
	    <tr><td>Bln </td><td><?php echo $Bln_; ?></td></tr>
	    <tr><td>Minggu </td><td><?php echo $Minggu_; ?></td></tr>
	    <tr><td>Hari </td><td><?php echo $Hari_; ?></td></tr>
	    <tr><td>JlnNegara</td><td><?php echo $JlnNegara; ?></td></tr>
	    <tr><td>JlnKabupaten</td><td><?php echo $JlnKabupaten; ?></td></tr>
	    <tr><td>JlnLingkungan</td><td><?php echo $JlnLingkungan; ?></td></tr>
	    <tr><td>SdtPandang>2</td><td><?php echo $SdtPandang>2; ?></td></tr>
	    <tr><td>SdtPandang2</td><td><?php echo $SdtPandang2; ?></td></tr>
	    <tr><td>SdtPandang1</td><td><?php echo $SdtPandang1; ?></td></tr>
	    <tr><td>LokasiKhusus</td><td><?php echo $LokasiKhusus; ?></td></tr>
	    <tr><td>LokasiBiasa</td><td><?php echo $LokasiBiasa; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('mrumusreklame') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>