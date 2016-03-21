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
        <h2 style="margin-top:0px">Msystem <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="char">Kode <?php echo form_error('kode') ?></label>
            <input type="text" class="form-control" name="kode" id="kode" placeholder="Kode" value="<?php echo $kode; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tanggal Pasang <?php echo form_error('tanggal_pasang') ?></label>
            <input type="text" class="form-control" name="tanggal_pasang" id="tanggal_pasang" placeholder="Tanggal Pasang" value="<?php echo $tanggal_pasang; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Aplikasi <?php echo form_error('nama_aplikasi') ?></label>
            <input type="text" class="form-control" name="nama_aplikasi" id="nama_aplikasi" placeholder="Nama Aplikasi" value="<?php echo $nama_aplikasi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat Aplikasi <?php echo form_error('Alamat_aplikasi') ?></label>
            <input type="text" class="form-control" name="Alamat_aplikasi" id="Alamat_aplikasi" placeholder="Alamat Aplikasi" value="<?php echo $Alamat_aplikasi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">No Telp1 <?php echo form_error('no_telp1') ?></label>
            <input type="text" class="form-control" name="no_telp1" id="no_telp1" placeholder="No Telp1" value="<?php echo $no_telp1; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">No Telp2 <?php echo form_error('no_telp2') ?></label>
            <input type="text" class="form-control" name="no_telp2" id="no_telp2" placeholder="No Telp2" value="<?php echo $no_telp2; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kota <?php echo form_error('kota') ?></label>
            <input type="text" class="form-control" name="kota" id="kota" placeholder="Kota" value="<?php echo $kota; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Beban Administrasi <?php echo form_error('beban_administrasi') ?></label>
            <input type="text" class="form-control" name="beban_administrasi" id="beban_administrasi" placeholder="Beban Administrasi" value="<?php echo $beban_administrasi; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Biaya <?php echo form_error('biaya') ?></label>
            <input type="text" class="form-control" name="biaya" id="biaya" placeholder="Biaya" value="<?php echo $biaya; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Sumbangan <?php echo form_error('sumbangan') ?></label>
            <input type="text" class="form-control" name="sumbangan" id="sumbangan" placeholder="Sumbangan" value="<?php echo $sumbangan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Logo <?php echo form_error('Logo') ?></label>
            <input type="text" class="form-control" name="Logo" id="Logo" placeholder="Logo" value="<?php echo $Logo; ?>" />
        </div>
	    <div class="form-group">
            <label for="blob">Logo2 <?php echo form_error('logo2') ?></label>
            <input type="text" class="form-control" name="logo2" id="logo2" placeholder="Logo2" value="<?php echo $logo2; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Copyright <?php echo form_error('copyright') ?></label>
            <input type="text" class="form-control" name="copyright" id="copyright" placeholder="Copyright" value="<?php echo $copyright; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">BiayaPemakaian <?php echo form_error('biayaPemakaian') ?></label>
            <input type="text" class="form-control" name="biayaPemakaian" id="biayaPemakaian" placeholder="BiayaPemakaian" value="<?php echo $biayaPemakaian; ?>" />
        </div>
	    <div class="form-group">
            <label for="char">Version <?php echo form_error('version') ?></label>
            <input type="text" class="form-control" name="version" id="version" placeholder="Version" value="<?php echo $version; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">BatasWaktu <?php echo form_error('BatasWaktu') ?></label>
            <input type="text" class="form-control" name="BatasWaktu" id="BatasWaktu" placeholder="BatasWaktu" value="<?php echo $BatasWaktu; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">KdBios <?php echo form_error('kdBios') ?></label>
            <input type="text" class="form-control" name="kdBios" id="kdBios" placeholder="KdBios" value="<?php echo $kdBios; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">TglBios <?php echo form_error('tglBios') ?></label>
            <input type="text" class="form-control" name="tglBios" id="tglBios" placeholder="TglBios" value="<?php echo $tglBios; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">TimeTrial <?php echo form_error('TimeTrial') ?></label>
            <input type="text" class="form-control" name="TimeTrial" id="TimeTrial" placeholder="TimeTrial" value="<?php echo $TimeTrial; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">TimeTrialRunning <?php echo form_error('TimeTrialRunning') ?></label>
            <input type="text" class="form-control" name="TimeTrialRunning" id="TimeTrialRunning" placeholder="TimeTrialRunning" value="<?php echo $TimeTrialRunning; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ucapan <?php echo form_error('ucapan') ?></label>
            <input type="text" class="form-control" name="ucapan" id="ucapan" placeholder="Ucapan" value="<?php echo $ucapan; ?>" />
        </div>
	    <div class="form-group">
            <label for="smallint">Denda <?php echo form_error('Denda') ?></label>
            <input type="text" class="form-control" name="Denda" id="Denda" placeholder="Denda" value="<?php echo $Denda; ?>" />
        </div>
	    <div class="form-group">
            <label for="smallint">StatNoPenetapan <?php echo form_error('StatNoPenetapan') ?></label>
            <input type="text" class="form-control" name="StatNoPenetapan" id="StatNoPenetapan" placeholder="StatNoPenetapan" value="<?php echo $StatNoPenetapan; ?>" />
        </div>
	    <input type="hidden" name="" value="<?php echo $; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('msystem') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>