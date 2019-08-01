<?php 
$this->load->view('template/head');
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>
<section class="content">
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Laporan kehilangan</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('Buat_Laporan_kehilangan'), 'Create', 'class="btn btn-warning"'); ?>
		<?php echo anchor(site_url('l_kehilangan/excel'), 'Excel', 'class="btn btn-success"'); ?>
		<?php echo anchor(site_url('l_kehilangan/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <div class="box">
        <div class="box-body">
        <table class="table table-hover" id="mytable">
            <thead>
                <tr>
            <th width="80px">No</th>
		    <th>Id User</th>
		    <th>Id Barang</th>
		    <th>Tgl Kehilangan</th>
		    <th>Lokasi Kehilangan</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($l_kehilangan_data as $l_kehilangan)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $l_kehilangan->id_user ?></td>
		    <td><?php echo $l_kehilangan->id_barang ?></td>
		    <td><?php echo $l_kehilangan->tgl_kehilangan ?></td>
		    <td><?php echo $l_kehilangan->lokasi_kehilangan ?></td>
		    <td style="text-align:center" width="100px">
			<?php 
			echo anchor(site_url('l_kehilangan/read/'.$l_kehilangan->id_kehilang),'<small class="label bg-green"><i class="fa fa-search"></i></small>'); 
			echo ' '; 
			echo anchor(site_url('l_kehilangan/update/'.$l_kehilangan->id_kehilang),'<small class="label bg-yellow"><i class="fa fa-pencil"></i></small>'); 
			echo ' '; 
			echo anchor(site_url('l_kehilangan/delete/'.$l_kehilangan->id_kehilang),'<small class="label bg-red"><i class="fa fa-trash-o"></i></small>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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