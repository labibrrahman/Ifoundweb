<?php 
$this->load->view('template/head');
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>
<section class="content">
        <h2 style="margin-top:0px">L_menemukan <?php echo $button ?></h2>
        <div class="box">
        <div class="box-body">
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id User <?php echo form_error('id_user') ?></label>
            <input type="text" class="form-control" name="id_user" id="id_user" placeholder="Id User" value="<?php echo $id_user; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Barang <?php echo form_error('id_barang') ?></label>
            <input type="text" class="form-control" name="id_barang" id="id_barang" placeholder="Id Barang" value="<?php echo $id_barang; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tgl Menemukan <?php echo form_error('tgl_menemukan') ?></label>
            <input type="text" class="form-control" name="tgl_menemukan" id="tgl_menemukan" placeholder="Tgl Menemukan" value="<?php echo $tgl_menemukan; ?>" />
        </div>
	    <div class="form-group">
            <label for="lokasi_menemukan">Lokasi Menemukan <?php echo form_error('lokasi_menemukan') ?></label>
            <textarea class="form-control" rows="3" name="lokasi_menemukan" id="lokasi_menemukan" placeholder="Lokasi Menemukan"><?php echo $lokasi_menemukan; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="enum">P <?php echo form_error('p') ?></label>
            <input type="text" class="form-control" name="p" id="p" placeholder="P" value="<?php echo $p; ?>" />
        </div>
	    <input type="hidden" name="id_menemukan" value="<?php echo $id_menemukan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('l_menemukan') ?>" class="btn btn-default">Cancel</a>
	</form>
</div>
</div>
</section>
<?php 
$this->load->view('template/js');
$this->load->view('template/foot');
?>