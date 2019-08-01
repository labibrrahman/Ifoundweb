<?php 
$this->load->view('template/head');
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>
<section class="content">
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">User List</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('user/create'), 'Create', 'class="btn btn-warning"'); ?>
		<?php echo anchor(site_url('user/excel'), 'Excel', 'class="btn btn-success"'); ?>
		<?php echo anchor(site_url('user/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <div class="box">
        <div class="box-body">
        <table class="table table-hover" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Nama User</th>
		    <th>Nik</th>
		    <th>Tempat Lahir</th>
		    <th>Tanggal Lahir</th>
		    <th>Jk</th>
		    <th>Alamat</th>
		    <th>No Telp</th>
		    <th>Email</th>
		    <th>P</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($user_data as $user)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $user->nama_user ?></td>
		    <td><?php echo $user->nik ?></td>
		    <td><?php echo $user->tempat_lahir ?></td>
		    <td><?php echo $user->tanggal_lahir ?></td>
		    <td><?php echo $user->jk ?></td>
		    <td><?php echo $user->alamat ?></td>
		    <td><?php echo $user->no_telp ?></td>
		    <td><?php echo $user->email ?></td> 
		    <td><?php echo $user->p ?></td>
		    <td style="text-align:center" width="100px">
			<?php 
			echo anchor(site_url('user/read/'.$user->id_user),'<small class="label bg-green"><i class="fa fa-search"></i></small>'); 
			echo ' '; 
			echo anchor(site_url('user/update/'.$user->id_user),'<small class="label bg-yellow"><i class="fa fa-pencil"></i></small>'); 
			echo ' '; 
			echo anchor(site_url('user/delete/'.$user->id_user),'<small class="label bg-red"><i class="fa fa-trash-o"></i></small>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
</section>
<?php 
$this->load->view('template/js');
$this->load->view('template/foot');
?>