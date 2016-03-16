<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url('assets/dist/img/user2-160x160.jpg');?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Alexander Pierce</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form 
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>-->
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
              <a href="<?php echo base_url(); ?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
              </a>              
            </li>
            
            <!-- Transaction Menu -->
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Transaction</span>         
                <i class="fa fa-angle-left pull-right"></i>       
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-caret-right"></i> Pendaftaran</a></li>
                <li><a href="#"><i class="fa fa-caret-right"></i> Pendataan</a></li>
                <li><a href="#"><i class="fa fa-caret-right"></i> Penetapan</a></li>
                <li><a href="#"><i class="fa fa-caret-right"></i> Penerbitan</a></li>
                <li><a href="#"><i class="fa fa-caret-right"></i> Pelunasan</a></li>
              </ul>
            </li>
            
            <!-- Report Menu -->
            <li class="treeview">
              <a href="#">
                <i class="fa fa-print"></i> <span>Report</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              	<li>
              		<a href="#"> Transaction <i class="fa fa-angle-left pull-right"></i></a>
              		<ul class="treeview-menu">
              			<li><a href="#"><i class="fa fa-caret-right"></i> Pendaftaran </a></li>
              			<li><a href="#"><i class="fa fa-caret-right"></i> Pendataan </a></li>
              			<li><a href="#"><i class="fa fa-caret-right"></i> Penetapan </a></li>
              			<li><a href="#"><i class="fa fa-caret-right"></i> Penerbitan </a></li>
              			<li><a href="#"><i class="fa fa-caret-right"></i> Pelunasan </a></li>
              		</ul>
              	</li>
              	<li>
              		<a href="#"> Master <i class="fa fa-angle-left pull-right"></i></a>
              		<ul class="treeview-menu">
              			<li><a href="#"><i class="fa fa-caret-right"></i> Wajib Pajak </a></li>
              			<li><a href="#"><i class="fa fa-caret-right"></i> Organisasi </a></li>             			
              		</ul>
              	</li>
              </ul>
            </li>
            
            <!-- Master Menu -->
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Master</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-caret-right"></i> Wilayah</a></li>
                <li><a href="#"><i class="fa fa-caret-right"></i> Jenis Usaha</a></li>
                <li><a href="#"><i class="fa fa-caret-right"></i> Wajib Pajak</a></li>
                <li><a href="#"><i class="fa fa-caret-right"></i> Non Aktif WP</a></li>
                <li><a href="#"><i class="fa fa-caret-right"></i> Rekening</a></li>
                <li><a href="#"><i class="fa fa-caret-right"></i> Beban Pajak</a></li>
                <li><a href="#"><i class="fa fa-caret-right"></i> Organisasi</a></li>
                <li><a href="#"><i class="fa fa-caret-right"></i> Pegawai</a></li>
                <li><a href="#"><i class="fa fa-caret-right"></i> Pemakai Rekening</a></li>
                <li><a href="#"><i class="fa fa-caret-right"></i> Rumus Reklame</a></li>
              </ul>
            </li>
            
            <!-- Utilities Menu -->
            <li class="treeview">
              <a href="#">
                <i class="fa fa-cog"></i> <span>Utilities</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url(); ?>user/"><i class="fa fa-caret-right"></i> User</a></li>
                <li><a href="#"><i class="fa fa-caret-right"></i> Backup</a></li>
                <li><a href="#"><i class="fa fa-caret-right"></i> Restore</a></li>
                <li><a href="#"><i class="fa fa-caret-right"></i> System Setting</a></li>                
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>