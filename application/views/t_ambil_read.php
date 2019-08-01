<?php 
$this->load->view('template/head');
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>
<section class="content">
        <h2 style="margin-top:0px">T_ambil Read</h2>
        <div class="box">
        <div class="box-body">
        <table class="table">
	    <tr><td>Id Laporan</td><td><?php echo $id_laporan; ?></td></tr>
	    <tr><td>Tgl Ambil</td><td><?php echo $tgl_ambil; ?></td></tr>
	    <tr><td>P</td><td><?php echo $p; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('t_ambil') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
</div>
</div>
</section>
<?php 
$this->load->view('template/js');
$this->load->view('template/foot');
?>