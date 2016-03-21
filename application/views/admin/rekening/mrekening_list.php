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
        <h2 style="margin-top:0px">Mrekening List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('mrekening/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('mrekening/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('mrekening'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Description</th>
		<th>Stat </th>
		<th>DescriptionRekening</th>
		<th>DescriptionSubject</th>
		<th>DescriptionObject</th>
		<th>DescriptionDetail</th>
		<th>RekeningID</th>
		<th>SubjectID</th>
		<th>ObjectID</th>
		<th>DetailID</th>
		<th>Stat2 </th>
		<th>Stat21 </th>
		<th>StatRincian</th>
		<th>StatHitung</th>
		<th>Periode</th>
		<th>Prosen</th>
		<th>HargaDasar</th>
		<th>Satuan</th>
		<th> Pajak</th>
		<th>Action</th>
            </tr><?php
            foreach ($mrekening_data as $mrekening)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $mrekening->Description ?></td>
			<td><?php echo $mrekening->Stat_ ?></td>
			<td><?php echo $mrekening->DescriptionRekening ?></td>
			<td><?php echo $mrekening->DescriptionSubject ?></td>
			<td><?php echo $mrekening->DescriptionObject ?></td>
			<td><?php echo $mrekening->DescriptionDetail ?></td>
			<td><?php echo $mrekening->RekeningID ?></td>
			<td><?php echo $mrekening->SubjectID ?></td>
			<td><?php echo $mrekening->ObjectID ?></td>
			<td><?php echo $mrekening->DetailID ?></td>
			<td><?php echo $mrekening->Stat2_ ?></td>
			<td><?php echo $mrekening->Stat21_ ?></td>
			<td><?php echo $mrekening->StatRincian ?></td>
			<td><?php echo $mrekening->StatHitung ?></td>
			<td><?php echo $mrekening->Periode ?></td>
			<td><?php echo $mrekening->Prosen ?></td>
			<td><?php echo $mrekening->HargaDasar ?></td>
			<td><?php echo $mrekening->Satuan ?></td>
			<td><?php echo $mrekening->_pajak ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('mrekening/read/'.$mrekening->AkunID),'Read'); 
				echo ' | '; 
				echo anchor(site_url('mrekening/update/'.$mrekening->AkunID),'Update'); 
				echo ' | '; 
				echo anchor(site_url('mrekening/delete/'.$mrekening->AkunID),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>