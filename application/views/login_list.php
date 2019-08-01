<?php 
$this->load->view('template/head');
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>
<section class="content-header">
    <div class="animsition">
    <h1>
        Admin dan User Access
        <!-- <small></small> -->
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Admin adn User Access</li>
    </ol>
</div>
</section>

<section class="content">
    <div class="animsition">
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px"></h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('user/create'), 'Create', 'class="btn btn-warning"'); ?>
		<?php echo anchor(site_url('login/excel'), 'Excel', 'class="btn btn-success"'); ?>
		<?php echo anchor(site_url('login/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <div class="box">
        <div class="box-body">
        <table class="table table-hover" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
            <th>Nama</th>
            <th>email</th>
		    <th>Password</th>
		    <th>Hak Akses</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($login_data as $login)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
            <td><?php echo $login->nama_user ?></td>
            <td><?php echo $login->email ?></td>
		    <td><?php echo $login->password ?></td>
		    <td><?php echo $login->hak_akses ?></td>
		    <td style="text-align:center" width="100px">
			<?php 
			echo anchor(site_url('login/read/'.$login->id),'<small class="label bg-green"><i class="fa fa-search"></i></small>'); 
			echo ' '; 
			echo anchor(site_url('login/update/'.$login->id),'<small class="label bg-yellow"><i class="fa fa-pencil"></i></small>'); 
			echo ' '; 
			echo anchor(site_url('login/delete/'.$login->id),'<small class="label bg-red"><i class="fa fa-trash-o"></i></small>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        </div>
        </div>
    </div>
</section>
<?php 
$this->load->view('template/js');
$this->load->view('template/foot');
?>