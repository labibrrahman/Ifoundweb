<?php 
$this->load->view('template/head');
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>
<section class="content">
        <h2 style="margin-top:0px">L_kehilangan <?php echo $button ?></h2>
        <div class="box">
        <div class="box-body">
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
        <label for="int">Id User <?php echo form_error('id_user') ?></label><br>
            <select required name="id_user" class="form-control">
            <option value="" >-- Pilih Bidang --</option>
        <?php                                
        foreach ($ids as $row) {  
          echo "<option value='".$row->id_user."'>".$row->nama_user."-".$row->id_user."</option>";
          }
          echo"
        </select>"
        ?>
        </div>
	    <div class="form-group">
            <label for="int">Id Barang <?php echo form_error('id_barang') ?></label>
            <input type="text" class="form-control" name="id_barang" id="id_barang" placeholder="Id Barang" value="<?php echo $id_barang; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tgl Kehilangan <?php echo form_error('tgl_kehilangan') ?></label>
            <input type="date" class="form-control" name="tgl_kehilangan" id="tgl_kehilangan" placeholder="Tgl Kehilangan" value="<?php echo $tgl_kehilangan; ?>" />
        </div>
	    <div class="form-group">
            <label for="lokasi_kehilangan">Lokasi Kehilangan <?php echo form_error('lokasi_kehilangan') ?></label>
            <textarea class="form-control" rows="3" name="lokasi_kehilangan" id="lokasi_kehilangan" placeholder="Lokasi Kehilangan"><?php echo $lokasi_kehilangan; ?></textarea>
        </div>
                <label for="varchar">Status</label><br>
                <select name="p" class="form-control">
                    <option value="1">1</option>
                    <option value="0">0</option>
                </select><br>
	    <input type="hidden" name="id_kehilang" value="<?php echo $id_kehilang; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('l_kehilangan') ?>" class="btn btn-default">Cancel</a>
	</form>
</div>
</div>
</section>
<?php 
$this->load->view('template/js');
$this->load->view('template/foot');
?>