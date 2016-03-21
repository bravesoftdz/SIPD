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
        <h2 style="margin-top:0px">Msystem Read</h2>
        <table class="table">
	    <tr><td>Kode</td><td><?php echo $kode; ?></td></tr>
	    <tr><td>Tanggal Pasang</td><td><?php echo $tanggal_pasang; ?></td></tr>
	    <tr><td>Nama Aplikasi</td><td><?php echo $nama_aplikasi; ?></td></tr>
	    <tr><td>Alamat Aplikasi</td><td><?php echo $Alamat_aplikasi; ?></td></tr>
	    <tr><td>No Telp1</td><td><?php echo $no_telp1; ?></td></tr>
	    <tr><td>No Telp2</td><td><?php echo $no_telp2; ?></td></tr>
	    <tr><td>Kota</td><td><?php echo $kota; ?></td></tr>
	    <tr><td>Beban Administrasi</td><td><?php echo $beban_administrasi; ?></td></tr>
	    <tr><td>Biaya</td><td><?php echo $biaya; ?></td></tr>
	    <tr><td>Sumbangan</td><td><?php echo $sumbangan; ?></td></tr>
	    <tr><td>Logo</td><td><?php echo $Logo; ?></td></tr>
	    <tr><td>Logo2</td><td><?php echo $logo2; ?></td></tr>
	    <tr><td>Copyright</td><td><?php echo $copyright; ?></td></tr>
	    <tr><td>BiayaPemakaian</td><td><?php echo $biayaPemakaian; ?></td></tr>
	    <tr><td>Version</td><td><?php echo $version; ?></td></tr>
	    <tr><td>BatasWaktu</td><td><?php echo $BatasWaktu; ?></td></tr>
	    <tr><td>KdBios</td><td><?php echo $kdBios; ?></td></tr>
	    <tr><td>TglBios</td><td><?php echo $tglBios; ?></td></tr>
	    <tr><td>TimeTrial</td><td><?php echo $TimeTrial; ?></td></tr>
	    <tr><td>TimeTrialRunning</td><td><?php echo $TimeTrialRunning; ?></td></tr>
	    <tr><td>Ucapan</td><td><?php echo $ucapan; ?></td></tr>
	    <tr><td>Denda</td><td><?php echo $Denda; ?></td></tr>
	    <tr><td>StatNoPenetapan</td><td><?php echo $StatNoPenetapan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('msystem') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>