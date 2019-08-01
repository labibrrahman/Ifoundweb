<?php 
$this->load->view('template/head');
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>
<section class="content">
    <h2 style="margin-top:0px">Login <?php echo $button ?></h2>
    <div class="box">
        <div class="box-body">
            <form action="<?php echo $action; ?>" method="post">
                <div class="form-group">
                    <!-- <label for="varchar">Email <?php echo form_error('id') ?></label> -->
                    <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id; ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">Nama User <?php echo form_error('nama_user') ?></label>
                    <input type="text" class="form-control" name="nama_user" id="nama_user" placeholder="Nama User" value="<?php echo $nama_user; ?>" />
                </div>    
                <div class="form-group">
                    <label for="varchar">Email <?php echo form_error('email') ?></label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">Password <?php echo form_error('password') ?></label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
                </div>
                <div class="form-group">
                    <input type="radio" name="hak_akses"
                    <?php if (isset($hak_akses) && $hak_akses=="admin") echo "checked";?>
                    value="admin">Admin
                    <input type="radio" name="hak_akses"
                    <?php if (isset($hak_akses) && $hak_akses=="user") echo "checked";?>
                    value="user">User
                </div>
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                <a href="<?php echo site_url('login') ?>" class="btn btn-default">Cancel</a>
            </form>
        </div>
    </div>
</section>
<?php 
$this->load->view('template/js');
$this->load->view('template/foot');
?>