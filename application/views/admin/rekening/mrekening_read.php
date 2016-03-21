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
        <h2 style="margin-top:0px">Mrekening Read</h2>
        <table class="table">
	    <tr><td>Description</td><td><?php echo $Description; ?></td></tr>
	    <tr><td>Stat </td><td><?php echo $Stat_; ?></td></tr>
	    <tr><td>DescriptionRekening</td><td><?php echo $DescriptionRekening; ?></td></tr>
	    <tr><td>DescriptionSubject</td><td><?php echo $DescriptionSubject; ?></td></tr>
	    <tr><td>DescriptionObject</td><td><?php echo $DescriptionObject; ?></td></tr>
	    <tr><td>DescriptionDetail</td><td><?php echo $DescriptionDetail; ?></td></tr>
	    <tr><td>RekeningID</td><td><?php echo $RekeningID; ?></td></tr>
	    <tr><td>SubjectID</td><td><?php echo $SubjectID; ?></td></tr>
	    <tr><td>ObjectID</td><td><?php echo $ObjectID; ?></td></tr>
	    <tr><td>DetailID</td><td><?php echo $DetailID; ?></td></tr>
	    <tr><td>Stat2 </td><td><?php echo $Stat2_; ?></td></tr>
	    <tr><td>Stat21 </td><td><?php echo $Stat21_; ?></td></tr>
	    <tr><td>StatRincian</td><td><?php echo $StatRincian; ?></td></tr>
	    <tr><td>StatHitung</td><td><?php echo $StatHitung; ?></td></tr>
	    <tr><td>Periode</td><td><?php echo $Periode; ?></td></tr>
	    <tr><td>Prosen</td><td><?php echo $Prosen; ?></td></tr>
	    <tr><td>HargaDasar</td><td><?php echo $HargaDasar; ?></td></tr>
	    <tr><td>Satuan</td><td><?php echo $Satuan; ?></td></tr>
	    <tr><td> Pajak</td><td><?php echo $_pajak; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('mrekening') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>