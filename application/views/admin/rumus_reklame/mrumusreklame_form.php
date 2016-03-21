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
        <h2 style="margin-top:0px">Mrumusreklame <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="double">Thn  <?php echo form_error('Thn_') ?></label>
            <input type="text" class="form-control" name="Thn_" id="Thn_" placeholder="Thn " value="<?php echo $Thn_; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">Bln  <?php echo form_error('Bln_') ?></label>
            <input type="text" class="form-control" name="Bln_" id="Bln_" placeholder="Bln " value="<?php echo $Bln_; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">Minggu  <?php echo form_error('Minggu_') ?></label>
            <input type="text" class="form-control" name="Minggu_" id="Minggu_" placeholder="Minggu " value="<?php echo $Minggu_; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">Hari  <?php echo form_error('Hari_') ?></label>
            <input type="text" class="form-control" name="Hari_" id="Hari_" placeholder="Hari " value="<?php echo $Hari_; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">JlnNegara <?php echo form_error('JlnNegara') ?></label>
            <input type="text" class="form-control" name="JlnNegara" id="JlnNegara" placeholder="JlnNegara" value="<?php echo $JlnNegara; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">JlnKabupaten <?php echo form_error('JlnKabupaten') ?></label>
            <input type="text" class="form-control" name="JlnKabupaten" id="JlnKabupaten" placeholder="JlnKabupaten" value="<?php echo $JlnKabupaten; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">JlnLingkungan <?php echo form_error('JlnLingkungan') ?></label>
            <input type="text" class="form-control" name="JlnLingkungan" id="JlnLingkungan" placeholder="JlnLingkungan" value="<?php echo $JlnLingkungan; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">SdtPandang>2 <?php echo form_error('SdtPandang>2') ?></label>
            <input type="text" class="form-control" name="SdtPandang>2" id="SdtPandang>2" placeholder="SdtPandang>2" value="<?php echo $SdtPandang>2; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">SdtPandang2 <?php echo form_error('SdtPandang2') ?></label>
            <input type="text" class="form-control" name="SdtPandang2" id="SdtPandang2" placeholder="SdtPandang2" value="<?php echo $SdtPandang2; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">SdtPandang1 <?php echo form_error('SdtPandang1') ?></label>
            <input type="text" class="form-control" name="SdtPandang1" id="SdtPandang1" placeholder="SdtPandang1" value="<?php echo $SdtPandang1; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">LokasiKhusus <?php echo form_error('LokasiKhusus') ?></label>
            <input type="text" class="form-control" name="LokasiKhusus" id="LokasiKhusus" placeholder="LokasiKhusus" value="<?php echo $LokasiKhusus; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">LokasiBiasa <?php echo form_error('LokasiBiasa') ?></label>
            <input type="text" class="form-control" name="LokasiBiasa" id="LokasiBiasa" placeholder="LokasiBiasa" value="<?php echo $LokasiBiasa; ?>" />
        </div>
	    <input type="hidden" name="ThnPeriode" value="<?php echo $ThnPeriode; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('mrumusreklame') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>