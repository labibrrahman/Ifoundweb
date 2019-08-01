<?php 
$this->load->view('template/head');
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>
<section class="content">
        <h2 style="margin-top:0px">T_ambil <?php echo $button ?></h2>
        <div class="box">
        <div class="box-body">
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Laporan <?php echo form_error('id_laporan') ?></label>
            <input type="text" class="form-control" name="id_laporan" id="id_laporan" placeholder="Id Laporan" value="<?php echo $id_laporan; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tgl Ambil <?php echo form_error('tgl_ambil') ?></label>
            <input type="text" class="form-control" name="tgl_ambil" id="tgl_ambil" placeholder="Tgl Ambil" value="<?php echo $tgl_ambil; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">P <?php echo form_error('p') ?></label>
            <input type="text" class="form-control" name="p" id="p" placeholder="P" value="<?php echo $p; ?>" />
        </div>
	    <input type="hidden" name="id_ambil" value="<?php echo $id_ambil; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('t_ambil') ?>" class="btn btn-default">Cancel</a>
	</form>
</div>
</div>
</section>
<?php 
$this->load->view('template/js');
$this->load->view('template/foot');
?>