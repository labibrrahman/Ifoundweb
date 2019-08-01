<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            
            <div class="pull-left info">
                <p><?php echo $this->session->userdata('email'); ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
       
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="<?php echo site_url('dashboard1') ?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
        </li>
        <li>
            <a href="<?php echo site_url('login') ?>">
                <i class="glyphicon glyphicon-user"></i> <span>Admin</span>
            </a>
        </li>
        <li>
            <a href="<?php echo site_url('user') ?>">
                <i class="fa fa-users"></i> <span>User</span>
            </a>
        </li>
        <li>
            <a href="<?php echo site_url('Buat_Laporan_kehilangan') ?>">
                <i class="fa fa-file"></i> <span>Buat Laporan Kehilangan</span>
            </a>
        </li>
        <li>
            <a href="<?php echo site_url('Buat_Laporan_menemukan') ?>">
                <i class="fa fa-file"></i> <span>Buat Laporan Menemukan</span>
            </a>
        </li>
        <li>
            <a href="<?php echo site_url('Barang') ?>">
                <i class="glyphicon glyphicon-tasks"></i> <span>Data Barang</span>
            </a>
        </li>
        <li>
            <a href="<?php echo site_url('l_kehilangan') ?>">
                <i class="fa fa-newspaper-o"></i> <span>Laporan Kehilangan</span>
            </a>
        </li>
        <li>
            <a href="<?php echo site_url('l_menemukan') ?>">
                <i class="fa fa-newspaper-o"></i> <span>Laporan Menemukan</span>
            </a>
        </li>
        <li>
            <a href="<?php echo site_url('t_ambil') ?>">
                <i class="glyphicon glyphicon-saved"></i> <span>Data Pengambilan barang</span>
            </a>
        </li>
    </li>
</ul>
</section>
<!-- /.sidebar -->
</aside>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">