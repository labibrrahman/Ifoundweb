
<?php 
$this->load->view('template/head');
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>
<section class="content">
    <div class="animsition">
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Barang List</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <!-- <?php echo anchor(site_url('barang/create'), 'Create', 'class="btn btn-warning"'); ?> -->
		<?php echo anchor(site_url('barang/excel'), 'Excel', 'class="btn btn-success"'); ?>
		<?php echo anchor(site_url('barang/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <div class="box">
        <div class="box-body">
        <table class="table table-hover" id="mytable">
            <thead> 
                <tr>
            <th width="80px">No</th>
		    <th>Nama Barang</th>
		    <th>Deskripsi Barang</th>
		    <th>Jenis Barang</th>
		    <th width="30%">Foto</th>
		    <th>Status</th>
            <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($barang_data as $barang)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $barang->nama_barang ?></td>
		    <td><?php echo $barang->deskripsi_barang ?></td>
		    <td><?php echo $barang->jenis_barang ?></td>
		    <td><img width='50%' src="<?= base_url('images/'.$barang->foto) ?>" alt=""></td>
		    <td><?php 
            if ($barang->p == "1") {
               echo "Belum Di kembalikan"; 
            } else {
                echo "Sudah DI kembalikan";
            }
            ?>  
            </td>
		    <td style="text-align:center" width="100px">
			<?php 
			echo anchor(site_url('barang/read/'.$barang->id_barang),'<small class="label bg-green"><i class="fa fa-search"></i></small>'); 
			echo ' '; 
			echo anchor(site_url('barang/update/'.$barang->id_barang),'<small class="label bg-yellow"><i class="fa fa-pencil"></i></small>'); 
			echo ' '; 
			echo anchor(site_url('barang/hapusFile/'.$barang->id_barang),'<small class="label bg-red"><i class="fa fa-trash-o"></i></small>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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