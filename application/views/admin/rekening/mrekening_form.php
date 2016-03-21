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
        <h2 style="margin-top:0px">Mrekening <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Description <?php echo form_error('Description') ?></label>
            <input type="text" class="form-control" name="Description" id="Description" placeholder="Description" value="<?php echo $Description; ?>" />
        </div>
	    <div class="form-group">
            <label for="smallint">Stat  <?php echo form_error('Stat_') ?></label>
            <input type="text" class="form-control" name="Stat_" id="Stat_" placeholder="Stat " value="<?php echo $Stat_; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">DescriptionRekening <?php echo form_error('DescriptionRekening') ?></label>
            <input type="text" class="form-control" name="DescriptionRekening" id="DescriptionRekening" placeholder="DescriptionRekening" value="<?php echo $DescriptionRekening; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">DescriptionSubject <?php echo form_error('DescriptionSubject') ?></label>
            <input type="text" class="form-control" name="DescriptionSubject" id="DescriptionSubject" placeholder="DescriptionSubject" value="<?php echo $DescriptionSubject; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">DescriptionObject <?php echo form_error('DescriptionObject') ?></label>
            <input type="text" class="form-control" name="DescriptionObject" id="DescriptionObject" placeholder="DescriptionObject" value="<?php echo $DescriptionObject; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">DescriptionDetail <?php echo form_error('DescriptionDetail') ?></label>
            <input type="text" class="form-control" name="DescriptionDetail" id="DescriptionDetail" placeholder="DescriptionDetail" value="<?php echo $DescriptionDetail; ?>" />
        </div>
	    <div class="form-group">
            <label for="char">RekeningID <?php echo form_error('RekeningID') ?></label>
            <input type="text" class="form-control" name="RekeningID" id="RekeningID" placeholder="RekeningID" value="<?php echo $RekeningID; ?>" />
        </div>
	    <div class="form-group">
            <label for="char">SubjectID <?php echo form_error('SubjectID') ?></label>
            <input type="text" class="form-control" name="SubjectID" id="SubjectID" placeholder="SubjectID" value="<?php echo $SubjectID; ?>" />
        </div>
	    <div class="form-group">
            <label for="char">ObjectID <?php echo form_error('ObjectID') ?></label>
            <input type="text" class="form-control" name="ObjectID" id="ObjectID" placeholder="ObjectID" value="<?php echo $ObjectID; ?>" />
        </div>
	    <div class="form-group">
            <label for="char">DetailID <?php echo form_error('DetailID') ?></label>
            <input type="text" class="form-control" name="DetailID" id="DetailID" placeholder="DetailID" value="<?php echo $DetailID; ?>" />
        </div>
	    <div class="form-group">
            <label for="smallint">Stat2  <?php echo form_error('Stat2_') ?></label>
            <input type="text" class="form-control" name="Stat2_" id="Stat2_" placeholder="Stat2 " value="<?php echo $Stat2_; ?>" />
        </div>
	    <div class="form-group">
            <label for="smallint">Stat21  <?php echo form_error('Stat21_') ?></label>
            <input type="text" class="form-control" name="Stat21_" id="Stat21_" placeholder="Stat21 " value="<?php echo $Stat21_; ?>" />
        </div>
	    <div class="form-group">
            <label for="smallint">StatRincian <?php echo form_error('StatRincian') ?></label>
            <input type="text" class="form-control" name="StatRincian" id="StatRincian" placeholder="StatRincian" value="<?php echo $StatRincian; ?>" />
        </div>
	    <div class="form-group">
            <label for="smallint">StatHitung <?php echo form_error('StatHitung') ?></label>
            <input type="text" class="form-control" name="StatHitung" id="StatHitung" placeholder="StatHitung" value="<?php echo $StatHitung; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Periode <?php echo form_error('Periode') ?></label>
            <input type="text" class="form-control" name="Periode" id="Periode" placeholder="Periode" value="<?php echo $Periode; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">Prosen <?php echo form_error('Prosen') ?></label>
            <input type="text" class="form-control" name="Prosen" id="Prosen" placeholder="Prosen" value="<?php echo $Prosen; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">HargaDasar <?php echo form_error('HargaDasar') ?></label>
            <input type="text" class="form-control" name="HargaDasar" id="HargaDasar" placeholder="HargaDasar" value="<?php echo $HargaDasar; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Satuan <?php echo form_error('Satuan') ?></label>
            <input type="text" class="form-control" name="Satuan" id="Satuan" placeholder="Satuan" value="<?php echo $Satuan; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal"> Pajak <?php echo form_error('_pajak') ?></label>
            <input type="text" class="form-control" name="_pajak" id="_pajak" placeholder=" Pajak" value="<?php echo $_pajak; ?>" />
        </div>
	    <input type="hidden" name="AkunID" value="<?php echo $AkunID; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('mrekening') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>