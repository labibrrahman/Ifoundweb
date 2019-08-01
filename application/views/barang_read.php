<?php 
$this->load->view('template/head');
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>
<section class="content">
	<div class="animsition">
		<h2 style="margin-top:0px">Barang Read</h2>
		<div class="box">
			<div class="box-body">
				<table class="table">
					<tr><td>Nama Barang</td><td><?php echo $nama_barang; ?></td></tr>
					<tr><td>Deskripsi Barang</td><td><?php echo $deskripsi_barang; ?></td></tr>
					<tr><td>Jenis Barang</td><td><?php echo $jenis_barang; ?></td></tr>
					<tr><td>Foto</td><td><?php echo $foto; ?></td></tr>
					<tr><td></td><td><a href="<?php echo site_url('barang') ?>" class="btn btn-default">Cancel</a></td></tr>
				</table>
			</div>
		</div>
	</div>
</section>
<?php 
$this->load->view('template/js');
$this->load->view('template/foot');
?>