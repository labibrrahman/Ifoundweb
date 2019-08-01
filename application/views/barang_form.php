<?php 
$this->load->view('template/head');
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>
<section class="content">
    <div class="animsition">
    <h2 style="margin-top:0px">Barang <?php echo $button ?></h2>
    <div class="box">
        <div class="box-body">
            <form action="<?php echo $action; ?>" method="post">
               <div class="form-group">
                <label for="varchar">Nama Barang <?php echo form_error('nama_barang') ?></label>
                <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama Barang" value="<?php echo $nama_barang; ?>" />
            </div>
            <div class="form-group">
                <label for="deskripsi_barang">Deskripsi Barang <?php echo form_error('deskripsi_barang') ?></label>
                <textarea class="form-control" rows="3" name="deskripsi_barang" id="deskripsi_barang" placeholder="Deskripsi Barang"><?php echo $deskripsi_barang; ?></textarea>
            </div>
            <div class="form-group">
                <label for="varchar">Jenis Barang <?php echo form_error('jenis_barang') ?></label>
                <input type="text" class="form-control" name="jenis_barang" id="jenis_barang" placeholder="Jenis Barang" value="<?php echo $jenis_barang; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Foto <?php echo form_error('foto') ?></label>
                <input type="file" class="form-control" name="foto" id="foto" placeholder="Foto" value="<?php echo $foto; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Status</label><br>
                <select name="p" class="form-control">
                    <option value="1">Belum Di Kembalikan</option>
                    <option value="0">Sudah DI Kembalikan</option>
                </select>
                <!-- <input type="hidden" class="form-control" name="p" id="p" placeholder="P" value="1" /> -->
            </div>
            <input type="hidden" name="id_barang" value="<?php echo $id_barang; ?>" /> 
            <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            <a href="<?php echo site_url('barang') ?>" class="btn btn-default">Cancel</a>
        </form>
    </div>
</div>
</div>
</section>
<?php 
$this->load->view('template/js');
$this->load->view('template/foot');
?>