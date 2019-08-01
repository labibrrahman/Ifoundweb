<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>L_menemukan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id User</th>
		<th>Id Barang</th>
		<th>Tgl Menemukan</th>
		<th>Lokasi Menemukan</th>
		<th>P</th>
		
            </tr><?php
            foreach ($l_menemukan_data as $l_menemukan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $l_menemukan->id_user ?></td>
		      <td><?php echo $l_menemukan->id_barang ?></td>
		      <td><?php echo $l_menemukan->tgl_menemukan ?></td>
		      <td><?php echo $l_menemukan->lokasi_menemukan ?></td>
		      <td><?php echo $l_menemukan->p ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>