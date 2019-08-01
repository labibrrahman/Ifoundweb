<?php 
$this->load->view('template/head');
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>
<section class="content">
    <h2 style="margin-top:0px">User <?php echo $button ?></h2>
    <div class="box">
        <div class="box-body">
            <form action="<?php echo $action; ?>" method="post">
             <div class="form-group">
                <?php if ($button == "Update") {?>
                    <label for="varchar">Nama User <?php echo form_error('nama_user') ?></label>
                    <input type="text" readonly="true" class="form-control" name="nama_user" id="nama_user" placeholder="Nama User" value="<?php echo $nama_user; ?>" />
                <?php } else { ?>
                    <label for="varchar">Nama User <?php echo form_error('nama_user') ?></label>
                    <input type="text" class="form-control" name="nama_user" id="nama_user" placeholder="Nama User" value="<?php echo $nama_user; ?>" />
                <?php } ?>
            </div>
            <div class="form-group">
                <label for="varchar">Tempat Lahir <?php echo form_error('tempat_lahir') ?></label>
                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" />
            </div>
            <div class="form-group">
                <label for="date">Tanggal Lahir <?php echo form_error('tanggal_lahir') ?></label>
                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Jenis Kelamin</label><br>
                <select name="jk" class="form-control">
                    <option value="L">Laki - Laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat <?php echo form_error('alamat') ?></label>
                <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
            </div>
            <div class="form-group">
                <label for="varchar">No Telp <?php echo form_error('no_telp') ?></label>
                <input type="Number" class="form-control" name="no_telp" id="no_telp" placeholder="No Telp" value="<?php echo $no_telp; ?>" />
            </div>
            <div class="form-group">
                <?php if ($button == "Update") {?>
                    <label for="varchar">Email <?php echo form_error('email') ?></label>
                    <input type="email" readonly="true" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
                <?php } else { ?>
                    <label for="varchar">Email <?php echo form_error('email') ?></label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
                <?php } ?>
            </div>
            <?php 
            if ($button == "Update"){

            }else{
             ?>
             <div class="form-group">
                <label for="varchar">Password <?php echo form_error('password') ?></label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Tulis Kembali Password</label>
                <input type="password" class="form-control" name="password2" id="password2" placeholder="Password" value="<?php echo $password; ?>" />
            </div>
        <?php } ?>
        <div class="form-group">
            <label for="int">Nik <?php echo form_error('nik') ?></label>
            <input type="Number" class="form-control" name="nik" id="nik" placeholder="Nik" value="<?php echo $nik; ?>" />
        </div>
        <div class="form-group">
            <!-- <label for="enum">P <?php echo form_error('p') ?></label> -->
            <input type="hidden" class="form-control" name="p" id="p" placeholder="P" value="1" />
        </div>
        <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('user') ?>" class="btn btn-default">Cancel</a>
    </form>
</div>
</div>
</section>
<?php 
$this->load->view('template/js');
$this->load->view('template/foot');
?>