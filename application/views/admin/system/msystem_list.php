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
        <h2 style="margin-top:0px">Msystem List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('msystem/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('msystem/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('msystem'); ?>" class="btn btn-default">Reset</a>
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
		<th>Kode</th>
		<th>Tanggal Pasang</th>
		<th>Nama Aplikasi</th>
		<th>Alamat Aplikasi</th>
		<th>No Telp1</th>
		<th>No Telp2</th>
		<th>Kota</th>
		<th>Beban Administrasi</th>
		<th>Biaya</th>
		<th>Sumbangan</th>
		<th>Logo</th>
		<th>Logo2</th>
		<th>Copyright</th>
		<th>BiayaPemakaian</th>
		<th>Version</th>
		<th>BatasWaktu</th>
		<th>KdBios</th>
		<th>TglBios</th>
		<th>TimeTrial</th>
		<th>TimeTrialRunning</th>
		<th>Ucapan</th>
		<th>Denda</th>
		<th>StatNoPenetapan</th>
		<th>Action</th>
            </tr><?php
            foreach ($msystem_data as $msystem)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $msystem->kode ?></td>
			<td><?php echo $msystem->tanggal_pasang ?></td>
			<td><?php echo $msystem->nama_aplikasi ?></td>
			<td><?php echo $msystem->Alamat_aplikasi ?></td>
			<td><?php echo $msystem->no_telp1 ?></td>
			<td><?php echo $msystem->no_telp2 ?></td>
			<td><?php echo $msystem->kota ?></td>
			<td><?php echo $msystem->beban_administrasi ?></td>
			<td><?php echo $msystem->biaya ?></td>
			<td><?php echo $msystem->sumbangan ?></td>
			<td><?php echo $msystem->Logo ?></td>
			<td><?php echo $msystem->logo2 ?></td>
			<td><?php echo $msystem->copyright ?></td>
			<td><?php echo $msystem->biayaPemakaian ?></td>
			<td><?php echo $msystem->version ?></td>
			<td><?php echo $msystem->BatasWaktu ?></td>
			<td><?php echo $msystem->kdBios ?></td>
			<td><?php echo $msystem->tglBios ?></td>
			<td><?php echo $msystem->TimeTrial ?></td>
			<td><?php echo $msystem->TimeTrialRunning ?></td>
			<td><?php echo $msystem->ucapan ?></td>
			<td><?php echo $msystem->Denda ?></td>
			<td><?php echo $msystem->StatNoPenetapan ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('msystem/read/'.$msystem->),'Read'); 
				echo ' | '; 
				echo anchor(site_url('msystem/update/'.$msystem->),'Update'); 
				echo ' | '; 
				echo anchor(site_url('msystem/delete/'.$msystem->),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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