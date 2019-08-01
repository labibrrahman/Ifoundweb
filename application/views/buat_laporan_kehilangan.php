<?php 
$this->load->view('template/head');
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>

<section class="content">
    <div class="animsition">
        <center><?php echo $this->session->flashdata("pesan"); ?></center>
        <h2 style="margin-top:0px">Buat Laporan Kehilangan</h2>
        <div class="box">
            <div class="box-body">
                <?php echo form_open_multipart('Buat_Laporan_kehilangan/upload');?>
                <!-- <form action="<?php echo base_url('index.php/Buat_Laporan_kehilangan/upload') ?>" method="post"> -->
                    <div class="form-group">
                        <label for="int">Id User <?php echo form_error('id_user') ?></label><br>
                        <select required name="id_user" class="form-control">
                            <option value="" >-- Pilih User --</option>
                            <?php                                
                            foreach ($iduser as $row) {  
                              echo "<option value='".$row->id_user."'>".$row->nama_user."-".$row->id_user."</option>";
                          }
                          echo"
                          </select>"
                          ?>
                      </div>
                      <div class="form-group">
                        <label for="int">Id Barang<?php echo form_error('id_barang') ?></label>
                        <input type="text" class="form-control" name="id_barang" id="id_barang" placeholder="Id Barang" value="<?php echo $kodeunik ?>" />
                    </div>
                    <div class="form-group">
                        <label for="int">Nama Barang<?php echo form_error('nama_barang') ?></label>
                        <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama Barang" />
                    </div>
                    <div class="form-group">
                        <label for="int">Deskripsi Barang<?php echo form_error('des_barang') ?></label>
                        <input type="text" class="form-control" name="des_barang" id="des_barang" placeholder="Deskripsi Barang"  />
                    </div>
                    <div class="form-group">
                        <label for="int">Jenis Barang<?php echo form_error('jenis_barang') ?></label>
                        <input type="text" class="form-control" name="jenis_barang" id="jenis_barang" placeholder="Jenis Barang" />
                    </div>
                    <div class="form-group">
                        <label for="int">Foto Barang<?php echo form_error('foto_barang') ?></label>
                        <input type="file" class="form-control" name="foto_barang" id="foto_barang" placeholder="Foto Barang" />
                    </div>
                    <div class="form-group">
                        <label for="date">Tanggal Kehilangan <?php echo form_error('tgl') ?></label>
                        <input type="date" class="form-control" name="tgl" id="tgl" placeholder="Tanggal Kehilangan" />
                    </div>
                    <div class="form-group">
                        <label for="lokasi">Lokasi Kehilangan <?php echo form_error('lokasi') ?></label>
                        <input type="text" class="form-control" name="lokasi" id="lokasi" placeholder="Lokasi Kehilangan" />
                    </div>
                    <div class="form-group">
                        <!-- <label for="lokasi">Lokasi Kehilangan/Menemukan <?php echo form_error('lokasi') ?></label> -->
                        <input type="hidden" class="form-control" name="status" id="status"  value="1" />
                    </div> 
                    <button type="submit" class="btn btn-primary">Input</button> 
                    <a href="<?php echo site_url('l_kehilangan') ?>" class="btn btn-default">Cancel</a>
                    <?= form_close(); ?>
                    <!-- </form> -->
                </div>
            </div>
        </div> 
    </section>
    <?php 
    $this->load->view('template/js');
    $this->load->view('template/foot');
    ?>